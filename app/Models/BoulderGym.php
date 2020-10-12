<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoulderGym extends Model
{
    public function boulderProblems()
    {
        return $this->hasMany(BoulderProblem::class);
    }
}
