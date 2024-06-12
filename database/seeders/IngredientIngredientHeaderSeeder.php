<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientIngredientHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredient_ingredient_header')->insert([
            //menu 1[1,2,3,4,5,6,7,8,9,10], header 1
            [
                'ingredient_id' => '1',
                'ingredient_header_id' => '1',
                'quantity' => '2',
                'unit' => 'sendok'
            ],
            [
                'ingredient_id' => '2',
                'ingredient_header_id' => '1',
                'quantity' => '1',
                'unit' => 'sendok'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '1',
                'quantity' => '1',
                'unit' => 'sendok'
            ],
            [
                'ingredient_id' => '4',
                'ingredient_header_id' => '1',
                'quantity' => '1',
                'unit' => 'sendok'
            ],
            [
                'ingredient_id' => '5',
                'ingredient_header_id' => '1',
                'quantity' => '1/2',
                'unit' => 'cangkir'
            ],
            [
                'ingredient_id' => '6',
                'ingredient_header_id' => '1',
                'quantity' => '1',
                'unit' => 'cangkir'
            ],
            [
                'ingredient_id' => '7',
                'ingredient_header_id' => '1',
                'quantity' => '1/2',
                'unit' => 'cangkir'
            ],
            [
                'ingredient_id' => '8',
                'ingredient_header_id' => '1',
                'quantity' => '1',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '9',
                'ingredient_header_id' => '1',
                'quantity' => '4',
                'unit' => 'bagian'
            ],
            [
                'ingredient_id' => '10',
                'ingredient_header_id' => '1',
                'quantity' => '1',
                'unit' => 'cangkir'
            ],
            //menu 2 [], header 2 & 3
            [
                'ingredient_id' => '11',
                'ingredient_header_id' => '2',
                'quantity' => '600',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '12',
                'ingredient_header_id' => '2',
                'quantity' => '1',
                'unit' => 'liter'
            ],
            [
                'ingredient_id' => '13',
                'ingredient_header_id' => '2',
                'quantity' => '2',
                'unit' => 'helai'
            ],
            [
                'ingredient_id' => '14',
                'ingredient_header_id' => '2',
                'quantity' => '1',
                'unit' => 'batang'
            ],
            [
                'ingredient_id' => '15',
                'ingredient_header_id' => '2',
                'quantity' => 'sejengkal',
                'unit' => null
            ],
            [
                'ingredient_id' => '16',
                'ingredient_header_id' => '2',
                'quantity' => '1',
                'unit' => 'biji'
            ],
            [
                'ingredient_id' => '17',
                'ingredient_header_id' => '2',
                'quantity' => '5',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '18',
                'ingredient_header_id' => '2',
                'quantity' => '1',
                'unit' => 'potong'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '2',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '19',
                'ingredient_header_id' => '2',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '3',
                'quantity' => '8',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '3',
                'quantity' => '7',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '22',
                'ingredient_header_id' => '3',
                'quantity' => '5',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '23',
                'ingredient_header_id' => '3',
                'quantity' => '6',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '24',
                'ingredient_header_id' => '3',
                'quantity' => 'sejengkal',
                'unit' => null
            ],
            [
                'ingredient_id' => '25',
                'ingredient_header_id' => '3',
                'quantity' => '5',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '26',
                'ingredient_header_id' => '3',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '27',
                'ingredient_header_id' => '3',
                'quantity' => '3',
                'unit' => 'biji'
            ],
            [
                'ingredient_id' => '28',
                'ingredient_header_id' => '4',
                'quantity' => '70',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '8',
                'ingredient_header_id' => '4',
                'quantity' => '1',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '29',
                'ingredient_header_id' => '4',
                'quantity' => '1',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '30',
                'ingredient_header_id' => '4',
                'quantity' => '1',
                'unit' => 'paket'
            ],
            [
                'ingredient_id' => '31',
                'ingredient_header_id' => '4',
                'quantity' => '80',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '32',
                'ingredient_header_id' => '4',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '33',
                'ingredient_header_id' => '4',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '34',
                'ingredient_header_id' => '4',
                'quantity' => '1/4',
                'unit' => 'sendok teh '
            ],
            [
                'ingredient_id' => '35',
                'ingredient_header_id' => '4',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '36',
                'ingredient_header_id' => '4',
                'quantity' => '4',
                'unit' => 'tetes'
            ],
            [
                'ingredient_id' => '37',
                'ingredient_header_id' => '4',
                'quantity' => '1',
                'unit' => 'kantong'
            ],
            [
                'ingredient_id' => '38',
                'ingredient_header_id' => '4',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '39',
                'ingredient_header_id' => '5',
                'quantity' => '350',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '28',
                'ingredient_header_id' => '5',
                'quantity' => '150',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '35',
                'ingredient_header_id' => '5',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '40',
                'ingredient_header_id' => '5',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '29',
                'ingredient_header_id' => '5',
                'quantity' => '2',
                'unit' => null
            ],
            [
                'ingredient_id' => '41',
                'ingredient_header_id' => '5',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '42',
                'ingredient_header_id' => '5',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '43',
                'ingredient_header_id' => '5',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '44',
                'ingredient_header_id' => '5',
                'quantity' => '1',
                'unit' => null
            ],
            [
                'ingredient_id' => '45',
                'ingredient_header_id' => '6',
                'quantity' => '1',
                'unit' => 'kilogram'
            ],
            [
                'ingredient_id' => '46',
                'ingredient_header_id' => '6',
                'quantity' => '5',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '13',
                'ingredient_header_id' => '6',
                'quantity' => '2',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '47',
                'ingredient_header_id' => '6',
                'quantity' => '3',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '48',
                'ingredient_header_id' => '6',
                'quantity' => '3',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '49',
                'ingredient_header_id' => '6',
                'quantity' => '120',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '50',
                'ingredient_header_id' => '6',
                'quantity' => '1,5',
                'unit' => 'liter'
            ],
            [
                'ingredient_id' => '51',
                'ingredient_header_id' => '6',
                'quantity' => '500',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '7',
                'quantity' => '8',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '7',
                'quantity' => '5',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '25',
                'ingredient_header_id' => '7',
                'quantity' => '5',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '52',
                'ingredient_header_id' => '7',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '53',
                'ingredient_header_id' => '7',
                'quantity' => '1',
                'unit' => 'potong'
            ],
            [
                'ingredient_id' => '54',
                'ingredient_header_id' => '7',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '7',
                'quantity' => '2',
                'unit' => 'sendok'
            ],
            [
                'ingredient_id' => '55',
                'ingredient_header_id' => '8',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '56',
                'ingredient_header_id' => '8',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '57',
                'ingredient_header_id' => '8',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '58',
                'ingredient_header_id' => '9',
                'quantity' => '1/2',
                'unit' => 'kilogram'
            ],
            [
                'ingredient_id' => '59',
                'ingredient_header_id' => '9',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '9',
                'quantity' => '2',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '9',
                'quantity' => '3',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '25',
                'ingredient_header_id' => '9',
                'quantity' => '3',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '60',
                'ingredient_header_id' => '9',
                'quantity' => '1',
                'unit' => 'sendok'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '9',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '61',
                'ingredient_header_id' => '9',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '62',
                'ingredient_header_id' => '10',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '63',
                'ingredient_header_id' => '10',
                'quantity' => '10',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '64',
                'ingredient_header_id' => '10',
                'quantity' => '2',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '65',
                'ingredient_header_id' => '10',
                'quantity' => '1',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '61',
                'ingredient_header_id' => '10',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '66',
                'ingredient_header_id' => '11',
                'quantity' => '1',
                'unit' => 'kilogram'
            ],
            [
                'ingredient_id' => '67',
                'ingredient_header_id' => '11',
                'quantity' => '2',
                'unit' => 'kilogram'
            ],
            [
                'ingredient_id' => '68',
                'ingredient_header_id' => '11',
                'quantity' => '2',
                'unit' => 'ons'
            ],
            [
                'ingredient_id' => '69',
                'ingredient_header_id' => '11',
                'quantity' => '5',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '11',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '70',
                'ingredient_header_id' => '11',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '71',
                'ingredient_header_id' => '12',
                'quantity' => '1',
                'unit' => 'kilogram'
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '12',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '12',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '24',
                'ingredient_header_id' => '12',
                'quantity' => '30',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '73',
                'ingredient_header_id' => '12',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '74',
                'ingredient_header_id' => '12',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '75',
                'ingredient_header_id' => '12',
                'quantity' => '2',
                'unit' => 'batang'
            ],
            [
                'ingredient_id' => '76',
                'ingredient_header_id' => '12',
                'quantity' => '8',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '13',
                'ingredient_header_id' => '12',
                'quantity' => '5',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '77',
                'ingredient_header_id' => '12',
                'quantity' => '3',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '12',
                'quantity' => '2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '78',
                'ingredient_header_id' => '12',
                'quantity' => '2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '79',
                'ingredient_header_id' => '12',
                'quantity' => '1',
                'unit' => 'bungkus'
            ],
            [
                'ingredient_id' => '80',
                'ingredient_header_id' => '12',
                'quantity' => '13',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '81',
                'ingredient_header_id' => '13',
                'quantity' => '600',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '13',
                'quantity' => '2',
                'unit' => 'liter'
            ],
            [
                'ingredient_id' => '83',
                'ingredient_header_id' => '13',
                'quantity' => '3',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '75',
                'ingredient_header_id' => '13',
                'quantity' => '4',
                'unit' => 'batang'
            ],
            [
                'ingredient_id' => '47',
                'ingredient_header_id' => '13',
                'quantity' => '12',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '84',
                'ingredient_header_id' => '13',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '104',
                'ingredient_header_id' => '13',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '85',
                'ingredient_header_id' => '13',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '86',
                'ingredient_header_id' => '13',
                'quantity' => '2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '87',
                'ingredient_header_id' => '13',
                'quantity' => '18',
                'unit' => 'tusuk'
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '14',
                'quantity' => '15',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '14',
                'quantity' => '5',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '88',
                'ingredient_header_id' => '14',
                'quantity' => '2',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '89',
                'ingredient_header_id' => '14',
                'quantity' => '1/2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '90',
                'ingredient_header_id' => '14',
                'quantity' => '3',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '24',
                'ingredient_header_id' => '14',
                'quantity' => '3',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '91',
                'ingredient_header_id' => '14',
                'quantity' => '3',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '92',
                'ingredient_header_id' => '14',
                'quantity' => '1/2',
                'unit' => 'sendok makan teh'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '14',
                'quantity' => '1/2',
                'unit' => 'sendok makan teh'
            ],
            [
                'ingredient_id' => '71',
                'ingredient_header_id' => '14',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '93',
                'ingredient_header_id' => '15',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '94',
                'ingredient_header_id' => '15',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '95',
                'ingredient_header_id' => '16',
                'quantity' => '150',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '16',
                'quantity' => '15',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '96',
                'ingredient_header_id' => '16',
                'quantity' => '150',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '97',
                'ingredient_header_id' => '16',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '98',
                'ingredient_header_id' => '16',
                'quantity' => '15',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '99',
                'ingredient_header_id' => '16',
                'quantity' => '3',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '100',
                'ingredient_header_id' => '16',
                'quantity' => '30',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '94',
                'ingredient_header_id' => '16',
                'quantity' => '10',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '101',
                'ingredient_header_id' => '16',
                'quantity' => '2',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '24',
                'ingredient_header_id' => '16',
                'quantity' => '1',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '25',
                'ingredient_header_id' => '16',
                'quantity' => '10',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '102',
                'ingredient_header_id' => '16',
                'quantity' => '2',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '103',
                'ingredient_header_id' => '17',
                'quantity' => '10',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '17',
                'quantity' => '600',
                'unit' => 'ml'
            ],
            [
                'ingredient_id' => '104',
                'ingredient_header_id' => '17',
                'quantity' => '150',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '39',
                'ingredient_header_id' => '17',
                'quantity' => '150',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '69',
                'ingredient_header_id' => '17',
                'quantity' => '60',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '105',
                'ingredient_header_id' => '17',
                'quantity' => '65',
                'unit' => 'ml'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '17',
                'quantity' => '1/2',
                'unit' => 'sendok makan teh'
            ],
            [
                'ingredient_id' => '106',
                'ingredient_header_id' => '17',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '18',
                'quantity' => '750',
                'unit' => 'ml'
            ],
            [
                'ingredient_id' => '104',
                'ingredient_header_id' => '18',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '105',
                'ingredient_header_id' => '18',
                'quantity' => '65',
                'unit' => 'ml'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '18',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '77',
                'ingredient_header_id' => '18',
                'quantity' => '2',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '105',
                'ingredient_header_id' => '19',
                'quantity' => '65',
                'unit' => 'ml'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '19',
                'quantity' => '500',
                'unit' => 'ml'
            ],
            [
                'ingredient_id' => '77',
                'ingredient_header_id' => '19',
                'quantity' => '2',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '40',
                'ingredient_header_id' => '19',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '19',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '107',
                'ingredient_header_id' => '20',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '108',
                'ingredient_header_id' => '20',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '104',
                'ingredient_header_id' => '21',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '109',
                'ingredient_header_id' => '21',
                'quantity' => '10',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '8',
                'ingredient_header_id' => '21',
                'quantity' => '1',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '71',
                'ingredient_header_id' => '21',
                'quantity' => '10',
                'unit' => 'ml'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '21',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '21',
                'quantity' => '200',
                'unit' => 'ml'
            ],
            [
                'ingredient_id' => '110',
                'ingredient_header_id' => '22',
                'quantity' => '250',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '111',
                'ingredient_header_id' => '22',
                'quantity' => '200',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '112',
                'ingredient_header_id' => '22',
                'quantity' => '4',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '113',
                'ingredient_header_id' => '22',
                'quantity' => '6',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '114',
                'ingredient_header_id' => '22',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '115',
                'ingredient_header_id' => '22',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '116',
                'ingredient_header_id' => '22',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '22',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '69',
                'ingredient_header_id' => '22',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '117',
                'ingredient_header_id' => '22',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '118',
                'ingredient_header_id' => '23',
                'quantity' => '200',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '112',
                'ingredient_header_id' => '23',
                'quantity' => '2',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '119',
                'ingredient_header_id' => '23',
                'quantity' => '5',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '23',
                'quantity' => 'sejemput',
                'unit' => null
            ],
            [
                'ingredient_id' => '69',
                'ingredient_header_id' => '23',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '23',
                'quantity' => '200',
                'unit' => 'ml'
            ],
            [
                'ingredient_id' => '120',
                'ingredient_header_id' => '23',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '121',
                'ingredient_header_id' => '24',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '122',
                'ingredient_header_id' => '25',
                'quantity' => '1',
                'unit' => 'kilogram'
            ],
            [
                'ingredient_id' => '123',
                'ingredient_header_id' => '25',
                'quantity' => '1/2',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '124',
                'ingredient_header_id' => '25',
                'quantity' => '400',
                'unit' => 'ml'
            ],
            [
                'ingredient_id' => '125',
                'ingredient_header_id' => '25',
                'quantity' => '2',
                'unit' => 'batang'
            ],
            [
                'ingredient_id' => '126',
                'ingredient_header_id' => '25',
                'quantity' => '2',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '47',
                'ingredient_header_id' => '25',
                'quantity' => '2',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '13',
                'ingredient_header_id' => '25',
                'quantity' => '2',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '127',
                'ingredient_header_id' => '25',
                'quantity' => 'sejempol',
                'unit' => null
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '25',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '128',
                'ingredient_header_id' => '25',
                'quantity' => '1',
                'unit' => 'sachet'
            ],
            [
                'ingredient_id' => '129',
                'ingredient_header_id' => '25',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '26',
                'quantity' => '5',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '26',
                'quantity' => '7',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '25',
                'ingredient_header_id' => '26',
                'quantity' => '3',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '130',
                'ingredient_header_id' => '26',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '131',
                'ingredient_header_id' => '26',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '132',
                'ingredient_header_id' => '27',
                'quantity' => '250',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '133',
                'ingredient_header_id' => '27',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '134',
                'ingredient_header_id' => '27',
                'quantity' => '3',
                'unit' => 'sendok'
            ],
            [
                'ingredient_id' => '135',
                'ingredient_header_id' => '27',
                'quantity' => '1',
                'unit' => 'batang'
            ],
            [
                'ingredient_id' => '136',
                'ingredient_header_id' => '27',
                'quantity' => '1',
                'unit' => 'potong'
            ],
            [
                'ingredient_id' => '13',
                'ingredient_header_id' => '27',
                'quantity' => '1',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '47',
                'ingredient_header_id' => '27',
                'quantity' => '2',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '137',
                'ingredient_header_id' => '27',
                'quantity' => '20',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '11',
                'ingredient_header_id' => '27',
                'quantity' => '500',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '138',
                'ingredient_header_id' => '27',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '139',
                'ingredient_header_id' => '27',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '140',
                'ingredient_header_id' => '27',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '51',
                'ingredient_header_id' => '27',
                'quantity' => '250',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '88',
                'ingredient_header_id' => '27',
                'quantity' => '10',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '141',
                'ingredient_header_id' => '27',
                'quantity' => '10',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '28',
                'quantity' => '8',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '28',
                'quantity' => '4',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '25',
                'ingredient_header_id' => '28',
                'quantity' => '3',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '22',
                'ingredient_header_id' => '28',
                'quantity' => '2',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '52',
                'ingredient_header_id' => '28',
                'quantity' => '2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '54',
                'ingredient_header_id' => '28',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '24',
                'ingredient_header_id' => '28',
                'quantity' => '1',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '90',
                'ingredient_header_id' => '28',
                'quantity' => '3',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '142',
                'ingredient_header_id' => '28',
                'quantity' => '5',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '28',
                'quantity' => '2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '143',
                'ingredient_header_id' => '29',
                'quantity' => '150',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '69',
                'ingredient_header_id' => '29',
                'quantity' => '3',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '29',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '40',
                'ingredient_header_id' => '29',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '144',
                'ingredient_header_id' => '29',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '29',
                'quantity' => '140',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '145',
                'ingredient_header_id' => '30',
                'quantity' => '150',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '69',
                'ingredient_header_id' => '30',
                'quantity' => '5',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '146',
                'ingredient_header_id' => '30',
                'quantity' => '5',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '147',
                'ingredient_header_id' => '31',
                'quantity' => '5',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '148',
                'ingredient_header_id' => '31',
                'quantity' => '4',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '11',
                'ingredient_header_id' => '32',
                'quantity' => '500',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '149',
                'ingredient_header_id' => '32',
                'quantity' => '500',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '150',
                'ingredient_header_id' => '32',
                'quantity' => '1',
                'unit' => 'liter'
            ],
            [
                'ingredient_id' => '151',
                'ingredient_header_id' => '32',
                'quantity' => '1',
                'unit' => 'liter'
            ],
            [
                'ingredient_id' => '48',
                'ingredient_header_id' => '32',
                'quantity' => '3',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '152',
                'ingredient_header_id' => '32',
                'quantity' => '2',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '125',
                'ingredient_header_id' => '32',
                'quantity' => '1',
                'unit' => 'batang'
            ],
            [
                'ingredient_id' => '47',
                'ingredient_header_id' => '32',
                'quantity' => '3',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '13',
                'ingredient_header_id' => '32',
                'quantity' => '2',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '153',
                'ingredient_header_id' => '32',
                'quantity' => '150',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '33',
                'quantity' => '7',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '25',
                'ingredient_header_id' => '33',
                'quantity' => '3',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '154',
                'ingredient_header_id' => '33',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '52',
                'ingredient_header_id' => '33',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '54',
                'ingredient_header_id' => '33',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '33',
                'quantity' => '2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '154',
                'ingredient_header_id' => '34',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '155',
                'ingredient_header_id' => '34',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '156',
                'ingredient_header_id' => '34',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '128',
                'ingredient_header_id' => '34',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '158',
                'ingredient_header_id' => '35',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '159',
                'ingredient_header_id' => '35',
                'quantity' => '1',
                'unit' => 'ikat'
            ],
            [
                'ingredient_id' => '160',
                'ingredient_header_id' => '35',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '161',
                'ingredient_header_id' => '35',
                'quantity' => '200',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '162',
                'ingredient_header_id' => '35',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '163',
                'ingredient_header_id' => '35',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '164',
                'ingredient_header_id' => '35',
                'quantity' => '1',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '165',
                'ingredient_header_id' => '35',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '166',
                'ingredient_header_id' => '35',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '167',
                'ingredient_header_id' => '35',
                'quantity' => '2',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '168',
                'ingredient_header_id' => '35',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '169',
                'ingredient_header_id' => '36',
                'quantity' => '3',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '36',
                'quantity' => '1',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '170',
                'ingredient_header_id' => '36',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '67',
                'ingredient_header_id' => '36',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '115',
                'ingredient_header_id' => '36',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '164',
                'ingredient_header_id' => '36',
                'quantity' => '1',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '171',
                'ingredient_header_id' => '37',
                'quantity' => '500',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '37',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '72',
                'ingredient_header_id' => '37',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '172',
                'ingredient_header_id' => '37',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '173',
                'ingredient_header_id' => '37',
                'quantity' => 'secukupnya',
                'unit' => 'null'
            ],
            [
                'ingredient_id' => '174',
                'ingredient_header_id' => '38',
                'quantity' => '1',
                'unit' => 'kilogram'
            ],
            [
                'ingredient_id' => '175',
                'ingredient_header_id' => '38',
                'quantity' => '1,5',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '176',
                'ingredient_header_id' => '39',
                'quantity' => '500',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '177',
                'ingredient_header_id' => '39',
                'quantity' => '50',
                'unit' => 'gram '
            ],
            [
                'ingredient_id' => '178',
                'ingredient_header_id' => '39',
                'quantity' => '15',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '179',
                'ingredient_header_id' => '39',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '12',
                'ingredient_header_id' => '39',
                'quantity' => '2',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '127',
                'ingredient_header_id' => '39',
                'quantity' => '2',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '102',
                'ingredient_header_id' => '40',
                'quantity' => '10',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '40',
                'quantity' => '5',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '40',
                'quantity' => '3',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '180',
                'ingredient_header_id' => '40',
                'quantity' => '2',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '53',
                'ingredient_header_id' => '40',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '181',
                'ingredient_header_id' => '40',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '40',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '128',
                'ingredient_header_id' => '40',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '182',
                'ingredient_header_id' => '41',
                'quantity' => '200',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '183',
                'ingredient_header_id' => '41',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '35',
                'ingredient_header_id' => '41',
                'quantity' => '30',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '29',
                'ingredient_header_id' => '41',
                'quantity' => '2',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '41',
                'ingredient_header_id' => '41',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '34',
                'ingredient_header_id' => '41',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '184',
                'ingredient_header_id' => '41',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '185',
                'ingredient_header_id' => '41',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '41',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '67',
                'ingredient_header_id' => '42',
                'quantity' => '150',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '42',
                'quantity' => '160',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '69',
                'ingredient_header_id' => '42',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '186',
                'ingredient_header_id' => '42',
                'quantity' => '2',
                'unit' => 'tetes'
            ],
            [
                'ingredient_id' => '187',
                'ingredient_header_id' => '43',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '188',
                'ingredient_header_id' => '44',
                'quantity' => 'secukupmya',
                'unit' => null
            ],
            [
                'ingredient_id' => '189',
                'ingredient_header_id' => '44',
                'quantity' => '3',
                'unit' => 'ikat'
            ],
            [
                'ingredient_id' => '190',
                'ingredient_header_id' => '44',
                'quantity' => '3',
                'unit' => 'ikat'
            ],
            [
                'ingredient_id' => '191',
                'ingredient_header_id' => '44',
                'quantity' => '1',
                'unit' => 'ikat'
            ],
            [
                'ingredient_id' => '192',
                'ingredient_header_id' => '44',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '44',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '193',
                'ingredient_header_id' => '45',
                'quantity' => '1/2',
                'unit' => 'liter'
            ],
            [
                'ingredient_id' => '128',
                'ingredient_header_id' => '45',
                'quantity' => '1',
                'unit' => 'bungkus'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '45',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '194',
                'ingredient_header_id' => '46',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '123',
                'ingredient_header_id' => '46',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '195',
                'ingredient_header_id' => '47',
                'quantity' => '300',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '196',
                'ingredient_header_id' => '47',
                'quantity' => '40',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '47',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '197',
                'ingredient_header_id' => '47',
                'quantity' => '160',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '29',
                'ingredient_header_id' => '47',
                'quantity' => '1',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '198',
                'ingredient_header_id' => '47',
                'quantity' => '4-5',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '35',
                'ingredient_header_id' => '47',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '8',
                'ingredient_header_id' => '47',
                'quantity' => '1',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '199',
                'ingredient_header_id' => '47',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '200',
                'ingredient_header_id' => '48',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '196',
                'ingredient_header_id' => '49',
                'quantity' => '600',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '49',
                'quantity' => '600',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '201',
                'ingredient_header_id' => '49',
                'quantity' => '600',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '109',
                'ingredient_header_id' => '49',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '49',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '202',
                'ingredient_header_id' => '49',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '39',
                'ingredient_header_id' => '50',
                'quantity' => '300',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '203',
                'ingredient_header_id' => '50',
                'quantity' => '150',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '204',
                'ingredient_header_id' => '50',
                'quantity' => '75',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '205',
                'ingredient_header_id' => '50',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '69',
                'ingredient_header_id' => '51',
                'quantity' => '1',
                'unit' => 'kilogram'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '51',
                'quantity' => '750',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '206',
                'ingredient_header_id' => '51',
                'quantity' => '1',
                'unit' => 'perasan dari'
            ],
            [
                'ingredient_id' => '207',
                'ingredient_header_id' => '52',
                'quantity' => '250',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '52',
                'quantity' => '350',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '69',
                'ingredient_header_id' => '52',
                'quantity' => '125',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '35',
                'ingredient_header_id' => '52',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '208',
                'ingredient_header_id' => '52',
                'quantity' => '65',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '209',
                'ingredient_header_id' => '53',
                'quantity' => '2',
                'unit' => 'bungkus'
            ],
            [
                'ingredient_id' => '210',
                'ingredient_header_id' => '53',
                'quantity' => '800',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '211',
                'ingredient_header_id' => '53',
                'quantity' => '150',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '212',
                'ingredient_header_id' => '53',
                'quantity' => '200',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '8',
                'ingredient_header_id' => '53',
                'quantity' => '2',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '213',
                'ingredient_header_id' => '53',
                'quantity' => '4',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '214',
                'ingredient_header_id' => '53',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '215',
                'ingredient_header_id' => '53',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '216',
                'ingredient_header_id' => '54',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '54',
                'quantity' => '600',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '217',
                'ingredient_header_id' => '54',
                'quantity' => '1',
                'unit' => 'sachet (65 ml)'
            ],
            [
                'ingredient_id' => '218',
                'ingredient_header_id' => '54',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '54',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '219',
                'ingredient_header_id' => '55',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '67',
                'ingredient_header_id' => '55',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '55',
                'quantity' => '400',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '77',
                'ingredient_header_id' => '55',
                'quantity' => '1',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '217',
                'ingredient_header_id' => '56',
                'quantity' => '1',
                'unit' => 'sachet (65 ml)'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '56',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '77',
                'ingredient_header_id' => '56',
                'quantity' => '1',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '56',
                'quantity' => '1/4',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '220',
                'ingredient_header_id' => '57',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '66',
                'ingredient_header_id' => '58',
                'quantity' => '250',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '217',
                'ingredient_header_id' => '58',
                'quantity' => '260',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '58',
                'quantity' => '600',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '67',
                'ingredient_header_id' => '58',
                'quantity' => '500',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '169',
                'ingredient_header_id' => '58',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '58',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '77',
                'ingredient_header_id' => '58',
                'quantity' => '3',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '221',
                'ingredient_header_id' => '59',
                'quantity' => '250',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '222',
                'ingredient_header_id' => '59',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '223',
                'ingredient_header_id' => '59',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '224',
                'ingredient_header_id' => '60',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '225',
                'ingredient_header_id' => '61',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '104',
                'ingredient_header_id' => '62',
                'quantity' => '75',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '109',
                'ingredient_header_id' => '62',
                'quantity' => '65',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '67',
                'ingredient_header_id' => '62',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '226',
                'ingredient_header_id' => '62',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '12',
                'ingredient_header_id' => '63',
                'quantity' => '400',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '63',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '67',
                'ingredient_header_id' => '63',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '77',
                'ingredient_header_id' => '63',
                'quantity' => '1',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '228',
                'ingredient_header_id' => '64',
                'quantity' => '4',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '229',
                'ingredient_header_id' => '64',
                'quantity' => '800',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '104',
                'ingredient_header_id' => '64',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '64',
                'quantity' => '1/2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '230',
                'ingredient_header_id' => '64',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '231',
                'ingredient_header_id' => '64',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '108',
                'ingredient_header_id' => '64',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '232',
                'ingredient_header_id' => '65',
                'quantity' => '1',
                'unit' => 'ekor'
            ],
            [
                'ingredient_id' => '233',
                'ingredient_header_id' => '66',
                'quantity' => '200',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '234',
                'ingredient_header_id' => '66',
                'quantity' => '500',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '8',
                'ingredient_header_id' => '66',
                'quantity' => '2',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '131',
                'ingredient_header_id' => '66',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '235',
                'ingredient_header_id' => '66',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '236',
                'ingredient_header_id' => '66',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '67',
                'ingredient_header_id' => '66',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '237',
                'ingredient_header_id' => '66',
                'quantity' => '200',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '238',
                'ingredient_header_id' => '67',
                'quantity' => '3',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '115',
                'ingredient_header_id' => '67',
                'quantity' => '5',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '239',
                'ingredient_header_id' => '67',
                'quantity' => '4',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '35',
                'ingredient_header_id' => '67',
                'quantity' => '3',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '235',
                'ingredient_header_id' => '67',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '240',
                'ingredient_header_id' => '67',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '241',
                'ingredient_header_id' => '68',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '242',
                'ingredient_header_id' => '68',
                'quantity' => 'secukpnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '243',
                'ingredient_header_id' => '68',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '8',
                'ingredient_header_id' => '69',
                'quantity' => '6',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '69',
                'quantity' => '3',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '69',
                'quantity' => '3',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '244',
                'ingredient_header_id' => '69',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '165',
                'ingredient_header_id' => '69',
                'quantity' => '2',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '245',
                'ingredient_header_id' => '69',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '246',
                'ingredient_header_id' => '69',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '247',
                'ingredient_header_id' => '69',
                'quantity' => '65',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '248',
                'ingredient_header_id' => '69',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '249',
                'ingredient_header_id' => '69',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '69',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '67',
                'ingredient_header_id' => '69',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '250',
                'ingredient_header_id' => '69',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '69',
                'quantity' => '300',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '72',
                'ingredient_header_id' => '70',
                'quantity' => '200',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '251',
                'ingredient_header_id' => '70',
                'quantity' => '1',
                'unit' => 'potong'
            ],
            [
                'ingredient_id' => '252',
                'ingredient_header_id' => '70',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '253',
                'ingredient_header_id' => '70',
                'quantity' => '50',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '254',
                'ingredient_header_id' => '70',
                'quantity' => '700',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '255',
                'ingredient_header_id' => '70',
                'quantity' => '2',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '256',
                'ingredient_header_id' => '70',
                'quantity' => '3',
                'unit' => 'potong'
            ],
            [
                'ingredient_id' => '12',
                'ingredient_header_id' => '70',
                'quantity' => '300',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '257',
                'ingredient_header_id' => '71',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '258',
                'ingredient_header_id' => '71',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '53',
                'ingredient_header_id' => '71',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '71',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '259',
                'ingredient_header_id' => '71',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '47',
                'ingredient_header_id' => '72',
                'quantity' => '1',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '13',
                'ingredient_header_id' => '72',
                'quantity' => '1',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '91',
                'ingredient_header_id' => '72',
                'quantity' => '1',
                'unit' => 'iris'
            ],
            [
                'ingredient_id' => '83',
                'ingredient_header_id' => '72',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '260',
                'ingredient_header_id' => '73',
                'quantity' => '2',
                'unit' => 'tangkai'
            ],
            [
                'ingredient_id' => '261',
                'ingredient_header_id' => '73',
                'quantity' => '225',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '73',
                'quantity' => 'sesuai kebutuhan',
                'unit' => null
            ],
            [
                'ingredient_id' => '262',
                'ingredient_header_id' => '74',
                'quantity' => '400',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '263',
                'ingredient_header_id' => '74',
                'quantity' => '600',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '264',
                'ingredient_header_id' => '74',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '250',
                'ingredient_header_id' => '74',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '265',
                'ingredient_header_id' => '74',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '266',
                'ingredient_header_id' => '74',
                'quantity' => '5',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '71',
                'ingredient_header_id' => '74',
                'quantity' => '3',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '267',
                'ingredient_header_id' => '74',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '75',
                'quantity' => '7',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '75',
                'quantity' => '6',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '101',
                'ingredient_header_id' => '75',
                'quantity' => '3',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '268',
                'ingredient_header_id' => '75',
                'quantity' => '6',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '88',
                'ingredient_header_id' => '75',
                'quantity' => '5',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '76',
                'quantity' => '1,5',
                'unit' => 'liter'
            ],
            [
                'ingredient_id' => '269',
                'ingredient_header_id' => '76',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '270',
                'ingredient_header_id' => '76',
                'quantity' => '1',
                'unit' => 'biji'
            ],
            [
                'ingredient_id' => '271',
                'ingredient_header_id' => '76',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '272',
                'ingredient_header_id' => '76',
                'quantity' => '150',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '273',
                'ingredient_header_id' => '76',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '274',
                'ingredient_header_id' => '77',
                'quantity' => '250',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '275',
                'ingredient_header_id' => '77',
                'quantity' => '250',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '276',
                'ingredient_header_id' => '77',
                'quantity' => '1',
                'unit' => 'batang'
            ],
            [
                'ingredient_id' => '47',
                'ingredient_header_id' => '77',
                'quantity' => '3',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '277',
                'ingredient_header_id' => '77',
                'quantity' => '1/2',
                'unit' => 'potong'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '77',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '278',
                'ingredient_header_id' => '77',
                'quantity' => '2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '279',
                'ingredient_header_id' => '77',
                'quantity' => '3',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '280',
                'ingredient_header_id' => '77',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '115',
                'ingredient_header_id' => '77',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '281',
                'ingredient_header_id' => '77',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '282',
                'ingredient_header_id' => '77',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '283',
                'ingredient_header_id' => '77',
                'quantity' => '1',
                'unit' => 'batang'
            ],
            [
                'ingredient_id' => '165',
                'ingredient_header_id' => '77',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '78',
                'quantity' => '2',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '20',
                'ingredient_header_id' => '78',
                'quantity' => '4',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '22',
                'ingredient_header_id' => '78',
                'quantity' => '8',
                'unit' => 'tangkai'
            ],
            [
                'ingredient_id' => '284',
                'ingredient_header_id' => '78',
                'quantity' => '10',
                'unit' => 'tangkai'
            ],
            [
                'ingredient_id' => '71',
                'ingredient_header_id' => '78',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '285',
                'ingredient_header_id' => '79',
                'quantity' => '8',
                'unit' => 'lembar'
            ],
            [
                'ingredient_id' => '286',
                'ingredient_header_id' => '79',
                'quantity' => '125',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '287',
                'ingredient_header_id' => '79',
                'quantity' => '1/2',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '288',
                'ingredient_header_id' => '79',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '300',
                'ingredient_header_id' => '79',
                'quantity' => '1',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '278',
                'ingredient_header_id' => '79',
                'quantity' => '1/2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '289',
                'ingredient_header_id' => '79',
                'quantity' => '1/2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '238',
                'ingredient_header_id' => '79',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '109',
                'ingredient_header_id' => '79',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '290',
                'ingredient_header_id' => '80',
                'quantity' => '14',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '288',
                'ingredient_header_id' => '80',
                'quantity' => '1',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '285',
                'ingredient_header_id' => '80',
                'quantity' => '1/2',
                'unit' => 'butir'
            ],
            [
                'ingredient_id' => '278',
                'ingredient_header_id' => '80',
                'quantity' => '1/2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '289',
                'ingredient_header_id' => '80',
                'quantity' => '1/2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '238',
                'ingredient_header_id' => '80',
                'quantity' => '1/2',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '109',
                'ingredient_header_id' => '80',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '235',
                'ingredient_header_id' => '81',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '81',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '287',
                'ingredient_header_id' => '81',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '248',
                'ingredient_header_id' => '81',
                'quantity' => 'secukupnya',
                'unit' => null
            ],
            [
                'ingredient_id' => '291',
                'ingredient_header_id' => '82',
                'quantity' => '500',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '292',
                'ingredient_header_id' => '82',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '293',
                'ingredient_header_id' => '82',
                'quantity' => '250',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '82',
                'quantity' => '1 1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '213',
                'ingredient_header_id' => '82',
                'quantity' => '1 1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '287',
                'ingredient_header_id' => '82',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '248',
                'ingredient_header_id' => '82',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '82',
                'quantity' => '400',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '134',
                'ingredient_header_id' => '82',
                'quantity' => '100',
                'unit' => 'mililiter'
            ],
            [
                'ingredient_id' => '294',
                'ingredient_header_id' => '82',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '102',
                'ingredient_header_id' => '83',
                'quantity' => '10',
                'unit' => 'biji'
            ],
            [
                'ingredient_id' => '91',
                'ingredient_header_id' => '83',
                'quantity' => '4',
                'unit' => 'cm'
            ],
            [
                'ingredient_id' => '165',
                'ingredient_header_id' => '83',
                'quantity' => '1',
                'unit' => 'buah'
            ],
            [
                'ingredient_id' => '295',
                'ingredient_header_id' => '83',
                'quantity' => '4',
                'unit' => 'biji'
            ],
            [
                'ingredient_id' => '11',
                'ingredient_header_id' => '84',
                'quantity' => '500',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '39',
                'ingredient_header_id' => '84',
                'quantity' => '30',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '3',
                'ingredient_header_id' => '84',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '287',
                'ingredient_header_id' => '84',
                'quantity' => '1',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '296',
                'ingredient_header_id' => '84',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '275',
                'ingredient_header_id' => '84',
                'quantity' => '1/2',
                'unit' => 'bagian'
            ],
            [
                'ingredient_id' => '21',
                'ingredient_header_id' => '84',
                'quantity' => '3',
                'unit' => 'siung'
            ],
            [
                'ingredient_id' => '297',
                'ingredient_header_id' => '84',
                'quantity' => '5',
                'unit' => 'sendok makan'
            ],
            [
                'ingredient_id' => '298',
                'ingredient_header_id' => '84',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '299',
                'ingredient_header_id' => '84',
                'quantity' => '100',
                'unit' => 'gram'
            ],
            [
                'ingredient_id' => '300',
                'ingredient_header_id' => '84',
                'quantity' => '2',
                'unit' => 'batang'
            ],
            [
                'ingredient_id' => '301',
                'ingredient_header_id' => '84',
                'quantity' => '1/2',
                'unit' => 'sendok teh'
            ],
            [
                'ingredient_id' => '82',
                'ingredient_header_id' => '84',
                'quantity' => '1',
                'unit' => 'liter'
            ],
            [
                'ingredient_id' => '302',
                'ingredient_header_id' => '84',
                'quantity' => '1',
                'unit' => 'sendok makan'
            ],
        ]);
    }
}
