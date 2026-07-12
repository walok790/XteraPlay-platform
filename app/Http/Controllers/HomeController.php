<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Ticket;

class HomeController extends Controller
{
    public function index()
    {
        $announcements = Announcement::active()->latest('published_at')->take(3)->get();

        $stats = [
            'videos_watched' => 0,
            'downloads' => 0,
            'searches_today' => 0,
        ];

        return view('home', compact('announcements', 'stats'));
    }

    public function dashboard()
    {
        $announcements = Announcement::active()->latest('published_at')->take(3)->get();
        return view('dashboard', compact('announcements'));
    }
}
