<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $search_val = request('search');
        $programs_query = Program::query();
        if ($search_val) {
            $programs_query->where('title', 'like', '%' . $search_val . '%');
        }
        $total = Program::count();
        $programs = $programs_query->with('programInterests')->paginate(5);
        return view('programs.index', compact(['programs', 'total']));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate(
            [
                'code' => 'required|max:10|min:4|unique:programs',
                'title' => 'required|max:100|min:2',
                'campus' => 'required|max:100|min:2',
                'level' => 'required|max:100|min:2',
                'type' => 'required|max:10|min:1',
                'vision' => 'nullable',
                'description' => 'nullable',
                'status' => 'boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'accreditation' => 'nullable',
                'accreditation_file' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            ],
            [
                'code.required' => 'Code is required',
                'code.max' => 'Code should not be more than 10 characters',
                'code.min' => 'Code should not be less than 4 characters',
                'code.unique' => 'Code already exists',
                'title.required' => 'Title is required',
                'title.max' => 'Title should not be more than 100 characters',
                'title.min' => 'Title should not be less than 10 characters',
                'campus.required' => 'Campus is required',
                'campus.max' => 'Campus should not be more than 100 characters',
                'campus.min' => 'Campus should not be less than 2 characters',
                'level.required' => 'Level is required',
                'level.max' => 'Level should not be more than 100 characters',
                'level.min' => 'Level should not be less than 2 characters',
                'type.required' => 'Type is required',
                'type.max' => 'Type should not be more than 10 characters',
                'type.min' => 'Type should not be less than 1 characters',
                'status.boolean' => 'Status should be boolean',
                'image.image' => 'Image should be an image',
                'accreditation_file.mimes' => 'Accreditation should be an image or pdf',
            ],
        );

        try {
            $data = [
                'code' => $request->code,
                'title' => $request->title,
                'campus' => $request->campus,
                'level' => $request->level,
                'type' => $request->type,
                'vision' => $request->vision,
                'accreditation' => $request->accreditation,
                'description' => $request->description,
                'status' => 1,
            ];

            if($request->hasFile('image')){
                $imageName = Str::uuid() . '.' . $request->image->extension();
                $request->image->move( public_path( 'images/programs' ), $imageName );
                $data[ 'image' ] = 'images/programs/' . $imageName;
            }

            if($request->hasFile('accreditation_file')){
                $accreditationName = Str::uuid() . '.' . $request->accreditation_file->extension();
                $request->accreditation_file->move( public_path( 'accreditation' ), $accreditationName );
                $data[ 'accreditation_file' ] = 'accreditation/' . $accreditationName;
            }

            Program::create($data);

            return redirect()
                ->route('programs.index')
                ->with([
                    'message' => 'Program created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programs.index')
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programs.index')
                ->with([
                    'message' => 'An unexpected error occurred. Please try again later.',
                    'alert-type' => 'failed',
                ]);
        }
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $program = Program::findOrFail($id);
        $search_val = request('search');
        $interest_query = ProgramInterest::query();
        if ($search_val) {
            $interest_query->where('name', 'like', '%' . $search_val . '%');
        }
        $total = ProgramInterest::count();
        $interests = $interest_query->where('program_id', $id)->paginate(5);
        return view('programs.show', compact(['program', 'interests', 'total']));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'code' => 'required|max:10|min:4|unique:programs,code,' . $id,
                'title' => 'required|max:100|min:2',
                'campus' => 'required|max:100|min:2',
                'level' => 'required|max:100|min:2',
                'type' => 'required|max:10|min:1',
                'vision' => 'nullable',
                'description' => 'nullable',
                'status' => 'boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'accreditation' => 'nullable',
                'accreditation_file' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            ],
            [
                'code.required' => 'Code is required',
                'code.max' => 'Code should not be more than 10 characters',
                'code.min' => 'Code should not be less than 4 characters',
                'code.unique' => 'Code already exists',
                'title.required' => 'Title is required',
                'title.max' => 'Title should not be more than 100 characters',
                'title.min' => 'Title should not be less than 10 characters',
                'campus.required' => 'Campus is required',
                'campus.max' => 'Campus should not be more than 100 characters',
                'campus.min' => 'Campus should not be less than 2 characters',
                'level.required' => 'Level is required',
                'level.max' => 'Level should not be more than 100 characters',
                'level.min' => 'Level should not be less than 2 characters',
                'type.required' => 'Type is required',
                'type.max' => 'Type should not be more than 10 characters',
                'type.min' => 'Type should not be less than 1 characters',
                'status.boolean' => 'Status should be boolean',
                'image.image' => 'Image should be an image',
                'accreditation.mimes' => 'Accreditation should be an image or pdf',
            ],
        );

        try {
            $data = [
                'code' => $request->code,
                'title' => $request->title,
                'campus' => $request->campus,
                'level' => $request->level,
                'type' => $request->type,
                'vision' => $request->vision,
                'accreditation' => $request->accreditation,
                'description' => $request->description,
                'status' => 1,
            ];

            $program = Program::findOrFail($id);

            if($request->hasFile('image')){
                if ($program->image && file_exists(public_path($program->image))) {
                    unlink(public_path($program->image));
                }

                $imageName = Str::uuid() . '.' . $request->image->extension();
                $request->image->move( public_path( 'images/programs' ), $imageName );
                $data[ 'image' ] = 'images/programs/' . $imageName;
            }

            if($request->hasFile('accreditation_file')){
                if ($program->accreditation_file && file_exists(public_path($program->accreditation_file))) {
                    unlink(public_path($program->accreditation_file));
                }

                $accreditationName = Str::uuid() . '.' . $request->accreditation_file->extension();
                $request->accreditation_file->move( public_path( 'accreditations' ), $accreditationName );
                $data[ 'accreditation_file' ] = 'accreditations/' . $accreditationName;
            }

            $program->update($data);

            return redirect()
                ->route('programs.index')
                ->with([
                    'message' => 'Program updated successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programs.index')
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programs.index')
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
        $program = Program::findOrFail($id);

        if($program->image){
            Storage::disk('public')->delete($program->image);
        }

        $program->delete();

        return redirect()
            ->route('programs.index')
            ->with([
                'message' => 'Program deleted successfully',
                'alert-type' => 'success',
            ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function updatestatus($id)
    {
        $program = Program::findOrFail($id);
        $program->update([
            'status' => !$program->status,
        ]);

        return redirect()
            ->route('programs.index')
            ->with([
                'message' => 'Program status updated successfully',
                'alert-type' => 'success',
            ]);
    }
}
