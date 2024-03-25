<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_tag')->insert([
            [
                'recipe_id' => 2,
                'tag_id' => 1
            ],
            [
                'recipe_id' => 2,
                'tag_id' => 2
            ],
            [
                'recipe_id' => 2,
                'tag_id' => 3
            ]
            ]);
    }
}
