<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'creator_name',
        'creator_contacts',
        'comment',
        'created_at'
    ];
    
    protected $fillable = [
        'url',
        'creator_name',
        'creator_contacts',
        'comment'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class,
            'sorce_id', 'id');
    }
}
