<?php

namespace App\Http\Controllers;

use App\Models\BoulderProblem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'grade' => [
                'required',
                Rule::in(['4', '5', '6a', '6a+', '6b', '6b+', '6c', '6c+'])
            ]
        ]);

        BoulderProblem::create(array_merge($request->all(), ['user_id' => $request->user()->id]));

        return redirect()->route('boulder-gyms.show', ['boulder_gym' => $request->get('boulder_gym_id')]);
    }

    public function top(Request $request, BoulderProblem $boulderProblem)
    {
        $request->validateWithBag('topBoulder', [
            'top' => 'required|boolean'
        ]);

        $isTopped = $request->get('top');

        if ($isTopped) {
            $boulderProblem->usersThatToppedProblem()->attach($request->user()->id);
        } else {
            $boulderProblem->usersThatToppedProblem()->detach([$request->user()->id]);
        }

        return redirect()->route('boulder-gyms.show', ['boulder_gym' => $boulderProblem->boulder_gym_id]);
    }
}
