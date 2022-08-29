<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
	{
		$categories = Category::select(Category::$selectedFields)->get();
		//list all news
		return view('category.index', [
			'categoryList' => $categories
		]);
	}
}
