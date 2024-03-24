<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AvoidedIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avoided_ingredients')->insert([
            [
                'user_id' => 3,
                'ingredient_name' => 'terigu'
            ],
            [
                'user_id' => 3,
                'ingredient_name' => 'ikan'
            ],
            [
                'user_id' => 3,
                'ingredient_name' => 'ayam'
            ]
        ]);
    }
}
