<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function loginWithGoogle(){
        return Socialite::driver('google')->redirect();
    }


    public function callbackFromGoogle(Request $request){ 

        try {
            // get user info
            $user = Socialite::driver('google')->stateless()->user();

            // check database if there's an email matching the one from $user
            $is_user = DB::table('users')->where('email','=',$user->email)->get();

            // update or create user based on search result
            log::info($is_user);
            array_push($is_user,"pushing");
            if(isEmpty($is_user)){
                log::info("It is empty");
            }else{
                log::info("it is not empty");
            }

            // if(!$is_user){
            //     $newUser = User::updateOrCreate([
            //         'google_id'=>$user->id
            //     ],[
            //         'name'=> $user->name,
            //         'email'=> $user->email,
            //         'password'=> 'password',
            //     ]);

            //     // Auth::loginUsingId($newUser->id);
            //     // return redirect()->route('dashboard');

            // }else{
            //     $newUser = User::where('email',$user->email)->update([
            //         'google_id'=>  $user->id,
            //     ]);
            //     $newUser = User::where('email',$user->email);
            // }
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
