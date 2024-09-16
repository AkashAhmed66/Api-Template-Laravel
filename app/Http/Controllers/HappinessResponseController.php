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
        // return HappinessResponse::create($request->all());
        $payloads = $request->questions;
        foreach($payloads as $payload){
            // dd($payload);
            $happiness = new HappinessResponse();
            $happiness->user_id=$payload['user_id']; 
            $happiness->factory_id=$payload['factory_id']; 
            $happiness->survey_id=$payload["survey_id"]; 
            $happiness->answer=$payload['answer']; 
            $happiness->question_id=$payload['question_id'];
            $happiness->save();
        }
        return 1;
    }

    /**
     * Display the specified resource.
     */
    public function show(HappinessResponse $hsppyResponse)
    {
        return $hsppyResponse;
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
    public function getResponsesByUser(UpdateHappinessResponseRequest $request)
    {
        $data = null;
        $data = HappinessResponse::where('user_id', $request['user_id'])->where('survey_id', $request['survey_id'])->first();

        if($data) return 1;
        else return 0;
    }
}
