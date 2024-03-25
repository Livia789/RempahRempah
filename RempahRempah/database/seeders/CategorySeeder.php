<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('categories')->insert([
            [
                "name" => "Hidangan Pembuka",
                "class" => "Kategori Utama"
            ],
            [
                "name" => "Hidangan Utama",
                "class" => "Kategori Utama"
            ],
            [
                "name" => "Pencuci Mulut",
                "class" => "Kategori Utama"
            ],
            [
                "name" => "Hidangan Sampingan",
                "class" => "Kategori Utama"
            ],
            [
                "name" => "Idul Fitri",
                "class" => "Hari Spesial"
            ],
            [
                "name" => "Natal",
                "class" => "Hari Spesial"
            ],
            [
                "name" => "Imlek",
                "class" => "Hari Spesial"
            ],
            [
                "name" => "Betawi",
                "class" => "Daerah"
            ],
            [
                "name" => "Sunda",
                "class" => "Daerah"
            ],
            [
                "name" => "Padang",
                "class" => "Daerah"
            ],
            [
                "name" => "Yogyakarta",
                "class" => "Daerah"
            ],
            [
                "name" => "Semarang",
                "class" => "Daerah"
            ],
            [
                "name" => "Makassar",
                "class" => "Daerah"
            ],
        ]);
    }
}
