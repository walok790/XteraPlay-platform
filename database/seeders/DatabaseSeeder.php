<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Announcement;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\LandingFeature;
use App\Models\LandingNav;
use App\Models\Message;
use App\Models\Plan;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedUsers();
        $this->seedPlans();
        $this->seedCoupons();
        $this->seedCurrencies();
        $this->seedLandingFeatures();
        $this->seedLandingNavs();
        $this->seedReviews();
        $this->seedAnnouncements();
        $this->seedSettings();
        $this->seedMessages();
        $this->seedTickets();
        $this->seedTransactions();
    }

    private function seedUsers(): void
    {
        $demo = User::updateOrCreate(
            ['email' => 'demo@xteraplay.com'],
            ['name' => 'Demo User', 'password' => Hash::make('demo1234'), 'email_verified_at' => now()]
        );

        User::updateOrCreate(
            ['email' => 'sarah@example.com'],
            ['name' => 'Sarah M.', 'password' => Hash::make('password'), 'email_verified_at' => now()]
        );

        User::updateOrCreate(
            ['email' => 'ahmed@example.com'],
            ['name' => 'Ahmed T.', 'password' => Hash::make('password'), 'email_verified_at' => now()]
        );

        Admin::updateOrCreate(
            ['email' => 'admin@xteraplay.com'],
            ['name' => 'Admin', 'password' => Hash::make('admin1234')]
        );
    }

    private function seedPlans(): void
    {
        Plan::updateOrCreate(['slug' => 'free'], [
            'name' => 'Free', 'tagline' => 'Get started basics',
            'price' => 0, 'billing_period' => 'forever',
            'features' => ['5 videos per day', '720p quality', 'Basic watch history', 'Online streaming'],
            'limits' => ['daily_searches' => 5, 'max_quality' => '720p', 'bookmarks' => false, 'api' => false],
            'is_popular' => false, 'is_active' => true, 'sort_order' => 1,
        ]);

        Plan::updateOrCreate(['slug' => 'pro'], [
            'name' => 'Pro', 'tagline' => 'For power users',
            'price' => 9, 'billing_period' => 'month',
            'features' => ['Unlimited videos', '1080p HD quality', 'Unlimited bookmarks', 'Priority speed', 'No ads'],
            'limits' => ['daily_searches' => -1, 'max_quality' => '1080p', 'bookmarks' => true, 'api' => false],
            'is_popular' => true, 'is_active' => true, 'sort_order' => 2,
        ]);

        Plan::updateOrCreate(['slug' => 'enterprise'], [
            'name' => 'Enterprise', 'tagline' => 'For teams',
            'price' => 29, 'billing_period' => 'month',
            'features' => ['Everything in Pro', '4K quality', 'API access', '5 team seats', 'Priority support'],
            'limits' => ['daily_searches' => -1, 'max_quality' => '4K', 'bookmarks' => true, 'api' => true, 'seats' => 5],
            'is_popular' => false, 'is_active' => true, 'sort_order' => 3,
        ]);
    }

    private function seedCoupons(): void
    {
        Coupon::updateOrCreate(['code' => 'WELCOME25'], [
            'description' => 'Welcome discount for new users',
            'discount_type' => 'percentage', 'discount_value' => 25,
            'usage_limit' => 500, 'times_used' => 142,
            'expires_at' => now()->addMonths(2), 'is_active' => true,
        ]);

        Coupon::updateOrCreate(['code' => 'BLACKFRIDAY'], [
            'description' => 'Black Friday sale',
            'discount_type' => 'percentage', 'discount_value' => 50,
            'usage_limit' => 1000, 'times_used' => 890,
            'expires_at' => now()->subDays(15), 'is_active' => false,
        ]);

        Coupon::updateOrCreate(['code' => 'NEWYEAR2025'], [
            'description' => 'New Year 2025 special',
            'discount_type' => 'percentage', 'discount_value' => 30,
            'usage_limit' => 200, 'times_used' => 56,
            'expires_at' => now()->addMonth(), 'is_active' => true,
        ]);

        Coupon::updateOrCreate(['code' => 'SUMMERPRO'], [
            'description' => 'Summer promo — $5 off',
            'discount_type' => 'fixed', 'discount_value' => 5,
            'usage_limit' => 100, 'times_used' => 0,
            'starts_at' => now()->addMonths(3), 'expires_at' => now()->addMonths(5),
            'is_active' => true,
        ]);
    }

    private function seedCurrencies(): void
    {
        $currencies = [
            ['code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$', 'flag_emoji' => '🇺🇸', 'exchange_rate' => 1.00, 'is_default' => true],
            ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€', 'flag_emoji' => '🇪🇺', 'exchange_rate' => 0.92, 'is_default' => false],
            ['code' => 'GBP', 'name' => 'British Pound', 'symbol' => '£', 'flag_emoji' => '🇬🇧', 'exchange_rate' => 0.79, 'is_default' => false],
            ['code' => 'INR', 'name' => 'Indian Rupee', 'symbol' => '₹', 'flag_emoji' => '🇮🇳', 'exchange_rate' => 83.21, 'is_default' => false],
            ['code' => 'AUD', 'name' => 'Australian Dollar', 'symbol' => 'A$', 'flag_emoji' => '🇦🇺', 'exchange_rate' => 1.52, 'is_default' => false, 'is_active' => false],
        ];
        foreach ($currencies as $c) {
            Currency::updateOrCreate(['code' => $c['code']], $c);
        }
    }

    private function seedLandingFeatures(): void
    {
        $features = [
            ['title' => 'Video Downloads', 'description' => 'Direct downloads with multiple quality options up to 1080p HD.', 'icon_color' => 'blue', 'sort_order' => 1],
            ['title' => 'Online Streaming', 'description' => 'Stream directly in your browser without downloading anything.', 'icon_color' => 'emerald', 'sort_order' => 2],
            ['title' => 'Link Converter', 'description' => 'Convert Terabox share links to direct downloadable URLs.', 'icon_color' => 'orange', 'sort_order' => 3],
            ['title' => 'Batch Processing', 'description' => 'Process multiple links at once. Perfect for large folders.', 'icon_color' => 'violet', 'sort_order' => 4],
            ['title' => 'Developer API', 'description' => 'Clean REST API with full docs. Integrate in minutes.', 'icon_color' => 'pink', 'sort_order' => 5],
            ['title' => 'Privacy First', 'description' => 'Zero-log policy. Your data stays private, always.', 'icon_color' => 'teal', 'sort_order' => 6],
        ];
        foreach ($features as $f) {
            LandingFeature::updateOrCreate(
                ['section' => 'features', 'title' => $f['title']],
                array_merge($f, ['section' => 'features', 'is_visible' => true])
            );
        }
    }

    private function seedLandingNavs(): void
    {
        $navs = [
            ['label' => 'Home', 'url' => '/', 'sort_order' => 1],
            ['label' => 'Features', 'url' => '/#features', 'sort_order' => 2],
            ['label' => 'Pricing', 'url' => '/#pricing', 'sort_order' => 3],
            ['label' => 'Reviews', 'url' => '/#reviews', 'sort_order' => 4],
            ['label' => 'Contact', 'url' => '/contact', 'sort_order' => 5],
        ];
        foreach ($navs as $n) {
            LandingNav::updateOrCreate(['label' => $n['label']], array_merge($n, ['is_visible' => true]));
        }
    }

    private function seedReviews(): void
    {
        $reviews = [
            ['name' => 'Rahul K.', 'role' => 'Free user', 'rating' => 5, 'avatar_color' => 'from-blue-500 to-cyan-500',
             'message' => 'Finally a Terabox tool that just works. Super fast, no ads, and the mobile experience is smooth as butter.'],
            ['name' => 'Sarah M.', 'role' => 'Pro user', 'rating' => 5, 'avatar_color' => 'from-purple-500 to-pink-500',
             'message' => 'Batch processing is a game-changer. I download entire folders in one click. Worth every penny of Pro.'],
            ['name' => 'Ahmed T.', 'role' => 'Enterprise', 'rating' => 5, 'avatar_color' => 'from-emerald-500 to-teal-500',
             'message' => 'The API is clean and well-documented. Integrated it into our app in under an hour. Fantastic support.'],
            ['name' => 'Priya S.', 'role' => 'Free user', 'rating' => 4, 'avatar_color' => 'from-orange-500 to-red-500',
             'message' => 'Great tool for downloading. Would love to see 4K support in the free plan someday.'],
            ['name' => 'Michael L.', 'role' => 'Pro user', 'rating' => 5, 'avatar_color' => 'from-indigo-500 to-violet-500',
             'message' => 'Zero-log policy sold me. Privacy matters and XteraPlay respects it. Been using for 6 months now.'],
            ['name' => 'Fatima Z.', 'role' => 'Free user', 'rating' => 5, 'avatar_color' => 'from-pink-500 to-rose-500',
             'message' => 'Mobile experience is perfect. Works flawlessly on my phone without any lag. Love the clean UI!'],
        ];
        foreach ($reviews as $r) {
            Review::updateOrCreate(
                ['name' => $r['name']],
                array_merge($r, ['is_approved' => true, 'is_featured' => true])
            );
        }

        // A pending review from the demo user (unapproved — shows admin the approval flow)
        $demo = User::where('email', 'demo@xteraplay.com')->first();
        if ($demo) {
            Review::updateOrCreate(
                ['user_id' => $demo->id],
                [
                    'name' => $demo->name, 'role' => 'Free user', 'rating' => 5,
                    'message' => 'Just tried XteraPlay and it works great! Waiting for admin approval.',
                    'avatar_color' => 'from-slate-500 to-slate-700',
                    'is_approved' => false, 'is_featured' => false,
                ]
            );
        }
    }

    private function seedAnnouncements(): void
    {
        Announcement::updateOrCreate(
            ['title' => 'Batch Downloads Now Available'],
            ['message' => 'Pro users can now download multiple files at once from their dashboard.',
             'type' => 'info', 'is_active' => true, 'published_at' => now()->subDays(3)]
        );
        Announcement::updateOrCreate(
            ['title' => 'Faster Streaming Speeds'],
            ['message' => "We've upgraded our servers for 2× faster streaming on all plans.",
             'type' => 'success', 'is_active' => true, 'published_at' => now()->subDays(8)]
        );
        Announcement::updateOrCreate(
            ['title' => 'Scheduled Maintenance'],
            ['message' => 'Brief maintenance on Jan 20th from 2–4 AM UTC.',
             'type' => 'warning', 'is_active' => true, 'published_at' => now()->subDays(13)]
        );
    }

    private function seedSettings(): void
    {
        Setting::set('site_name', 'XteraPlay', 'string', 'general');
        Setting::set('site_tagline', 'Stream Terabox Videos Instantly', 'string', 'general');
        Setting::set('support_email', 'support@xteraplay.com', 'string', 'general');
        Setting::set('free_daily_credits', 5, 'integer', 'features');
        Setting::set('registration_enabled', true, 'boolean', 'features');
        Setting::set('email_verification_required', true, 'boolean', 'features');
        Setting::set('api_enabled', true, 'boolean', 'features');
        Setting::set('maintenance_mode', false, 'boolean', 'features');

        // Landing page section visibility
        Setting::set('landing_features_visible', true, 'boolean', 'landing');
        Setting::set('landing_domains_visible', true, 'boolean', 'landing');
        Setting::set('landing_pricing_visible', true, 'boolean', 'landing');
        Setting::set('landing_reviews_visible', true, 'boolean', 'landing');
        Setting::set('landing_cta_visible', true, 'boolean', 'landing');

        // Landing hero content
        Setting::set('hero_title_line_1', 'Stream Terabox Videos', 'string', 'landing');
        Setting::set('hero_title_line_2', 'Instantly', 'string', 'landing');
        Setting::set('hero_description', 'Paste any Terabox link and start watching in seconds — no downloads, no waiting, no signup.', 'string', 'landing');
        Setting::set('hero_badge_text', 'No signup required · 5 free/day', 'string', 'landing');

        // Section headings
        Setting::set('features_heading', 'Everything you need', 'string', 'landing');
        Setting::set('features_subheading', 'Powerful tools to stream and manage Terabox content, built for speed.', 'string', 'landing');
        Setting::set('pricing_heading', 'Simple, transparent pricing', 'string', 'landing');
        Setting::set('pricing_subheading', 'Start free. Upgrade when you need more. No hidden fees.', 'string', 'landing');
        Setting::set('reviews_heading', 'Loved by users worldwide', 'string', 'landing');
        Setting::set('reviews_subheading', 'Real stories from real people using XteraPlay every day.', 'string', 'landing');
    }

    private function seedMessages(): void
    {
        $messages = [
            ['name' => 'John Anderson', 'email' => 'john@example.com', 'subject' => 'Partnership inquiry',
             'message' => 'Hi team, we are interested in partnering with XteraPlay for our creator platform. Please get back to us.',
             'is_read' => false],
            ['name' => 'Maria Garcia', 'email' => 'maria@example.com', 'subject' => 'Bulk pricing question',
             'message' => 'Do you offer bulk discounts for teams of 20+ users? We are looking to onboard a large team.',
             'is_read' => false],
            ['name' => 'David Chen', 'email' => 'david@example.com', 'subject' => 'API rate limits',
             'message' => 'What are the API rate limits on the Enterprise plan? Our use case requires high throughput.',
             'is_read' => true],
        ];
        foreach ($messages as $m) {
            Message::firstOrCreate(['email' => $m['email'], 'subject' => $m['subject']], $m);
        }
    }

    private function seedTickets(): void
    {
        $demo = User::where('email', 'demo@xteraplay.com')->first();
        if (! $demo) return;

        Ticket::firstOrCreate(
            ['user_id' => $demo->id, 'subject' => 'Video not loading after paste'],
            ['category' => 'bug', 'priority' => 'high', 'status' => 'pending',
             'message' => 'I pasted a valid TeraBox link but the video player shows a blank screen. Tried multiple browsers.']
        );
        Ticket::firstOrCreate(
            ['user_id' => $demo->id, 'subject' => 'Request: Dark mode toggle'],
            ['category' => 'feature', 'priority' => 'medium', 'status' => 'resolved',
             'message' => 'Would be great to have a light/dark mode toggle option in the settings.',
             'admin_reply' => "Thanks for the suggestion! We'll consider it for a future release.",
             'resolved_at' => now()->subDays(5)]
        );
    }

    private function seedTransactions(): void
    {
        $demo = User::where('email', 'demo@xteraplay.com')->first();
        $sarah = User::where('email', 'sarah@example.com')->first();
        $proPlan = Plan::where('slug', 'pro')->first();
        $entPlan = Plan::where('slug', 'enterprise')->first();

        if ($sarah && $proPlan) {
            Transaction::firstOrCreate(
                ['reference' => 'TXN-DEMO-001'],
                ['user_id' => $sarah->id, 'plan_id' => $proPlan->id,
                 'amount' => 9.00, 'currency' => 'USD',
                 'status' => 'success', 'gateway' => 'stripe',
                 'paid_at' => now()->subDays(15)]
            );
        }
    }
}
