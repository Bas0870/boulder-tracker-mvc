<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoulderProblem extends Model
{
    public function boulderGym()
    {
        return $this->belongsTo(BoulderProblem::class);
    }
}
