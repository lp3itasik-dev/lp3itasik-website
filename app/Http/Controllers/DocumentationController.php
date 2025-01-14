<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentation_query = Documentation::query();
        $total = Documentation::count();
        $documentations = $documentation_query->paginate( 5 );
        return view( 'documentations.index', compact( [ 'documentations', 'total' ] ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'documentations.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'type' => 'required|max:10|min:1',
                'status' => 'boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'type.required' => 'Type is required',
                'type.max' => 'Type should not be more than 10 characters',
                'type.min' => 'Type should not be less than 1 characters',
                'status.boolean' => 'Status should be boolean',
                'image.image' => 'Image should be an image',
            ],
        );

        try {
            $data = [
                'type' => $request->type,
                'status' => 1,
            ];
            if ( $request->hasFile( 'image' ) ) {
                $imageName = Str::uuid() . '.' . $request->image->extension();
                $request->image->move( public_path( 'images/documentations' ), $imageName );
                $data[ 'image' ] = 'images/documentations/' . $imageName;
            }

            Documentation::create( $data );

            return redirect()
            ->route( 'documentations.index' )
            ->with( [
                'message' => 'Documentation created successfully',
                'alert-type' => 'success',
            ] );
        } catch ( \Illuminate\Database\QueryException $e ) {
            if ( $e->errorInfo[ 1 ] == 1062 ) {
                return redirect()
                ->route( 'documentations.index' )
                ->with( [
                    'message' => 'Code already exists. Please use a different code.',
                    'alert-type' => 'failed',
                ] );
            }

            return redirect()
            ->route( 'documentations.index' )
            ->with( [
                'message' => 'An unexpected error occurred. Please try again later.',
                'alert-type' => 'failed',
            ] );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $documentation = Documentation::findOrFail($id);
        return view('documentations.edit', compact('documentation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'type' => 'required|max:10|min:1',
            ],
            [
                'type.required' => 'Type is required',
                'type.max' => 'Type should not be more than 10 characters',
                'type.min' => 'Type should not be less than 1 characters',
            ],
        );

        try {
            $data = [
                'type' => $request->type,
            ];

            $documentation = Documentation::findOrFail( $id );

            $documentation->update( $data );

            return redirect()
            ->route( 'documentations.index' )
            ->with( [
                'message' => 'Documentation updated successfully',
                'alert-type' => 'success',
            ] );
        } catch ( \Illuminate\Database\QueryException $e ) {
            if ( $e->errorInfo[ 1 ] == 1062 ) {
                return redirect()
                ->route( 'documentations.index' )
                ->with( [
                    'message' => 'Code already exists. Please use a different code.',
                    'alert-type' => 'failed',
                ] );
            }

            return redirect()
            ->route( 'documentations.index' )
            ->with( [
                'message' => 'An unexpected error occurred. Please try again later.',
                'alert-type' => 'failed',
            ] );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $documentation = Documentation::findOrFail( $id );

        if ( $documentation->image ) {
            File::delete(public_path($documentation->image));
        }

        $documentation->delete();

        return redirect()
        ->route( 'documentations.index' )
        ->with( [
            'message' => 'Documentation deleted successfully',
            'alert-type' => 'success',
        ] );
    }

    public function updatestatus( $id ) {
        $documentation = Documentation::findOrFail( $id );
        $documentation->update( [
            'status' => !$documentation->status,
        ] );

        return redirect()
        ->route( 'documentations.index' )
        ->with( [
            'message' => 'Documentation status updated successfully',
            'alert-type' => 'success',
        ] );
    }
}
