<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('wadimor'),
            'role' => 'admin',
            'accountStatus' => 'verified',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Ahli Gizi 1',
            'email' => 'ahligizi1@gmail.com',
            'password' => bcrypt('wadimor'),
            'role' => 'ahli_gizi',
            'accountStatus' => 'verified',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'CahayaGemilang',
            'email' => 'CahayaGemilang@gmail.com',
            'password' => bcrypt('CahayaGemilang'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'NusantaraJaya',
            'email' => 'NusantaraJaya@gmail.com',
            'password' => bcrypt('NusantaraJaya'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'BumiMaju',
            'email' => 'BumiMaju@gmail.com',
            'password' => bcrypt('BumiMaju'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'LangitBiru',
            'email' => 'LangitBiru@gmail.com',
            'password' => bcrypt('LangitBiru'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'PermaiSejahtera',
            'email' => 'PermaiSejahtera@gmail.com',
            'password' => bcrypt('PermaiSejahtera'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'MawarMerah',
            'email' => 'MawarMerah@gmail.com',
            'password' => bcrypt('MawarMerah'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'JayaMakmur',
            'email' => 'JayaMakmur@gmail.com',
            'password' => bcrypt('JayaMakmur'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'PelangiIndah',
            'email' => 'PelangiIndah@gmail.com',
            'password' => bcrypt('PelangiIndah'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'PulauTerang',
            'email' => 'PulauTerang@gmail.com',
            'password' => bcrypt('PulauTerang'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'GemaLestari',
            'email' => 'GemaLestari@gmail.com',
            'password' => bcrypt('GemaLestari'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
