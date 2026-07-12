<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Review;
use App\Models\Subscription;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'active_subs' => Subscription::active()->count(),
            'revenue_mtd' => Transaction::successful()
                ->whereMonth('paid_at', now()->month)
                ->whereYear('paid_at', now()->year)
                ->sum('amount'),
            'open_tickets' => Ticket::open()->count(),
            'unread_messages' => Message::unread()->count(),
            'pending_reviews' => Review::where('is_approved', false)->count(),
        ];

        $recent_users = User::latest()->take(5)->get();
        $recent_tickets = Ticket::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_users', 'recent_tickets'));
    }
}
