<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Faker\Factory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    
	public function getNews(int $id = null): array
	{
		$news = [];
		$faker = Factory::create();
        $categories = $this->getCategories();
		if(!is_null($id)) {
			return [
				'title'       => $faker->jobTitle(),
				'author'      => $faker->userName(),
				'status'      => 'DRAFT',
				'description' => $faker->text(100),
				'created_at'  => now('Europe/Moscow'),
				'category_id'  => $id % count($categories),
                'category' => $this->getCategories($id % count($categories))
			];
		}

		for($i=1; $i<10; $i++) {
			$news[$i] = [
				'title'       => $faker->jobTitle(),
			    'author'      => $faker->userName(),
			    'status'      => 'DRAFT',
			    'description' => $faker->text(100),
			    'created_at'  => now('Europe/Moscow'),
				'category_id'  => $i % count($categories),
                'category' => $this->getCategories($i % count($categories)) 
			];
		}

		return $news;
	}
    public function getNewsByCategory(int $categoryId)
	{
        $news = $this->getNews();
        $res = [];
        foreach($news as $key=>$item)
            if($item['category_id'] === $categoryId)
                $res[$key] = $item;
        return $res;
    }

    
    
	public function getCategories(int $id = null): array
	{
		$faker = Factory::create();
		$categories = [
            ['caption' => 'Политика', 'description' => $faker->text(100)],
            ['caption' => 'Экономика', 'description' => $faker->text(100)],
            ['caption' => 'Спорт', 'description' => $faker->text(100)],
            ['caption' => 'Экология', 'description' => $faker->text(100)]
        ];

		if(!is_null($id)) {
			return $categories[$id];
		}

		return $categories;
	}
}
