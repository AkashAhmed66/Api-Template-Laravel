<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HappinessResponse extends Model
{
    use HasFactory;
    protected $table = 'happiness_responses';
    protected $fillable = [
        'user_id',
        'happiness_reason',
        'happiness_level',
        'detail'
    ];
}
