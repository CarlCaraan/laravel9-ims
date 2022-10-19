<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInquiry;
use App\Models\PdsFormList;
use App\Models\UserRequestServiceRecord;

class DashboardController extends Controller
{
    public function ViewDashboard()
    {
        // Recent Users
        $allData['users'] = User::latest()->get()->take(3);
        $allData['inquiries'] = UserInquiry::latest()->get()->take(5);

        // Count System Roles
        $allData['adminCount'] = User::where('user_type', 'Admin')->count();
        $allData['hrCount'] = User::where('user_type', 'HR')->count();
        $allData['userCount'] = User::where('user_type', 'User')->count();

        // Count PDS Stats
        $allData['pdsPendingCount'] = PdsFormList::where('pds_status', 'For Verification')->count();
        $allData['pdsVerifiedCount'] = PdsFormList::where('pds_status', 'Verified')->count();
        $allData['pdsInvalidCount'] = PdsFormList::where('pds_status', 'Invalid')->count();

        // Count SR Stats
        $allData['srPendingCount'] = UserRequestServiceRecord::where('service_record_status', 'Pending')->count();
        $allData['srCompletedCount'] = UserRequestServiceRecord::where('service_record_status', 'Completed')->count();
        $allData['srArchivedCount'] = UserRequestServiceRecord::where('archived', 'Yes')->count();

        // dd($allData['users']);
        return view('admin.index', $allData);
    } // End Method
}
