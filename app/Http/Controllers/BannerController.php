<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller {
    public function index() {
        $banner_query = Banner::query();
        $total = Banner::count();
        $banners = $banner_query->paginate( 5 );
        return view( 'banners.index', compact( [ 'banners', 'total' ] ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return view( 'banners.create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
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
                $request->image->move( public_path( 'images/banners' ), $imageName );
                $data[ 'image' ] = 'images/banners/' . $imageName;
            }

            Banner::create( $data );

            return redirect()
            ->route( 'banners.index' )
            ->with( [
                'message' => 'Banner created successfully',
                'alert-type' => 'success',
            ] );
        } catch ( \Illuminate\Database\QueryException $e ) {
            if ( $e->errorInfo[ 1 ] == 1062 ) {
                return redirect()
                ->route( 'banners.index' )
                ->with( [
                    'message' => 'Code already exists. Please use a different code.',
                    'alert-type' => 'failed',
                ] );
            }

            return redirect()
            ->route( 'banners.index' )
            ->with( [
                'message' => 'An unexpected error occurred. Please try again later.',
                'alert-type' => 'failed',
            ] );
        }
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
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

            $banner = Banner::findOrFail( $id );

            $banner->update( $data );

            return redirect()
            ->route( 'banners.index' )
            ->with( [
                'message' => 'Banner updated successfully',
                'alert-type' => 'success',
            ] );
        } catch ( \Illuminate\Database\QueryException $e ) {
            if ( $e->errorInfo[ 1 ] == 1062 ) {
                return redirect()
                ->route( 'banners.index' )
                ->with( [
                    'message' => 'Code already exists. Please use a different code.',
                    'alert-type' => 'failed',
                ] );
            }

            return redirect()
            ->route( 'banners.index' )
            ->with( [
                'message' => 'An unexpected error occurred. Please try again later.',
                'alert-type' => 'failed',
            ] );
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $banner = Banner::findOrFail( $id );

        if ( $banner->image ) {
            File::delete(public_path($banner->image));
        }

        $banner->delete();

        return redirect()
        ->route( 'banners.index' )
        ->with( [
            'message' => 'Banner deleted successfully',
            'alert-type' => 'success',
        ] );
    }

    public function updatestatus( $id ) {
        $banner = Banner::findOrFail( $id );
        $banner->update( [
            'status' => !$banner->status,
        ] );

        return redirect()
        ->route( 'banners.index' )
        ->with( [
            'message' => 'Banner status updated successfully',
            'alert-type' => 'success',
        ] );
    }
}
