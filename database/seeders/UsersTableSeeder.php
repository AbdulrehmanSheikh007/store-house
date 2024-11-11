<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            User::create([
                'email' => $faker->unique()->safeEmail,
                'full_name' => $faker->name,
                'password' => bcrypt('Admin@123')
            ]);
        }
    }

}
