<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function  callback()
    {
        try {
            // $google_user = Socialite::driver('google')->user();
            $google_user = Socialite::driver('google')->stateless()->user();
            // dd($google_user);
            $user = User::where('identifier', $google_user->id)->first();
            $user_local = User::where('identifier', 'local')->first();
            if ($user) {
                Auth::login($user);
                return redirect('dashboard');
            } else if ($user_local) {
                return redirect()->route('login')->withErrors(['msg' => 'Account already exist. Please use sign in form instead!']);
            } else {
                // Generete Tracking Id
                $check_user_exist = User::orderBy('id', 'DESC')->first();
                if ($check_user_exist == NULL) {
                    $first_register = 0;
                    $user_id = $first_register + 1;
                    if ($user_id < 10) {
                        $tracking_id = '0000' . $user_id;
                    } elseif ($user_id < 100) {
                        $tracking_id = '000' . $user_id;
                    } elseif ($user_id < 1000) {
                        $tracking_id = '00' . $user_id;
                    } elseif ($user_id < 10000) {
                        $tracking_id = '0' . $user_id;
                    }
                } else {
                    $exist_user = User::orderBy('id', 'DESC')->first()->id;
                    $user_id = $exist_user + 1;
                    if ($user_id < 10) {
                        $tracking_id = '0000' . $user_id;
                    } elseif ($user_id < 100) {
                        $tracking_id = '000' . $user_id;
                    } elseif ($user_id < 1000) {
                        $tracking_id = '00' . $user_id;
                    } elseif ($user_id < 10000) {
                        $tracking_id = '0' . $user_id;
                    }
                }

                $new_user = User::create([
                    'first_name' => ucwords($google_user->user['given_name']),
                    'last_name' => ucwords($google_user->user['family_name']),
                    'email' => $google_user->email,
                    'user_type' => 'User',
                    'identifier' => $google_user->id,
                    'tracking_id' => date('Y') . "-" . $tracking_id,
                    'email_verified_at' => date('Y-m-d H:i:s'),
                    'remember_token' => Str::random(10),
                ]);
                Auth::login($new_user);
                return redirect('dashboard');
            }
        } catch (\Throwable $th) {
            abort(404);
        }
    }
}
