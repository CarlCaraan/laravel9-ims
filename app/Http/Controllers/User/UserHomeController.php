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
                'middle_name' => 'required',
                'dob' => 'required',
                'pob' => 'required',
                'gender' => 'required',
                'civil_status' => 'required',
                'height' => 'required',
                'weight' => 'required',
                'blood_type' => 'required',
                'gsis_id_no' => 'required',
                'pagibig_id_no' => 'required',
                'philhealth_no' => 'required',
                'sss_no' => 'required',
                'tin_no' => 'required',
                'agency_employee_no' => 'required',

                'citizenship_country' => 'required',
                'r_house_no' => 'required',
                'r_street' => 'required',
                'r_subdivision' => 'required',
                'r_barangay' => 'required',
                'r_city' => 'required',
                'r_province' => 'required',
                'r_zipcode' => 'required',
                'p_house_no' => 'required',
                'p_street' => 'required',
                'p_subdivision' => 'required',
                'p_barangay' => 'required',
                'p_city' => 'required',
                'p_province' => 'required',
                'p_zipcode' => 'required',
                'mobile' => 'required',
            ],
            // ~Custom Error messages
            [
                'first_name.required' => 'Firstname field is required.',
                'last_name.required' => 'Lastname field is required.',
                'middle_name.required' => 'Middlename field is required.',
                'dob.required' => 'Date of birth field is required.',
                'pob.required' => 'Place of birth field is required.',
                'gender.required' => 'Sex is required.',
                'civil_status.required' => 'Civil Status is required.',
                'height.required' => 'Height field is required.',
                'weight.required' => 'Weight field is required.',
                'blood_type.required' => 'Blood Type field is required.',
                'gsis_id_no.required' => 'GSIS ID No. field is required.',
                'pagibig_id_no.required' => 'PAGIBIG ID No. field is required.',
                'philhealth_no.required' => 'PHILHEALTH No. field is required.',
                'sss_no.required' => 'SSS No. field is required.',
                'tin_no.required' => 'TIN No. field is required.',
                'agency_employee_no.required' => 'Agency Employee No. field is required.',

                'citizenship_country.required' => 'Citizenship Country is required.',
                'r_house_no.required' => 'House No. field is required.',
                'r_street.required' => 'Street field is required.',
                'r_subdivision.required' => 'Subdivision field is required.',
                'r_barangay.required' => 'Barangay field is required.',
                'r_city.required' => 'City field is required.',
                'r_province.required' => 'Province field is required.',
                'r_zipcode.required' => 'Zip Code field is required.',
                'p_house_no.required' => 'House No. field is required.',
                'p_street.required' => 'Street field is required.',
                'p_subdivision.required' => 'Subdivision field is required.',
                'p_barangay.required' => 'Barangay field is required.',
                'p_city.required' => 'City field is required.',
                'p_province.required' => 'Province field is required.',
                'p_zipcode.required' => 'Zip Code field is required.',
                'mobile.required' => 'Mobile field is required.',
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
