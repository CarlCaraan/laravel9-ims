<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersonalInfo;
use Auth;

class UserHomeController extends Controller
{
    public function UserHome()
    {
        $id = Auth::user()->id;

        // Automatic Create Personal Table for the First Time
        $user_exists_count = PersonalInfo::where('user_id', $id)->count();
        if ($user_exists_count == 0) {
            $data = new PersonalInfo();
            $data->user_id = $id;
            $data->save();
        }

        $allData['user'] = User::find($id);
        $allData['personal'] = PersonalInfo::where('user_id', $id)->first();
        return view('user.index', $allData);
    } // End Method

    public function PersonalDatasheetUpdate(Request $request)
    {
        $validatedData = $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
            ],
            // ~Custom Error messages
            [
                'first_name.required' => 'Firstname field is required!',
            ]
        );

        // Updating Users Table
        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->save();

        // Updating Personal Table
        $personal = PersonalInfo::where('user_id', Auth::user()->id)->first();
        $personal->middle_name = $request->middle_name;
        $personal->save();

        $notification = array(
            'message' => 'Personal Information Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.welcome')->with($notification);
    } // End Method
}
