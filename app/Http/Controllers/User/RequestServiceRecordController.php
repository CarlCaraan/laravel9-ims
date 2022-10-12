<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRequestServiceRecord;
use Auth;

class RequestServiceRecordController extends Controller
{
    public function ViewRequestServiceRecord()
    {
        $allData['sr_requests'] = UserRequestServiceRecord::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.request_servicerecord', $allData);
    } // End Method

    public function StoreRequestServiceRecord()
    {
        $data = new UserRequestServiceRecord();
        $data->user_id = Auth::user()->id;
        $data->service_record_status = "Pending";
        $data->save();

        $notification = array(
            'message' => 'Request sent successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('view.request.servicerecord')->with($notification);
    } // End Method

    public function DeleteRequestServiceRecord($id)
    {
        $data = UserRequestServiceRecord::find($id)->delete();

        $notification = array(
            'message' => 'Request cancelled successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('view.request.servicerecord')->with($notification);
    } // End Method
}
