<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    use HasFactory;
    protected $table = 'survey_responses';
    protected $fillable = [
        'user_id',
        'factory_id',
        'question_id',
        'survey_id',
        'answer'
    ];
}
