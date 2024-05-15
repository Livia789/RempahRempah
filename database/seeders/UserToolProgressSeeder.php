<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserToolProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_tool_progress')->insert([
            [
                'user_id' => '3',
                'tool_id' => '2',
                'recipe_id' => '2'
            ]
        ]);
    }
}
