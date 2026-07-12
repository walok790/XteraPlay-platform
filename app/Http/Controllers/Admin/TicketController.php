<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $query = Ticket::with('user')->latest();
        if ($status = $request->get('status')) $query->where('status', $status);
        if ($priority = $request->get('priority')) $query->where('priority', $priority);
        $tickets = $query->get();

        $counts = [
            'open' => Ticket::where('status', 'open')->count(),
            'pending' => Ticket::where('status', 'pending')->count(),
            'resolved' => Ticket::where('status', 'resolved')->count(),
            'total' => Ticket::count(),
        ];

        return view('admin.support', compact('tickets', 'counts'));
    }

    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    public function reply(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'admin_reply' => 'required|string',
            'status' => 'required|in:open,pending,resolved,closed',
        ]);
        $data['resolved_at'] = $data['status'] === 'resolved' ? now() : null;
        $ticket->update($data);
        return redirect(url('/admin/support'))->with('status', 'Reply sent.');
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $data = $request->validate(['status' => 'required|in:open,pending,resolved,closed']);
        if ($data['status'] === 'resolved') $data['resolved_at'] = now();
        $ticket->update($data);
        return back()->with('status', 'Status updated.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return back()->with('status', 'Ticket deleted.');
    }
}
