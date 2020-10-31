<?php

namespace App\Http\Controllers;

use App\Models\BoulderProblem;
use Illuminate\Http\Request;

class BoulderProblemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validateWithBag('createBoulderProblem', [
            'boulder_gym_id' => 'required|exists:boulder_gyms,id',
            'grade' => 'required'
        ]);

        BoulderProblem::create(array_merge($request->all(), ['user_id' => $request->user()->id]));

        return redirect()->route('boulder-gyms.show', ['boulder_gym' => $request->get('boulder_gym_id')]);
    }
}
