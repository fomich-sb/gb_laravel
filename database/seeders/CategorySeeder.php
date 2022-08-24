<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    protected function getData(): array
    {
        $faker = Factory::create();
        $data = [
            [
                'caption'       => 'Политика',
                'description' =>  $faker->text(100)
            ],
            [
                'caption'       => 'Экономика',
                'description' =>  $faker->text(100)
            ],
            [
                'caption'       => 'Спорт',
                'description' =>  $faker->text(100)
            ],
            [
                'caption'       => 'Экология',
                'description' =>  $faker->text(100)
            ]
        ];
        return $data;
    }
}
