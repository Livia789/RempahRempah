<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daerahs')->insert([
            ['name' => 'Medan'],
            ['name' => 'Padang'],
            ['name' => 'Jawa']
        ]);
    }
}
