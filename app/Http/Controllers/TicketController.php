<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->latest()->get();
        return view('support', compact('tickets'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:200',
            'category' => 'required|string|max:50',
            'message' => 'required|string|max:2000',
        ]);
        $data['user_id'] = Auth::id();
        $data['status'] = 'open';
        $data['priority'] = 'medium';
        Ticket::create($data);
        return redirect(url('/support'))->with('status', 'Ticket submitted. Our team will respond soon.');
    }

    public function show(Ticket $ticket)
    {
        abort_unless($ticket->user_id === Auth::id(), 403);
        return view('ticket', compact('ticket'));
    }
}
