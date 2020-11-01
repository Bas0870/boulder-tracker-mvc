<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoulderProblem extends Model
{
    protected $fillable = [
        'boulder_gym_id',
        'user_id',
        'image',
        'grade'
    ];

    public function boulderGym()
    {
        return $this->belongsTo(BoulderProblem::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function usersThatToppedProblem()
    {
        return $this->belongsToMany(User::class, 'boulder_problem_user');
    }
}
