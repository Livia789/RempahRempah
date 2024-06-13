<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('step_headers')->insert([
            //menu 1 [1]
            ['recipe_id' => '1', 'name' => 'Langkah'],
            //menu 2 [2]
            ['recipe_id' => '2', 'name' => 'Langkah'],
            //menu 3 [3]
            ['recipe_id' => '3', 'name' => 'Langkah'],
            //menu 4 [4]
            ['recipe_id' => '4', 'name' => 'Langkah'],
            //menu 5 [5]
            ['recipe_id' => '5', 'name' => 'Langkah'],
            //menu 6 [6]
            ['recipe_id' => '6', 'name' => 'Langkah'],
            //menu 7 [7]
            ['recipe_id' => '7', 'name' => 'Langkah'],
            //menu 8 [8]
            ['recipe_id' => '8', 'name' => 'Langkah'],
            //menu 9 [9]
            ['recipe_id' => '9', 'name' => 'Langkah'],
            //menu 10 [10]
            ['recipe_id' => '10', 'name' => 'Langkah'],
            //menu 11 [11]
            ['recipe_id' => '11', 'name' => 'Langkah'],
            //menu 12 [12]
            ['recipe_id' => '12', 'name' => 'Langkah'],
            //menu 13 [13]
            ['recipe_id' => '13', 'name' => 'Langkah'],
            //menu 14 [14]
            ['recipe_id' => '14', 'name' => 'Langkah'],
            //menu 15 [15]
            ['recipe_id' => '15', 'name' => 'Langkah'],
            //menu 16 [16]
            ['recipe_id' => '16', 'name' => 'Langkah'],
            //menu 17 [17]
            ['recipe_id' => '17', 'name' => 'Langkah'],
            //menu 18 [18-19]
            ['recipe_id' => '18', 'name' => 'Langkah-langkah membuat lemang'],
            ['recipe_id' => '18', 'name' => 'Langkah-langkah membuat tapai'],
            //menu 19 [20]
            ['recipe_id' => '19', 'name' => 'Langkah'],
            //menu 20 [21]
            ['recipe_id' => '20', 'name' => 'Langkah'],
            //menu 21 [22]
            ['recipe_id' => '21', 'name' => 'Langkah'],
            //menu 22 [23]
            ['recipe_id' => '22', 'name' => 'Langkah'],
            //menu 23 [24]
            ['recipe_id' => '23', 'name' => 'Langkah'],
            //menu 24 [25]
            ['recipe_id' => '24', 'name' => 'Langkah'],
            //menu 25 [26]
            ['recipe_id' => '25', 'name' => 'Langkah'],
            //menu 26 [27-31]
            ['recipe_id' => '26', 'name' => 'Langkah-langkah dalam membuat puding hunkwe'],
            ['recipe_id' => '26', 'name' => 'Langkah-langkah dalam membuat saus gula merah (kinca)'],
            ['recipe_id' => '26', 'name' => 'Langkah-langkah dalam membuat bubur sagu mutiara'],
            ['recipe_id' => '26', 'name' => 'Langkah-langkah dalam membuat kuah santan'],
            ['recipe_id' => '26', 'name' => 'Langkah Penyajian'],
            //menu 27 [32]
            ['recipe_id' => '27', 'name' => 'Langkah'],
            //menu 28 [33]
            ['recipe_id' => '28', 'name' => 'Langkah'],
            //menu 29 [34]
            ['recipe_id' => '29', 'name' => 'Langkah'],
            //menu 30 [35-36]
            ['recipe_id' => '30', 'name' => 'Langkah membuat Bubur sumsum'],
            ['recipe_id' => '30', 'name' => 'Langkah penyajian'],
            //menu 31 [37]
            ['recipe_id' => '31', 'name' => 'Langkah'],
            //menu 32 [38]
            ['recipe_id' => '32', 'name' => 'Langkah'],
            //menu 33 [39]
            ['recipe_id' => '33', 'name' => 'Langkah'],
            //menu 34 [40]
            ['recipe_id' => '34', 'name' => 'Langkah'],
            //menu 35 [41]
            ['recipe_id' => '35', 'name' => 'Langkah'],
            //menu 36 [42]
            ['recipe_id' => '36', 'name' => 'Langkah'],
            //menu 37 [43]
            ['recipe_id' => '20', 'name' => 'Langkah'],
            //menu 38 [44-46]
            ['recipe_id' => '38', 'name' => 'Langkah-langkah untuk membuat pangsit'],
            ['recipe_id' => '38', 'name' => 'Langkah-langkah untuk membuat tahu'],
            ['recipe_id' => '38', 'name' => 'Langkah-langkah untuk membuat kuah'],
            //menu 39 [47]
            ['recipe_id' => '39', 'name' => 'Langkah'],
            //menu 40 [48]
            ['recipe_id' => '40', 'name' => 'Langkah'],
        ]);
    }
}
