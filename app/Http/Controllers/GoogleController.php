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
            $user = User::where('email', $google_user->email)->first();
            if ($user) {
                Auth::login($user);
                return redirect('dashboard');
            } else {
                $new_user = User::create([
                    'first_name' => ucwords($google_user->user['given_name']),
                    'last_name' => ucwords($google_user->user['family_name']),
                    'email' => $google_user->email,
                    'user_type' => 'User',
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
