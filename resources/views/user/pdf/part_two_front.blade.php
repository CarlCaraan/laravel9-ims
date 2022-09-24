<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/F3FvV5D/PDF-file-icon-svg.png">

    <title>CS Form No. 212 (Page 2 - Front)</title>

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
    <!-- ========= Start Voluntary Work ========= -->
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="custom-tableheading" colspan="5">
                    VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label-gray" rowspan="2" width="35%">
                    29. NAME & ADDRESS OF ORGANIZATION
                </td>
                <td class="label-gray" colspan="2">
                    INCLUSIVE DATES (mm/dd/yyyy)
                </td>
                <td class="label-gray" rowspan="2" width="15%">
                    NUMBER OF HOURS
                </td>
                <td class="label-gray" rowspan="2" width="30%">
                    POSITION / NATURE OF WORK
                </td>
            </tr>
            <tr>
                <td class="label-gray" width="10%">From</td>
                <td class="label-gray" width="10%">To</td>
            </tr>

            <!-- Start Voluntary Dynamic Row -->
            {{ $countDynamicRow = 0; }}
            @foreach ($voluntaries as $voluntary)
            @if($voluntary->organization_name_address == "")
            {{ $i = 0 }}
            @while ($i < 14) <tr>
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
                        {{ $voluntary->organization_name_address }}
                    </td>
                    <td>
                        {{ $voluntary->voluntary_date_from }}
                    </td>
                    <td>
                        {{ $voluntary->voluntary_date_to }}
                    </td>
                    <td>
                        {{ $voluntary->voluntary_hours }}
                    </td>
                    <td>
                        {{ $voluntary->voluntary_jobtitle }}
                    </td>
                </tr>
                {{ $countDynamicRow++; }}
                @endif
                @endforeach
                @for ($x = $countDynamicRow; $x < 14; $x++) <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    @endfor
                    <!-- End Voluntary Dynamic Row -->

        </tbody>
    </table>
    <!-- ========= End Voluntary Work ========= -->

    <!-- ========= Start Learning Program ========= -->
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="custom-tableheading" colspan="6" style="border-bottom: none;">
                    VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED
                </th>
            </tr>
            <tr>
                <th class="custom-tableheading" colspan="6" style="border-top: none;">
                    <small style="font-size: 9px;">
                        (Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)
                    </small>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label-gray" rowspan="2" width="35%">
                    30. TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS
                </td>
                <td class="label-gray" colspan="2">
                    INCLUSIVE DATES OF ATTENDANCE (mm/dd/yyyy)
                </td>
                <td class="label-gray" rowspan="2" width="15%">
                    NUMBER OF HOURS
                </td>
                <td class="label-gray" rowspan="2" width="10%">
                    Type of LD ( Managerial/ Supervisory/ Technical/etc)
                </td>
                <td class="label-gray" rowspan="2" width="27%">
                    CONDUCTED/ SPONSORED BY
                </td>
            </tr>
            <tr>
                <td class="label-gray" width="9%">From</td>
                <td class="label-gray" width="9%">To</td>
            </tr>

            <!-- Start Learning Dynamic Row -->
            {{ $countDynamicRow = 0; }}
            @foreach ($learnings as $learning)
            @if($learning->learning_title == "")
            {{ $i = 0 }}
            @while ($i < 14) <tr>
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
                        {{ $learning->learning_title }}
                    </td>
                    <td>
                        {{ $learning->learning_date_from }}
                    </td>
                    <td>
                        {{ $learning->learning_date_to }}
                    </td>
                    <td>
                        {{ $learning->learning_hours }}
                    </td>
                    <td>
                        {{ $learning->ld_type }}
                    </td>
                    <td>
                        {{ $learning->conducted_by }}
                    </td>
                </tr>
                {{ $countDynamicRow++; }}
                @endif
                @endforeach
                @for ($x = $countDynamicRow; $x < 14; $x++) <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    @endfor
                    <!-- End Learning Dynamic Row -->

        </tbody>
    </table>
    <!-- ========= End Learning Program ========= -->

    <!-- ========= Start Other Information ========= -->
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="custom-tableheading" colspan="3">
                    VIII. OTHER INFORMATION
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label-gray" width="30%">
                    31. SPECIAL SKILLS and HOBBIES
                </td>
                <td class="label-gray" width="40%">
                    32. NON-ACADEMIC DISTINCTIONS / RECOGNITION
                </td>
                <td class="label-gray" width="30%">
                    33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION
                </td>
            </tr>

            <!-- Start Other Information Dynamic Row -->
            {{ $countDynamicRow = 0; }}
            @foreach ($others as $other)
            @if($other->special_skill == "")
            {{ $i = 0 }}
            @while ($i < 13) <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                {{ $i++ }}
                @endwhile
                @else
                <tr>
                    <td>
                        {{ $other->special_skill }}
                    </td>
                    <td>
                        {{ $other->recognition }}
                    </td>
                    <td>
                        {{ $other->organization }}
                    </td>
                </tr>
                {{ $countDynamicRow++; }}
                @endif
                @endforeach
                @for ($x = $countDynamicRow; $x < 13; $x++) <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    @endfor
                    <!-- End Other Information Dynamic Row -->

        </tbody>
    </table>
    <!-- ========= End Other Information Program ========= -->

    <!-- ========= Start Signature ========= -->
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
    <!-- ========= End Signature ========= -->

    <!-- ========= Start Footer Page ========= -->
    <htmlpagefooter name="page-footer">
        <div style="width:100%; text-align:right;">
            <span class="footer-pagetext">
                CS FORM 212 (Revised 2017), Page 3 of 4
            </span>
        </div>
    </htmlpagefooter>
    <!-- ========= End Footer Page ========= -->

</body>

</html>