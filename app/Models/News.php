<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const BLOCKED = 'BLOCKED';
    
    protected $table = "news";

//    private static $selectedFields = ['id', 'title', 'description', 'author', 'status', 'category_id', 'created_at'];

    public function getNews()
    {
        return DB::table('news')
            ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.caption as category_caption')
            ->get();
    }

    public function getNewsByCategoryId(int $id)
    {
        return DB::table('news')
            ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.caption as category_caption')
            ->where('category_id', $id)
            ->get();

    }
    public function getNewsById(int $id)
    {        
        return DB::table('news')
            ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.caption as category_caption')
            ->where('news.id', $id)
            ->first();

    }
}
