<?php

namespace App\Http\Controllers\Admin\SiteInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserInquiry;

class UserInquiryController extends Controller
{
    public function UserInquiryView()
    {
        $data['allData'] = UserInquiry::all();
        return view('admin.inquiry.view_user_inquiry', $data);
    }

    public function UserInquiryDelete($id)
    {
        $data = UserInquiry::find($id)->delete();

        $notification = array(
            'message' => 'Inquiry Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.inquiries.view')->with($notification);
    }
}
