<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['name' => 'pedas'],
            ['name' => 'asam'],
            ['name' => 'manis'],
            ['name' => 'asin'],
            ['name' => 'diet'],
            ['name' => 'sehat'],
            ['name' => 'renyah'],
            ['name' => 'kuah'],
            ['name' => 'seafood'],
            ['name' => 'ayam'],
            ['name' => 'sapi']
        ]);
    }
}
