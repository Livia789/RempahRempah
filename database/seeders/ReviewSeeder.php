<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                "user_id" => "3",
                "recipe_id" => "1",
                "comment" => "ayamnya sangat crispy dan gurih. wajib dicoba",
                "rating" => "5",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "1",
                "comment" => "ayamnya sangat crispy dan gurih. wajib dicoba",
                "rating" => "4",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "2",
                "comment" => "gorengan terbaik",
                "rating" => "5",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "3",
                "comment" => "bebeknya tidak berasa",
                "rating" => "1",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]
        ]);
    }
}
