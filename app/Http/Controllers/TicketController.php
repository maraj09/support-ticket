<?php

namespace App\Http\Controllers;

use App\Mail\TicketClosedMail;
use App\Mail\TicketMail;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function create()
    {
        return view('pages.customer.create-ticket');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'status' => 'open',
        ]);

        TicketReply::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new TicketMail($ticket));
        }

        return redirect()->route('customer.dashboard')->with('success', 'Ticket created successfully!');
    }

    public function show(Ticket $ticket)
    {
        $this->authorizeUser($ticket);

        return view('pages.customer.show-ticket', compact('ticket'));
    }

    public function reply(Request $request, Ticket $ticket)
    {
        $this->authorizeUser($ticket);

        $request->validate([
            'message' => 'required|string',
        ]);

        TicketReply::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        $ticket->status = 'open';
        $ticket->save();

        if (Auth::user()->hasRole('customer')) {
            $admins = User::whereHas('role', function ($query) {
                $query->where('name', 'admin');
            })->get();

            foreach ($admins as $admin) {
                Mail::to($admin->email)->send(new TicketMail($ticket));
            }
        } else {
            Mail::to($ticket->user->email)->send(new TicketMail($ticket));
        }

        return redirect()->back()->with('success', 'Reply added!');
    }

    private function authorizeUser(Ticket $ticket)
    {
        if (Auth::user()->hasRole('customer') && $ticket->user_id !== Auth::id()) {
            abort(403);
        }
    }

    public function close(Ticket $ticket)
    {
        $ticket->update(['status' => 'closed']);

        Mail::to($ticket->user->email)->send(new TicketClosedMail($ticket));

        return redirect()->back()->with('success', 'Ticket closed successfully.');
    }
}
