<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    public static $selectedFields = [
        'id',
        'caption',
        'description',
        'created_at'
    ];

    protected $fillable = [
        'caption',
        'description'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class,
            'category_id', 'id');
    }
    
    public function sources(): HasMany
    {
        return $this->hasMany(Source::class,
            'source_id', 'id');
    }
}
