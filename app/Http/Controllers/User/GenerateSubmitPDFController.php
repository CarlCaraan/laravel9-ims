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
use App\Models\PdsFormList;
use PDF;
use Auth;

class GenerateSubmitPDFController extends Controller
{
    public function PageOneFrontPDF()
    {
        $id = Auth::user()->id;
        $family_id = FamilyInfo::where('user_id', $id)->first()->id;

        $allData['user'] = User::find($id);
        $allData['personal'] = PersonalInfo::where('user_id', $id)->first();
        $allData['family'] = FamilyInfo::where('user_id', $id)->first();
        $allData['children'] = FamilyChildrenList::where('family_id', $family_id)->get();
        $allData['educational'] = EducationalInfo::where('user_id', $id)->first();

        // Generate PDF
        $pdf = PDF::loadView('user.pdf.part_one_front', $allData, [], [
            'format' => 'Legal',
            'margin_left' => 2,
            'margin_right' => 2,
            'margin_top' => 2,
            'margin_bottom' => 2,
            // 'margin_header' => 0,
            // 'margin_footer' => 0,
        ]);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Page1_FrontPage.pdf');
    } // End Method

    public function PageOneBackPDF()
    {
        $id = Auth::user()->id;
        $allData['civils'] = CivilServiceInfo::where('user_id', $id)->get();
        $allData['works'] = WorkExperienceInfo::where('user_id', $id)->get();

        // Generate PDF
        $pdf = PDF::loadView('user.pdf.part_one_back', $allData, [], [
            'format' => 'Legal',
            'margin_left' => 2,
            'margin_right' => 2,
            'margin_top' => 2,
            'margin_bottom' => 2,
            // 'margin_header' => 0,
            // 'margin_footer' => 0,
        ]);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Page1_BackPage.pdf');
    } // End Method

    public function PageTwoFrontPDF()
    {
        $id = Auth::user()->id;
        $allData['voluntaries'] = VoluntaryWorkInfo::where('user_id', $id)->get();
        $allData['learnings'] = LearningProgramInfo::where('user_id', $id)->get();
        $allData['others'] = OtherSkillInfo::where('user_id', $id)->get();

        // Generate PDF
        $pdf = PDF::loadView('user.pdf.part_two_front', $allData, [], [
            'format' => 'Legal',
            'margin_left' => 2,
            'margin_right' => 2,
            'margin_top' => 2,
            'margin_bottom' => 2,
            // 'margin_header' => 0,
            // 'margin_footer' => 0,
        ]);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Page2_FrontPage.pdf');
    } // End Method

    public function SubmitPDF()
    {
        $id = Auth::user()->id;

        // Automatic Create PDF List for the First Time
        $pdf_exists_count = PdsFormList::where('user_id', $id)->count();
        if ($pdf_exists_count == 0) {
            $data = new PdsFormList();
            $data->user_id = $id;
            $data->save();
        }

        $allData['pdflists'] = PdsFormList::where('user_id', $id)->get();

        return view('user.submit', $allData);
    } // End Method

    public function UpdateSubmitPDF(Request $request)
    {
        $validatedData = $request->validate(
            [
                'pdf' => 'required|mimes:pdf|max:10000',
            ],
            // ~Custom Error messages
            [
                'pdf.required' => 'File must be PDF Format',
            ]
        );

        $pdf = PdsFormList::where('user_id', Auth::user()->id)->first();

        // Generete Tracking Id
        $check_pds_exist = PdsFormList::orderBy('id', 'DESC')->first();
        if ($check_pds_exist == NULL) {
            $first_upload = 0;
            $pds_id = $first_upload + 1;
            if ($pds_id < 10) {
                $tracking_id = '0000' . $pds_id;
            } elseif ($pds_id < 100) {
                $tracking_id = '000' . $pds_id;
            } elseif ($pds_id < 1000) {
                $tracking_id = '00' . $pds_id;
            } elseif ($pds_id < 10000) {
                $tracking_id = '0' . $pds_id;
            }
        } else {
            $exist_pds = PdsFormList::orderBy('id', 'DESC')->first()->id;
            $pds_id = $exist_pds + 1;
            if ($pds_id < 10) {
                $tracking_id = '0000' . $pds_id;
            } elseif ($pds_id < 100) {
                $tracking_id = '000' . $pds_id;
            } elseif ($pds_id < 1000) {
                $tracking_id = '00' . $pds_id;
            } elseif ($pds_id < 10000) {
                $tracking_id = '0' . $pds_id;
            }
        }

        $pdf->pds_tracking_no = date('Y') . "-" . $tracking_id;
        $pdf->pds_title = "CS Form No. 212 Revised 2017";
        $pdf->pds_status = "For Verification";
        $pdf->pds_date_uploaded = date('m/d/Y - h:ia', strtotime(now()));
        $pdf->pds_archived = "No";
        $pdf->pds_message = "";

        // Working with PDF
        if ($request->file('pdf')) {
            $file = $request->file('pdf');
            @unlink(public_path('upload/pdf_uploads/' . $pdf->pds_filename));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/pdf_uploads'), $filename);
            $pdf['pds_filename'] = $filename;
        }

        $pdf->save();

        $notification = array(
            'message' => 'File uploaded successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('submit.pdf')->with($notification);
    } // End Method

    public function DeleteSubmitPDF()
    {
        $pdf = PdsFormList::where('user_id', Auth::user()->id)->first();
        @unlink(public_path('upload/pdf_uploads/' . $pdf->pds_filename));
        $pdf->delete();

        $notification = array(
            'message' => 'File has been removed',
            'alert-type' => 'success',
        );
        return redirect()->route('submit.pdf')->with($notification);
    } // End Method
}
