<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
                "admin_id" => "1",
                "ahli_gizi_id" => "2",
                "category_id" => "1",
                "sub_category_1_id" => "5",
                "sub_category_2_id" => "10",
                "name" => "Nasi Goreng",
                "description" => "Nasi goreng adalah makanan yang terbuat dari nasi yang digoreng dan diaduk dalam minyak goreng, biasanya ditambah kecap manis, bawang merah, bawang putih, merica, garam, cabai, irisan daging ayam, telur, dan sayuran.",
                "duration" => "30",
                "serving" => "1",
                "img" => "storage/recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => true,
                "is_verified_by_ahli_gizi" => true,
                "type" => "public",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "user_id" => "3",
                "admin_id" => "1",
                "ahli_gizi_id" => "2",
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => null,
                "name" => "gorengan",
                "description" => "gorengan adalah makanan yang terbuat dari tepung",
                "duration" => "30",
                "serving" => "5",
                "img" => "storage/recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => true,
                "is_verified_by_ahli_gizi" => true,
                "type" => "public",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "user_id" => "4",
                "admin_id" => "1",
                "ahli_gizi_id" => "2",
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => null,
                "name" => "bebek ala po",
                "description" => "bebek ala po adalah makanan yang terbuat dari bebek",
                "duration" => "100",
                "serving" => "1",
                "img" => "storage/recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => true,
                "is_verified_by_ahli_gizi" => true,
                "type" => "public",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "user_id" => "4",
                "admin_id" => "1",
                "ahli_gizi_id" => "2",
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => null,
                "name" => "ketoprak rahasia",
                "description" => "tidak diberi tahu",
                "duration" => "100",
                "serving" => "1",
                "img" => "storage/recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => false,
                "is_verified_by_ahli_gizi" => false,
                "type" => "public",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
