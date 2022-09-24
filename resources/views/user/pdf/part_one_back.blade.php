<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/F3FvV5D/PDF-file-icon-svg.png">

    <title>CS Form No. 212 (Page 1 - Back)</title>

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

        /* Grid */
        .row:after {
            content: "";
            display: table;
            clear: both;
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
    <!-- ========= Start Civil Eligibility ========= -->
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="custom-tableheading" colspan="6">
                    IV. CIVIL SERVICE ELIGIBILITY
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label-gray" rowspan="2" width="30%">
                    27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE BARANGAY ELIGIBILITY / DRIVER'S LICENSE
                </td>
                <td class="label-gray" rowspan="2" width="10%">
                    RATING
                </td>
                <td class="label-gray" rowspan="2" width="10%">
                    DATE OF EXAMINATION / CONFERMENT
                </td>
                <td class="label-gray" rowspan="2" width="30%">
                    PLACE OF EXAMINATION / CONFERMENT
                </td>
                <td class="label-gray center" colspan="2">
                    LICENSE
                </td>
            </tr>
            <tr>
                <td class="label-gray" width="10%">NUMBER</td>
                <td class="label-gray" width="10%">Date of Validity</td>
            </tr>

            <!-- Start Civil Dynamic Row -->
            {{ $countDynamicRow = 0; }}
            @foreach ($civils as $civil)
            @if($civil->cse_type == "")
            {{ $i = 0 }}
            @while ($i < 23) <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                {{ $i++ }}
                @endwhile
                @else
                <tr>
                    <td>
                        {{ $civil->cse_type }}
                    </td>
                    <td>
                        {{ $civil->cse_rating }}
                    </td>
                    <td>
                        {{ $civil->cse_date }}
                    </td>
                    <td>
                        {{ $civil->cse_place }}
                    </td>
                    <td>
                        {{ $civil->cse_license_number }}
                    </td>
                    <td>
                        {{ $civil->cse_license_date }}
                    </td>
                </tr>
                {{ $countDynamicRow++; }}
                @endif
                @endforeach
                @for ($x = $countDynamicRow; $x < 23; $x++) <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    @endfor
                    <!-- End Civil Dynamic Row -->

        </tbody>
    </table>
    <!-- ========= End Civil Eligibility ========= -->

    <!-- ========= Start Work Experience ========= -->
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="custom-tableheading" colspan="8">
                    V. WORK EXPERIENCE
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label-gray" colspan="2">
                    28. INCLUSIVE DATES (mm/dd/yyyy)
                </td>
                <td class="label-gray" rowspan="2" width="28%">
                    POSITION TITLE
                </td>
                <td class="label-gray" rowspan="2" width="29%">
                    DEPARTMENT / AGENCY / OFFICE / COMPANY
                </td>
                <td class="label-gray" rowspan="2" width="8%">
                    MONTHLY SALARY
                </td>
                <td class="label-gray center" rowspan="2" width="10%">
                    SALARY/ JOB/ PAY GRADE
                </td>
                <td class="label-gray center" rowspan="2" width="10%">
                    STATUS OF APPOINTMENT
                </td>
                <td class="label-gray center" rowspan="2" width="7%">
                    GOV'T SERVICE (Y/ N)
                </td>
            </tr>
            <tr>
                <td class="label-gray" width="8%">From</td>
                <td class="label-gray" width="8%">To</td>
            </tr>

            <!-- Start Work Dynamic Row -->
            {{ $countDynamicRow = 0; }}
            @foreach ($works as $work)
            @if($work->work_date_from == "")
            {{ $i = 0 }}
            @while ($i < 23) <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                {{ $i++ }}
                @endwhile
                @else
                <tr>
                    <td>
                        {{ $work->work_date_from }}
                    </td>
                    <td>
                        {{ $work->work_date_to }}
                    </td>
                    <td>
                        {{ $work->job_title }}
                    </td>
                    <td>
                        {{ $work->job_type }}
                    </td>
                    <td>
                        {{ $work->monthly_salary }}
                    </td>
                    <td>
                        {{ $work->salary_grade }}
                    </td>
                    <td>
                        {{ $work->status_of_appointment }}
                    </td>
                    <td>
                        {{ $work->gov_service }}
                    </td>
                </tr>
                {{ $countDynamicRow++; }}
                @endif
                @endforeach
                @for ($x = $countDynamicRow; $x < 23; $x++) <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    @endfor
                    <!-- End Work Dynamic Row -->

        </tbody>
    </table>
    <!-- ========= End Work Experience ========= -->

    <!-- Start Signature -->
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="label-gray center" width="20%" rowspan="2">
                    <strong>SIGNATURE</strong>
                </td>
                <td rowspan="2">

                </td>
                <td class="label-gray center" width="20%" rowspan="2">
                    <strong>DATE</strong>
                </td>
                <td width="20%" style="border-bottom:none;">
                    <br /> {{ date('m/d/Y', strtotime(now()))  }}
                </td>
            </tr>
            <tr>
                <td style="border-top:none;"></td>
            </tr>
        </tbody>
    </table>
    <!-- End Signature -->

    <!-- ========= Start Footer Page ========= -->
    <htmlpagefooter name="page-footer">
        <div style="width:100%; text-align:right;">
            <span class="footer-pagetext">
                CS FORM 212 (Revised 2017), Page 2 of 4
            </span>
        </div>
    </htmlpagefooter>
    <!-- ========= End Footer Page ========= -->

</body>

</html>