<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramAlumni;
use Illuminate\Http\Request;

class ProgramAlumniController extends Controller
{
    public function create($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.alumnis.create', compact('program'));
    }

    public function edit($id)
    {
        $alumni = ProgramAlumni::findOrFail($id);
        $program = Program::where('id', $alumni->program_id)->first();
        return view('programs.alumnis.edit', compact(['alumni', 'program']));
    }

    public function show($id)
    {
        $alumnis = ProgramAlumni::where(['program_id' => $id])->paginate(5);
        $total = ProgramAlumni::where(['program_id' => $id])->count();
        $program = Program::findOrFail($id);
        return view('programs.alumnis.show', compact(['alumnis', 'program', 'total']));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'program_id' => 'required|exists:programs,id',
                'photo' => 'nullable',
                'name' => 'required',
                'school' => 'required',
                'work' => 'required',
                'profession' => 'required',
                'quote' => 'required',
            ],
            [
                'program_id.required' => 'Program is required',
                'program_id.exists' => 'Program does not exist',
                'photo.required' => 'Photo is required',
                'name.required' => 'Name is required',
                'name.max' => 'Name should not be more than 100 characters',
                'name.min' => 'Name should not be less than 2 characters',
                'school.required' => 'School is required',
                'work.required' => 'Work is required',
                'profession.required' => 'Profession is required',
                'quote.required' => 'Quote is required',
            ],
        );

        try {
            $data = [
                'program_id' => $request->program_id,
                'photo' => $request->photo,
                'name' => $request->name,
                'school' => $request->school,
                'work' => $request->work,
                'profession' => $request->profession,
                'quote' => $request->quote,
                'status' => 1,
            ];

            ProgramAlumni::create($data);

            return redirect()
                ->route('programalumnis.show', $request->program_id)
                ->with([
                    'message' => 'Program alumni created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programalumnis.show', $request->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programalumnis.show', $request->program_id)
                ->with([
                    'message' => 'An unexpected error occurred. Please try again later.',
                    'alert-type' => 'failed',
                ]);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'photo' => 'nullable',
                'name' => 'required',
                'school' => 'required',
                'work' => 'required',
                'profession' => 'required',
                'quote' => 'required',
            ],
            [
                'photo.required' => 'Photo is required',
                'name.required' => 'Name is required',
                'name.max' => 'Name should not be more than 100 characters',
                'name.min' => 'Name should not be less than 2 characters',
                'school.required' => 'School is required',
                'work.required' => 'Work is required',
                'profession.required' => 'Profession is required',
                'quote.required' => 'Quote is required',
            ],
        );

        try {
            $data = [
                'photo' => $request->photo,
                'name' => $request->name,
                'school' => $request->school,
                'work' => $request->work,
                'profession' => $request->profession,
                'quote' => $request->quote,
                'status' => 1,
            ];

            $alumni = ProgramAlumni::findOrFail($id);
            $alumni->update($data);

            return redirect()
                ->route('programalumnis.show', $alumni->program_id)
                ->with([
                    'message' => 'Program alumni created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programalumnis.show', $alumni->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programalumnis.show', $alumni->program_id)
                ->with([
                    'message' => 'An unexpected error occurred. Please try again later.',
                    'alert-type' => 'failed',
                ]);
        }
    }

    public function updatestatus($id)
    {
        $alumni = ProgramAlumni::findOrFail($id);
        $alumni->update([
            'status' => !$alumni->status,
        ]);

        return redirect()
            ->route('programalumnis.show', $alumni->program_id)
            ->with([
                'message' => 'Program alumni status updated successfully',
                'alert-type' => 'success',
            ]);
    }

    public function destroy($id, $program_id)
    {
        $alumni = ProgramAlumni::findOrFail($id);
        $alumni->delete();

        return redirect()
            ->route('programalumnis.show', $program_id)
            ->with([
                'message' => 'Program alumni deleted successfully',
                'alert-type' => 'success',
            ]);
    }
}
