<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        // $allData = User::all();
        $data['allData'] = User::all();
        return view('admin.user.view_user', $data);
    }

    public function UserAdd()
    {
        return view('admin.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $validatedData = $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:users',
                'gender' => 'required',
                'user_type' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:10000'
            ],
            // ~Custom Error messages
            [
                'image' => 'File format must be JPG, PNG nad JPG!',
            ]
        );

        $data = new User();
        $code = "password";
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->user_type = $request->user_type;
        $data->password = bcrypt($code);

        // Storing Image
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.view')->with($notification);
    } // End Method

    public function UserEdit($id)
    {
        $editData = User::find($id);
        return view('admin.user.edit_user', compact('editData'));
    } // End Method

    public function UserUpdate(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'gender' => 'required',
                'user_type' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:10000'
            ],
            // ~Custom Error messages
            [
                'image' => 'File format must be JPG, PNG nad JPEG!',
            ]
        );

        try {
            $data = User::find($id);
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->email = $request->email;
            $data->gender = $request->gender;
            $data->user_type = $request->user_type;

            // Updating Image
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $data['profile_photo_path'] = $filename;
            }

            $data->save();

            $notification = array(
                'message' => 'User Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('user.view')->with($notification);
        } catch (Exception $error) {
            $notification = array(
                'message' => 'Email Already Exists!',
                'alert-type' => 'error',
            );
            return redirect()->route('user.view')->with($notification);
        }
    } // End Method

    public function UserDelete($id)
    {
        $data = User::find($id);
        @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
        $data->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.view')->with($notification);
    }
}
