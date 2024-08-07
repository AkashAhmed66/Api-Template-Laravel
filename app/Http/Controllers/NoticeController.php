<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::get();
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
    public function store(StoreNoticeRequest $request)
    {
        $notice = new Notice();
        if($request->image != null) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $notice->imageUrl = $imageName;
        }
        
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->author = $request->author;
        $notice->date = now();
        
        return $notice->save();
        // return Notice::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        return $notice;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        return $notice->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        return $notice->delete();
    }
}
