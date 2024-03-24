<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nutritions')->insert([
            [
                'name' => 'karbohidrat'
            ],
            [
                'name' => 'protein'
            ],
            [
                'name' => 'lemak'
            ]
        ]);
    }
}
