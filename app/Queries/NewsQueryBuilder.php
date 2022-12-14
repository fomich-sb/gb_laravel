<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class NewsQueryBuilder
{
    private Builder $query;
    public function __construct()
    {
        $this->query = News::query();
    }

    public function getNews(): Collection|LengthAwarePaginator
    {
       return $this->query
           ->status()
           ->with(['category', 'source'])
           ->paginate(config('pagination.admin.news'));
    }
    public function getAllNews(): Collection|LengthAwarePaginator
    {
       return $this->query
           ->with(['category', 'source'])
           ->paginate(config('pagination.admin.news'));
    }

    public function getActiveNews($category=null): Collection|LengthAwarePaginator
    {
        if($category)
            return $this->query
            ->where('status', News::ACTIVE)
            ->where('category_id', $category->id)
            ->with(['category', 'source'])
            ->paginate(config('pagination.admin.news'));
        else
            return $this->query
            ->where('status', News::ACTIVE)
            ->with(['category', 'source'])
            ->paginate(config('pagination.admin.news'));
    }
    
    public function create(array $data): News|bool
    {
        return News::create($data);
    }

    public function update(News $news, array $data): bool
    {
        return $news->fill($data)->save();
    }
}