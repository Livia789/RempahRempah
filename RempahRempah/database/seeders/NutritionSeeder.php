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
        DB::table('nutrition')->insert([
            [
                'name' => 'Kalori',
            ],
            [
                'name' => 'Karbohidrat',
            ],
            [
                'name' => 'Protein',
            ],
            [
                'name' => 'Lemak',
            ]
        ]);
    }
}
