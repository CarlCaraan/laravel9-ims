<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserHomeController extends Controller
{
    public function UserHome()
    {
        $id = Auth::user()->id;
        $allData['user'] = User::find($id);
        return view('user.index', $allData);
    } // End Method
}
