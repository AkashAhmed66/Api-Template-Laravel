<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationCount extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'factory_id',
        'notice_count',
        'tips_count',
        'quiz_count',
        'survey_count',
        'ticket_count',
        'training_count',
        'more_count',
    ];
}
