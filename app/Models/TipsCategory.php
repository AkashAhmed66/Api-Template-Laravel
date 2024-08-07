<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipsCategory extends Model
{
    use HasFactory;
    protected $table = 'tipscategories';
    protected $fillable = [
        'category',
        'logoUrl',
    ];
    public function tips(): HasMany
    {
        return $this->hasMany(Tips::class, 'categoryId');
    }
}
