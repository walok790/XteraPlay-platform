<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDO;
use PDOException;
use Throwable;

class InstallerController extends Controller
{
    private array $requiredExtensions = [
        'bcmath' => 'BCMath',
        'ctype' => 'Ctype',
        'fileinfo' => 'Fileinfo',
        'json' => 'JSON',
        'mbstring' => 'Mbstring',
        'openssl' => 'OpenSSL',
        'pdo' => 'PDO',
        'pdo_mysql' => 'pdo_mysql',
        'tokenizer' => 'Tokenizer',
        'xml' => 'XML',
        'curl' => 'cURL',
        'gd' => 'GD',
    ];

    private array $writableDirs = [
        '.env' => 'File',
        'storage/app' => 'Directory',
        'storage/framework/cache' => 'Directory',
        'storage/framework/sessions' => 'Directory',
        'storage/framework/views' => 'Directory',
        'storage/logs' => 'Directory',
        'bootstrap/cache' => 'Directory',
    ];

    public function welcome()
    {
        return redirect(url('/install/requirements'));
    }

    // ============ STEP 1: REQUIREMENTS ============
    public function requirements()
    {
        $checks = [];
        $allPass = true;
        foreach ($this->requiredExtensions as $ext => $name) {
            $loaded = extension_loaded($ext);
            $checks[] = ['name' => $name, 'ok' => $loaded];
            if (! $loaded) $allPass = false;
        }
        // Also require PHP 8.2+
        $phpOk = version_compare(PHP_VERSION, '8.2.0', '>=');
        $checks[] = ['name' => 'PHP ' . PHP_VERSION . ' (needs ≥ 8.2)', 'ok' => $phpOk];
        if (! $phpOk) $allPass = false;

        return view('installer.steps.requirements', [
            'step' => 1,
            'checks' => $checks,
            'allPass' => $allPass,
        ]);
    }

    // ============ STEP 2: PERMISSIONS ============
    public function permissions()
    {
        $checks = [];
        $allPass = true;
        foreach ($this->writableDirs as $path => $type) {
            $full = base_path($path);
            $exists = file_exists($full);
            $writable = $exists && is_writable($full);
            $checks[] = [
                'path' => $path,
                'type' => $type,
                'exists' => $exists,
                'ok' => $writable,
            ];
            if (! $writable) $allPass = false;
        }
        return view('installer.steps.permissions', [
            'step' => 2,
            'checks' => $checks,
            'allPass' => $allPass,
        ]);
    }

    // ============ STEP 3: DATABASE ============
    public function database()
    {
        $env = $this->parseEnv();
        return view('installer.steps.database', [
            'step' => 3,
            'env' => $env,
        ]);
    }

    public function testDatabase(Request $request)
    {
        $data = $request->validate([
            'db_host' => 'required|string|max:150',
            'db_port' => 'required|numeric',
            'db_database' => 'required|string|max:100',
            'db_username' => 'required|string|max:100',
            'db_password' => 'nullable|string|max:200',
        ]);

        try {
            $dsn = "mysql:host={$data['db_host']};port={$data['db_port']};dbname={$data['db_database']}";
            $pdo = new PDO($dsn, $data['db_username'], $data['db_password'] ?? '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_TIMEOUT => 5,
            ]);
            $pdo = null;

            $this->updateEnv([
                'DB_CONNECTION' => 'mysql',
                'DB_HOST' => $data['db_host'],
                'DB_PORT' => $data['db_port'],
                'DB_DATABASE' => $data['db_database'],
                'DB_USERNAME' => $data['db_username'],
                'DB_PASSWORD' => $data['db_password'] ?? '',
                'SESSION_DRIVER' => 'file',
                'CACHE_STORE' => 'file',
            ]);

            // Ensure APP_KEY is set
            if (empty($this->parseEnv()['APP_KEY'] ?? null)) {
                Artisan::call('key:generate', ['--force' => true]);
            }

            return redirect(url('/install/mode'))->with('status', 'Database connection successful.');
        } catch (PDOException $e) {
            return back()
                ->withErrors(['db' => 'Connection failed: ' . $e->getMessage()])
                ->withInput();
        }
    }

    // ============ STEP 4: MODE SELECTION ============
    public function mode()
    {
        return view('installer.steps.mode', ['step' => 4]);
    }

    public function saveMode(Request $request)
    {
        $data = $request->validate(['mode' => 'required|in:demo,business']);
        session(['install_mode' => $data['mode']]);

        if ($data['mode'] === 'demo') {
            return redirect(url('/install/import'));
        }
        return redirect(url('/install/admin'));
    }

    // ============ STEP 5: ADMIN (business only) ============
    public function admin()
    {
        if (session('install_mode') !== 'business') {
            return redirect(url('/install/mode'));
        }
        return view('installer.steps.admin', ['step' => 5]);
    }

    public function saveAdmin(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'password' => 'required|string|min:8|confirmed',
        ]);
        session(['admin_data' => $data]);
        return redirect(url('/install/import'));
    }

    // ============ STEP 6: IMPORT ============
    public function import()
    {
        $mode = session('install_mode', 'demo');
        return view('installer.steps.import', ['step' => 6, 'mode' => $mode]);
    }

    public function runImport(Request $request)
    {
        try {
            $mode = session('install_mode', 'demo');

            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            Artisan::call('view:clear');

            // Fresh migrate (drops existing tables if any)
            Artisan::call('migrate:fresh', ['--force' => true]);

            if ($mode === 'demo') {
                // Full demo seed
                Artisan::call('db:seed', ['--force' => true]);
            } else {
                // Business mode - only essential structure + user's admin
                Artisan::call('db:seed', [
                    '--class' => 'Database\\Seeders\\FreshInstallSeeder',
                    '--force' => true,
                ]);
                $adminData = session('admin_data');
                if ($adminData) {
                    Admin::updateOrCreate(
                        ['email' => $adminData['email']],
                        [
                            'name' => $adminData['name'],
                            'password' => Hash::make($adminData['password']),
                        ]
                    );
                }
            }

            // Store install mode as a setting for later reference (e.g., login page)
            Setting::set('install_mode', $mode, 'string', 'system');
            Setting::set('installed_at', now()->toIso8601String(), 'string', 'system');

            // Write lockfile
            $this->markInstalled($mode);

            // Build a success flash for the landing page (one-time toast)
            $flash = [
                'mode' => $mode,
                'admin_email' => $mode === 'demo'
                    ? 'admin@xteraplay.com'
                    : (session('admin_data.email') ?? null),
                'admin_password' => $mode === 'demo' ? 'admin1234' : null,
            ];
            session()->flash('installer_success', $flash);

            // Clear installer wizard session data
            session()->forget(['install_mode', 'admin_data']);

            return response()->json([
                'success' => true,
                'redirect' => url('/'),
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // ============ HELPERS ============
    private function markInstalled(string $mode): void
    {
        $file = storage_path('app/installed.lock');
        $dir = dirname($file);
        if (! is_dir($dir)) mkdir($dir, 0755, true);
        file_put_contents($file, json_encode([
            'installed_at' => date('c'),
            'mode' => $mode,
            'version' => '1.0.0',
        ], JSON_PRETTY_PRINT));
    }

    private function parseEnv(): array
    {
        $envPath = base_path('.env');
        if (! file_exists($envPath)) return [];
        $env = [];
        foreach (file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            $line = trim($line);
            if (str_starts_with($line, '#') || ! str_contains($line, '=')) continue;
            [$k, $v] = explode('=', $line, 2);
            $env[trim($k)] = trim($v, " \"'");
        }
        return $env;
    }

    private function updateEnv(array $data): void
    {
        $envPath = base_path('.env');
        if (! file_exists($envPath) && file_exists(base_path('.env.example'))) {
            copy(base_path('.env.example'), $envPath);
        }
        $env = file_get_contents($envPath);
        foreach ($data as $key => $value) {
            $val = str_contains((string) $value, ' ') ? '"' . $value . '"' : $value;
            if (preg_match("/^{$key}=.*/m", $env)) {
                $env = preg_replace("/^{$key}=.*/m", "{$key}={$val}", $env);
            } else {
                $env .= PHP_EOL . "{$key}={$val}";
            }
        }
        file_put_contents($envPath, $env);
    }
}
