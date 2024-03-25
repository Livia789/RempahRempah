<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_tool')->insert([
            [
                'recipe_id' => 2,
                'tool_id' => 1
            ],
            [
                'recipe_id' => 2,
                'tool_id' => 2
            ],
            [
                'recipe_id' => 2,
                'tool_id' => 3
            ],
        ]);
    }
}
