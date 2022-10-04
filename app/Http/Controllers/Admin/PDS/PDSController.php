<?php

namespace App\Http\Controllers\Admin\PDS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PdsFormList;

class PDSController extends Controller
{
    public function PDSPendingView()
    {
        $data['allData'] = PdsFormList::with(['user'])->where('pds_status', 'For Verification')->where('pds_archived', 'No')->orderBy('pds_date_uploaded', 'DESC')->get();
        return view('admin.pds.pending_pds_view', $data);
    } // End Method

    public function PDSVerifiedView()
    {
        $data['allData'] = PdsFormList::with(['user'])->where('pds_status', 'Verified')->where('pds_archived', 'No')->orderBy('pds_date_uploaded', 'DESC')->get();
        return view('admin.pds.verified_pds_view', $data);
    } // End Method

    public function PDSInvalidView()
    {
        $data['allData'] = PdsFormList::with(['user'])->where('pds_status', 'Invalid')->where('pds_archived', 'No')->orderBy('pds_date_uploaded', 'DESC')->get();
        return view('admin.pds.invalid_pds_view', $data);
    } // End Method

    public function PDSArchivedView()
    {
        $data['allData'] = PdsFormList::with(['user'])->where('pds_archived', 'Yes')->orderBy('pds_date_uploaded', 'DESC')->get();
        return view('admin.pds.archived_pds_view', $data);
    } // End Method

    // ========= Method POST GET Request Function =========

    public function PDSUpdate(Request $request)
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

    public function PDSArchive($id)
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

    public function PDSRestore($id)
    {
        $pds_form_list = PdsFormList::find($id)->update([
            'pds_archived' => "No",
        ]);

        $notification = array(
            'message' => 'User PDS Restored successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('pds.pending.view')->with($notification);
    } // End Method

    public function PDSDelete($id)
    {
        $pds_form_list = PdsFormList::find($id);
        @unlink(public_path('upload/pdf_uploads/' . $pds_form_list->pds_filename));
        $pds_form_list->delete();

        $notification = array(
            'message' => 'User PDS Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('pds.pending.view')->with($notification);
    } // End Method
}
