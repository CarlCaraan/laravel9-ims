<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
                'image' => 'File format must be JPG, PNG and JPEG!',
            ]
        );

        $data = User::find(Auth::user()->id);
        $data->first_name = Str::title($request->first_name);
        $data->last_name = Str::title($request->last_name);
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

    public function PasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            $notification = array(
                'message' => 'User Password Updated Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('password.logout');
        } else {
            $notification = array(
                'message' => 'Current Password Incorrect!',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }
    } // End Method

    public function RemoveAvatar()
    {
        $user = User::find(Auth::user()->id);
        @unlink(public_path('upload/user_images/' . $user->profile_photo_path));
        $user->profile_photo_path = NULL;
        $user->save();

        $notification = array(
            'message' => 'Image removed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('user.profile.view')->with($notification);
    }
}
