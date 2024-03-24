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
            [
                'recipe_id' => '2',
                'name' => 'Langkah membuat gorengan'
            ],
            [
                'recipe_id' => '2',
                'name' => 'Langkah membuat saus cocolan bbq'
            ],
            [
                'recipe_id' => '1',
                'name' => 'Langkah mendiamkan nasi'
            ],
            [
                'recipe_id' => '1',
                'name' => 'Langkah memasak nasi'
            ],
            [
                'recipe_id' => '3',
                'name' => 'Langkah memasak bebek'
            ],
            [
                'recipe_id' => '3',
                'name' => 'Langkah membuat saus bebek'
            ]
        ]);
    }
}
