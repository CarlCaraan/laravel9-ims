<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Str;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function  callback()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->fields([
                'first_name',
                'last_name',
                'email',
            ])->stateless()->user();
            // dd($facebook_user);
            $user = User::where('identifier', $facebook_user->id)->first();
            $user_local = User::where('identifier', 'local')->where('email', $facebook_user->email)->first();
            if ($user) {
                Auth::login($user);
                return redirect('dashboard');
            } else if ($user_local) {
                return redirect()->route('login')->withErrors(['msg' => 'Email already exist. Please use sign in form instead!']);;
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
                    'first_name' => ucwords($facebook_user->user['first_name']),
                    'last_name' => ucwords($facebook_user->user['last_name']),
                    'email' => $facebook_user->email,
                    'user_type' => 'User',
                    'identifier' => $facebook_user->id,
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
