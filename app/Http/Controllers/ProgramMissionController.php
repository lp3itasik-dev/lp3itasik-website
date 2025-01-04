<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramMission;
use Illuminate\Http\Request;

class ProgramMissionController extends Controller
{
    public function create($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.missions.create', compact('program'));
    }

    public function edit($id)
    {
        $mission = ProgramMission::findOrFail($id);
        $program = Program::where('id', $mission->program_id)->first();
        return view('programs.missions.edit', compact(['mission', 'program']));
    }

    public function show($id)
    {
        $missions = ProgramMission::where(['program_id' => $id])->paginate(5);
        $total = ProgramMission::where(['program_id' => $id])->count();
        $program = Program::findOrFail($id);
        return view('programs.missions.show', compact(['missions', 'program', 'total']));
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

            ProgramMission::create($data);

            return redirect()
                ->route('programmissions.show', $request->program_id)
                ->with([
                    'message' => 'Program mission created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programmissions.show', $request->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programmissions.show', $request->program_id)
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

            $data = ProgramMission::findOrFail($id);
            $data->update($data);

            return redirect()
                ->route('programmissions.show', $data->program_id)
                ->with([
                    'message' => 'Program mission created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programmissions.show', $data->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programmissions.show', $data->program_id)
                ->with([
                    'message' => 'An unexpected error occurred. Please try again later.',
                    'alert-type' => 'failed',
                ]);
        }
    }

    public function updatestatus($id)
    {
        $data = ProgramMission::findOrFail($id);
        $data->update([
            'status' => !$data->status,
        ]);

        return redirect()
            ->route('programmissions.show', $data->program_id)
            ->with([
                'message' => 'Program mission status updated successfully',
                'alert-type' => 'success',
            ]);
    }

    public function destroy($id, $program_id)
    {
        $data = ProgramMission::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('programmissions.show', $program_id)
            ->with([
                'message' => 'Program mission deleted successfully',
                'alert-type' => 'success',
            ]);
    }
}
