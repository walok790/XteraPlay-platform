<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['user', 'plan'])->latest()->get();
        $stats = [
            'free' => \App\Models\User::count() - Subscription::active()->count(),
            'pro' => Subscription::active()->whereHas('plan', fn ($q) => $q->where('slug', 'pro'))->count(),
            'enterprise' => Subscription::active()->whereHas('plan', fn ($q) => $q->where('slug', 'enterprise'))->count(),
        ];
        return view('admin.subscriptions', compact('subscriptions', 'stats'));
    }

    public function cancel(Subscription $subscription)
    {
        $subscription->update(['status' => 'cancelled', 'cancelled_at' => now()]);
        return back()->with('status', 'Subscription cancelled.');
    }
}
