<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;

class NewsController extends Controller
{

    public function index(NewsQueryBuilder $builder)
	{
		if(request()->get('categoryId') !== null){
			$categoryId = intval(request()->get('categoryId'));
			$category = app(Category::class)->find($categoryId);
			$news = $builder->getActiveNews($category);
			//list all news
			return view('news.index', [
				'category' => $category,
				'newsList' => $news
			]);
		}
		else{
			$news = $builder->getActiveNews();
			//list all news
			return view('news.index', [
				'newsList' => $news
			]);
		}
	}

	public function show(int $id)
	{
		// return current news
		$news = app(News::class)->with('category')->find($id);
		return view('news.show', [
			'news' => $news
		]);
	}
}
