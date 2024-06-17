<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookmarks')->insert([
            [
                "user_id" => "3",
                "recipe_id" => "1",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "3",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "4",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "5",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "6",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "7",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "8",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "9",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "10",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "11",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "12",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "13",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "14",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "15",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "16",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "17",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "18",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "19",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "20",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "21",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "22",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "23",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "24",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "25",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "26",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "27",
            ],
            [
                "user_id" => "3",
                "recipe_id" => "28",
            ]
        ]);
    }
}
