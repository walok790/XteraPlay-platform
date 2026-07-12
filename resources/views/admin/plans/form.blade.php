@extends('admin.layouts.app')
@section('title', $plan->exists ? 'Edit Plan' : 'New Plan')

@section('content')
<div class="mb-6">
    <a href="{{ url('/admin/plans') }}" class="text-sm text-blue-600 hover:text-blue-700 inline-flex items-center gap-1 mb-2">← Back to Plans</a>
    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">{{ $plan->exists ? 'Edit Plan' : 'Create New Plan' }}</h2>
</div>

<form method="POST" action="{{ url('/admin/plans' . ($plan->exists ? '/' . $plan->id : '')) }}" class="max-w-3xl space-y-4 sm:space-y-6">
    @csrf
    @if($plan->exists) @method('PUT') @endif

    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4">Plan Details</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $plan->name) }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $plan->slug) }}" placeholder="auto from name" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Tagline</label>
                <input type="text" name="tagline" value="{{ old('tagline', $plan->tagline) }}" placeholder="e.g., For power users" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Price ($) <span class="text-red-500">*</span></label>
                <input type="number" name="price" step="0.01" min="0" value="{{ old('price', $plan->price) }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Billing Period</label>
                <select name="billing_period" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    @foreach(['month', 'year', 'week', 'forever'] as $bp)
                        <option value="{{ $bp }}" @selected(old('billing_period', $plan->billing_period ?? 'month') === $bp)>{{ ucfirst($bp) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Features (one per line)</label>
                <textarea name="features_text" rows="6" placeholder="Unlimited videos&#10;HD quality&#10;Priority support" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 font-mono focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('features_text', implode("\n", $plan->features ?? [])) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $plan->sort_order ?? 0) }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
            </div>
        </div>

        <div class="mt-4 flex flex-col sm:flex-row gap-3">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $plan->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100">
                <span class="text-sm text-slate-700">Active (shown to users)</span>
            </label>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_popular" value="1" {{ old('is_popular', $plan->is_popular ?? false) ? 'checked' : '' }} class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100">
                <span class="text-sm text-slate-700">Mark as "Most Popular"</span>
            </label>
        </div>
    </div>

    <div class="flex justify-end gap-2">
        <a href="{{ url('/admin/plans') }}" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 text-sm font-medium rounded-lg transition">Cancel</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">{{ $plan->exists ? 'Save Changes' : 'Create Plan' }}</button>
    </div>
</form>
@endsection
