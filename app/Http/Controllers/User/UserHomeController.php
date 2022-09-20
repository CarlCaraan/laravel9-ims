<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PersonalInfo;
use App\Models\FamilyInfo;
use App\Models\FamilyChildrenList;
use App\Models\EducationalInfo;
use App\Models\CivilServiceInfo;
use App\Models\WorkExperienceInfo;
use App\Models\VoluntaryWorkInfo;
use App\Models\LearningProgramInfo;
use App\Models\OtherSkillInfo;
use Auth;

use App\Http\Requests\UpdatePersonalInfoRequest;
use App\Http\Requests\UpdateFamilyInfoRequest;
use App\Http\Requests\UpdateEducationalInfoRequest;
use App\Http\Requests\UpdateCivilInfoRequest;
use App\Http\Requests\UpdateWorkInfoRequest;
use App\Http\Requests\UpdateVoluntaryInfoRequest;
use App\Http\Requests\UpdateLearningInfoRequest;
use App\Http\Requests\UpdateOtherInfoRequest;

class UserHomeController extends Controller
{
    public function UserHome()
    {
        $id = Auth::user()->id;

        $childrenListNaDelete = FamilyChildrenList::where('children_name', 'n/a')->delete();
        $civilNaDelete = CivilServiceInfo::where('cse_type', 'n/a')->delete();
        $workNaDelete = WorkExperienceInfo::where('work_date_from', 'n/a')->delete();
        $voluntaryNaDelete = VoluntaryWorkInfo::where('organization_name_address', 'n/a')->delete();
        $learningNaDelete = LearningProgramInfo::where('learning_title', 'n/a')->delete();
        $otherNaDelete = OtherSkillInfo::where('special_skill', 'n/a')->delete();

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

        // Automatic Create Civil Service Table for the First Time
        $civil_exists_count = CivilServiceInfo::where('user_id', $id)->count();
        if ($civil_exists_count == 0) {
            $data = new CivilServiceInfo();
            $data->user_id = $id;
            $data->save();
        }

        // Automatic Create Work Experience Table for the First Time
        $work_exists_count = WorkExperienceInfo::where('user_id', $id)->count();
        if ($work_exists_count == 0) {
            $data = new WorkExperienceInfo();
            $data->user_id = $id;
            $data->save();
        }

        // Automatic Create Voluntary Work Table for the First Time
        $voluntary_exists_count = VoluntaryWorkInfo::where('user_id', $id)->count();
        if ($voluntary_exists_count == 0) {
            $data = new VoluntaryWorkInfo();
            $data->user_id = $id;
            $data->save();
        }

        // Automatic Create Learning Program Table for the First Time
        $learning_exists_count = LearningProgramInfo::where('user_id', $id)->count();
        if ($learning_exists_count == 0) {
            $data = new LearningProgramInfo();
            $data->user_id = $id;
            $data->save();
        }

        // Automatic Create Other Information Table for the First Time
        $other_exists_count = OtherSkillInfo::where('user_id', $id)->count();
        if ($other_exists_count == 0) {
            $data = new OtherSkillInfo();
            $data->user_id = $id;
            $data->save();
        }

        $allData['user'] = User::find($id);
        $allData['personal'] = PersonalInfo::where('user_id', $id)->first();
        $allData['family'] = FamilyInfo::where('user_id', $id)->first();
        $allData['children'] = FamilyChildrenList::where('family_id', $family_id)->get();
        $allData['educational'] = EducationalInfo::where('user_id', $id)->first();
        $allData['civils'] = CivilServiceInfo::where('user_id', $id)->get();
        $allData['works'] = WorkExperienceInfo::where('user_id', $id)->get();
        $allData['voluntaries'] = VoluntaryWorkInfo::where('user_id', $id)->get();
        $allData['learnings'] = LearningProgramInfo::where('user_id', $id)->get();
        $allData['others'] = OtherSkillInfo::where('user_id', $id)->get();
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
        $user->first_name = Str::title($request->first_name);
        $user->last_name = Str::title($request->last_name);
        $user->gender = $request->gender;
        $user->save();

        // Updating Personal Table
        $personal = PersonalInfo::where('user_id', Auth::user()->id)->first();
        $personal->middle_name = Str::title($request->middle_name);
        $personal->extension_name = Str::title($request->extension_name);
        $personal->dob = $request->dob;
        $personal->pob = Str::title($request->pob);
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
        $personal->r_street = Str::title($request->r_street);
        $personal->r_subdivision = $request->r_subdivision;
        $personal->r_barangay = $request->r_barangay;
        $personal->r_city = Str::title($request->r_city);
        $personal->r_province = Str::title($request->r_province);
        $personal->r_zip_code = $request->r_zip_code;
        $personal->p_house_no = $request->p_house_no;
        $personal->p_street = Str::title($request->p_street);
        $personal->p_subdivision = Str::title($request->p_subdivision);
        $personal->p_barangay = Str::title($request->p_barangay);
        $personal->p_city = Str::title($request->p_city);
        $personal->p_province = Str::title($request->p_province);
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
        $family->spouse_lname = Str::title($request->spouse_lname);
        $family->spouse_fname = Str::title($request->spouse_fname);
        $family->spouse_mname = Str::title($request->spouse_mname);
        $family->spouse_ename = Str::title($request->spouse_ename);
        $family->occupation = Str::title($request->occupation);
        if (
            $family->employer_name == "" || $family->employer_name == "n/a" ||
            $family->business_address == "" || $family->business_address == "n/a" ||
            $family->telephone == "" || $family->telephone == "n/a"
        ) {
            $family->employer_name = "n/a";
            $family->business_address = "n/a";
            $family->telephone =  "n/a";
        } else {
            $family->employer_name = Str::title($request->employer_name);
            $family->business_address = $request->business_address;
            $family->telephone = $request->telephone;
        }

        $family->father_lname = Str::title($request->father_lname);
        $family->father_fname = Str::title($request->father_fname);
        $family->father_mname = Str::title($request->father_mname);
        $family->father_ename = Str::title($request->father_ename);

        $family->mother_lname = Str::title($request->mother_lname);
        $family->mother_fname = Str::title($request->mother_fname);
        $family->mother_mname = Str::title($request->mother_mname);
        $family->mother_maiden_name = Str::title($request->mother_maiden_name);

        $family->save();

        // If NULL
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
        } // End if NUll

        $id = Auth::user()->id;
        $family_id = FamilyInfo::where('user_id', $id)->first()->id;
        FamilyChildrenList::where('family_id', $family_id)->delete();

        for ($i = 0; $i < $countChildrenName; $i++) {
            $children = new FamilyChildrenList();
            $children->family_id = $family_id;
            $children->children_name = Str::title($request->children_name[$i]);
            $children->children_dob = $request->children_dob[$i];
            $children->save();
            if ($request->children_name[$i] == "" && $request->children_dob[$i] == "") {
                $children->children_name = "n/a";
                $children->children_dob = "n/a";
                $children->save();
                $notification = array(
                    'message' => 'Family Background Updated Successfully',
                    'alert-type' => 'success',
                );
                return redirect()->route('user.welcome')->with($notification);
            } else if ($request->children_name[$i] == "" || $request->children_dob[$i] == "") {
                $children->children_name = "n/a";
                $children->children_dob = "n/a";
                $children->save();
                $notification = array(
                    'message' => 'All children field must not be empty',
                    'alert-type' => 'error',
                );
                return redirect()->route('user.welcome')->with($notification);
            }
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
        $educational->elementary_school = Str::title($request->elementary_school);
        $educational->elementary_course = $request->elementary_course;
        $educational->elementary_from = $request->elementary_from;
        $educational->elementary_to = $request->elementary_to;
        $educational->elementary_units = $request->elementary_units;
        $educational->elementary_graduated = $request->elementary_graduated;
        $educational->elementary_honors = $request->elementary_honors;

        // Secondary
        $educational->secondary_school = Str::title($request->secondary_school);
        $educational->secondary_course = $request->secondary_course;
        $educational->secondary_from = $request->secondary_from;
        $educational->secondary_to = $request->secondary_to;
        $educational->secondary_units = $request->secondary_units;
        $educational->secondary_graduated = $request->secondary_graduated;
        $educational->secondary_honors = $request->secondary_honors;

        // Vocational
        $educational->vocational_school = Str::title($request->vocational_school);
        $educational->vocational_course = $request->vocational_course;
        $educational->vocational_from = $request->vocational_from;
        $educational->vocational_to = $request->vocational_to;
        $educational->vocational_units = $request->vocational_units;
        $educational->vocational_graduated = $request->vocational_graduated;
        $educational->vocational_honors = $request->vocational_honors;

        // College
        $educational->college_school = Str::title($request->college_school);
        $educational->college_course = $request->college_course;
        $educational->college_from = $request->college_from;
        $educational->college_to = $request->college_to;
        $educational->college_units = $request->college_units;
        $educational->college_graduated = $request->college_graduated;
        $educational->college_honors = $request->college_honors;

        // Graduate Studies
        $educational->studies_school = Str::title($request->studies_school);
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

    public function CivilDatasheetUpdate(UpdateCivilInfoRequest $request)
    {
        $civil = CivilServiceInfo::where('user_id', Auth::user()->id)->first();
        CivilServiceInfo::where('user_id', Auth::user()->id)->delete();

        // If NULL
        if ($request->cse_type == NULL) {
            $civil->family_id = Auth::user()->id;
            $civil->cse_type = "n/a";
            $civil->cse_rating = "n/a";
            $civil->cse_date = "n/a";
            $civil->cse_place = "n/a";
            $civil->cse_license_number = "n/a";
            $civil->cse_license_date = "n/a";
            $civil->save();
            $notification = array(
                'message' => 'Civil Service Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('user.welcome')->with($notification);
        } else {
            $countCseType = count($request->cse_type);
        } // End If NULL

        for ($i = 0; $i < $countCseType; $i++) {
            $civil = new CivilServiceInfo();
            $civil->user_id = Auth::user()->id;
            $civil->cse_type = $request->cse_type[$i];
            $civil->cse_rating = $request->cse_rating[$i];
            $civil->cse_date = $request->cse_date[$i];
            $civil->cse_place = $request->cse_place[$i];
            $civil->cse_license_number = $request->cse_license_number[$i];
            $civil->cse_license_date = $request->cse_license_date[$i];
            $civil->save();

            if (
                $request->cse_type[$i] == "" ||
                $request->cse_date[$i] == "" ||
                $request->cse_place[$i] == "" ||
                $request->cse_license_number[$i] == "" ||
                $request->cse_license_date[$i] == ""
            ) {
                $civil->cse_type = "n/a";
                $civil->cse_rating = "n/a";
                $civil->cse_date = "n/a";
                $civil->cse_place = "n/a";
                $civil->cse_license_number = "n/a";
                $civil->cse_license_date = "n/a";
                $civil->save();

                $notification = array(
                    'message' => 'Required field must not be empty (CIVIL SERVICE)',
                    'alert-type' => 'error',
                );
                return redirect()->route('user.welcome')->with($notification);
            }
        } //End For loop

        $notification = array(
            'message' => 'Civil Service Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.welcome')->with($notification);
    } // End  Method

    public function WorkDatasheetUpdate(UpdateWorkInfoRequest $request)
    {
        $work = WorkExperienceInfo::where('user_id', Auth::user()->id)->first();
        WorkExperienceInfo::where('user_id', Auth::user()->id)->delete();

        // If NULL
        if ($request->work_date_from == NULL) {
            $work->user_id = Auth::user()->id;
            $work->work_date_from = "n/a";
            $work->work_date_to = "n/a";
            $work->job_title = "n/a";
            $work->job_type = "n/a";
            $work->monthly_salary = NULL;
            $work->salary_grade = "n/a";
            $work->status_of_appointment = "n/a";
            $work->gov_service = "n/a";
            $work->save();
            $notification = array(
                'message' => 'Work Experience Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('user.welcome')->with($notification);
        } else {
            $countWorkDateFrom = count($request->work_date_from);
        } // End If NULL

        for ($i = 0; $i < $countWorkDateFrom; $i++) {
            $work = new WorkExperienceInfo();
            $work->user_id = Auth::user()->id;
            $work->work_date_from = $request->work_date_from[$i];
            $work->work_date_to = $request->work_date_to[$i];
            $work->job_title = $request->job_title[$i];
            $work->job_type = $request->job_type[$i];
            $work->monthly_salary = $request->monthly_salary[$i];
            $work->salary_grade = $request->salary_grade[$i];
            $work->status_of_appointment = $request->status_of_appointment[$i];
            $work->gov_service = $request->gov_service[$i];
            $work->save();

            if (
                $request->work_date_from[$i] == "" ||
                $request->work_date_to[$i] == "" ||
                $request->job_title[$i] == "" ||
                $request->job_type[$i] == "" ||
                $request->monthly_salary[$i] == "" ||
                $request->status_of_appointment[$i] == "" ||
                $request->gov_service[$i] == ""
            ) {
                $work->work_date_from = "n/a";
                $work->work_date_to = "n/a";
                $work->job_title = "n/a";
                $work->job_type = "n/a";
                $work->monthly_salary = NULL;
                $work->salary_grade = "n/a";
                $work->status_of_appointment = "n/a";
                $work->gov_service = "n/a";
                $work->save();

                $notification = array(
                    'message' => 'Required field must not be empty (WORK EXPERIENCE)',
                    'alert-type' => 'error',
                );
                return redirect()->route('user.welcome')->with($notification);
            }
        } //End For loop

        $notification = array(
            'message' => 'Work Experience Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.welcome')->with($notification);
    } // End  Method

    public function VoluntaryDatasheetUpdate(UpdateVoluntaryInfoRequest $request)
    {
        $voluntary = VoluntaryWorkInfo::where('user_id', Auth::user()->id)->first();
        VoluntaryWorkInfo::where('user_id', Auth::user()->id)->delete();

        // If NULL
        if ($request->organization_name_address == NULL) {
            $voluntary->user_id = Auth::user()->id;
            $voluntary->organization_name_address = "n/a";
            $voluntary->voluntary_date_from = "n/a";
            $voluntary->voluntary_date_to = "n/a";
            $voluntary->voluntary_hours = "n/a";
            $voluntary->voluntary_jobtitle = "n/a";
            $voluntary->save();
            $notification = array(
                'message' => 'Voluntary Work Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('user.welcome')->with($notification);
        } else {
            $countNameAddress = count($request->organization_name_address);
        } // End If NULL

        for ($i = 0; $i < $countNameAddress; $i++) {
            $voluntary = new VoluntaryWorkInfo();
            $voluntary->user_id = Auth::user()->id;
            $voluntary->organization_name_address = $request->organization_name_address[$i];
            $voluntary->voluntary_date_from = $request->voluntary_date_from[$i];
            $voluntary->voluntary_date_to = $request->voluntary_date_to[$i];
            $voluntary->voluntary_hours = $request->voluntary_hours[$i];
            $voluntary->voluntary_jobtitle = $request->voluntary_jobtitle[$i];
            $voluntary->save();

            if (
                $request->organization_name_address[$i] == "" ||
                $request->voluntary_date_from[$i] == "" ||
                $request->voluntary_date_to[$i] == "" ||
                $request->voluntary_hours[$i] == "" ||
                $request->voluntary_jobtitle[$i] == ""
            ) {
                $voluntary->organization_name_address = "n/a";
                $voluntary->voluntary_date_from = "n/a";
                $voluntary->voluntary_date_to = "n/a";
                $voluntary->voluntary_hours = "n/a";
                $voluntary->voluntary_jobtitle = "n/a";
                $voluntary->save();

                $notification = array(
                    'message' => 'Required field must not be empty (VOLUNTARY WORK)',
                    'alert-type' => 'error',
                );
                return redirect()->route('user.welcome')->with($notification);
            }
        } //End For loop

        $notification = array(
            'message' => 'Voluntary Work Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.welcome')->with($notification);
    } // End  Method

    public function LearningDatasheetUpdate(UpdateLearningInfoRequest $request)
    {
        $learning = LearningProgramInfo::where('user_id', Auth::user()->id)->first();
        LearningProgramInfo::where('user_id', Auth::user()->id)->delete();

        // If NULL
        if ($request->learning_title == NULL) {
            $learning->user_id = Auth::user()->id;
            $learning->learning_title = "n/a";
            $learning->learning_date_from = "n/a";
            $learning->learning_date_to = "n/a";
            $learning->learning_hours = "n/a";
            $learning->ld_type = "n/a";
            $learning->conducted_by = "n/a";
            $learning->save();
            $notification = array(
                'message' => 'Learning Program Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('user.welcome')->with($notification);
        } else {
            $countLearningTitle = count($request->learning_title);
        } // End If NULL

        for ($i = 0; $i < $countLearningTitle; $i++) {
            $learning = new LearningProgramInfo();
            $learning->user_id = Auth::user()->id;
            $learning->learning_title = $request->learning_title[$i];
            $learning->learning_date_from = $request->learning_date_from[$i];
            $learning->learning_date_to = $request->learning_date_to[$i];
            $learning->learning_hours = $request->learning_hours[$i];
            $learning->ld_type = $request->ld_type[$i];
            $learning->conducted_by = $request->conducted_by[$i];
            $learning->save();

            if (
                $request->learning_title[$i] == "" ||
                $request->learning_date_from[$i] == "" ||
                $request->learning_date_to[$i] == "" ||
                $request->learning_hours[$i] == "" ||
                $request->ld_type[$i] == "" ||
                $request->conducted_by[$i] == ""
            ) {
                $learning->learning_title = "n/a";
                $learning->learning_date_from = "n/a";
                $learning->learning_date_to = "n/a";
                $learning->learning_hours = "n/a";
                $learning->ld_type = "n/a";
                $learning->conducted_by = "n/a";
                $learning->save();

                $notification = array(
                    'message' => 'Required field must not be empty (LEARNING PROGRAM)',
                    'alert-type' => 'error',
                );
                return redirect()->route('user.welcome')->with($notification);
            }
        } //End For loop

        $notification = array(
            'message' => 'Learning Program Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.welcome')->with($notification);
    } // End  Method

    public function OtherDatasheetUpdate(UpdateOtherInfoRequest $request)
    {
        $other = OtherSkillInfo::where('user_id', Auth::user()->id)->first();
        OtherSkillInfo::where('user_id', Auth::user()->id)->delete();

        // If NULL
        if ($request->special_skill == NULL) {
            $other->user_id = Auth::user()->id;
            $other->special_skill = "n/a";
            $other->recognition = "n/a";
            $other->organization = "n/a";
            $other->save();
            $notification = array(
                'message' => 'Other Information Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('user.welcome')->with($notification);
        } else {
            $countSpecialSkill = count($request->special_skill);
        } // End If NULL

        for ($i = 0; $i < $countSpecialSkill; $i++) {
            $other = new OtherSkillInfo();
            $other->user_id = Auth::user()->id;
            $other->special_skill = $request->special_skill[$i];
            $other->recognition = $request->recognition[$i];
            $other->organization = $request->organization[$i];
            $other->save();

            if (
                $request->special_skill[$i] == "" ||
                $request->recognition[$i] == "" ||
                $request->organization[$i] == ""
            ) {
                $other->special_skill = "n/a";
                $other->recognition = "n/a";
                $other->organization = "n/a";
                $other->save();

                $notification = array(
                    'message' => 'Required field must not be empty (OTHER INFORMATION)',
                    'alert-type' => 'error',
                );
                return redirect()->route('user.welcome')->with($notification);
            }
        } //End For loop

        $notification = array(
            'message' => 'Other Information Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.welcome')->with($notification);
    } // End  Method
}
