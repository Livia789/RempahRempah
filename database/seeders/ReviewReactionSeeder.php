<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review_reactions')->insert([
            [
                'review_id' => 3,
                'user_id' => 1,
                'type' => 'like'
            ],
            [
                'review_id' => 3,
                'user_id' => 2,
                'type' => 'like'
            ],
            [
                'review_id' => 3,
                'user_id' => 3,
                'type' => 'like'
            ],
        ]);
    }
}
