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
            $find_user = DB::table('users')->where('email','=',$user->email)->get();

            // if I cant find a user already in the DB with that email
            if(empty($find_user[0])){
                $newUser = new User;
                $newUser->email = $user->email;
                $newUser->name = $user->name;
                $newUser->google_id = $user->id;
                $newUser->email_verified_at = now();
                $newUser->password = 'password';
                $newUser->save();
                $newUserArr = array($newUser->email, $newUser->google_id, $newUser->name);
                dd($newUserArr . " new user has been created with these details");
            }else{
                    // if google id is empty and user found
                if(empty($find_user[0]->google_id)){
                    DB::table('users')->where('email','=', $user->email )->update(['google_id' => $user->id]);
                    dd('updated google_id');
                }else{
                    // if google id is not empty and user found
                    if($find_user[0]->google_id = $user->id){
                        dd($find_user[0]->name. ' has logged in');
                    }else{
                        dd('an error occured');
                    }
                }
            
            }

        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
