<?php

namespace App\Http\Controllers;

use App\Models\NotificationQueue;
use App\Http\Requests\StoreNotificationQueueRequest;
use App\Http\Requests\UpdateNotificationQueueRequest;

class NotificationQueueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = NotificationQueue::get();
        return $notifications;
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
    public function store(StoreNotificationQueueRequest $request)
    {
        $check = NotificationQueue::where('type', $request->type)
        ->where('not_id', $request->not_id)
        ->where('user_id', $request->user_id)
        -> first();

        if($check == null){
            $notification = new NotificationQueue();
            $notification->type = $request->type;
            $notification->not_id = $request->not_id;
            $notification->user_id = $request->user_id;
            $notification->save();
        }

        return 1;
    }

    /**
     * Display the specified resource.
     */
    public function show(NotificationQueue $notificationQueue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotificationQueue $notificationQueue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationQueueRequest $request, NotificationQueue $notificationQueue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotificationQueue $notificationQueue)
    {
        //
    }
}
