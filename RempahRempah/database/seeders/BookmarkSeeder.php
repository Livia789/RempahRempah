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
            ]
        ]);
    }
}
