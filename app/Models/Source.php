<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;

    protected $table = "sources";

    public static $selectedFields = [
        'id',
        'url',
        'category_id',
        'creator_name',
        'creator_contacts',
        'comment',
        'created_at'
    ];
    
    protected $fillable = [
        'url',
        'category_id',
        'creator_name',
        'creator_contacts',
        'comment'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class,
            'source_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
