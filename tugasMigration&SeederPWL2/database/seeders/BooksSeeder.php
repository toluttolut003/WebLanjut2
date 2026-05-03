<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 1; $i <= 20; $i++){
            DB::table('books')->insert([
                'id' => $faker->isbn10(),
                'title' => $faker->sentence(3),
                'author' => $faker->name(),
                'year' => now(),
                'publisher' => $faker->sentence(1),
                'city' => $faker->city(),
                'cover' => $faker->randomElements(['hard Cover', 'Soft Cover']),


            ]);
        }
    }
}
