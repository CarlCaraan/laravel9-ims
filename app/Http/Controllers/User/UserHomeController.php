<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersonalInfo;
use App\Models\FamilyInfo;
use App\Models\FamilyChildrenList;
use App\Models\EducationalInfo;
use Auth;

use App\Http\Requests\UpdatePersonalInfoRequest;
use App\Http\Requests\UpdateFamilyInfoRequest;
use App\Http\Requests\UpdateEducationalInfoRequest;

class UserHomeController extends Controller
{
    public function UserHome()
    {
        $id = Auth::user()->id;

        // Automatic Create Personal Table for the First Time
        $personal_exists_count = PersonalInfo::where('user_id', $id)->count();
        if ($personal_exists_count == 0) {
            $data = new PersonalInfo();
            $data->user_id = $id;
            $data->save();
        }
        // Automatic Create Family Table for the First Time
        $family_exists_count = FamilyInfo::where('user_id', $id)->count();
        if ($family_exists_count == 0) {
            $data = new FamilyInfo();
            $data->user_id = $id;
            $data->save();
        }
        // Automatic Create FamilyChildren Table for the First Time
        $family_id = FamilyInfo::where('user_id', $id)->first()->id;
        $children_exists_count = FamilyChildrenList::where('family_id', $family_id)->count();
        if ($children_exists_count == 0) {
            $data = new FamilyChildrenList();
            $data->family_id = $family_id;
            $data->save();
        }
        // Automatic Create Educational Table for the First Time
        $educational_exists_count = EducationalInfo::where('user_id', $id)->count();
        if ($educational_exists_count == 0) {
            $data = new EducationalInfo();
            $data->user_id = $id;
            $data->save();
        }

        $allData['user'] = User::find($id);
        $allData['personal'] = PersonalInfo::where('user_id', $id)->first();
        $allData['family'] = FamilyInfo::where('user_id', $id)->first();
        $allData['children'] = FamilyChildrenList::where('family_id', $family_id)->get();
        $allData['educational'] = EducationalInfo::where('user_id', $id)->first();
        return view('user.index', $allData);
    } // End Method

    public function PersonalDatasheetUpdate(UpdatePersonalInfoRequest $request)
    {
        // Citizenship Validation
        if ($request->by_filipino == "" && $request->by_dual_citizenship == "" && $request->by_birth == "" && $request->by_naturalization == "") {
            $notification = array(
                'citizenship-error-message' => 'Citizenship is required.',
                'alert-type' => 'error',
            );
            return redirect()->route('user.welcome')->with($notification);
        }

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
        $personal->by_filipino = $request->by_filipino; // Citizenship
        $personal->by_dual_citizenship = $request->by_dual_citizenship; // Citizenship
        $personal->by_birth = $request->by_birth; // Citizenship
        $personal->by_naturalization = $request->by_naturalization; // Citizenship
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

    public function FamilyDatasheetUpdate(UpdateFamilyInfoRequest $request)
    {
        // Updating Family Info
        $family = FamilyInfo::where('user_id', Auth::user()->id)->first();
        $family->spouse_lname = $request->spouse_lname;
        $family->spouse_fname = $request->spouse_fname;
        $family->spouse_mname = $request->spouse_mname;
        $family->spouse_ename = $request->spouse_ename;
        $family->occupation = $request->occupation;
        if (
            $family->employer_name == "" || $family->employer_name == "n/a" ||
            $family->business_address == "" || $family->business_address == "n/a" ||
            $family->telephone == "" || $family->telephone == "n/a"
        ) {
            $family->employer_name = "n/a";
            $family->business_address = "n/a";
            $family->telephone =  "n/a";
        } else {
            $family->employer_name = $request->employer_name;
            $family->business_address = $request->business_address;
            $family->telephone = $request->telephone;
        }

        $family->father_lname = $request->father_lname;
        $family->father_fname = $request->father_fname;
        $family->father_mname = $request->father_mname;
        $family->father_ename = $request->father_ename;

        $family->mother_lname = $request->mother_lname;
        $family->mother_fname = $request->mother_fname;
        $family->mother_mname = $request->mother_mname;
        $family->mother_maiden_name = $request->mother_maiden_name;

        $family->save();

        // Updating Family Children
        if ($request->children_name == NULL) {
            $id = Auth::user()->id;
            $family_id = FamilyInfo::where('user_id', $id)->first()->id;
            FamilyChildrenList::where('family_id', $family_id)->delete();
            $children = new FamilyChildrenList();
            $children->family_id = $family_id;
            $children->children_name = "n/a";
            $children->children_dob = "n/a";
            $children->save();
            $notification = array(
                'message' => 'Family Background Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('user.welcome')->with($notification);
        } else {
            $countChildrenName = count($request->children_name);
        }

        $id = Auth::user()->id;
        $family_id = FamilyInfo::where('user_id', $id)->first()->id;
        FamilyChildrenList::where('family_id', $family_id)->delete();

        for ($i = 0; $i < $countChildrenName; $i++) {
            $children = new FamilyChildrenList();
            $children->family_id = $family_id;
            $children->children_name = $request->children_name[$i];
            if ($request->children_name[$i] == "") {
                $children->children_name = "n/a";
                $children->children_dob = "n/a";
            } else if ($request->children_name[$i] == "n/a" || $request->children_dob[$i] == "n/a" || $request->children_dob[$i] == "" || $request->children_name[$i] == "") {
                $children->children_name = "n/a";
                $children->children_dob = "n/a";
            } else {
                $children->children_dob = $request->children_dob[$i];
            }
            $children->save();
        } //End For loop

        $notification = array(
            'message' => 'Family Background Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.welcome')->with($notification);
    } // End Method

    public function EducationalDatasheetUpdate(UpdateEducationalInfoRequest $request)
    {
        $educational = EducationalInfo::where('user_id', Auth::user()->id)->first();

        // Elementary
        $educational->elementary_school = $request->elementary_school;
        $educational->elementary_course = $request->elementary_course;
        $educational->elementary_from = $request->elementary_from;
        $educational->elementary_to = $request->elementary_to;
        $educational->elementary_units = $request->elementary_units;
        $educational->elementary_graduated = $request->elementary_graduated;
        $educational->elementary_honors = $request->elementary_honors;

        // Secondary
        $educational->secondary_school = $request->secondary_school;
        $educational->secondary_course = $request->secondary_course;
        $educational->secondary_from = $request->secondary_from;
        $educational->secondary_to = $request->secondary_to;
        $educational->secondary_units = $request->secondary_units;
        $educational->secondary_graduated = $request->secondary_graduated;
        $educational->secondary_honors = $request->secondary_honors;

        // Vocational
        $educational->vocational_school = $request->vocational_school;
        $educational->vocational_course = $request->vocational_course;
        $educational->vocational_from = $request->vocational_from;
        $educational->vocational_to = $request->vocational_to;
        $educational->vocational_units = $request->vocational_units;
        $educational->vocational_graduated = $request->vocational_graduated;
        $educational->vocational_honors = $request->vocational_honors;

        // College
        $educational->college_school = $request->college_school;
        $educational->college_course = $request->college_course;
        $educational->college_from = $request->college_from;
        $educational->college_to = $request->college_to;
        $educational->college_units = $request->college_units;
        $educational->college_graduated = $request->college_graduated;
        $educational->college_honors = $request->college_honors;

        // Graduate Studies
        $educational->studies_school = $request->studies_school;
        $educational->studies_course = $request->studies_course;
        $educational->studies_from = $request->studies_from;
        $educational->studies_to = $request->studies_to;
        $educational->studies_units = $request->studies_units;
        $educational->studies_honors = $request->studies_honors;
        $educational->save();

        $notification = array(
            'message' => 'Educational Background Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.welcome')->with($notification);
    } // End  Method
}
