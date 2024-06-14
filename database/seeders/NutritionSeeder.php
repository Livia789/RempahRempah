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
            ['name' => 'Karbohidrat'],
            ['name' => 'Lemak'],
            ['name' => 'Protein'],
            ['name' => 'Kolestrol'],
            ['name' => 'Sodium'],
            ['name' => 'Kalium'],
            ['name' => 'Vitamin B3'],
            ['name' => 'Natrium'],
            ['name' => 'Vitamin B1'],
            ['name' => 'Kalsium'],
            ['name' => 'Fosfor'],
            ['name' => 'Zat Besi'],
            ['name' => 'Vitamin B5'],
            ['name' => 'Vitamin E'],
        ]);
    }
}
