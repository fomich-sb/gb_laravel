<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
	{
		$categories = $this->getCategories();
		//list all news
		return view('category.index', [
			'categoryList' => $categories
		]);
	}

	public function show(int $id)
	{
		// return current news
		$category = $this->getCategories($id);
		$news = $this->getNewsByCategory($id);
		return view('category.show', [
			'category' => $category,
			'newsList' => $news,
		]);
	}
}
