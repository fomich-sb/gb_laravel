<?php

namespace Tests\Feature\Admin;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\CategoryController;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category_successfull_page()
    {
        $response = $this->get(route('admin.category.index'));

        $response->assertStatus(200);
    }
	public function test_category_create_successfull_page()
	{
		$response = $this->get(route('admin.category.create'));

		$response->assertViewIs('admin.category.create')
			->assertStatus(200);
	}

	public function test_category_categories_exist()
	{
		$categoryController = new CategoryController();
        $this->assertTrue(is_array($categoryController->getCategories()));

	}


	public function test_category_create_return_successfull()
	{
		$faker = Factory::create();
		$title = $faker->jobTitle();
		$description = $faker->text(100);

		$data = [
			'title' => $title,
			'description' => $description
		];

		$response = $this->post(route('admin.category.store'), $data);

        //Почему в ответе редирект на http://localhost , а не на http://localhost/admin/category ?
		$response->assertRedirectContains(route('admin.category.index'));
	}
}