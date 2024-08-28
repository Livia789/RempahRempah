<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                "user_id" => 5,
                "recipe_id" => 1,
                "message" => "Ayamnya boleh diganti jagung?",
                "created_at" => Carbon::now()
            ],
            [
                "user_id" => 6,
                "recipe_id" => 1,
                "message" => "satuan sendoknya ga jelas, sendok teh apa sendok makan??",
                "created_at" => Carbon::now()
            ],
            [
                "user_id" => 7,
                "recipe_id" => 1,
                "message" => "resepnya singkat, padat, tidak jelas.",
                "created_at" => Carbon::now()
            ]
        ]);
    }
}
