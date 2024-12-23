<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $programs_plt = Program::where([
            'status' => '1',
            'type' => 'R',
            'level' => 'D3',
            'campus' => 'Kampus Tasikmalaya'
        ])->get();
        $programs_plb = Program::where([
            'status' => '1',
            'type' => 'R',
            'level' => 'D3',
            'campus' => 'Kampus Utama'
        ])->get();
        $programs_plt_vokasi = Program::where([
            'status' => '1',
            'type' => 'R',
            'level' => 'Vokasi 2 Tahun',
            'campus' => 'LP3I Tasikmalaya'
        ])->get();
        return view('welcome', compact(['programs_plt', 'programs_plb', 'programs_plt_vokasi']));
    }
}
