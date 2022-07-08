<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function Logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect()->route('login');
    }

    public function ChangePasswordLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login')->with('success', 'User Password Updated Successfully');
    }
}
