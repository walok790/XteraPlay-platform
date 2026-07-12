<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:1000',
        ]);

        $colors = [
            'from-blue-500 to-cyan-500', 'from-purple-500 to-pink-500',
            'from-emerald-500 to-teal-500', 'from-orange-500 to-red-500',
            'from-indigo-500 to-violet-500', 'from-pink-500 to-rose-500',
        ];

        Review::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'role' => 'Free user',
            'rating' => $data['rating'],
            'message' => $data['message'],
            'avatar_color' => $colors[array_rand($colors)],
            'is_approved' => false, // Requires admin approval
            'is_featured' => false,
        ]);

        return redirect(url('/home'))->with('status', 'Thanks for your feedback! Your review will appear on the site once approved.');
    }
}
