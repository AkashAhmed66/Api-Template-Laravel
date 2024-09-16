<?php

namespace App\Http\Controllers;

use App\Models\TicketResponse;
use App\Http\Requests\StoreTicketResponseRequest;
use App\Http\Requests\UpdateTicketResponseRequest;

class TicketResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreTicketResponseRequest $request)
    {
        $responses = new TicketResponse();
        $responses->response = $request->response;
        $responses->ticket_id = $request->ticket_id;
        $responses->from = "user";
        $responses->save();

        return $responses;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $responses = TicketResponse::where('ticket_id', $id)->get();
        return $responses;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketResponse $ticketResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketResponseRequest $request, TicketResponse $ticketResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketResponse $ticketResponse)
    {
        //
    }
}
