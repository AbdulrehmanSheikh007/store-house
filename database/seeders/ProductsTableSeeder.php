<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Products;
use App\Models\Categories;
use App\Models\User;

class ProductsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        $faker = Faker::create();
        foreach (range(1, 1000) as $index) {
            $user = User::inRandomOrder()->first();
            $product = Products::create([
                        'name' => $faker->word,
                        'description' => $faker->sentence,
                        'price' => $faker->randomFloat(2, 1, 100),
                        'quantity' => $faker->numberBetween(1, 100),
                        'image' => $faker->imageUrl,
                        'created_by' => $user->id
            ]);
            $categories = Categories::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $product->categories()->sync($categories);
        }
    }

}
