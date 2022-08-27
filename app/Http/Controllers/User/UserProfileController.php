<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.view_profile', compact('user'));
    } // End Method

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('user.profile.edit_profile', compact('editData'));
    } // End Method

    public function ProfileUpdate(Request $request)
    {
        $validatedData = $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'gender' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:10000'
            ],
            // ~Custom Error messages
            [
                'image' => 'File format must be JPG, PNG nad JPEG!',
            ]
        );

        $data = User::find(Auth::user()->id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->gender = $request->gender;
        if (auth()->user()->email != $request->email) {
            auth()->user()->newEmail($request->email);
            $notification = array(
                'message' => 'Profile Updated, Please Check your mail to change your Email',
                'alert-type' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'User Profile Updated Successfully',
                'alert-type' => 'success',
            );
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        return redirect()->route('user.profile.view')->with($notification);
    } //End Method
}
