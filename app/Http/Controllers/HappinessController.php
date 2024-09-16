<?php

namespace App\Http\Controllers;

use App\Models\Happiness;
use App\Http\Requests\StoreHappinessRequest;
use App\Http\Requests\UpdateHappinessRequest;
use Illuminate\Http\Request;

class HappinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $happiness = Happiness::with('happyQuestions')->get();
        return response()->json($happiness);
    }

    public function getDataById($factoryId)
    {
        $happiness = Happiness::with('happyQuestions')->where('factory_id', $factoryId)->orWhere('factory_id', 0)->get();
        return response()->json($happiness);
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
    public function store(StoreHappinessRequest $request)
    {
        return Happiness::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Happiness $happiness)
    {
        return $happiness;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Happiness $happiness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHappinessRequest $request, Happiness $happiness)
    {
        return $happiness->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Happiness $happiness)
    {
        return $happiness->delete();
    }
}
