<?php

namespace App\Http\Controllers\Admin\PDS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PdsFormList;

class PDSController extends Controller
{
    public function PDSPendingView()
    {
        $data['allData'] = PdsFormList::with(['user'])->where('pds_status', 'For Verification')->where('pds_archived', 'No')->get();
        return view('admin.pds.pending_pds_view', $data);
    } // End Method

    public function PDSPendingUpdate(Request $request)
    {
        $validatedData = $request->validate(
            [
                'pds_status' => 'required',
            ],
            // ~Custom Error messages
            [
                'pds_status.required' => 'Status is required!',
            ]
        );

        $id = $request->id;

        if ($request->pds_status == "Invalid") {
            if ($request->pds_message == "") {
                $notification = array(
                    'message' => 'Comment field is required if invalid status',
                    'alert-type' => 'error',
                );
                return redirect()->route('pds.pending.view')->with($notification);
            }
        }

        $pds_form_list = PdsFormList::find($id)->update([
            'pds_status' => $request->pds_status,
            'pds_message' => $request->pds_message,
        ]);

        // $pds_form_list = PdsFormList::find($id);
        // $pds_form_list->pds_status = $request->pds_status;
        // $pds_form_list->pds_message = $request->pds_message;
        // $pds_form_list->save();

        $notification = array(
            'message' => 'User PDS updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('pds.pending.view')->with($notification);
    } // End Method

    public function PDSPendingArchive($id)
    {
        $pds_form_list = PdsFormList::find($id)->update([
            'pds_archived' => "Yes",
        ]);

        $notification = array(
            'message' => 'User PDS archived successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('pds.pending.view')->with($notification);
    } // End Method


}
