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
            ['recipe_id' => 1,'tag_id' => 4],
            ['recipe_id' => 1,'tag_id' => 7],
            ['recipe_id' => 1,'tag_id' => 10],

            ['recipe_id' => 2,'tag_id' => 1],
            ['recipe_id' => 2,'tag_id' => 4],
            ['recipe_id' => 2,'tag_id' => 11],

            ['recipe_id' => 3,'tag_id' => 3],

            ['recipe_id' => 4,'tag_id' => 3],

            ['recipe_id' => 5,'tag_id' => 1],
            ['recipe_id' => 5,'tag_id' => 4],
            ['recipe_id' => 5,'tag_id' => 10],

            ['recipe_id' => 6,'tag_id' => 1],
            ['recipe_id' => 6,'tag_id' => 4],
            ['recipe_id' => 6,'tag_id' => 7],

            ['recipe_id' => 7,'tag_id' => 3],

            ['recipe_id' => 8,'tag_id' => 4],
            ['recipe_id' => 8,'tag_id' => 6],

            ['recipe_id' => 9,'tag_id' => 4],
            ['recipe_id' => 9,'tag_id' => 11],

            ['recipe_id' => 10,'tag_id' => 4],
            ['recipe_id' => 10,'tag_id' => 7],

            ['recipe_id' => 11,'tag_id' => 3],
            ['recipe_id' => 11,'tag_id' => 6],
            ['recipe_id' => 11,'tag_id' => 8],

            ['recipe_id' => 12,'tag_id' => 4],
            ['recipe_id' => 12,'tag_id' => 7],
            ['recipe_id' => 12,'tag_id' => 10],

            ['recipe_id' => 13,'tag_id' => 4],
            ['recipe_id' => 13,'tag_id' => 6],
            ['recipe_id' => 13,'tag_id' => 10],

            ['recipe_id' => 14,'tag_id' => 4],
            ['recipe_id' => 14,'tag_id' => 8],
            ['recipe_id' => 14,'tag_id' => 11],

            ['recipe_id' => 15,'tag_id' => 3],
            ['recipe_id' => 15,'tag_id' => 4],

            ['recipe_id' => 16,'tag_id' => 1],
            ['recipe_id' => 16,'tag_id' => 4],
            ['recipe_id' => 16,'tag_id' => 11],

            ['recipe_id' => 17,'tag_id' => 1],
            ['recipe_id' => 17,'tag_id' => 3],
            ['recipe_id' => 17,'tag_id' => 4],

            ['recipe_id' => 18,'tag_id' => 3],
            ['recipe_id' => 18,'tag_id' => 4],

            ['recipe_id' => 19,'tag_id' => 1],
            ['recipe_id' => 19,'tag_id' => 4],

            ['recipe_id' => 20,'tag_id' => 3],

            ['recipe_id' => 21,'tag_id' => 2],
            ['recipe_id' => 21,'tag_id' => 8],

            ['recipe_id' => 22,'tag_id' => 3],

            ['recipe_id' => 23,'tag_id' => 3],

            ['recipe_id' => 24,'tag_id' => 3],

            ['recipe_id' => 25,'tag_id' => 3],

            ['recipe_id' => 26,'tag_id' => 3],

            ['recipe_id' => 27,'tag_id' => 3],

            ['recipe_id' => 28,'tag_id' => 3],

            ['recipe_id' => 29,'tag_id' => 3],

            ['recipe_id' => 30,'tag_id' => 3],

            ['recipe_id' => 31,'tag_id' => 3],
            ['recipe_id' => 31,'tag_id' => 4],
            ['recipe_id' => 31,'tag_id' => 6],
            ['recipe_id' => 31,'tag_id' => 10],

            ['recipe_id' => 32,'tag_id' => 4],
            ['recipe_id' => 32,'tag_id' => 8],

            ['recipe_id' => 33,'tag_id' => 4],
            ['recipe_id' => 33,'tag_id' => 6],
            ['recipe_id' => 33,'tag_id' => 10],

            ['recipe_id' => 34,'tag_id' => 4],
            ['recipe_id' => 34,'tag_id' => 6],
            ['recipe_id' => 34,'tag_id' => 7],

            ['recipe_id' => 35,'tag_id' => 1],
            ['recipe_id' => 35,'tag_id' => 2],

            ['recipe_id' => 36,'tag_id' => 4],
            ['recipe_id' => 36,'tag_id' => 6],
            ['recipe_id' => 36,'tag_id' => 8],

            ['recipe_id' => 37,'tag_id' => 1],
            ['recipe_id' => 37,'tag_id' => 4],

            ['recipe_id' => 38,'tag_id' => 4],
            ['recipe_id' => 38,'tag_id' => 6],

            ['recipe_id' => 39,'tag_id' => 4],
            ['recipe_id' => 39,'tag_id' => 6],

            ['recipe_id' => 40,'tag_id' => 1],
            ['recipe_id' => 40,'tag_id' => 3],
            ['recipe_id' => 40,'tag_id' => 4],
            ]);
    }
}
