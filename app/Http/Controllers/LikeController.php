<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\log;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        
        $like = new Like;
        $like->kf_user_id = $request->userId;
        $like->kf_chirp_id = $request->chirpId;
        $like->save();
        return redirect(route('chirps.index'));
        
        log::info("its working");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function removeLike(Request $request)
    {
        // log::info(  $this->authorize('delete', $like) );
        log::info($request);
        // $like->delete();
        // return redirect(route('chirps.index'));
    }
}
