<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
            [
                'code' => 'MP25',
                'title' => 'Manajemen Pemasaran',
                'campus' => 'Kampus Tasikmalaya',
                'level' => 'D3',
                'type' => 'R',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'MKP24',
                'title' => 'Manajemen Keuangan Perbankan',
                'campus' => 'Kampus Tasikmalaya',
                'level' => 'D3',
                'type' => 'R',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'MI24',
                'title' => 'Manajemen Informatika',
                'campus' => 'Kampus Utama',
                'level' => 'D3',
                'type' => 'R',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'AB24',
                'title' => 'Administrasi Bisnis',
                'campus' => 'Kampus Utama',
                'level' => 'D3',
                'type' => 'R',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'TO25L',
                'title' => 'Teknik Otomotif',
                'campus' => 'LP3I Tasikmalaya',
                'level' => 'Vokasi 2 Tahun',
                'type' => 'R',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'AK24L',
                'title' => 'Akuntansi',
                'campus' => 'LP3I Tasikmalaya',
                'level' => 'Vokasi 2 Tahun',
                'type' => 'R',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'OM24L',
                'title' => 'Office Management',
                'campus' => 'LP3I Tasikmalaya',
                'level' => 'Vokasi 2 Tahun',
                'type' => 'R',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'BD25',
                'title' => 'Bisnis Digital',
                'campus' => 'Kampus Utama',
                'level' => 'S1',
                'type' => 'N',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'MPNR24',
                'title' => 'Manajemen Pemasaran (Karyawan)',
                'campus' => 'Kampus Tasikmalaya',
                'level' => 'D3',
                'type' => 'N',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'ABNR24',
                'title' => 'Administrasi Bisnis (Karyawan)',
                'campus' => 'Kampus Utama',
                'level' => 'D3',
                'type' => 'N',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'MKPNR24',
                'title' => 'Manajemen Keuangan dan Perbankan (Karyawan)',
                'campus' => 'Kampus Tasikmalaya',
                'level' => 'D3',
                'type' => 'N',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'MINR24',
                'title' => 'Manajemen Informatika (Karyawan)',
                'campus' => 'Kampus Utama',
                'level' => 'D3',
                'type' => 'N',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'TI24L',
                'title' => 'Teknik Informatika',
                'campus' => 'LP3I Tasikmalaya',
                'level' => 'Vokasi 2 Tahun',
                'type' => 'R',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'MPRPL24',
                'title' => 'Manajemen Pemasaran (RPL)',
                'campus' => 'Kampus Tasikmalaya',
                'level' => 'D3',
                'type' => 'RPL',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ],[
                'code' => 'MKPRPL24',
                'title' => 'Manajemen Keuangan dan Perbankan (RPL)',
                'campus' => 'Kampus Tasikmalaya',
                'level' => 'D3',
                'type' => 'RPL',
                'status' => true,
                'created_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
                'updated_at' => Carbon::now()->setTimezone( 'Asia/Jakarta' ),
            ]
        ]);
    }
}
