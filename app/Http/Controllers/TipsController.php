<?php

namespace App\Http\Controllers;

use App\Models\Tips;
use App\Http\Requests\StoreTipsRequest;
use App\Http\Requests\UpdateTipsRequest;

class TipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $data = Tips::with('tipsCategory')->get();

        return response()->json($data);
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
    public function store(StoreTipsRequest $request)
    {
        $tips = new Tips();
        if($request->image != null){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $tips->imageUrl = $imageName;
        }
        
        $tips->title = $request->title;
        $tips->description = $request->description;
        $tips->date = now();
        $tips->author = $request->author;
        $tips->categoryId = $request->categoryId;
        
        return $tips->save();

        // return Tips::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Tips $tips)
    {
        if($tips) return 'not found';
        return $tips;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tips $tips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipsRequest $request, Tips $tips)
    {
        return $tips->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tip = Tips::where('id', $id)->first();
        return $tip->delete();
    }
}
