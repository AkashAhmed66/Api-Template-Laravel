<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
        'questions',
        'option1',
        'option2',
        'option3',
        'option4',
        'surveyId'
    ];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class, 'id');
    }
}
