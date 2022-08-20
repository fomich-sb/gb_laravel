<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
	{
		if(request()->get('categoryId') !== null)
		{
			$categoryId = intval(request()->get('categoryId'));
			$category = $this->getCategories($categoryId);
			$news = $this->getNewsByCategory($categoryId);
			//list all news
			return view('news.index', [
				'category' => $category,
				'newsList' => $news
			]);
		}
		else
		{
			$news = $this->getNews();
			//list all news
			return view('news.index', [
				'newsList' => $news
			]);
		}
	}

	public function show(int $id)
	{
		// return current news
		$news = $this->getNews($id);
		return view('news.show', [
			'news' => $news
		]);
	}
}
