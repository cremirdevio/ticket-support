<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\Reply;
use Illuminate\Support\Str;
use Auth;

class TicketController extends Controller
{
    public function index()
    {
        // Fetch all tickets for the user
        // $tickets = Ticket::where('user_id', Auth::id())->get();
        $tickets = Auth::user()->tickets;

        return view('tickets', compact('tickets'));
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'category_id' => ['required', 'numeric', 'min:1'],
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        // When theres error
        // 1. Error $error
        // 2. Old values $old

        // save
        // Mass assignment -> security risk
        Ticket::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'reference' => Str::random(10),
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        // Another way
        // $ticket = new Ticket();
        // $ticket->subject = $request->subject;
        // $ticket->body = $request->body;
        // $ticket->reference = Str::random(10);
        // $ticket->category_id = $request->category_id;
        // $ticket->user_id = 1;
        // $ticket->save();

        // return user back to homepage
        return redirect('tickets')->with(
            'success',
            'Your ticket has been successfully created.'
        );
    }

    public function create()
    {
        $categories = Category::all();
        $user = 'Nse';

        return view('create-ticket', compact('categories', 'user'));
    }

    public function show(Ticket $ticket)
    {
        // $replies = Reply::find($ticket);
        $replies = Reply::where('ticket_id', $ticket->id)->get();
        return view('showTicket', compact('ticket', 'replies')); //$ticket;
        // Return view to show a single ticket and also allow reply to be added
    }
}
