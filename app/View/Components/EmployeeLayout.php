<?php

namespace App\View\Components;

use App\Models\Program;
use Illuminate\View\Component;
use Illuminate\View\View;

class EmployeeLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */

    public function render(): View
    {
        $programs_plt = Program::where([
            'status' => '1',
            'type' => 'N',
            'level' => 'D3',
            'campus' => 'Kampus Tasikmalaya'
        ])->get();
        $programs_plb = Program::where([
            'status' => '1',
            'type' => 'N',
            'level' => 'D3',
            'campus' => 'Kampus Utama'
        ])->get();
        $programs_plt_vokasi = Program::where([
            'status' => '1',
            'type' => 'N',
            'level' => 'Vokasi 2 Tahun',
            'campus' => 'LP3I Tasikmalaya'
        ])->get();
        return view('layouts.employee', compact(['programs_plt', 'programs_plb', 'programs_plt_vokasi']));
    }
}
