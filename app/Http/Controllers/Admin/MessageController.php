<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');
        $query = Message::latest();
        if ($filter === 'unread') $query->where('is_read', false);
        if ($filter === 'replied') $query->where('is_replied', true);
        $messages = $query->get();
        return view('admin.messages', compact('messages', 'filter'));
    }

    public function markRead(Message $message)
    {
        $message->update(['is_read' => true]);
        return back()->with('status', 'Marked as read.');
    }

    public function markReplied(Message $message)
    {
        $message->update(['is_replied' => true, 'is_read' => true]);
        return back()->with('status', 'Marked as replied.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('status', 'Message deleted.');
    }
}
