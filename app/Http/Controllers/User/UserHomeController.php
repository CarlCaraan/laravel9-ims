<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePersonalInfoRequest;
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

    public function PersonalDatasheetUpdate(UpdatePersonalInfoRequest $request)
    {
        // Updating Users Table
        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->save();

        // Updating Personal Table
        $personal = PersonalInfo::where('user_id', Auth::user()->id)->first();
        $personal->middle_name = $request->middle_name;
        $personal->extension_name = $request->extension_name;
        $personal->dob = $request->dob;
        $personal->pob = $request->pob;
        $personal->civil_status = $request->civil_status;
        $personal->height = $request->height;
        $personal->weight = $request->weight;
        $personal->blood_type = $request->blood_type;
        $personal->gsis_id_no = $request->gsis_id_no;
        $personal->pagibig_id_no = $request->pagibig_id_no;
        $personal->philhealth_no = $request->pagibig_id_no;
        $personal->sss_no = $request->sss_no;
        $personal->tin_no = $request->tin_no;
        $personal->agency_employee_no = $request->agency_employee_no;
        $personal->pagibig_id_no = $request->pagibig_id_no;

        $personal->citizenship = $request->citizenship;

        $personal->citizenship_country = $request->citizenship_country;
        $personal->r_house_no = $request->r_house_no;
        $personal->r_street = $request->r_street;
        $personal->r_subdivision = $request->r_subdivision;
        $personal->r_barangay = $request->r_barangay;
        $personal->r_city = $request->r_city;
        $personal->r_province = $request->r_province;
        $personal->r_zip_code = $request->r_zip_code;
        $personal->p_house_no = $request->p_house_no;
        $personal->p_street = $request->p_street;
        $personal->p_subdivision = $request->p_subdivision;
        $personal->p_barangay = $request->p_barangay;
        $personal->p_city = $request->p_city;
        $personal->p_province = $request->p_province;
        $personal->p_zip_code = $request->p_zip_code;
        $personal->telephone = $request->telephone;
        $personal->mobile = $request->mobile;
        $personal->contact_email = $request->contact_email;
        $personal->save();

        $notification = array(
            'message' => 'Personal Information Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.welcome')->with($notification);
    } // End Method
}
