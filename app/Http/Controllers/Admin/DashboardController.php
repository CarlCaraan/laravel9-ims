<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInquiry;
use App\Models\PdsFormList;
use App\Models\UserRequestServiceRecord;
use Illuminate\Support\Facades\DB;

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

        // Count PDS 
        $allData['pdsPendingCount'] = PdsFormList::where('pds_status', 'For Verification')->count();
        $allData['pdsVerifiedCount'] = PdsFormList::where('pds_status', 'Verified')->count();
        $allData['pdsInvalidCount'] = PdsFormList::where('pds_status', 'Invalid')->count();

        // Count SR 
        $allData['srPendingCount'] = UserRequestServiceRecord::where('service_record_status', 'Pending')->count();
        $allData['srCompletedCount'] = UserRequestServiceRecord::where('service_record_status', 'Completed')->count();
        $allData['srArchivedCount'] = UserRequestServiceRecord::where('archived', 'Yes')->count();

        // ========= Start Average SR Request Per Month =========
        $yearNow = date('Y');

        $queryGettingTotalInMonth = UserRequestServiceRecord::where('service_record_status', 'Pending')
            ->whereYear('created_at', '=', $yearNow);

        $january_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '01')->count();
        $february_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '02')->count();
        $march_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '03')->count();
        $april_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '04')->count();
        $may_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '05')->count();
        $june_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '06')->count();
        $july_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '07')->count();
        $august_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '08')->count();
        $september_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '09')->count();
        $october_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '10')->count();
        $november_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '11')->count();
        $december_sr = $queryGettingTotalInMonth->whereMonth('created_at', '=', '12')->count();

        $allData['average_sr_permonth'] = collect(
            [
                $january_sr, $february_sr, $march_sr, $april_sr, $may_sr, $june_sr,
                $july_sr, $august_sr,  $october_sr, $september_sr, $november_sr, $december_sr,
            ]
        )->avg();

        $allData['sr_total_applicant'] = UserRequestServiceRecord::select('user_id')->groupBy('user_id')->get()->count();

        // ========= End Average SR Request Per Month =========

        return view('admin.index', $allData);
    } // End Method
}
