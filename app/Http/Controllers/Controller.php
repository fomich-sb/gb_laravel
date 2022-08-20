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

    
    
	public $categoriesFile = 'categories.json';
	public $categories = null;
    
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
				'category_id'  => array_keys($categories)[$id % count($categories)],
                'category' => $this->getCategories(array_keys($categories)[$id % count($categories)])
			];
		}

		for($i=1; $i<10; $i++) {
			$news[$i] = [
				'title'       => $faker->jobTitle(),
			    'author'      => $faker->userName(),
			    'status'      => 'DRAFT',
			    'description' => $faker->text(100),
			    'created_at'  => now('Europe/Moscow'),
				'category_id'  => array_keys($categories)[$i % count($categories)],
                'category' => $this->getCategories(array_keys($categories)[$i % count($categories)]) 
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
		if($this->categories === null)
		{
			$data = json_decode(file_get_contents(storage_path($this->categoriesFile)));
			$this->categories = [];
			foreach($data as $row)
				$this->categories[$row->id] = (array)$row;
		}
		if($id === null)
			return $this->categories;
		else
			return $this->categories[$id];
	}

	public function getOrders(int $id = null): array
	{
		if($id === null)
		{
			$orders = [];
			$dir = storage_path('orders');
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					if(is_file($dir . DIRECTORY_SEPARATOR . $file))
						$orders[str_replace('.json','',$file)] = (array)json_decode(file_get_contents($dir . DIRECTORY_SEPARATOR . $file));
				}
				closedir($dh);
			}
			return $orders;
		}
		else
			return [];
	}
}
