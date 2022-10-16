<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/F3FvV5D/PDF-file-icon-svg.png">

    <title>Service Record</title>

    <style>
        /* GLOBAL CSS */
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .center {
            text-align: center;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        p,
        span {
            font-size: 12px;
        }

        .small-text {
            font-size: 10px !important;
        }

        .fw-bold {
            font-weight: bold;
        }

        .fw-italic {
            font-style: italic;
        }

        table {
            border-collapse: collapse;
        }

        td {
            font-size: 10px;
            padding-top: 5.5px;
            padding-bottom: 5.5px;
            padding-left: 5px;
        }

        .label-gray {
            background-color: #EAEAEA;
        }

        .custom-border {
            border: 1px solid #000;
        }

        /* Footer Page */
        .footer-pagetext {
            font-size: 9px;
            font-style: italic;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }

        /* Header */
        .header-custom {
            padding-top: 4px;
            padding-left: 4px;
        }

        /* Table */
        .custom-tableheading {
            background-color: #969696;
            color: #fff;
            border: 1px solid #000;
            text-align: left;
            font-weight: 500;
            font-style: italic;
            padding-left: 5px;
        }
    </style>
</head>

<body>
    <!-- ========= Start Header ========= -->
    <div class="center" style="margin-">
        <span>Republic of the Philippines</span> <br />
        <span>Department of Eduaction</span> <br />
        <span>Region IV</span> <br />
        <strong><span>DIVISION OF LAGUNA</span></strong> <br />
        <h4>SERVICE RECORD</h4>
    </div>

    <br />

    <table style="width: 100%;">
        <tr>
            <td rowspan="2">
                <strong> Name:</strong>
            </td>
            <td class="center" style="border-bottom: 1px solid black;">
                <span>{{ $request['user']['last_name'] }}</span>
            </td>
            <td class="center" style="border-bottom: 1px solid black;">
                <span>{{ $request['user']['first_name'] }}</span>
            </td>
            <td class="center" style="border-bottom: 1px solid black;">
                <span>{{ $request->sr_middle_name }}</span>
            </td>
            <td rowspan="2" style="padding-left: 25px;">
                (If married woman give also full maiden name)
            </td>
        </tr>
        <tr>
            <td class="center">
                <span>(Surname)</span>
            </td>
            <td class="center">
                <span>(Given Name)</span>
            </td>
            <td class="center">
                <span>(Middle Name)</span>
            </td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td rowspan="2">
                <strong> Birth:</strong>
            </td>
            <td class="center" style="border-bottom: 1px solid black;">
                <span> {{ date('m/d/Y', strtotime($request->sr_dob)) }} </sp>
            </td>
            <td class="center" style="border-bottom: 1px solid black;" colspan="2">
                <span>{{ $request->sr_pob }}</span>
            </td>
            <td style="padding-left: 25px;">
                (Date herein should checked from birth or baptismal
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span>(Date)</span>
            </td>
            <td class="center" colspan="2">
                <span>(Place)</span>
            </td>
            <td style="padding-left: 25px;">
                certificate or some other reliable document)
            </td>
        </tr>
    </table>
    <!-- ========= End Header ========= -->

    <br />
    <p class="small-text">
        This is to certify that the employee name herein above actually rendered services in this office as shown by the service record below <br />
        each line which is supported by appointment and other papers actually issued by this office and approved by the authority
    </p>
    <br />

    <!-- ========= Start Table ========= -->
    <table width="100%" border="1" cellspacing="0" cellpadding="0">

        <tbody>
            <tr>
                <td class="center" colspan="2">
                    SERVICE
                </td>
                <td class="center" colspan="3">
                    Record of Appointment
                </td>
                <td class="center" rowspan="2" width="12%">
                    Office Entity<br />
                    Station/Place<br />
                    of Assignment
                </td>
                <td class="center" rowspan="2" width="7%">
                    Branch
                </td>
                <td class="center" rowspan="2">
                    Leave of Absence w/o pay
                </td>
                <td class="center" rowspan="2" width="12%">
                    Separation Date
                    Caused
                </td>
            </tr>
            <tr>
                <td width="10%">From</td>
                <td width="10%">To</td>
                <td width="10%" class="center">Designation</td>
                <td width="10%" class="center">Status</td>
                <td width="10%" class="center">Salary <strong>(Annual)</strong></td>
            </tr>

            <!-- Start Dynamic Row -->
            @foreach ($service_records as $service_record)
            <tr>
                <td>{{ date('m/d/y', strtotime($service_record->sr_from)) }}</td>
                <td>{{ date('m/d/y', strtotime($service_record->sr_to)) }}</td>
                <td class="center">{{ $service_record->sr_designation }}</td>
                <td class="center">{{ $service_record->sr_status }}</td>
                <td class="center">{{ $service_record->sr_salary }}</td>
                <td class="center">{{ $service_record->sr_place_of_assignment }}</td>
                <td class="center">{{ $service_record->sr_branch }}</td>
                <td>{{ $service_record->sr_leave_of_absence }}</td>
                <td class="center">{{ $service_record->sr_separation_date_caused }}</td>
            </tr>
            @endforeach
            <!-- End Dynamic Row -->

        </tbody>
    </table>
    <!-- ========= End Table ========= -->

    <!-- ========= Start Footer Page ========= -->
    <htmlpagefooter name="page-footer">
        <table>
            <tr>
                <td colspan="2">
                    <span class="footer-pagetext">
                        issued in compliance with Executive Order No. 5
                        August 10, 1954 and in accordance with Circular No. 5
                        August 10, 1954 of the system:
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td width="70%">
                </td>
                <td>
                    <div>
                        <span> CERTIFIED TRUE AND CORRECT:</span><br /><br />

                        <strong>
                            <span>RENATO M. ACERO</span><br />
                        </strong>
                        <span>Administrative Officer IV</span>
                    </div>
                </td>
            </tr>
        </table>
    </htmlpagefooter>
    <!-- ========= End Footer Page ========= -->

</body>

</html>