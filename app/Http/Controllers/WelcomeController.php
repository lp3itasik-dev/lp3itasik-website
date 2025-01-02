<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramInterest;
use Illuminate\Http\Request;

class WelcomeController extends Controller {
    public function index() {
        $programs_plt = Program::where( [
            'status' => '1',
            'type' => 'R',
            'level' => 'D3',
            'campus' => 'Kampus Tasikmalaya'
        ] )->get();
        $programs_plb = Program::where( [
            'status' => '1',
            'type' => 'R',
            'level' => 'D3',
            'campus' => 'Kampus Utama'
        ] )->get();
        $programs_plt_vokasi = Program::where( [
            'status' => '1',
            'type' => 'R',
            'level' => 'Vokasi 2 Tahun',
            'campus' => 'LP3I Tasikmalaya'
        ] )->get();
        return view( 'welcome', compact( [ 'programs_plt', 'programs_plb', 'programs_plt_vokasi' ] ) );
    }

    public function employee() {
        $programs_plt = Program::where( [
            'status' => '1',
            'type' => 'N',
            'level' => 'D3',
            'campus' => 'Kampus Tasikmalaya'
        ] )->get();
        $programs_plb = Program::where( [
            'status' => '1',
            'type' => 'N',
            'level' => 'D3',
            'campus' => 'Kampus Utama'
        ] )->get();
        $programs_plt_vokasi = Program::where( [
            'status' => '1',
            'type' => 'N',
            'level' => 'Vokasi 2 Tahun',
            'campus' => 'LP3I Tasikmalaya'
        ] )->get();
        return view( 'employee', compact( [ 'programs_plt', 'programs_plb', 'programs_plt_vokasi' ] ) );
    }

    public function about() {
        return view( 'about' );
    }

    public function career_center() {
        return view( 'career-center' );
    }

    public function ormawa() {
        return view( 'ormawa' );
    }

    public function program_studi($code) {
        $program = Program::with('programInterests')->where( 'code', $code )->firstOrFail();
        $program_view = $program->type == 'N' ? 'program-studi-employee' : 'program-studi';
        // dd($program);
        return view( $program_view, compact( 'program' ) );
    }

    public function redirect_link() {
        return view( 'redirect' );
    }
}
