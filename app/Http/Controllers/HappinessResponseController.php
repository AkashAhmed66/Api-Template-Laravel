<?php

namespace App\Http\Controllers;

use App\Models\HappinessResponse;
use App\Http\Requests\StoreHappinessResponseRequest;
use App\Http\Requests\UpdateHappinessResponseRequest;

class HappinessResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $happinessResponse = HappinessResponse::get();
        return response()->json($happinessResponse);
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
    public function store(StoreHappinessResponseRequest $request)
    {
        return HappinessResponse::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = HappinessResponse::where('user_id', $id)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HappinessResponse $happinessResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHappinessResponseRequest $request, HappinessResponse $happinessResponse)
    {
        return $happinessResponse->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HappinessResponse $happinessResponse)
    {
        return $happinessResponse->delete();
    }
}
