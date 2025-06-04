<?php

namespace App\Http\Controllers;

use App\Models\NotificationQueue;
use App\Http\Requests\StoreNotificationQueueRequest;
use App\Http\Requests\UpdateNotificationQueueRequest;
use App\Models\NotificationCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function getNotification(Request $request)
    {
        $notification_counts = NotificationCount::where('user_id', $request->userId)->first();
        return $notification_counts;
    }
    /**
     * Display the specified resource.
     */
    public function flushNotofication(Request $request)
    {
        $user_id = $request->user_id;
        $factory_id = $request->factory_id;
        $counter = $request->counter;

        $more = 0;
        if (in_array($counter, ['quiz_count', 'survey_count', 'training_count'])) {
            $more = 1;
        }
        // Update or create the NotificationCount record for each user
        NotificationCount::updateOrCreate(
            ['user_id' => $user_id], // Condition to check for existing record
            [
                $counter => DB::raw(0),
                'more_count' => DB::raw('GREATEST(IFNULL(more_count, 0) - '.$more.', 0)'),
                'factory_id' => $factory_id
            ]
        );

        return response()->json(['message' => 'Notification count updated successfully.']);
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
