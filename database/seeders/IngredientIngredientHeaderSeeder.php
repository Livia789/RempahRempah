<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientIngredientHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredient_ingredient_header')->insert([
            [
                'ingredient_id' => '1',
                'ingredient_header_id' => '1',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '2',
                'ingredient_header_id' => '1',
                'quantity' => '250',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '2',
                'quantity' => '5',
                'unit' => 'sdm'
            ],
            [
                'ingredient_id' => '4',
                'ingredient_header_id' => '2',
                'quantity' => '2',
                'unit' => 'sdm'
            ]
        ]);
    }
}
