<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\LikeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\DB;


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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('chirps', ChirpController::class)
->only(['index', 'store', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::get('/unavailable', function () { 
    return Inertia::render('FeatureUnavailable');
})->name('unavailable');
    
Route::post('/like', function(Request $request){
        $like = new Like;
        $like->kf_user_id = $request->userId;
        $like->kf_chirp_id = $request->chirpId;
        $like->save();
        return redirect(route('chirps.index'));
})->name("like");

Route::post('/removelike', function(Request $request){
    $like = DB::table('likes')
    ->where('kf_user_id', '=', $request->userId)
    ->where('kf_chirp_id', '=', $request->chirpId)
    ->delete();
    // log::info($like->id);
})->name("removeLike");

require __DIR__.'/auth.php';