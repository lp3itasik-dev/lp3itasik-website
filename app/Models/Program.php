<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'code',
        'title',
        'campus',
        'level',
        'image',
        'type',
        'vision',
        'status'
    ];

    protected $table = 'programs';

    public function programInterests()
    {
        return $this->hasMany(ProgramInterest::class);
    }

    public function programPotentions()
    {
        return $this->hasMany(ProgramPotention::class);
    }

    public function programMissions()
    {
        return $this->hasMany(ProgramMission::class);
    }

    public function programBenefits()
    {
        return $this->hasMany(ProgramBenefit::class);
    }

    public function programCompetentions()
    {
        return $this->hasMany(ProgramCompetention::class);
    }

    public function programAlumnis()
    {
        return $this->hasMany(ProgramAlumni::class);
    }
}
