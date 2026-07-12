<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => Setting::get('site_name', 'XteraPlay'),
            'site_tagline' => Setting::get('site_tagline', ''),
            'support_email' => Setting::get('support_email', ''),
            'free_daily_credits' => Setting::get('free_daily_credits', 5),
            'registration_enabled' => Setting::get('registration_enabled', true),
            'email_verification_required' => Setting::get('email_verification_required', true),
            'api_enabled' => Setting::get('api_enabled', true),
            'maintenance_mode' => Setting::get('maintenance_mode', false),
        ];
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name' => 'required|string|max:100',
            'site_tagline' => 'nullable|string|max:200',
            'support_email' => 'nullable|email|max:100',
            'free_daily_credits' => 'required|integer|min:0',
        ]);

        Setting::set('site_name', $data['site_name']);
        Setting::set('site_tagline', $data['site_tagline'] ?? '');
        Setting::set('support_email', $data['support_email'] ?? '');
        Setting::set('free_daily_credits', (int) $data['free_daily_credits'], 'integer', 'features');

        // Boolean toggles
        foreach (['registration_enabled', 'email_verification_required', 'api_enabled', 'maintenance_mode'] as $key) {
            Setting::set($key, $request->boolean($key), 'boolean', 'features');
        }

        return redirect(url('/admin/settings'))->with('status', 'Settings saved.');
    }
}
