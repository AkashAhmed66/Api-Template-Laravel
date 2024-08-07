<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $question = Question::with('survey')->get();
        return response()->json($question);
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
    public function store(StoreQuestionRequest $request)
    {
        // dd($request->all());
        return Question::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return $question;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        return $question->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        return $question->delete();
    }
}
