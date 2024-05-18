<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('step_progress')->insert([
            [
                'user_id' => '3',
                'step_id' => '1',
                'recipe_id' => '2'
            ],
            [
                'user_id' => '3',
                'step_id' => '3',
                'recipe_id' => '2'
            ],
            [
                'user_id' => '3',
                'step_id' => '4',
                'recipe_id' => '2'
            ],
        ]);
    }
}
