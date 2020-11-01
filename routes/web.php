<?php

use App\Http\Controllers\BoulderGymController;
use App\Http\Controllers\BoulderProblemController;
use App\Models\BoulderGym;
use App\Models\BoulderProblem;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/boulder-gyms', [BoulderGymController::class, 'index'])->name('boulder-gyms.index');
    Route::post('/boulder-gyms', [BoulderGymController::class, 'store'])->middleware('can:create,' . BoulderGym::class);
    Route::get('/boulder-gyms/{boulder_gym}', [BoulderGymController::class, 'show'])->name('boulder-gyms.show');

    Route::post('/boulder-problems', [BoulderProblemController::class, 'store'])->middleware('can:create,' . BoulderProblem::class);
    Route::post('/boulder-problems/{boulder_problem}/top', [BoulderProblemController::class, 'top']);
});
