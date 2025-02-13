<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $search_val = request('search');
        $query = Link::query();
        if ($search_val) {
            $query->where('name', 'like', '%' . $search_val . '%');
        }
        $total = Link::count();
        $links = $query->paginate(5);
        return view('links.index', compact(['links', 'total']));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate(
            [
                'code' => 'required|unique:links',
                'name' => 'required',
                'url' => 'required|url',
            ],
            [
                'code.required' => 'Code is required',
                'code.unique' => 'Code already exists',
                'name.required' => 'Name is required',
                'url.required' => 'URL is required',
                'url.url' => 'URL is not valid',
            ],
        );

        try {
            $data = [
                'code' => $request->code,
                'name' => $request->name,
                'url' => $request->url,
            ];

            Link::create($data);

            return redirect()
                ->route('links.index')
                ->with([
                    'message' => 'Link created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('links.index')
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('links.index')
                ->with([
                    'message' => 'An unexpected error occurred. Please try again later.',
                    'alert-type' => 'failed',
                ]);
        }
    }

    /**
     * Display the specified resource.
     */

    public function show($code)
    {
        $link = Link::where('code', $code)->firstOrFail();
        return view('links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $link = Link::findOrFail($id);
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:links,code,' . $id,
            'name' => 'required|unique:links,name,' . $id, // Menambahkan unique untuk name
            'url' => 'required|url|unique:links,url,' . $id, // Menambahkan unique untuk url
        ], [
            'code.required' => 'Code is required',
            'code.unique' => 'Code already exists',
            'name.required' => 'Name is required',
            'name.unique' => 'Name already exists',
            'url.required' => 'URL is required',
            'url.url' => 'URL is not valid',
            'url.unique' => 'URL already exists',
        ]);

        try {
            $data = [
                'code' => $request->code,
                'name' => $request->name,
                'url' => $request->url,
            ];

            $link = Link::findOrFail($id);

            $link->update($data);

            return redirect()
                ->route('links.index')
                ->with([
                    'message' => 'Link updated successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('links.index')
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('links.index')
                ->with([
                    'message' => $e->getMessage(),
                    'alert-type' => 'failed',
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $link = Link::findOrFail($id);

        $link->delete();

        return redirect()
            ->route('links.index')
            ->with([
                'message' => 'Link deleted successfully',
                'alert-type' => 'success',
            ]);
    }

    public function view($id): \Illuminate\Http\JsonResponse {
        $link = Link::findOrFail($id);
        $link->update(
            [
                'view' => $link->view + 1
            ]
        );
        return response()->json([
            'message' => 'View updated successfully'
        ], 200);
    }
}
