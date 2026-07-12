<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingFeature;
use App\Models\LandingNav;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $sections = [
            'landing_features_visible' => Setting::get('landing_features_visible', true),
            'landing_domains_visible' => Setting::get('landing_domains_visible', true),
            'landing_pricing_visible' => Setting::get('landing_pricing_visible', true),
            'landing_reviews_visible' => Setting::get('landing_reviews_visible', true),
            'landing_cta_visible' => Setting::get('landing_cta_visible', true),
        ];
        $content = [
            'hero_title_line_1' => Setting::get('hero_title_line_1', 'Stream Terabox Videos'),
            'hero_title_line_2' => Setting::get('hero_title_line_2', 'Instantly'),
            'hero_description' => Setting::get('hero_description', ''),
            'hero_badge_text' => Setting::get('hero_badge_text', ''),
            'features_heading' => Setting::get('features_heading', ''),
            'features_subheading' => Setting::get('features_subheading', ''),
            'pricing_heading' => Setting::get('pricing_heading', ''),
            'pricing_subheading' => Setting::get('pricing_subheading', ''),
            'reviews_heading' => Setting::get('reviews_heading', ''),
            'reviews_subheading' => Setting::get('reviews_subheading', ''),
        ];
        $features = LandingFeature::ordered()->get();
        $navs = LandingNav::ordered()->get();
        return view('admin.landing', compact('sections', 'content', 'features', 'navs'));
    }

    public function updateSections(Request $request)
    {
        foreach (['landing_features_visible', 'landing_domains_visible', 'landing_pricing_visible', 'landing_reviews_visible', 'landing_cta_visible'] as $key) {
            Setting::set($key, $request->boolean($key), 'boolean', 'landing');
        }
        return redirect(url('/admin/landing'))->with('status', 'Section visibility updated.');
    }

    public function updateContent(Request $request)
    {
        $keys = ['hero_title_line_1', 'hero_title_line_2', 'hero_description', 'hero_badge_text',
                 'features_heading', 'features_subheading', 'pricing_heading', 'pricing_subheading',
                 'reviews_heading', 'reviews_subheading'];
        foreach ($keys as $key) {
            if ($request->has($key)) Setting::set($key, $request->input($key), 'string', 'landing');
        }
        return redirect(url('/admin/landing'))->with('status', 'Landing content updated.');
    }

    // Features CRUD
    public function storeFeature(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:300',
            'icon_color' => 'required|string',
            'section' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);
        LandingFeature::create(array_merge($data, ['is_visible' => true, 'section' => $data['section'] ?? 'features']));
        return redirect(url('/admin/landing'))->with('status', 'Feature added.');
    }

    public function updateFeature(Request $request, LandingFeature $feature)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:300',
            'icon_color' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_visible' => 'nullable|boolean',
        ]);
        $data['is_visible'] = $request->boolean('is_visible');
        $feature->update($data);
        return redirect(url('/admin/landing'))->with('status', 'Feature updated.');
    }

    public function destroyFeature(LandingFeature $feature)
    {
        $feature->delete();
        return redirect(url('/admin/landing'))->with('status', 'Feature deleted.');
    }

    public function toggleFeature(LandingFeature $feature)
    {
        $feature->update(['is_visible' => ! $feature->is_visible]);
        return redirect(url('/admin/landing'))->with('status', 'Feature visibility toggled.');
    }

    // Nav CRUD
    public function storeNav(Request $request)
    {
        $data = $request->validate([
            'label' => 'required|string|max:50',
            'url' => 'required|string|max:200',
            'sort_order' => 'nullable|integer',
        ]);
        LandingNav::create(array_merge($data, ['is_visible' => true]));
        return redirect(url('/admin/landing'))->with('status', 'Nav link added.');
    }

    public function updateNav(Request $request, LandingNav $nav)
    {
        $data = $request->validate([
            'label' => 'required|string|max:50',
            'url' => 'required|string|max:200',
            'sort_order' => 'nullable|integer',
            'is_visible' => 'nullable|boolean',
        ]);
        $data['is_visible'] = $request->boolean('is_visible');
        $nav->update($data);
        return redirect(url('/admin/landing'))->with('status', 'Nav link updated.');
    }

    public function destroyNav(LandingNav $nav)
    {
        $nav->delete();
        return redirect(url('/admin/landing'))->with('status', 'Nav link deleted.');
    }

    public function toggleNav(LandingNav $nav)
    {
        $nav->update(['is_visible' => ! $nav->is_visible]);
        return redirect(url('/admin/landing'))->with('status', 'Nav visibility toggled.');
    }
}
