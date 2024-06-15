<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                "name" => "Royco",
                "img_logo" => "storage/companyAssets/company1/logo.png",
                "img_banner" => "storage/companyAssets/company1/banner.png"
            ],
            [
                "name" => "Bango",
                "img_logo" => "storage/companyAssets/company2/logo.png",
                "img_banner" => "storage/companyAssets/company2/banner.png"
            ]
        ]);
    }
}
