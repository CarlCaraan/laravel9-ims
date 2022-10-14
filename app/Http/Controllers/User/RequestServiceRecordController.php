<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRequestServiceRecord;
use App\Models\ServiceRecord;
use Auth;
use Illuminate\Support\Facades\DB;

class RequestServiceRecordController extends Controller
{
    public function ViewRequestServiceRecord()
    {
        $allData['sr_requests'] = UserRequestServiceRecord::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.request_servicerecord', $allData);
    } // End Method

    public function StoreRequestServiceRecord()
    {
        // Insert SR Request
        $sr_request_id = DB::table('user_request_service_records')->insertGetId([
            'user_id' => Auth::user()->id,
            'service_record_status' => "Pending"
        ]);


        // Insert SR Request
        $service_record = new ServiceRecord();
        $service_record->service_request_record_id = $sr_request_id;
        $service_record->save();

        $notification = array(
            'message' => 'Request sent successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('view.request.servicerecord')->with($notification);
    } // End Method

    public function DeleteRequestServiceRecord($id)
    {
        $sr_request = UserRequestServiceRecord::find($id)->delete();
        $service_record = ServiceRecord::where('service_request_record_id', $id)->delete();

        $notification = array(
            'message' => 'Request cancelled successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('view.request.servicerecord')->with($notification);
    } // End Method
}
