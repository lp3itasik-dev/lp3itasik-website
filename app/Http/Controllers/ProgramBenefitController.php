<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramBenefit;
use Illuminate\Http\Request;

class ProgramBenefitController extends Controller
{
    public function create($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.benefits.create', compact('program'));
    }

    public function edit($id)
    {
        $benefit = ProgramBenefit::findOrFail($id);
        $program = Program::where('id', $benefit->program_id)->first();
        return view('programs.benefits.edit', compact(['benefit', 'program']));
    }

    public function show($id)
    {
        $benefits = ProgramBenefit::where(['program_id' => $id])->paginate(5);
        $total = ProgramBenefit::where(['program_id' => $id])->count();
        $program = Program::findOrFail($id);
        return view('programs.benefits.show', compact(['benefits', 'program', 'total']));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'program_id' => 'required|exists:programs,id',
                'name' => 'required|min:2',
            ],
            [
                'program_id.required' => 'Program is required',
                'program_id.exists' => 'Program does not exist',
                'name.required' => 'Name is required',
                'name.min' => 'Name should not be less than 2 characters',
            ],
        );

        try {
            $data = [
                'program_id' => $request->program_id,
                'name' => $request->name,
                'status' => 1,
            ];

            ProgramBenefit::create($data);

            return redirect()
                ->route('programbenefits.show', $request->program_id)
                ->with([
                    'message' => 'Program benefit created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programbenefits.show', $request->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programbenefits.show', $request->program_id)
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
                'name' => 'required|min:2',
            ],
            [
                'name.required' => 'Name is required',
                'name.min' => 'Name should not be less than 2 characters',
            ],
        );

        try {
            $data = [
                'name' => $request->name,
                'status' => 1,
            ];

            $data = ProgramBenefit::findOrFail($id);
            $data->update($data);

            return redirect()
                ->route('programbenefits.show', $data->program_id)
                ->with([
                    'message' => 'Program benefit created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programbenefits.show', $data->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programbenefits.show', $data->program_id)
                ->with([
                    'message' => 'An unexpected error occurred. Please try again later.',
                    'alert-type' => 'failed',
                ]);
        }
    }

    public function updatestatus($id)
    {
        $data = ProgramBenefit::findOrFail($id);
        $data->update([
            'status' => !$data->status,
        ]);

        return redirect()
            ->route('programbenefits.show', $data->program_id)
            ->with([
                'message' => 'Program benefit status updated successfully',
                'alert-type' => 'success',
            ]);
    }

    public function destroy($id, $program_id)
    {
        $data = ProgramBenefit::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('programbenefits.show', $program_id)
            ->with([
                'message' => 'Program benefit deleted successfully',
                'alert-type' => 'success',
            ]);
    }
}
