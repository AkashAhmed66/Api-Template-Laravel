<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Happiness extends Model
{
    use HasFactory;
    protected $table = 'happiness';

    public function happyQuestions(): HasMany
    {
        return $this->hasMany(HappyQuestions::class, 'happy_id');
    }

}
