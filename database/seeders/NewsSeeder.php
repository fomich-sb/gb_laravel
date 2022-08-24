<?php

namespace Database\Seeders;

use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    protected function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        for($i=0; $i < 10; $i++) {
            $data[] = [
                'category_id' => rand(1,4),
                'title'       => $faker->jobTitle(),
                'author'      => $faker->userName(),
                'status'      => News::DRAFT,
                'image'       => $faker->imageUrl(),
                'description' =>  $faker->text(100)
            ];
        }

        return $data;
    }
}
