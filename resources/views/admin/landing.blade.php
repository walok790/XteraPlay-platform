@extends('admin.layouts.app')
@section('title', 'Landing Page Management')

@section('content')
<div class="mb-6">
    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Landing Page Management</h2>
    <p class="text-sm text-slate-600 mt-1">Control what visitors see on your public landing page. Changes are reflected immediately.</p>
</div>

@if(session('status'))
    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
@endif

<div class="space-y-4 sm:space-y-6" x-data="{ tab: 'sections' }">
    <!-- Tabs -->
    <div class="bg-white border border-slate-200 rounded-2xl p-1.5 flex flex-wrap gap-1 sm:gap-2">
        @foreach([
            'sections' => '👁️ Sections',
            'content' => '✏️ Content',
            'features' => '🎯 Features',
            'navs' => '🔗 Nav Links'
        ] as $key => $label)
            <button @click="tab = '{{ $key }}'" :class="tab === '{{ $key }}' ? 'bg-blue-600 text-white' : 'text-slate-700 hover:bg-slate-50'" class="flex-1 px-3 py-2 text-xs sm:text-sm font-medium rounded-lg transition">{{ $label }}</button>
        @endforeach
    </div>

    {{-- ================ SECTIONS TAB ================ --}}
    <div x-show="tab === 'sections'" x-cloak>
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
            <div class="mb-4">
                <h3 class="text-base sm:text-lg font-semibold text-slate-900">Section Visibility</h3>
                <p class="text-sm text-slate-500">Toggle which sections show on the public landing page.</p>
            </div>

            <form method="POST" action="{{ url('/admin/landing/sections') }}" class="space-y-3">
                @csrf
                @foreach([
                    'landing_features_visible' => ['🎯 Features Section', 'The "Everything you need" section with feature cards'],
                    'landing_domains_visible' => ['🌐 Supported Domains', 'The row of supported Terabox domain pills'],
                    'landing_pricing_visible' => ['💰 Pricing Section', 'The 3-plan pricing comparison'],
                    'landing_reviews_visible' => ['⭐ Reviews / Testimonials', 'Approved user reviews section'],
                    'landing_cta_visible' => ['🚀 Call-to-Action', 'The "Ready to get started?" block at the bottom'],
                ] as $key => [$label, $desc])
                    <label class="flex items-start justify-between gap-3 p-3 hover:bg-slate-50 rounded-lg cursor-pointer">
                        <div>
                            <p class="text-sm font-medium text-slate-900">{{ $label }}</p>
                            <p class="text-xs text-slate-500 mt-0.5">{{ $desc }}</p>
                        </div>
                        <input type="checkbox" name="{{ $key }}" value="1" {{ $sections[$key] ? 'checked' : '' }} class="w-5 h-5 mt-0.5 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100 flex-shrink-0">
                    </label>
                @endforeach

                <div class="flex justify-end pt-3 border-t border-slate-100 mt-3">
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Save Visibility</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ================ CONTENT TAB ================ --}}
    <div x-show="tab === 'content'" x-cloak class="space-y-4">
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
            <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">Hero Section</h3>
            <p class="text-sm text-slate-500 mb-4">The big banner at the top of the landing page.</p>
            <form method="POST" action="{{ url('/admin/landing/content') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Badge Text (small pill above heading)</label>
                    <input type="text" name="hero_badge_text" value="{{ $content['hero_badge_text'] }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="No signup required · 5 free/day">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Hero Title Line 1</label>
                        <input type="text" name="hero_title_line_1" value="{{ $content['hero_title_line_1'] }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Hero Title Line 2 (gradient text)</label>
                        <input type="text" name="hero_title_line_2" value="{{ $content['hero_title_line_2'] }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Hero Description</label>
                    <textarea name="hero_description" rows="2" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 resize-none">{{ $content['hero_description'] }}</textarea>
                </div>

                <hr class="my-4 border-slate-200">

                <h4 class="text-sm font-semibold text-slate-900">Section Headings</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Features Heading</label>
                        <input type="text" name="features_heading" value="{{ $content['features_heading'] }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Features Subheading</label>
                        <input type="text" name="features_subheading" value="{{ $content['features_subheading'] }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Pricing Heading</label>
                        <input type="text" name="pricing_heading" value="{{ $content['pricing_heading'] }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Pricing Subheading</label>
                        <input type="text" name="pricing_subheading" value="{{ $content['pricing_subheading'] }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Reviews Heading</label>
                        <input type="text" name="reviews_heading" value="{{ $content['reviews_heading'] }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Reviews Subheading</label>
                        <input type="text" name="reviews_subheading" value="{{ $content['reviews_subheading'] }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                </div>

                <div class="flex justify-end pt-3 border-t border-slate-100">
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Save Content</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ================ FEATURES TAB ================ --}}
    <div x-show="tab === 'features'" x-cloak x-data="{ showAdd: false }" class="space-y-4">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900">Feature Cards</h3>
                <p class="text-sm text-slate-500">Manage the cards shown in the Features section.</p>
            </div>
            <button @click="showAdd = !showAdd" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm">
                <span x-text="showAdd ? 'Cancel' : '+ Add Feature'"></span>
            </button>
        </div>

        <!-- Add Feature Form -->
        <div x-show="showAdd" x-cloak class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
            <form method="POST" action="{{ url('/admin/landing/features') }}" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Title</label>
                        <input type="text" name="title" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Icon Color</label>
                        <select name="icon_color" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                            @foreach(['blue', 'emerald', 'amber', 'violet', 'pink', 'orange', 'teal', 'indigo', 'red'] as $c)
                                <option value="{{ $c }}">{{ ucfirst($c) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Description</label>
                    <textarea name="description" rows="2" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm resize-none focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Section</label>
                        <input type="text" name="section" value="features" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Sort Order</label>
                        <input type="number" name="sort_order" value="0" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg">Add Feature</button>
            </form>
        </div>

        <!-- Features List -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            @forelse($features as $f)
            <div class="bg-white border border-slate-200 rounded-xl p-4">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-8 h-8 bg-{{ $f->icon_color }}-50 rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="w-3 h-3 bg-{{ $f->icon_color }}-500 rounded"></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-slate-900">{{ $f->title }}</p>
                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">{{ $f->description }}</p>
                        <p class="text-[10px] text-slate-400 mt-1">Order: {{ $f->sort_order }} · Color: {{ $f->icon_color }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-1 pt-3 border-t border-slate-100">
                    <form method="POST" action="{{ url('/admin/landing/features/' . $f->id . '/toggle') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-2.5 py-1 text-xs font-medium rounded {{ $f->is_visible ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">{{ $f->is_visible ? 'Visible' : 'Hidden' }}</button>
                    </form>
                    <form method="POST" action="{{ url('/admin/landing/features/' . $f->id) }}" onsubmit="return confirm('Delete this feature?');" class="inline ml-auto">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-2.5 py-1 text-xs text-red-600 hover:bg-red-50 rounded font-medium">Delete</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-2 bg-white border border-slate-200 rounded-2xl p-8 text-center text-slate-500">No features yet.</div>
            @endforelse
        </div>
    </div>

    {{-- ================ NAV LINKS TAB ================ --}}
    <div x-show="tab === 'navs'" x-cloak x-data="{ showAdd: false }" class="space-y-4">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900">Landing Page Navigation</h3>
                <p class="text-sm text-slate-500">Add, edit, or hide nav links on the landing page (for guests).</p>
            </div>
            <button @click="showAdd = !showAdd" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm">
                <span x-text="showAdd ? 'Cancel' : '+ Add Nav Link'"></span>
            </button>
        </div>

        <div x-show="showAdd" x-cloak class="bg-white border border-slate-200 rounded-2xl p-5">
            <form method="POST" action="{{ url('/admin/landing/navs') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                @csrf
                <input type="text" name="label" required placeholder="Home" class="col-span-1 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                <input type="text" name="url" required placeholder="/#features" class="col-span-2 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                <button type="submit" class="col-span-1 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg">Add</button>
            </form>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase">Label</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase">URL</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase hidden sm:table-cell">Order</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-slate-500 uppercase">Status</th>
                        <th class="text-right px-4 py-3 text-xs font-semibold text-slate-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($navs as $n)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3 text-sm font-medium text-slate-900">{{ $n->label }}</td>
                        <td class="px-4 py-3 text-sm text-slate-600 font-mono text-xs">{{ $n->url }}</td>
                        <td class="px-4 py-3 hidden sm:table-cell text-sm text-slate-500">{{ $n->sort_order }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $n->is_visible ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">{{ $n->is_visible ? 'Visible' : 'Hidden' }}</span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <div class="inline-flex items-center gap-1">
                                <form method="POST" action="{{ url('/admin/landing/navs/' . $n->id . '/toggle') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="px-2.5 py-1 text-xs bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded font-medium">Toggle</button>
                                </form>
                                <form method="POST" action="{{ url('/admin/landing/navs/' . $n->id) }}" onsubmit="return confirm('Delete this nav link?');" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="px-2.5 py-1 text-xs text-red-600 hover:bg-red-50 rounded font-medium">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="px-6 py-12 text-center text-slate-500">No nav links yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
