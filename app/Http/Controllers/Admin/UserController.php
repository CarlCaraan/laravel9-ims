<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        // $allData = User::all();
        $data['allData'] = User::all();
        return view('admin.user.view_user', $data);
    }

    public function UserAdd()
    {
        return view('admin.user.add_user');
    }
}
