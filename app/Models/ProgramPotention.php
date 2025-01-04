<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPotention extends Model
{
    protected $fillable = [
        'program_id',
        'name',
        'status'
    ];

    protected $table = 'program_potentions';

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
