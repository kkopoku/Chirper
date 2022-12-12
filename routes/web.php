<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\FollowController;
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

Route::get('/', function (Request $request) {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION
    ]);
})->name('index');

Route::get('/dashboard', function(Request $request){
    return Inertia::render('Dashboard');
})
->name('dashboard');


Route::resource('chirps', ChirpController::class)
->only(['index', 'store', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::get('/unavailable', function () { 
    return Inertia::render('FeatureUnavailable');
})->name('unavailable');
    
Route::resource('like', LikeController::class)->only(['store']);

Route::resource('follow', FollowController::class)->only(['store']);

Route::get('/account', function(Request $request){
    return Inertia::render('Account', $request);
});

require __DIR__.'/auth.php';