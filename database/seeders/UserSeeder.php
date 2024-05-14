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
            'role' => 'ahligizi',
            'accountStatus' => 'verified',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Lala',
            'email' => 'lalaaa@gmail.com',
            'password' => bcrypt('kuning'),
            'accountStatus' => 'verified',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Po',
            'email' => 'po@gmail.com',
            'password' => bcrypt('merah'),
            'accountStatus' => 'verified',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


    }
}
