<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramInterest extends Model
{
    protected $fillable = [
        'program_id',
        'name',
        'status'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
