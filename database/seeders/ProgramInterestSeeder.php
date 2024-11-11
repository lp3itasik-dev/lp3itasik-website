<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProgramInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('program_interests')->insert([
            [
                'program_id' => 1,
                'name' => 'Digital Marketing',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 1,
                'name' => 'Marketing Office Administration',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 1,
                'name' => 'Retail Marketing',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 2,
                'name' => 'Manajemen Keuangan',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 2,
                'name' => 'Manajemen Keuangan',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 2,
                'name' => 'Manajemen Perpajakan',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 3,
                'name' => 'Informatika Komputer',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 4,
                'name' => 'Administrasi Bisnis',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 4,
                'name' => 'Administrasi Perkantoran',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 5,
                'name' => 'Teknik Otomotif',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 6,
                'name' => 'Akuntansi',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 7,
                'name' => 'Office Management',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 8,
                'name' => 'Bisnis Digital',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 9,
                'name' => 'Digital Marketing',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 9,
                'name' => 'Marketing Office Administration',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 9,
                'name' => 'Retail Marketing',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 10,
                'name' => 'Administrasi Bisnis',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 10,
                'name' => 'Administrasi Perkantoran',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 11,
                'name' => 'Manajemen Keuangan',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 11,
                'name' => 'Manajemen Perbankan',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 11,
                'name' => 'Manajemen Perpajakan',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 12,
                'name' => 'Informatika Komputer',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 13,
                'name' => 'Teknik Informatika',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 14,
                'name' => 'Digital Marketing',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'program_id' => 14,
                'name' => 'Marketing Office Administration',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],
        ]);
    }
}
