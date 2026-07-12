<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');
        $query = Review::latest();
        if ($filter === 'pending') $query->where('is_approved', false);
        if ($filter === 'approved') $query->where('is_approved', true);
        $reviews = $query->get();

        $counts = [
            'all' => Review::count(),
            'pending' => Review::where('is_approved', false)->count(),
            'approved' => Review::where('is_approved', true)->count(),
            'avg_rating' => round(Review::approved()->avg('rating') ?? 0, 1),
        ];

        return view('admin.reviews', compact('reviews', 'filter', 'counts'));
    }

    public function approve(Review $review)
    {
        $review->update(['is_approved' => true]);
        return back()->with('status', 'Review approved.');
    }

    public function reject(Review $review)
    {
        $review->update(['is_approved' => false]);
        return back()->with('status', 'Review unapproved.');
    }

    public function toggleFeatured(Review $review)
    {
        $review->update(['is_featured' => ! $review->is_featured]);
        return back()->with('status', 'Featured status toggled.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('status', 'Review deleted.');
    }
}
