<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\ProductsTableSeeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class
        ]);
    }

}
