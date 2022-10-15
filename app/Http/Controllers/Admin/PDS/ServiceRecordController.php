<?php

namespace App\Http\Controllers\Admin\PDS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRequestServiceRecord;
use App\Models\ServiceRecord;

class ServiceRecordController extends Controller
{
    public function AllRequestView()
    {
        $data['allData'] = UserRequestServiceRecord::with(['user'])->orderBy('created_at', 'DESC')->get();
        return view('admin.service_record.view_service_record', $data);
    } // End Method

    public function UpdateRequestView(Request $request)
    {
        $request_id = $request->id;
        ServiceRecord::where('service_request_record_id', $request_id)->delete();

        $count_sr_from = count($request->sr_from);
        dd($count_sr_from);
        for ($i = 0; $i < $count_sr_from; $i++) {
            $service_record = new ServiceRecord();
            $service_record->service_request_record_id = $request_id[$i];
            $service_record->sr_from = $request->sr_from[$i];
            $service_record->save();
        } // End For

        $notification = array(
            'message' => 'Service Record created successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.request.view')->with($notification);
    } // End Method
}
