<?php

namespace App\Http\Controllers;

use App\Models\BoulderGym;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BoulderGymController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('BoulderGyms/Index', [
            'boulderGyms' => BoulderGym::all()->map(function (BoulderGym $boulderGym) {
                return [
                    'id' => $boulderGym->id,
                    'name' => $boulderGym->name,
                    'detailUrl' => route('boulder-gyms.show', ['boulder_gym' => $boulderGym->id])
                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoulderGym  $boulderGym
     * @return \Inertia\Response
     */
    public function show(BoulderGym $boulderGym)
    {
        return Inertia::render('BoulderGyms/Detail', [
            'boulderGym' => $boulderGym->load('boulderProblems')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoulderGym  $boulderGym
     * @return \Illuminate\Http\Response
     */
    public function edit(BoulderGym $boulderGym)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoulderGym  $boulderGym
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoulderGym $boulderGym)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoulderGym  $boulderGym
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoulderGym $boulderGym)
    {
        //
    }
}
