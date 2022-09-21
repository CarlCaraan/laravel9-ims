<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use PDF;
use Auth;

class GenerateSubmitPDFController extends Controller
{
    public function GeneratePDF()
    {
        $id = Auth::user()->id;
        $family_id = FamilyInfo::where('user_id', $id)->first()->id;

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

        // Generate PDF
        $pdf = PDF::loadView('user.pdf.personal_datasheet_pdf', $allData, [], [
            'format' => 'Legal',
            'margin_left' => 2,
            'margin_right' => 2,
            'margin_top' => 2,
            'margin_bottom' => 2,
            // 'margin_header' => 0,
            // 'margin_footer' => 0,
        ]);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Personal_Datasheet.pdf');
    } // End Method
}
