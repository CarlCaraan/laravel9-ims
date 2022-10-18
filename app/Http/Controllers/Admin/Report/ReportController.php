<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PdsFormList;
use App\Models\UserRequestServiceRecord;
use PDF;

class ReportController extends Controller
{
    public function GenereteReport()
    {
        return view('admin.report.view_report');
    } // End Method

    public function PDSGenereteReport(Request $request)
    {
        $validatedData = $request->validate(
            [
                'start_date_pds' => 'required',
                'end_date_pds' => 'required',
            ],
            // ~Custom Error messages
            [
                'start_date_pds.required' => 'Start Date is required!',
                'end_date_pds.required' => 'End Date is required!',
            ]
        );

        $start_date = $request->start_date_pds;
        $end_date = $request->end_date_pds;
        $allData['s_date'] = $start_date;
        $allData['e_date'] = $end_date;

        // Total Completed Count
        $allData['total_pds'] = PdsFormList::with(['user'])->where('pds_status', 'Verified')->where('pds_archived', 'No')->where('updated_at', '>=', $start_date)->where('updated_at', '<=', $end_date)->orderBy('updated_at', 'DESC')->count();

        // Fetching SR Completed
        $allData['pds_lists'] = PdsFormList::with(['user'])->where('pds_status', 'Verified')->where('pds_archived', 'No')->where('updated_at', '>=', $start_date)->where('updated_at', '<=', $end_date)->orderBy('updated_at', 'DESC')->get();
        // dd($allData['sr_request']);

        // Generate PDF
        $pdf = PDF::loadView('admin.report.pds_pdf_template', $allData, [], [
            'format' => 'Legal-L',
            'margin_left' => 4,
            'margin_right' => 4,
            'margin_top' => 8,
            'margin_bottom' => 8,
            // 'margin_header' => 0,
            // 'margin_footer' => 0,
        ]);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Pds_Report.pdf');
    } // End Method

    public function SRGenereteReport(Request $request)
    {
        $validatedData = $request->validate(
            [
                'start_date_sr' => 'required',
                'end_date_sr' => 'required',
            ],
            // ~Custom Error messages
            [
                'start_date_sr.required' => 'Start Date is required!',
                'end_date_sr.required' => 'End Date is required!',
            ]
        );

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $allData['s_date'] = $start_date;
        $allData['e_date'] = $end_date;

        // Total Completed Count
        $allData['total_sr_request'] = UserRequestServiceRecord::with(['user'])->where('service_record_status', 'Completed')->where('archived', 'No')->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->orderBy('created_at', 'DESC')->count();

        // Fetching SR Completed
        $allData['sr_requests'] = UserRequestServiceRecord::with(['user'])->where('service_record_status', 'Completed')->where('archived', 'No')->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->orderBy('created_at', 'DESC')->get();
        // dd($allData['sr_request']);

        // Generate PDF
        $pdf = PDF::loadView('admin.report.sr_pdf_template', $allData, [], [
            'format' => 'Legal-L',
            'margin_left' => 4,
            'margin_right' => 4,
            'margin_top' => 8,
            'margin_bottom' => 8,
            // 'margin_header' => 0,
            // 'margin_footer' => 0,
        ]);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Service_Record_Report.pdf');
    } // End Method
}
