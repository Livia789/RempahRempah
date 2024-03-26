<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredient_headers')->insert([
            [
                'recipe_id' => '2',
                'name' => 'bahan utama'
            ],
            [
                'recipe_id' => '2',
                'name' => 'bahan saus'
            ]
        ]);
    }
}
