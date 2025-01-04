<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramBenefit extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramBenefitFactory> */
    use HasFactory;

    protected $fillable = [
        'program_id',
        'name',
        'status'
    ];

    protected $table = 'program_benefits';

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
