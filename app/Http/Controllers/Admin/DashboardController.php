<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInquiry;

class DashboardController extends Controller
{
    public function ViewDashboard()
    {
        // Recent Users
        $allData['users'] = User::latest()->get()->take(3);
        $allData['inquiries'] = UserInquiry::latest()->get()->take(3);

        // Count System Roles
        $allData['adminCount'] = User::where('user_type', 'Admin')->count();
        $allData['hrCount'] = User::where('user_type', 'HR')->count();
        $allData['userCount'] = User::where('user_type', 'User')->count();

        // dd($allData['users']);
        return view('admin.index', $allData);
    } // End Method
}
