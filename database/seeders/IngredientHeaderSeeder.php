<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredient_headers')->insert([
            //1
            ['recipe_id' => '1','name' => 'Bahan Utama'],
            //2-3
            ['recipe_id' => '2','name' => 'Bahan Utama'],
            ['recipe_id' => '2','name' => 'Bumbu Halus'],
            //4
            ['recipe_id' => '3','name' => 'Bahan Utama'],
            //5
            ['recipe_id' => '4','name' => 'Bahan Utama'],
            //6-8
            ['recipe_id' => '5','name' => 'Bahan Utama'],
            ['recipe_id' => '5','name' => 'Bahan Bumbu'],
            ['recipe_id' => '5','name' => 'Bahan Pelengkap'],
            //9-10
            ['recipe_id' => '6','name' => 'Bahan Adonan'],
            ['recipe_id' => '6','name' => 'Bahan Isian'],
            //11
            ['recipe_id' => '7','name' => 'Bahan Utama'],
            //12
            ['recipe_id' => '8','name' => 'Bahan Utama'],
            //13-15
            ['recipe_id' => '9','name' => 'Bahan Utama'],
            ['recipe_id' => '9','name' => 'Bumbu Halus'],
            ['recipe_id' => '9','name' => 'Bahan Pelengkap'],
            //16
            ['recipe_id' => '10','name' => 'Bahan Utama'],
            //17-20
            ['recipe_id' => '11','name' => 'Bahan untuk Pisang Ijo'],
            ['recipe_id' => '11','name' => 'Bahan untuk Bubur Sumsum'],
            ['recipe_id' => '11','name' => 'Bahan untuk Saus Santan'],
            ['recipe_id' => '11','name' => 'Bahan Pelengkap'],
            //21-24
            ['recipe_id' => '12','name' => 'Bahan Kulit Lumpia'],
            ['recipe_id' => '12','name' => 'Bahan Isian'],
            ['recipe_id' => '12','name' => 'Saos Gula Merah'],
            ['recipe_id' => '12','name' => 'Bahan Pelengkap'],
            //25-26
            ['recipe_id' => '13','name' => 'Bahan Utama'],
            ['recipe_id' => '13','name' => 'Bumbu Halus'],
            //27-28
            ['recipe_id' => '14','name' => 'Bahan Utama'],
            ['recipe_id' => '14','name' => 'Bumbu Halus'],
            //29-31
            ['recipe_id' => '15','name' => 'Bahan Kulit'],
            ['recipe_id' => '15','name' => 'Bahan Isian'],
            ['recipe_id' => '15','name' => 'Bahan Pelapis'],
            //32-34
            ['recipe_id' => '16','name' => 'Bahan Utama'],
            ['recipe_id' => '16','name' => 'Bumbu Halus'],
            ['recipe_id' => '16','name' => 'Bahan Pelengkap'],
            //35-36
            ['recipe_id' => '17','name' => 'Bahan Utama'],
            ['recipe_id' => '17','name' => 'Bahan Sambal Kacang'],
            //37-38
            ['recipe_id' => '18','name' => 'Bahan Lemang'],
            ['recipe_id' => '18','name' => 'Bahan Tapai'],
            //39-40
            ['recipe_id' => '19','name' => 'Bahan Utama'],
            ['recipe_id' => '19','name' => 'Bumbu Halus'],
            //41-43
            ['recipe_id' => '20','name' => 'Bahan Roti'],
            ['recipe_id' => '20','name' => 'Bahan Gula'],
            ['recipe_id' => '20','name' => 'Olesan'],
            //44-46
            ['recipe_id' => '21','name' => 'Bahan Utama'],
            ['recipe_id' => '21','name' => 'Bumbu Halus'],
            ['recipe_id' => '21','name' => 'Bahan Pelengkap'],
            //47-48
            ['recipe_id' => '22','name' => 'Bahan Utama'],
            ['recipe_id' => '22','name' => 'Bahan Isian'],
            //49
            ['recipe_id' => '23','name' => 'Bahan Utama'],
            //50-52
            ['recipe_id' => '24','name' => 'Bahan Kulit'],
            ['recipe_id' => '24','name' => 'Bahan Sirup'],
            ['recipe_id' => '24','name' => 'Bahan Isian'],
            //53
            ['recipe_id' => '25','name' => 'Bahan Utama'],
            //54-57
            ['recipe_id' => '26','name' => 'Bahan Puding Hunkwe'],
            ['recipe_id' => '26','name' => 'Bahan Sagu Mutiara'],
            ['recipe_id' => '26','name' => 'Bahan Kuah Santan'],
            ['recipe_id' => '26','name' => 'Bahan Pelengkap'],
            //58
            ['recipe_id' => '27','name' => 'Bahan Utama'],
            //59-61
            ['recipe_id' => '28','name' => 'Bola Ketan'],
            ['recipe_id' => '28','name' => 'Bahan Isian'],
            ['recipe_id' => '28','name' => 'Bahan Balutan'],
            //62-63
            ['recipe_id' => '29','name' => 'Bahan Utama'],
            ['recipe_id' => '29','name' => 'Bahan Kuah Santan'],
            //64
            ['recipe_id' => '30','name' => 'Bahan Utama'],
            //65-68
            ['recipe_id' => '31','name' => 'Bahan Utama'],
            ['recipe_id' => '31','name' => 'Bahan Isian'],
            ['recipe_id' => '31','name' => 'Bahan Olesan & Saus'],
            ['recipe_id' => '31','name' => 'Bahan Pelengkap'],
            //69
            ['recipe_id' => '32','name' => 'Bahan Utama'],
            //70-72
            ['recipe_id' => '33','name' => 'Bahan Bubur'],
            ['recipe_id' => '33','name' => 'Bahan Bumbu Halus'],
            ['recipe_id' => '33','name' => 'Bahan Bumbu Lain'],
            //73
            ['recipe_id' => '34','name' => 'Bahan Utama'],
            //74-75
            ['recipe_id' => '35','name' => 'Bahan Utama'],
            ['recipe_id' => '35','name' => 'Bumbu Halus'],
            //76
            ['recipe_id' => '36','name' => 'Bahan Utama'],
            //77-78
            ['recipe_id' => '37','name' => 'Bahan Utama'],
            ['recipe_id' => '37','name' => 'Bumbu Halus'],
            //79-81
            ['recipe_id' => '38','name' => 'Bahan Tahu'],
            ['recipe_id' => '38','name' => 'Bahan Pangsit'],
            ['recipe_id' => '38','name' => 'Bahan Kuah'],
            //82-83
            ['recipe_id' => '39','name' => 'Bahan Utama'],
            ['recipe_id' => '39','name' => 'Bumbu Halus'],
            //84
            ['recipe_id' => '40','name' => 'Bahan Utama'],
        ]);
    }
}
