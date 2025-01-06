<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramAlumni extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramAlumnusFactory> */
    use HasFactory;

    protected $fillable = [
        'program_id',
        'photo',
        'name',
        'school',
        'work',
        'profession',
        'quote',
        'status',
    ];

    protected $table = 'program_alumni';

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
