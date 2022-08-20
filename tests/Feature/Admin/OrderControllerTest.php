<?php

namespace Tests\Feature\Admin;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_order_create_successfull_page()
    {
        $response = $this->get(route('order.create'));

        $response->assertStatus(200);
    }
	public function test_order_folder_created()
	{
        $this->assertTrue(is_dir(storage_path('orders')));
	}

	public function test_order_create_return_successfull()
	{
		$faker = Factory::create();
		$name = 'TEST';
		$url = $faker->url();

		$data = [
			'name' => $name,
			'url' => $url
		];

		$response = $this->post(route('order.store'), $data);

		$response->assertViewIs('order.created')->assertStatus(200);
	}
}