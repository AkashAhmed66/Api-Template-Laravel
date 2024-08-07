<?php

namespace App\Http\Controllers;

use App\Models\TipsCategory;
use App\Http\Requests\StoreTipsCategoryRequest;
use App\Http\Requests\UpdateTipsCategoryRequest;

class TipsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipsCategory = TipsCategory::with('tips')->get();
        return response()->json($tipsCategory);
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
    public function store(StoreTipsCategoryRequest $request)
    {
        return TipsCategory::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(TipsCategory $tipsCategory)
    {
        return $tipsCategory;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipsCategory $tipsCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipsCategoryRequest $request, TipsCategory $tipsCategory)
    {
        return $tipsCategory->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipsCategory $tipsCategory)
    {
        return $tipsCategory->delete();
    }
}
