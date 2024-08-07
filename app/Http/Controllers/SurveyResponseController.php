<?php

namespace App\Http\Controllers;

use App\Models\SurveyResponse;
use App\Http\Requests\StoreSurveyResponseRequest;
use App\Http\Requests\UpdateSurveyResponseRequest;

class SurveyResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveyResponse = SurveyResponse::get();
        return response()->json($surveyResponse);
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
    public function store(StoreSurveyResponseRequest $request)
    {
        $payloads = $request->questions;
        foreach($payloads as $payload){
            // dd($payload);
            SurveyResponse::create($payload);
        }
        return 1;
    }

    /**
     * Display the specified resource.
     */
    public function show(SurveyResponse $surveyResponse)
    {
        return $surveyResponse;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurveyResponse $surveyResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveyResponseRequest $request, SurveyResponse $surveyResponse)
    {
        return $surveyResponse->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurveyResponse $surveyResponse)
    {
        return $surveyResponse->delete();
    }

    public function getResponsesByUser($userId, $surveyId)
    {
        $data = null;
        $data = SurveyResponse::where('user_id', $userId)->where('survey_id', $surveyId)->first();

        if($data) return 1;
        else return 0;
    }
}
