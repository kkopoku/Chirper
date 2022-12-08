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
            'chirps' => Chirp::with('user:id,name,username,email')->where('isDeleted','=',null)->latest()->get(),
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

        // find current record
        $result = DB::table('chirps')->where('id','=',$chirp->id)->get();
        log::info($result[0]->message);
        // DB::table('chirps')->where('id','=','c198861a-e4d9-4423-8a6a-ea6cf83597c0')->get();


        // create new record for initial chirp with details and save as the variant
        $variantChirp = new Chirp();
        $variantChirp->user_id = $chirp->user_id;
        $variantChirp->message = $result[0]->message;
        $variantChirp->isDeleted = "yes";
        $variantChirp->variant_of = $chirp->id;
        $variantChirp->save();

        // update curent chirp
        $chirp->update($validated);
 
        return redirect(route('chirps.index'));
    }
    

    public function destroy(Chirp $chirp){
        
        $this->authorize('delete', $chirp);
        log::info($chirp->id);
        // $chirp->delete();
        DB::table('chirps')->where('id','=', $chirp->id )->update(['isDeleted' => 'yes']);
        return redirect(route('chirps.index'));
    }


}
