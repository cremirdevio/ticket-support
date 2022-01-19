<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Reply;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tickets = Ticket::all();

        return view('admin.dashboard', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ticket = Ticket::find($id);
        $replies = Reply::where('ticket_id', $ticket->id)->get();
        return view('admin.showTicket', compact('ticket', 'replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function closed_ticket($id)
    {
        # code...
        $ticketUpdate = Ticket::find($id);

        $ticketUpdate->status = 'closed';

        $ticketUpdate->save();
        return redirect()->back();
    }
    public function showAllCategories()
    {
        //
        $categories = Category::all();
        return view('admin.categories.category', compact('categories'));
    }

    public function showCategory($id)
    {
        # code...
        $category = Category::find($id);

        $tickets = Ticket::where('category_id', $category->id)->get();
        return view(
            'admin.categories.showCategory',
            compact('tickets', 'category')
        );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
