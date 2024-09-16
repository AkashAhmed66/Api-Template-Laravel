<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HappyQuestions extends Model
{
    use HasFactory;
    protected $table = 'happy_questions';

    public function happySurvey(): BelongsTo
    {
        return $this->belongsTo(Happiness::class, 'id');
    }
}
