<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoulderGym extends Model
{
    protected $fillable = [
        'name',
        'lat',
        'lng'
    ];

    public function boulderProblems()
    {
        return $this->hasMany(BoulderProblem::class);
    }
}
