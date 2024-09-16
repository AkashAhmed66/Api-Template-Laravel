<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketResponse;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket = Ticket::get();
        return response()->json($ticket);
    }

    public function getDataById($id)
    {
        $notices = Ticket::where('user_id', $id)->get();
        return response()->json($notices);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = new Ticket();
        if($request->image != null){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $ticket->imageUrl = $imageName;
        }
        
        $ticket->topic = $request->topic;
        $ticket->user_id = $request->user_id;
        $ticket->status = 'open';
        $ticket->title = $request->title;
        $ticket->details = $request->details;
        $ticket->factory_id = $request->factory_id;
        $ticket->anonymus = 1;
        $ticket->save();

        $responses = new TicketResponse();
        $responses->response = "The Admin will contact you soon!";
        $responses->ticket_id = $ticket->id;
        $responses->from = "admin";
        $responses->save();
        
        return $ticket;
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return $ticket;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        return $ticket->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        return $ticket->delete();
    }
}
