<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialOccasionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('special_occasions')->insert([
            ['name' => 'Ulang Tahun'],
            ['name' => 'Lebaran'],
            ['name' => 'Natal']
        ]);
    }
}
