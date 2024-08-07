<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Happiness extends Model
{
    use HasFactory;
    protected $table = 'happiness';
    protected $fillable = [
        'factory_id',
        'open_status'
    ];

}
