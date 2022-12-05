<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\Like;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\log;
use Illuminate\Support\Facades\DB;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        log::info($user->id);
        return Inertia::render('Chirps/Index',[
            'chirps' => Chirp::with('user:id,name,username,email')->latest()->get(),
            'user' => $request->user()
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
    }


    public function update(Request $request, Chirp $chirp){
        $this->authorize('update', $chirp);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $chirp->update($validated);
 
        return redirect(route('chirps.index'));
    }
    

    public function destroy(Chirp $chirp){
        
        $this->authorize('delete', $chirp);
        log::info($chirp);
        $chirp->delete();
        return redirect(route('chirps.index'));
    }


}
