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
        'status'
    ];

    public function programInterests()
    {
        return $this->hasMany(ProgramInterest::class);
    }
}
