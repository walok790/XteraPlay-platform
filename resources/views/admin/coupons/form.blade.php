@extends('admin.layouts.app')
@section('title', $coupon->exists ? 'Edit Coupon' : 'New Coupon')

@section('content')
<div class="mb-6">
    <a href="{{ url('/admin/coupons') }}" class="text-sm text-blue-600 hover:text-blue-700 inline-flex items-center gap-1 mb-2">← Back to Coupons</a>
    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">{{ $coupon->exists ? 'Edit Coupon' : 'Create Coupon' }}</h2>
</div>

<form method="POST" action="{{ url('/admin/coupons' . ($coupon->exists ? '/' . $coupon->id : '')) }}" class="max-w-2xl bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 space-y-4">
    @csrf
    @if($coupon->exists) @method('PUT') @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Code <span class="text-red-500">*</span></label>
            <input type="text" name="code" value="{{ old('code', $coupon->code) }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 font-mono uppercase focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="e.g. SAVE20">
            @error('code')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Discount Type</label>
            <select name="discount_type" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                <option value="percentage" @selected(old('discount_type', $coupon->discount_type) === 'percentage')>Percentage (%)</option>
                <option value="fixed" @selected(old('discount_type', $coupon->discount_type) === 'fixed')>Fixed Amount ($)</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Discount Value <span class="text-red-500">*</span></label>
            <input type="number" name="discount_value" step="0.01" min="0" value="{{ old('discount_value', $coupon->discount_value) }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Usage Limit</label>
            <input type="number" name="usage_limit" min="1" value="{{ old('usage_limit', $coupon->usage_limit) }}" placeholder="Unlimited" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        </div>
        <div class="sm:col-span-2">
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Description</label>
            <input type="text" name="description" value="{{ old('description', $coupon->description) }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="Optional internal note">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Starts At</label>
            <input type="datetime-local" name="starts_at" value="{{ old('starts_at', $coupon->starts_at?->format('Y-m-d\TH:i')) }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Expires At</label>
            <input type="datetime-local" name="expires_at" value="{{ old('expires_at', $coupon->expires_at?->format('Y-m-d\TH:i')) }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        </div>
    </div>

    <label class="flex items-center gap-2 pt-2">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $coupon->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100">
        <span class="text-sm text-slate-700">Active (can be used)</span>
    </label>

    <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
        <a href="{{ url('/admin/coupons') }}" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 text-sm font-medium rounded-lg transition">Cancel</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">{{ $coupon->exists ? 'Save Changes' : 'Create Coupon' }}</button>
    </div>
</form>
@endsection
