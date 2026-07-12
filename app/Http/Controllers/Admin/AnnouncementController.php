<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest('published_at')->get();
        return view('admin.announcements', compact('announcements'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['published_at'] = $data['published_at'] ?? now();
        Announcement::create($data);
        return redirect(url('/admin/announcements'))->with('status', 'Announcement created.');
    }

    public function update(Request $request, Announcement $announcement)
    {
        $announcement->update($this->validated($request));
        return redirect(url('/admin/announcements'))->with('status', 'Announcement updated.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return back()->with('status', 'Announcement deleted.');
    }

    public function toggle(Announcement $announcement)
    {
        $announcement->update(['is_active' => ! $announcement->is_active]);
        return back()->with('status', 'Announcement toggled.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'message' => 'required|string|max:1000',
            'type' => 'required|in:info,success,warning,notice',
            'is_active' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        return $data;
    }
}
