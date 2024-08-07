<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tips extends Model
{
    use HasFactory;
    protected $table = 'tips';
    protected $fillable = [
        'title',
        'description',
        'date',
        'imageUrl',
        'author',
        'surveyId',
        'categoryId'
    ];
    
    public function tipsCategory(): BelongsTo
    {
        return $this->belongsTo(TipsCategory::class, 'id');
    }
}
