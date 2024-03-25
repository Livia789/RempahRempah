<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tools')->insert([
            [
                'name' => 'wajan'
            ],
            [
                'name' => 'bowl'
            ],
            [
                'name' => 'oven'
            ]
        ]);
    }
}
