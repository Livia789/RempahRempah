<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutritionRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nutrition_recipe')->insert([
            [
                'recipe_id' => '1',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '1',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '1',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '1',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '1',
                'nutrition_id' => '5',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '65'
            ],
            [
                'recipe_id' => '1',
                'nutrition_id' => '6',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '1',
                'nutrition_id' => '7',
                'quantity' => '12',
                'unit' => 'mcg',
                'akgPercentage' => '93'
            ],
            [
                'recipe_id' => '1',
                'nutrition_id' => '8',
                'quantity' => '3',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '2',
                'nutrition_id' => '1',
                'quantity' => '11',
                'unit' => 'gr',
                'akgPercentage' => '5'
            ],
            [
                'recipe_id' => '2',
                'nutrition_id' => '2',
                'quantity' => '27',
                'unit' => 'gr',
                'akgPercentage' => '30'
            ],
            [
                'recipe_id' => '2',
                'nutrition_id' => '3',
                'quantity' => '47',
                'unit' => 'mg',
                'akgPercentage' => '60'
            ],
            [
                'recipe_id' => '2',
                'nutrition_id' => '4',
                'quantity' => '69',
                'unit' => 'mg',
                'akgPercentage' => '5'
            ],
            [
                'recipe_id' => '2',
                'nutrition_id' => '5',
                'quantity' => '442',
                'unit' => 'mg',
                'akgPercentage' => '30'
            ],
            [
                'recipe_id' => '2',
                'nutrition_id' => '6',
                'quantity' => '900',
                'unit' => 'gr',
                'akgPercentage' => '17'
            ],
            [
                'recipe_id' => '3',
                'nutrition_id' => '1',
                'quantity' => '84',
                'unit' => 'gr',
                'akgPercentage' => '26'
            ],
            [
                'recipe_id' => '3',
                'nutrition_id' => '2',
                'quantity' => '9',
                'unit' => 'gr',
                'akgPercentage' => '13'
            ],
            [
                'recipe_id' => '3',
                'nutrition_id' => '3',
                'quantity' => '2',
                'unit' => 'gr',
                'akgPercentage' => '2.6'
            ],
            [
                'recipe_id' => '3',
                'nutrition_id' => '4',
                'quantity' => '62',
                'unit' => 'mg',
                'akgPercentage' => '5'
            ],
            [
                'recipe_id' => '3',
                'nutrition_id' => '9',
                'quantity' => '20',
                'unit' => 'mcg',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '4',
                'nutrition_id' => '1',
                'quantity' => '25',
                'unit' => 'gr',
                'akgPercentage' => '26'
            ],
            [
                'recipe_id' => '4',
                'nutrition_id' => '2',
                'quantity' => '10',
                'unit' => 'gr',
                'akgPercentage' => '13'
            ],
            [
                'recipe_id' => '4',
                'nutrition_id' => '3',
                'quantity' => '600',
                'unit' => 'mg',
                'akgPercentage' => '2.6'
            ],
            [
                'recipe_id' => '5',
                'nutrition_id' => '1',
                'quantity' => '16',
                'unit' => 'gr',
                'akgPercentage' => '5'
            ],
            [
                'recipe_id' => '5',
                'nutrition_id' => '2',
                'quantity' => '6',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '5',
                'nutrition_id' => '3',
                'quantity' => '3',
                'unit' => 'gr',
                'akgPercentage' => '5'
            ],
            [
                'recipe_id' => '5',
                'nutrition_id' => '5',
                'quantity' => '22',
                'unit' => 'mg',
                'akgPercentage' => '2'
            ],
            [
                'recipe_id' => '5',
                'nutrition_id' => '9',
                'quantity' => '30',
                'unit' => 'mcg',
                'akgPercentage' => '33'
            ],
            [
                'recipe_id' => '5',
                'nutrition_id' => '10',
                'quantity' => '21',
                'unit' => 'gr',
                'akgPercentage' => '5'
            ],
            [
                'recipe_id' => '5',
                'nutrition_id' => '11',
                'quantity' => '18',
                'unit' => 'mg',
                'akgPercentage' => '8'
            ],
            [
                'recipe_id' => '5',
                'nutrition_id' => '12',
                'quantity' => '12',
                'unit' => 'mg',
                'akgPercentage' => '33'
            ],
            [
                'recipe_id' => '6',
                'nutrition_id' => '1',
                'quantity' => '12',
                'unit' => 'gr',
                'akgPercentage' => '6'
            ],
            [
                'recipe_id' => '6',
                'nutrition_id' => '2',
                'quantity' => '4',
                'unit' => 'gr',
                'akgPercentage' => '6'
            ],
            [
                'recipe_id' => '6',
                'nutrition_id' => '3',
                'quantity' => '4',
                'unit' => 'gr',
                'akgPercentage' => '7'
            ],
            [
                'recipe_id' => '6',
                'nutrition_id' => '8',
                'quantity' => '144',
                'unit' => 'mg',
                'akgPercentage' => '10'
            ],
            [
                'recipe_id' => '7',
                'nutrition_id' => '1',
                'quantity' => '66',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '7',
                'nutrition_id' => '2',
                'quantity' => '2',
                'unit' => 'gr',
                'akgPercentage' => '3'
            ],
            [
                'recipe_id' => '7',
                'nutrition_id' => '3',
                'quantity' => '4',
                'unit' => 'gr',
                'akgPercentage' => '6'
            ],
            [
                'recipe_id' => '7',
                'nutrition_id' => '7',
                'quantity' => '2',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '7',
                'nutrition_id' => '12',
                'quantity' => '2',
                'unit' => 'mg',
                'akgPercentage' => '11'
            ],
            [
                'recipe_id' => '8',
                'nutrition_id' => '1',
                'quantity' => '26',
                'unit' => 'gr',
                'akgPercentage' => '6'
            ],
            [
                'recipe_id' => '8',
                'nutrition_id' => '2',
                'quantity' => '3',
                'unit' => 'gr',
                'akgPercentage' => '6'
            ],
            [
                'recipe_id' => '8',
                'nutrition_id' => '3',
                'quantity' => '3',
                'unit' => 'gr',
                'akgPercentage' => '5'
            ],
            [
                'recipe_id' => '8',
                'nutrition_id' => '5',
                'quantity' => '288',
                'unit' => 'mg',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '8',
                'nutrition_id' => '6',
                'quantity' => '113',
                'unit' => 'mg',
                'akgPercentage' => '2'
            ],
            [
                'recipe_id' => '9',
                'nutrition_id' => '1',
                'quantity' => '7',
                'unit' => 'gr',
                'akgPercentage' => '0.1'
            ],
            [
                'recipe_id' => '9',
                'nutrition_id' => '2',
                'quantity' => '7',
                'unit' => 'gr',
                'akgPercentage' => '10'
            ],
            [
                'recipe_id' => '9',
                'nutrition_id' => '3',
                'quantity' => '18',
                'unit' => 'gr',
                'akgPercentage' => '30'
            ],
            [
                'recipe_id' => '9',
                'nutrition_id' => '5',
                'quantity' => '347',
                'unit' => 'mg',
                'akgPercentage' => '25'
            ],
            [
                'recipe_id' => '9',
                'nutrition_id' => '6',
                'quantity' => '390',
                'unit' => 'mg',
                'akgPercentage' => '6'
            ],
            [
                'recipe_id' => '10',
                'nutrition_id' => '1',
                'quantity' => '55',
                'unit' => 'gr',
                'akgPercentage' => '25'
            ],
            [
                'recipe_id' => '10',
                'nutrition_id' => '2',
                'quantity' => '15',
                'unit' => 'gr',
                'akgPercentage' => '25'
            ],
            [
                'recipe_id' => '10',
                'nutrition_id' => '3',
                'quantity' => '20',
                'unit' => 'gr',
                'akgPercentage' => '32'
            ],
            [
                'recipe_id' => '10',
                'nutrition_id' => '5',
                'quantity' => '500',
                'unit' => 'mg',
                'akgPercentage' => '40'
            ],
            [
                'recipe_id' => '10',
                'nutrition_id' => '6',
                'quantity' => '266',
                'unit' => 'mg',
                'akgPercentage' => '4'
            ],
            [
                'recipe_id' => '10',
                'nutrition_id' => '13',
                'quantity' => '1',
                'unit' => 'mg',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '10',
                'nutrition_id' => '14',
                'quantity' => '1',
                'unit' => 'mg',
                'akgPercentage' => '10'
            ],
            [
                'recipe_id' => '11',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '11',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '11',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '11',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '12',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '12',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '12',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '12',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '13',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '13',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '13',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '13',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '14',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '14',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '14',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '14',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '15',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '15',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '15',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '15',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '16',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '16',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '16',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '16',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '17',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '17',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '17',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '17',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '18',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '18',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '18',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '18',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '19',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '19',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '19',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '19',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '20',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '20',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '20',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '20',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '21',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '21',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '21',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '21',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '22',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '22',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '22',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '22',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '23',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '23',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '23',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '23',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '24',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '24',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '24',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '24',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '25',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '25',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '25',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '25',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '26',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '26',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '26',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '26',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '27',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '27',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '27',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '27',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '28',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '28',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '28',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '28',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '29',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '29',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '29',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '29',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '30',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '30',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '30',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '30',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '31',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '31',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '31',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '31',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '32',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '32',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '32',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '32',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '33',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '33',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '33',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '33',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '34',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '34',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '34',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '34',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ],
            [
                'recipe_id' => '35',
                'nutrition_id' => '1',
                'quantity' => '32',
                'unit' => 'gr',
                'akgPercentage' => '20'
            ],
            [
                'recipe_id' => '35',
                'nutrition_id' => '2',
                'quantity' => '43',
                'unit' => 'gr',
                'akgPercentage' => '70'
            ],
            [
                'recipe_id' => '35',
                'nutrition_id' => '3',
                'quantity' => '65',
                'unit' => 'gr',
                'akgPercentage' => '100'
            ],
            [
                'recipe_id' => '35',
                'nutrition_id' => '4',
                'quantity' => '1',
                'unit' => 'gr',
                'akgPercentage' => '15'
            ]
        ]);
    }
}
