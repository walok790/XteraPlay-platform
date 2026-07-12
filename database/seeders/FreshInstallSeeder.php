<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\LandingFeature;
use App\Models\LandingNav;
use App\Models\Plan;
use App\Models\Setting;
use Illuminate\Database\Seeder;

/**
 * Business-mode seeder: creates only the essential structural data
 * (plans, currencies, landing content) — no demo users, reviews, tickets,
 * messages, or transactions.
 */
class FreshInstallSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedPlans();
        $this->seedCurrencies();
        $this->seedLandingFeatures();
        $this->seedLandingNavs();
        $this->seedSettings();
    }

    private function seedPlans(): void
    {
        Plan::updateOrCreate(['slug' => 'free'], [
            'name' => 'Free', 'tagline' => 'Get started basics',
            'price' => 0, 'billing_period' => 'forever',
            'features' => ['5 videos per day', '720p quality', 'Basic watch history'],
            'is_popular' => false, 'is_active' => true, 'sort_order' => 1,
        ]);
        Plan::updateOrCreate(['slug' => 'pro'], [
            'name' => 'Pro', 'tagline' => 'For power users',
            'price' => 9, 'billing_period' => 'month',
            'features' => ['Unlimited videos', '1080p HD', 'Bookmarks', 'Priority speed'],
            'is_popular' => true, 'is_active' => true, 'sort_order' => 2,
        ]);
        Plan::updateOrCreate(['slug' => 'enterprise'], [
            'name' => 'Enterprise', 'tagline' => 'For teams',
            'price' => 29, 'billing_period' => 'month',
            'features' => ['Everything in Pro', '4K quality', 'API access', 'Priority support'],
            'is_popular' => false, 'is_active' => true, 'sort_order' => 3,
        ]);
    }

    private function seedCurrencies(): void
    {
        Currency::updateOrCreate(['code' => 'USD'], [
            'name' => 'US Dollar', 'symbol' => '$', 'flag_emoji' => '🇺🇸',
            'exchange_rate' => 1.00, 'is_default' => true, 'is_active' => true,
        ]);
    }

    private function seedLandingFeatures(): void
    {
        $features = [
            ['title' => 'Video Downloads', 'description' => 'Direct downloads with multiple quality options up to 1080p HD.', 'icon_color' => 'blue'],
            ['title' => 'Online Streaming', 'description' => 'Stream directly in your browser without downloading anything.', 'icon_color' => 'emerald'],
            ['title' => 'Link Converter', 'description' => 'Convert Terabox share links to direct downloadable URLs.', 'icon_color' => 'orange'],
            ['title' => 'Batch Processing', 'description' => 'Process multiple links at once. Perfect for large folders.', 'icon_color' => 'violet'],
            ['title' => 'Developer API', 'description' => 'Clean REST API with full docs. Integrate in minutes.', 'icon_color' => 'pink'],
            ['title' => 'Privacy First', 'description' => 'Zero-log policy. Your data stays private, always.', 'icon_color' => 'teal'],
        ];
        foreach ($features as $i => $f) {
            LandingFeature::updateOrCreate(
                ['section' => 'features', 'title' => $f['title']],
                array_merge($f, ['section' => 'features', 'sort_order' => $i + 1, 'is_visible' => true])
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

    private function seedSettings(): void
    {
        Setting::set('site_name', 'XteraPlay', 'string', 'general');
        Setting::set('site_tagline', 'Stream Terabox Videos Instantly', 'string', 'general');
        Setting::set('support_email', 'support@yoursite.com', 'string', 'general');
        Setting::set('free_daily_credits', 5, 'integer', 'features');
        Setting::set('registration_enabled', true, 'boolean', 'features');
        Setting::set('email_verification_required', false, 'boolean', 'features');
        Setting::set('api_enabled', true, 'boolean', 'features');
        Setting::set('maintenance_mode', false, 'boolean', 'features');

        // Landing sections all visible
        Setting::set('landing_features_visible', true, 'boolean', 'landing');
        Setting::set('landing_domains_visible', true, 'boolean', 'landing');
        Setting::set('landing_pricing_visible', true, 'boolean', 'landing');
        Setting::set('landing_reviews_visible', true, 'boolean', 'landing');
        Setting::set('landing_cta_visible', true, 'boolean', 'landing');

        // Hero content
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
        Setting::set('reviews_subheading', 'Real stories from real people using our platform every day.', 'string', 'landing');
    }
}
