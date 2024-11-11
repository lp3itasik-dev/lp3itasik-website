<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $search_val = request('search');
        $programs_query = Program::query();
        if($search_val){
            $programs_query->where('title', 'like', '%' . $search_val . '%');
        }
        $total = Program::count();
        $programs = $programs_query->with( 'programInterests' )->paginate( 5 );
        return view( 'programs.index', compact( ['programs','total'] ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return view( 'programs.create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    */

    public function show( Program $program ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( Program $program ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, Program $program ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( Program $program ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function updatestatus( $id ) {
        $program = Program::findOrFail( $id );
        $program->update([
            'status' => !$program->status
        ]);

        return redirect()->route( 'programs.index' )->with([
            'message' => 'Program status updated successfully',
            'alert-type' => 'success'
        ]);
    }
}
