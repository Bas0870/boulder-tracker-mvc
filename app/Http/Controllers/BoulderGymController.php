<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoulderGymResource;
use App\Models\BoulderGym;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BoulderGymController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $query = $request->get('q');
            $boulderGyms = BoulderGym::where('name', 'like', $query . '%')->get();
        } else {
            $boulderGyms = BoulderGym::all();
        }

        return Inertia::render('BoulderGyms/Index', [
            'boulderGyms' => BoulderGymResource::collection($boulderGyms),
            'searchQuery' => $request->get('q')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validateWithBag('createBoulderGym', [
            'name' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        BoulderGym::create($request->all());

        return redirect()->route('boulder-gyms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoulderGym  $boulderGym
     * @return \Inertia\Response
     */
    public function show(BoulderGym $boulderGym)
    {
        $boulderGym->load('boulderProblems', 'boulderProblems.creator');

        return Inertia::render('BoulderGyms/Detail', [
            'boulderGym' => new BoulderGymResource($boulderGym)
        ]);
    }
}
