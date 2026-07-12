<?php

namespace App\Http\Controllers;

use App\Models\LandingFeature;
use App\Models\LandingNav;
use App\Models\Plan;
use App\Models\Review;
use App\Models\Setting;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing', [
            'features' => LandingFeature::visible()->section('features')->ordered()->get(),
            'plans' => Plan::active()->ordered()->get(),
            'reviews' => Review::approved()->latest()->take(6)->get(),
            'nav_links' => LandingNav::visible()->ordered()->get(),
            'sections' => [
                'features' => Setting::get('landing_features_visible', true),
                'domains' => Setting::get('landing_domains_visible', true),
                'pricing' => Setting::get('landing_pricing_visible', true),
                'reviews' => Setting::get('landing_reviews_visible', true),
                'cta' => Setting::get('landing_cta_visible', true),
            ],
            'content' => [
                'hero_title_line_1' => Setting::get('hero_title_line_1', 'Stream Terabox Videos'),
                'hero_title_line_2' => Setting::get('hero_title_line_2', 'Instantly'),
                'hero_description' => Setting::get('hero_description', 'Paste any Terabox link and start watching in seconds.'),
                'hero_badge_text' => Setting::get('hero_badge_text', 'No signup required · 5 free/day'),
                'features_heading' => Setting::get('features_heading', 'Everything you need'),
                'features_subheading' => Setting::get('features_subheading', 'Powerful tools to stream and manage Terabox content.'),
                'pricing_heading' => Setting::get('pricing_heading', 'Simple, transparent pricing'),
                'pricing_subheading' => Setting::get('pricing_subheading', 'Start free. Upgrade when you need more.'),
                'reviews_heading' => Setting::get('reviews_heading', 'Loved by users worldwide'),
                'reviews_subheading' => Setting::get('reviews_subheading', 'Real stories from real people using XteraPlay.'),
            ],
        ]);
    }
}
