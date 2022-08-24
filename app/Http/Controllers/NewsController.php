<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{

    public function index()
	{
		if(request()->get('categoryId') !== null)
		{
			$categoryId = intval(request()->get('categoryId'));
			$category = app(Category::class)->getCategoryById($categoryId);
			$news = app(News::class)->getNewsByCategoryId($categoryId);
			//list all news
			return view('news.index', [
				'category' => $category,
				'newsList' => $news
			]);
		}
		else
		{
			$news = app(News::class)->getNews();
			//list all news
			return view('news.index', [
				'newsList' => $news
			]);
		}
	}

	public function show(int $id)
	{
		// return current news
		$news = app(News::class)->getNewsById($id);
		return view('news.show', [
			'news' => $news
		]);
	}
}
