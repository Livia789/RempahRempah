<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutritionRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nutrition_recipe')->insert([
            [
                'recipe_id' => '2',
                'nutrition_id' => '1',
                'quantity' => '10',
                'unit' => 'kg',
                'akgPercentage' => '2.1234567'
            ],
            [
                'recipe_id' => '2',
                'nutrition_id' => '2',
                'quantity' => '200',
                'unit' => 'g',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '2',
                'nutrition_id' => '3',
                'quantity' => '300',
                'unit' => 'g',
                'akgPercentage' => '75'
            ]
        ]);
    }
}
