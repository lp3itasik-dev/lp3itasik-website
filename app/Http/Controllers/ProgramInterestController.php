<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramInterest;
use Illuminate\Http\Request;

class ProgramInterestController extends Controller
{
    public function create($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.interests.create', compact('program'));
    }

    public function edit($id)
    {
        $interest = ProgramInterest::findOrFail($id);
        $program = Program::where('id', $interest->program_id)->first();
        return view('programs.interests.edit', compact(['interest', 'program']));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'program_id' => 'required|exists:programs,id',
                'name' => 'required|max:100|min:2',
            ],
            [
                'program_id.required' => 'Program is required',
                'program_id.exists' => 'Program does not exist',
                'name.required' => 'Name is required',
                'name.max' => 'Name should not be more than 100 characters',
                'name.min' => 'Name should not be less than 2 characters',
            ],
        );

        try {
            $data = [
                'program_id' => $request->program_id,
                'name' => $request->name,
                'status' => 1,
            ];

            ProgramInterest::create($data);

            return redirect()
                ->route('programs.show', $request->program_id)
                ->with([
                    'message' => 'Program interest created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programs.show', $request->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programs.show', $request->program_id)
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
                'name' => 'required|max:100|min:2',
            ],
            [
                'name.required' => 'Name is required',
                'name.max' => 'Name should not be more than 100 characters',
                'name.min' => 'Name should not be less than 2 characters',
            ],
        );

        try {
            $data = [
                'name' => $request->name,
                'status' => 1,
            ];

            $interest = ProgramInterest::findOrFail($id);
            $interest->update($data);

            return redirect()
                ->route('programs.show', $interest->program_id)
                ->with([
                    'message' => 'Program interest created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programs.show', $interest->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programs.show', $interest->program_id)
                ->with([
                    'message' => 'An unexpected error occurred. Please try again later.',
                    'alert-type' => 'failed',
                ]);
        }
    }

    public function updatestatus($id)
    {
        $interest = ProgramInterest::findOrFail($id);
        $interest->update([
            'status' => !$interest->status,
        ]);

        return redirect()
            ->route('programs.show', $interest->program_id)
            ->with([
                'message' => 'Program interest status updated successfully',
                'alert-type' => 'success',
            ]);
    }

    public function destroy($id, $program_id)
    {
        $interest = ProgramInterest::findOrFail($id);
        $interest->delete();

        return redirect()
            ->route('programs.show', $program_id)
            ->with([
                'message' => 'Program interest deleted successfully',
                'alert-type' => 'success',
            ]);
    }
}
