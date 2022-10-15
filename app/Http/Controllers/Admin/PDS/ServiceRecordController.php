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
        $data['allData'] = UserRequestServiceRecord::with(['user'])->where('service_record_status', 'Pending')->orderBy('created_at', 'DESC')->get();
        return view('admin.service_record.view_service_record', $data);
    } // End Method

    public function EditRequestSR($id)
    {
        $data['editData'] = UserRequestServiceRecord::with(['user'])->orderBy('created_at', 'DESC')->find($id);
        return view('admin.service_record.edit_service_record', $data);
    }

    public function UpdateRequestSR(Request $request)
    {
        $request_id = $request->id;
        ServiceRecord::where('service_request_record_id', $request_id)->delete();

        $count_sr_from = count($request->sr_from);
        for ($i = 0; $i < $count_sr_from; $i++) {
            $service_record = new ServiceRecord();
            $service_record->service_request_record_id = $request_id[$i];
            $service_record->sr_from = $request->sr_from[$i];
            $service_record->sr_to = $request->sr_to[$i];
            $service_record->sr_designation = $request->sr_designation[$i];
            $service_record->sr_status = $request->sr_status[$i];
            $service_record->sr_salary = $request->sr_salary[$i];
            $service_record->sr_place_of_assignment = $request->sr_place_of_assignment[$i];
            $service_record->sr_branch = $request->sr_branch[$i];
            $service_record->sr_leave_of_absence = $request->sr_leave_of_absence[$i];
            $service_record->sr_separation_date_caused = $request->sr_separation_date_caused[$i];
            $service_record->save();
        } // End For

        UserRequestServiceRecord::find($request_id)->update([
            'service_record_status' => 'Completed'
        ]);

        $notification = array(
            'message' => 'Service Record created successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.request.view')->with($notification);
    } // End Method
}
