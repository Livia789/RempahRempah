<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            [
                "user_id" => "3",
                "recipe_name" => "Nasi Goreng",
                "recipe_description" => "Nasi goreng adalah makanan yang terbuat dari nasi yang digoreng dan diaduk dalam minyak goreng, biasanya ditambah kecap manis, bawang merah, bawang putih, merica, garam, cabai, irisan daging ayam, telur, dan sayuran.",
                "recipe_time" => "30",
                "recipe_image" => "/assets/logo_rempah.png",
                "recipe_video" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "recipe_type" => "public",
                "admin_id" => "1",
                "ahli_gizi_id" => "2",
                "special_occasion_id" => "1",
                "daerah_id" => "1",
                "category_id" => "1"
            ],
            [
                "user_id" => "3",
                "recipe_name" => "gorengan",
                "recipe_description" => "gorengan adalah makanan yang terbuat dari tepung",
                "recipe_time" => "30",
                "recipe_image" => "/assets/logo_rempah.png",
                "recipe_video" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "recipe_type" => "public",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "special_occasion_id" => null,
                "daerah_id" => null,
                "category_id" => "2"
            ],
            [
                "user_id" => "4",
                "recipe_name" => "bebek ala po",
                "recipe_description" => "bebek ala po adalah makanan yang terbuat dari bebek",
                "recipe_time" => "100",
                "recipe_image" => "/assets/logo_rempah.png",
                "recipe_video" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "recipe_type" => "public",
                "admin_id" => 1,
                "ahli_gizi_id" => 2,
                "special_occasion_id" => null,
                "daerah_id" => null,
                "category_id" => "2"
            ],
            [
                "user_id" => "4",
                "recipe_name" => "ketoprak rahasia",
                "recipe_description" => "tidak diberi tahu",
                "recipe_time" => "100",
                "recipe_image" => "/assets/logo_rempah.png",
                "recipe_video" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "recipe_type" => "public",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "special_occasion_id" => null,
                "daerah_id" => null,
                "category_id" => "2"
            ],
        ]);
    }
}
