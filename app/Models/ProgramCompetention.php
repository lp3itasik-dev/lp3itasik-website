<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCompetention extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramCompetitionFactory> */
    use HasFactory;

    protected $fillable = [
        'program_id',
        'name',
        'status'
    ];

    protected $table = 'program_competentions';

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
