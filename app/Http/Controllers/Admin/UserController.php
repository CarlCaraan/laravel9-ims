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
        $data->identifier = 'local';
        $data->email_verified_at = now();

        // Generete Tracking Id
        $check_user_exist = User::orderBy('id', 'DESC')->first();
        if ($check_user_exist == NULL) {
            $first_register = 0;
            $user_id = $first_register + 1;
            if ($user_id < 10) {
                $tracking_id = '0000' . $user_id;
            } elseif ($user_id < 100) {
                $tracking_id = '000' . $user_id;
            } elseif ($user_id < 1000) {
                $tracking_id = '00' . $user_id;
            } elseif ($user_id < 10000) {
                $tracking_id = '0' . $user_id;
            }
        } else {
            $exist_user = User::orderBy('id', 'DESC')->first()->id;
            $user_id = $exist_user + 1;
            if ($user_id < 10) {
                $tracking_id = '0000' . $user_id;
            } elseif ($user_id < 100) {
                $tracking_id = '000' . $user_id;
            } elseif ($user_id < 1000) {
                $tracking_id = '00' . $user_id;
            } elseif ($user_id < 10000) {
                $tracking_id = '0' . $user_id;
            }
        }

        $data->tracking_id = date('Y') . "-" . $tracking_id;

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
                'user_type' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:10000'
            ],
            // ~Custom Error messages
            [
                'first_name.required' => 'First Name is required',
                'last_name.required' => 'Last Name is required',
                'email.required' => 'Email is required',
                'user_type.required' => 'User Role is required',
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
