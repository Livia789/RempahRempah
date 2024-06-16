<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CookingHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cooking_histories')->insert([
            [
                'created_at' => '2024-06-15',
                'user_id' => '3',
                'recipe_id' => '1',
            ],
            [
                'created_at' => '2022-02-14',
                'user_id' => '3',
                'recipe_id' => '5',
            ],
            [
                'created_at' => '2024-03-12',
                'user_id' => '3',
                'recipe_id' => '6',
            ],
            [
                'created_at' => '2024-06-11',
                'user_id' => '3',
                'recipe_id' => '7',
            ],
            [
                'created_at' => '2024-05-14',
                'user_id' => '3',
                'recipe_id' => '1',
            ]
        ]);
    }
}
