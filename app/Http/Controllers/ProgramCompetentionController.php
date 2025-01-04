<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramCompetention;
use Illuminate\Http\Request;

class ProgramCompetentionController extends Controller
{
    public function create($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.competentions.create', compact('program'));
    }

    public function edit($id)
    {
        $competention = ProgramCompetention::findOrFail($id);
        $program = Program::where('id', $competention->program_id)->first();
        return view('programs.competentions.edit', compact(['competention', 'program']));
    }

    public function show($id)
    {
        $competentions = ProgramCompetention::where(['program_id' => $id])->paginate(5);
        $total = ProgramCompetention::where(['program_id' => $id])->count();
        $program = Program::findOrFail($id);
        return view('programs.competentions.show', compact(['competentions', 'program', 'total']));
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

            ProgramCompetention::create($data);

            return redirect()
                ->route('programcompetentions.show', $request->program_id)
                ->with([
                    'message' => 'Program competention created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programcompetentions.show', $request->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programcompetentions.show', $request->program_id)
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

            $data = ProgramCompetention::findOrFail($id);
            $data->update($data);

            return redirect()
                ->route('programcompetentions.show', $data->program_id)
                ->with([
                    'message' => 'Program competention created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programcompetentions.show', $data->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programcompetentions.show', $data->program_id)
                ->with([
                    'message' => 'An unexpected error occurred. Please try again later.',
                    'alert-type' => 'failed',
                ]);
        }
    }

    public function updatestatus($id)
    {
        $data = ProgramCompetention::findOrFail($id);
        $data->update([
            'status' => !$data->status,
        ]);

        return redirect()
            ->route('programcompetentions.show', $data->program_id)
            ->with([
                'message' => 'Program competention status updated successfully',
                'alert-type' => 'success',
            ]);
    }

    public function destroy($id, $program_id)
    {
        $data = ProgramCompetention::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('programcompetentions.show', $program_id)
            ->with([
                'message' => 'Program competention deleted successfully',
                'alert-type' => 'success',
            ]);
    }
}
