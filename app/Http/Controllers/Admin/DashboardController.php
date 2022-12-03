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
        $allData['users'] = User::latest()->get()->take(5);
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

        // ========= Start Service Record =========
        $yearNow = date('Y');

        $allData['january_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '01')->count();
        $allData['february_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '02')->count();
        $allData['march_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '03')->count();
        $allData['april_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '04')->count();
        $allData['may_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '05')->count();
        $allData['june_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '06')->count();
        $allData['july_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '07')->count();
        $allData['august_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '08')->count();
        $allData['september_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '09')->count();
        $allData['october_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '10')->count();
        $allData['november_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '11')->count();
        $allData['december_sr'] = UserRequestServiceRecord::where('service_record_status', 'Completed')
            ->whereYear('created_at', '=', $yearNow)->whereMonth('created_at', '=', '12')->count();

        $allData['average_sr_permonth'] = collect(
            [
                $allData['january_sr'], $allData['february_sr'], $allData['march_sr'], $allData['april_sr'], $allData['may_sr'], $allData['june_sr'],
                $allData['july_sr'], $allData['august_sr'], $allData['september_sr'], $allData['october_sr'], $allData['november_sr'], $allData['december_sr'],
            ]
        )->avg();

        $allData['sr_total_applicant'] = UserRequestServiceRecord::select('user_id')->groupBy('user_id')->get()->count();
        // ========= End Service Record =========

        // ========= Start PDS =========
        $allData['january_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '01')->count();
        $allData['february_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '02')->count();
        $allData['march_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '03')->count();
        $allData['april_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '04')->count();
        $allData['may_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '05')->count();
        $allData['june_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '06')->count();
        $allData['july_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '07')->count();
        $allData['august_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '08')->count();
        $allData['september_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '09')->count();
        $allData['october_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '10')->count();
        $allData['november_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '11')->count();
        $allData['december_pds'] = PdsFormList::where('pds_status', 'Verified')
            ->whereYear('updated_at', '=', $yearNow)->whereMonth('updated_at', '=', '12')->count();

        $allData['average_pds_permonth'] = collect(
            [
                $allData['january_pds'], $allData['february_pds'], $allData['march_pds'], $allData['april_pds'], $allData['may_pds'], $allData['june_pds'],
                $allData['july_pds'], $allData['august_pds'], $allData['september_pds'], $allData['october_pds'], $allData['november_pds'], $allData['december_pds'],
            ]
        )->avg();

        $allData['pds_total_applicant'] = PdsFormList::select('user_id')->whereNotNull('pds_tracking_no')->get()->count();
        // ========= End PDS =======

        return view('admin.index', $allData);
    } // End Method
}
