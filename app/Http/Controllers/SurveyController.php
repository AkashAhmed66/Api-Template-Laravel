<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Http\Requests\StoreSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $survey = Survey::with('questions')->get();
        return response()->json($survey);
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
    public function store(StoreSurveyRequest $request)
    {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        
        $survey = new Survey();
        $survey->title = $request->title;
        $survey->date = now();
        $survey->imageUrl = $imageName;
        $survey->author = $request->author;
        
        return $survey->save();
        // return Survey::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        return $survey;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveyRequest $request, Survey $survey)
    {
        return $survey->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        return $survey->delete();
    }
}
