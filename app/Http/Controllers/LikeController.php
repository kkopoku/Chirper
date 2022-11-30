<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\log;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = DB::table('likes')
            ->where('kf_user_id', '=', $request->kf_user_id)
            ->where('kf_chirp_id', '=', $request->kf_chirp_id)
            ->get();
        log::info(count($result));

        if(count($result) == 0){
            log::info("Liking");
            $like = new Like;
            $like->kf_user_id = $request->kf_user_id;
            $like->kf_chirp_id = $request->kf_chirp_id;
            $like->save();
        }else{
            log::info("Not Liking");
            $like = DB::table('likes')
            ->where('kf_user_id', '=', $request->kf_user_id)
            ->where('kf_chirp_id', '=', $request->kf_chirp_id)
            ->delete();
        }
        return redirect(route('chirps.index'));
    }
}
