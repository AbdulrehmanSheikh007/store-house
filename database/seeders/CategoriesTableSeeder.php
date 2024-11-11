<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Categories;

class CategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            Categories::create([
                'name' => $faker->word
            ]);
        }
    }

}
