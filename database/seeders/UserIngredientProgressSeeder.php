<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserIngredientProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_ingredient_progress')->insert([
            [
                'user_id' => '3',
                'ingredient_id' => '1',
                'recipe_id' => '2'
            ],
            [
                'user_id' => '3',
                'ingredient_id' => '3',
                'recipe_id' => '2'
            ],
            [
                'user_id' => '3',
                'ingredient_id' => '4',
                'recipe_id' => '2'
            ],
        ]);
    }
}
