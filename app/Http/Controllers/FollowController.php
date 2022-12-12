<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class FollowController extends Controller

{
    public function index(Request $request){

        return Inertia::render('Dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check if user is following already
        $result = DB::table('follow')
                ->where('follower','=', $request->follower)
                ->where('kf_user_id','=', $request->kf_user_id)->get();

        if(count($result) == 0){
            $follow = new Follow;
            $follow->follower = $request->follower;
            $follow->kf_user_id = $request->kf_user_id;
            $follow->save();
        }else{
            DB::table('follow')
                ->where('follower','=', $request->follower)
                ->where('kf_user_id','=', $request->kf_user_id)->delete();
        }
    }
}
