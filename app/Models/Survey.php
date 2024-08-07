<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'surveys';
    protected $fillable = [
        'title',
        'date',
        'imageUrl',
        'author',
    ];
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'surveyId');
    }
}
