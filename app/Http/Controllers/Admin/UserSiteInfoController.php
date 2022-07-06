<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSiteInfo;

class UserSiteInfoController extends Controller
{
    public function UserSiteInfoEdit()
    {
        $editData = UserSiteInfo::first();
        return view('admin.usersiteinfo.edit_user_siteinfo', compact('editData'));
    }

    public function UserSiteInfoUpdate(Request $request, $id)
    {
        $data = UserSiteInfo::find($id);

        $validatedData = $request->validate(
            [
                'auth_brand' => 'image|mimes:jpeg,png,jpg|max:10000',
                'terms' => 'required',
                'privacy' => 'required',
                'mobile' => 'required',
                'email' => 'required',
                'facebook_link' => 'required',
                'website_link' => 'required',
                'address' => 'required',
                'footer' => 'required',
                'user_brand' => 'image|mimes:jpeg,png,jpg|max:10000',
            ],
            // ~Custom Error messages
            [
                'image' => 'File format must be JPG, PNG nad JPEG!',
            ]
        );

        $data->terms = $request->terms;
        $data->privacy = $request->privacy;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->facebook_link = $request->facebook_link;
        $data->website_link = $request->website_link;
        $data->address = $request->address;
        $data->footer = $request->footer;

        // Working with Image
        if ($request->file('user_brand')) {
            $file = $request->file('user_brand');
            @unlink(public_path('upload/user_siteinfo/' . $data->user_brand));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo'), $filename);
            $data['user_brand'] = $filename;
        }

        if ($request->file('auth_brand')) {
            $file = $request->file('auth_brand');
            @unlink(public_path('upload/user_siteinfo/' . $data->auth_brand));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo'), $filename);
            $data['auth_brand'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Site Info Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.siteinfo.edit')->with($notification);
    } // End Method

    public function RemoveAuthBrand()
    {
        $data = UserSiteInfo::first();
        @unlink(public_path('upload/user_siteinfo/' . $data->auth_brand));
        $data->auth_brand = NULL;
        $data->save();

        $notification = array(
            'message' => 'Authentication Brand Image removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('user.siteinfo.edit')->with($notification);
    } // End Method

    public function RemoveUserBrand()
    {
        $data = UserSiteInfo::first();
        @unlink(public_path('upload/user_siteinfo/' . $data->user_brand));
        $data->user_brand = NULL;
        $data->save();

        $notification = array(
            'message' => 'User Brand Image removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('user.siteinfo.edit')->with($notification);
    } // End Method
}
