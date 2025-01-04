<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramMission extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramMissionsFactory> */
    use HasFactory;

    protected $fillable = [
        'program_id',
        'name',
        'status'
    ];

    protected $table = 'program_missions';

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
