<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramPotention;
use Illuminate\Http\Request;

class ProgramPotentionController extends Controller
{
    public function create($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.potentions.create', compact('program'));
    }

    public function edit($id)
    {
        $potention = ProgramPotention::findOrFail($id);
        $program = Program::where('id', $potention->program_id)->first();
        return view('programs.potentions.edit', compact(['potention', 'program']));
    }

    public function show($id)
    {
        $potentions = ProgramPotention::where(['program_id' => $id])->paginate(5);
        $total = ProgramPotention::where(['program_id' => $id])->count();
        $program = Program::findOrFail($id);
        return view('programs.potentions.show', compact(['potentions', 'program', 'total']));
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

            ProgramPotention::create($data);

            return redirect()
                ->route('programpotentions.show', $request->program_id)
                ->with([
                    'message' => 'Program potention created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programpotentions.show', $request->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programpotentions.show', $request->program_id)
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

            $potention = ProgramPotention::findOrFail($id);
            $potention->update($data);

            return redirect()
                ->route('programpotentions.show', $potention->program_id)
                ->with([
                    'message' => 'Program potention created successfully',
                    'alert-type' => 'success',
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()
                    ->route('programpotentions.show', $potention->program_id)
                    ->with([
                        'message' => 'Code already exists. Please use a different code.',
                        'alert-type' => 'failed',
                    ]);
            }

            return redirect()
                ->route('programpotentions.show', $potention->program_id)
                ->with([
                    'message' => 'An unexpected error occurred. Please try again later.',
                    'alert-type' => 'failed',
                ]);
        }
    }

    public function updatestatus($id)
    {
        $potention = ProgramPotention::findOrFail($id);
        $potention->update([
            'status' => !$potention->status,
        ]);

        return redirect()
            ->route('programpotentions.show', $potention->program_id)
            ->with([
                'message' => 'Program potention status updated successfully',
                'alert-type' => 'success',
            ]);
    }

    public function destroy($id, $program_id)
    {
        $potention = ProgramPotention::findOrFail($id);
        $potention->delete();

        return redirect()
            ->route('programpotentions.show', $program_id)
            ->with([
                'message' => 'Program potention deleted successfully',
                'alert-type' => 'success',
            ]);
    }
}
