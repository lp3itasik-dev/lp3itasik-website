<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Documentation;
use App\Models\Program;
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
            'campus' => 'Kampus Utama'
        ] )->get();
        $programs_plt_vokasi = Program::where( [
            'status' => '1',
            'type' => 'R',
            'level' => 'Vokasi 2 Tahun',
            'campus' => 'LP3I Tasikmalaya'
        ] )->get();
        $banners = Banner::all();
        $documentations = Documentation::where('type', 'R')->get();
        return view( 'welcome', compact( [ 'programs_plt', 'programs_plb', 'programs_plt_vokasi', 'documentations', 'banners' ] ) );
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
            'campus' => 'Kampus Utama'
        ] )->get();
        $programs_plt_vokasi = Program::where( [
            'status' => '1',
            'type' => 'N',
            'level' => 'Vokasi 2 Tahun',
            'campus' => 'LP3I Tasikmalaya'
        ] )->get();
        $documentations = Documentation::where('type', 'N')->get();
        return view( 'employee', compact( [ 'programs_plt', 'programs_plb', 'programs_plt_vokasi', 'documentations' ] ) );
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
        $program = Program::with(['programInterests','programPotentions','programMissions','programBenefits','programCompetentions','programAlumnis'])->where( 'code', $code )->firstOrFail();
        $documentations = Documentation::where('type', $program->type)->get();
        $program_view = $program->type == 'N' ? 'program-studi-employee' : 'program-studi';
        return view( $program_view, compact( 'program', 'documentations' ) );
    }

    public function redirect_link() {
        return view( 'redirect' );
    }

    public function redirect_one() {
        return view( 'redirect-one' );
    }
}
