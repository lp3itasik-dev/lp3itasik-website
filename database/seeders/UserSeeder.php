<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        DB::table( 'users' )->insert( [
            [
                'name' => 'Administrator',
                'email' => 'lp3itasik@gmail.com',
                'password' => Hash::make( 'mimin311' ),
                'role' => 'A',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'name' => 'Badan Eksekutif Mahasiswa',
                'email' => 'bemlp3itasik@gmail.com',
                'password' => Hash::make( 'bem12345' ),
                'role' => 'O',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],
        ] );
    }
}
