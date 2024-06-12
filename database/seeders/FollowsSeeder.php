<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            [
                'follower_id' => '1',
                'followed_id' => '2'
            ],
            [
                'follower_id' => '2',
                'followed_id' => '3'
            ],
            [
                'follower_id' => '3',
                'followed_id' => '1'
            ]
        ]);
    }
}
