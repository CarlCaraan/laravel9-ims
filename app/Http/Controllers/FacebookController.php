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
            $user = User::where('email', $facebook_user->email)->first();
            if ($user) {
                Auth::login($user);
                return redirect('dashboard');
            } else {
                $new_user = User::create([
                    'first_name' => ucwords($facebook_user->user['first_name']),
                    'last_name' => ucwords($facebook_user->user['last_name']),
                    'email' => $facebook_user->email,
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
