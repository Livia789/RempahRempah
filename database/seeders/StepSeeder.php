<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('steps')->insert([
            [
                'step_header_id' => '1',
                'step_desc' => 'campur tepung dengan air',
                'step_img' => null
            ],
            [
                'step_header_id' => '1',
                'step_desc' => 'goreng',
                'step_img' => null
            ],
            [
                'step_header_id' => '1',
                'step_desc' => 'tiriskan',
                'step_img' => null
            ],
            [
                'step_header_id' => '1',
                'step_desc' => 'hidangkan',
                'step_img' => null
            ],
            [
                'step_header_id' => '2',
                'step_desc' => 'campur saus tomat dengan sambal',
                'step_img' => null
            ],
            [
                'step_header_id' => '2',
                'step_desc' => 'hidangkan saus',
                'step_img' => null
            ]
        ]);
    }
}
