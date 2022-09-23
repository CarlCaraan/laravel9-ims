<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/F3FvV5D/PDF-file-icon-svg.png">

    <title>CS Form No. 212 (Page 1 - Front)</title>

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
    <!-- ========= Start header ========= -->
    <div class="header-custom custom-border">
        <small class="fw-italic fw-bold">CS Form No. 212</small> <br />
        <small class="fw-italic">Revised 2017</small>
        <h1 class="center" style="line-height: -1; padding:0; margin-top:5px; margin-bottom: 15px;">PERSONAL DATA SHEET</h1>
        <small>
            <strong>WARNING:</strong>
            <i>
                Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.
            </i>
        </small>

        <table style="margin:0 0 0 auto;" border="1" width="30%" cellspacing="0" cellpadding="0">
            <tr>
                <td class="label-gray" style="border-bottom: none;" width="30%">
                    1. CS ID No.
                </td>
                <td style="border-bottom: none; border-right: none" width="70%">
                    {{ $personal->cs_id_no }}
                </td>
            </tr>
        </table>
    </div>
    <!-- ========= End header ========= -->

    <!-- ========= Start Personal ========= -->
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="custom-tableheading" colspan="4">
                    I. PERSONAL INFORMATION
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label-gray" width="25%" style="border-bottom: none;">
                    2. SURNAME
                </td>
                <td colspan="3">
                    {{ $user->last_name }}
                </td>
            </tr>

            <tr>
                <td class="label-gray" style="border-top: none; border-bottom: none;">
                    FIRST NAME
                </td>
                <td colspan="2">
                    {{ $user->first_name }}
                </td>
                <td class="label-gray" width="10%">
                    <small style="color: #969696">NAME EXTENSION (JR., SR)</small>
                    <strong>{{ $personal->extension_name }}</strong>
                </td>
            </tr>

            <tr>
                <td class="label-gray" style="border-top: none;">
                    MIDDLE NAME
                </td>
                <td colspan="3">
                    {{ $personal->middle_name }}
                </td>
            </tr>

            <tr>
                <td class="label-gray" width="25%" style="border-bottom: none;">
                    3. DATE OF BIRTH
                    (mm/dd/yyyy)
                </td>
                <td>
                    {{ date('m/d/Y', strtotime($personal->dob)) }}
                </td>
                <td class="label-gray" width="20%" style="border-bottom: none;">
                    16. CITIZENSHIP
                </td>
                <td style="border-bottom: none;">
                    {{ $personal->by_filipino }}
                    {{ $personal->by_dual_citizenship }}
                    {{ $personal->by_birth }}
                    {{ $personal->by_naturalization }}
                </td>
            </tr>

            <tr>
                <td class="label-gray" style="border-bottom: none;border-top: none;">
                    4. PLACE OF BIRTH
                </td>
                <td>
                    {{ $personal->pob }}
                </td>
                <td class="label-gray" style="border-bottom: none;border-top: none;">
                    <i>(indicate country)</i>
                </td>
                <td style="border-top: none;">
                    {{ $personal->citizenship_country }}
                </td>
            </tr>

            <tr>
                <td class="label-gray" style="border-bottom: none;">
                    5. SEX
                </td>
                <td style="border-right: none; border-bottom: none;">
                    {{ $user->gender }}
                </td>
                <td colspan="2" style="border-left: none; border-bottom: none;">

                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
            <td class="label-gray" width="25%" style="border-bottom: none;">
                6. CIVIL STATUS
            </td>
            <td width="15%">
                {{ $personal->civil_status }}
            </td>
            <td class="label-gray" style="border-bottom: none;">
                17. RESIDENTIAL ADDRESS
            </td>
            <td width="20%">
                {{ $personal->r_house_no }}<br /><small style="color: #969696;">House/Block/Lot No.</small>
            </td>
            <td width="25%">
                {{ $personal->r_street }}<br /><small style="color: #969696;">Street</small>
            </td>
        </tr>

        <tr>
            <td class="label-gray" width="25%" style="border-bottom: none;">
                7. HEIGHT (m)
            </td>
            <td width="15%">
                {{ $personal->height }}
            </td>
            <td class="label-gray" style="border-bottom: none; border-top: none;">

            </td>
            <td width="20%">
                {{ $personal->r_subdivision }}<br /><small style="color: #969696;">Subdivision/Village</small>
            </td>
            <td width="25%">
                {{ $personal->r_barangay }}<br /><small style="color: #969696;">Barangay</small>
            </td>
        </tr>

        <tr>
            <td class="label-gray" width="25%" style="border-bottom: none;">
                8. WEIGHT (kg)
            </td>
            <td width="15%">
                {{ $personal->weight }}
            </td>
            <td class="label-gray" style="border-bottom: none; border-top: none;">

            </td>
            <td width="20%">
                {{ $personal->r_city }}<br /><small style="color: #969696;">City/Municipality</small>
            </td>
            <td width="25%">
                {{ $personal->r_province }}<br /><small style="color: #969696;">Province</small>
            </td>
        </tr>

        <tr>
            <td class="label-gray" width="25%" style="border-bottom: none;">
                9. BLOOD TYPE
            </td>
            <td width="15%">
                {{ $personal->blood_type }}
            </td>
            <td class="label-gray" style="border-top: none;">
                ZIP CODE
            </td>
            <td colspan="2">
                {{ $personal->r_zip_code }}
            </td>
        </tr>

        <tr>
            <td class="label-gray" width="25%" style="border-bottom: none;">
                10. GSIS ID NO.S
            </td>
            <td width="15%">
                {{ $personal->gsis_id_no }}
            </td>
            <td class="label-gray" style="border-bottom: none;">
                18. PERMANENT ADDRESS
            </td>
            <td width="20%">
                {{ $personal->p_house_no }}<br /><small style="color: #969696;">House/Block/Lot No.</small>
            </td>
            <td width="25%">
                {{ $personal->p_street }}<br /><small style="color: #969696;">Street</small>
            </td>
        </tr>

        <tr>
            <td class="label-gray" width="25%" style="border-bottom: none;">
                11. PAG-IBIG ID NO.
            </td>
            <td width="15%">
                {{ $personal->pagibig_id_no }}
            </td>
            <td class="label-gray" style="border-bottom: none; border-top: none;">

            </td>
            <td width="20%">
                {{ $personal->p_subdivision }}<br /><small style="color: #969696;">Subdivision/Village</small>
            </td>
            <td width="25%">
                {{ $personal->p_barangay }}<br /><small style="color: #969696;">Barangay</small>
            </td>
        </tr>

        <tr>
            <td class="label-gray" width="25%" style="border-bottom: none;">
                12. PHILHEALTH NO.
            </td>
            <td width="15%">
                {{ $personal->philhealth_no }}
            </td>
            <td class="label-gray" style="border-bottom: none; border-top: none;">

            </td>
            <td width="20%">
                {{ $personal->p_city }}<br /><small style="color: #969696;">City/Municipality</small>
            </td>
            <td width="25%">
                {{ $personal->p_province }}<br /><small style="color: #969696;">Province</small>
            </td>
        </tr>

        <tr>
            <td class="label-gray" width="25%" style="border-bottom: none;">
                13. SSS NO.
            </td>
            <td width="15%">
                {{ $personal->sss_no }}
            </td>
            <td class="label-gray" style="border-top: none;">
                ZIP CODE
            </td>
            <td colspan="2">
                {{ $personal->p_zip_code }}
            </td>
        </tr>

        <tr>
            <td class="label-gray" width="25%" style="border-bottom: none;">
                14. TIN NO.
            </td>
            <td width="15%">
                {{ $personal->tin_no }}
            </td>
            <td class="label-gray" style="border-top: none;">
                19. TELEPHONE NO.
            </td>
            <td colspan="2">
                {{ $personal->telephone }}
            </td>
        </tr>

        <tr>
            <td class="label-gray" width="25%" style="border-bottom: none;">
                15. AGENCY EMPLOYEE NO.
            </td>
            <td width="15%">
                {{ $personal->agency_employee_no }}
            </td>
            <td class="label-gray" style="border-top: none;">
                20. MOBILE NO.
            </td>
            <td colspan="2">
                {{ $personal->mobile }}
            </td>
        </tr>

        <tr>
            <td width="25%" style="border-bottom: none;" colspan="2">

            </td>
            <td class="label-gray" style="border-top: none; border-bottom: none;">
                21. E-MAIL ADDRESS
            </td>
            <td colspan="2" style="border-bottom: none;">
                {{ $personal->contact_email }}
            </td>
        </tr>
    </table>
    <!-- ========= End Personal ========= -->

    <!-- ========= Start Family ========= -->
    <div class="row" style="border-right: 1px solid #000;">
        <div class="column" style="float: left; width: 55%;">
            <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="custom-tableheading" style="border-right: 1px solid #969696;" colspan="3">
                            II. FAMILY BACKGROUND
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="label-gray" width="31%" style="border-bottom: none;">
                            22. SPOUSE'S SURNAME
                        </td>
                        <td colspan="2">
                            {{ $family->spouse_lname }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none; border-bottom: none;">
                            FIRST NAME
                        </td>
                        <td>
                            {{ $family->spouse_fname }}
                        </td>
                        <td class="label-gray" width="20%">
                            <small style="color: #969696">NAME EXTENSION (JR., SR)</small>
                            <strong>{{ $family->spouse_ename }}</strong>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none;">
                            MIDDLE NAME
                        </td>
                        <td colspan="2">
                            {{ $family->spouse_mname }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none;">
                            OCCUPATION
                        </td>
                        <td colspan="2">
                            {{ $family->occupation }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none;">
                            EMPLOYER/BUSINESS NAME
                        </td>
                        <td colspan="2">
                            {{ $family->employer_name }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none;">
                            BUSINESS ADDRESS
                        </td>
                        <td colspan="2">
                            {{ $family->business_address }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none;">
                            TELEPHONE NO.
                        </td>
                        <td colspan="2">
                            {{ $family->telephone }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none; border-bottom: none;">
                            24. FATHER'S SURNAME
                        </td>
                        <td colspan="2">
                            {{ $family->father_lname }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none; border-bottom: none;">
                            FIRST NAME
                        </td>
                        <td>
                            {{ $family->father_fname }}
                        </td>
                        <td class="label-gray" width="20%">
                            <small style="color: #969696">NAME EXTENSION (JR., SR)</small>
                            <strong>{{ $family->father_ename }}</strong>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none;">
                            MIDDLE NAME
                        </td>
                        <td colspan="2">
                            {{ $family->father_mname }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none; border-bottom: none;">
                            25. MOTHER'S MAIDEN NAME
                        </td>
                        <td colspan="2">
                            {{ $family->mother_maiden_name }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none; border-bottom: none;">
                            SURNAME
                        </td>
                        <td colspan="2">
                            {{ $family->mother_lname }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none; border-bottom: none;">
                            FIRST NAME
                        </td>
                        <td colspan="2">
                            {{ $family->mother_fname }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label-gray" style="border-top: none; border-bottom: none;">
                            MIDDLE NAME
                        </td>
                        <td colspan="2" style="border-bottom: none;">
                            {{ $family->mother_mname }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Start Children -->
        <div class="column" style="float: left; width: 45%;">
            <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="custom-tableheading" style="border-left: 1px solid #969696; border-right: 1px solid #969696;" colspan="2">
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="label-gray" width="65%" style="border-left: none;">
                            23. NAME of CHILDREN
                        </td>
                        <td class="label-gray" style="border-right: none;">
                            DATE OF BIRTH (mm/dd/yyyy)
                        </td>
                    </tr>
                    @foreach ($children as $child)
                    <tr>
                        <td width="60%" style="border-left: none;">
                            {{ $child->children_name }} &nbsp;
                        </td>
                        <td style="border-right: none;">
                            {{ date('m/d/Y', strtotime($child->children_dob)) }} &nbsp;
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- End Children -->

    </div> <!-- End Row -->
    <!-- ========= End Family ========= -->

    <!-- ========= Start Educational Background ========= -->
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="custom-tableheading" colspan="8">
                    III. EDUCATIONAL BACKGROUND
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label-gray" rowspan="2">
                    26. LEVEL
                </td>
                <td class="label-gray" rowspan="2" width="22%">
                    NAME OF SCHOOL
                </td>
                <td class="label-gray" rowspan="2" width="22%">
                    BASIC EDUCATION/DEGREE/COURSE
                </td>
                <td class="label-gray" colspan="2">
                    PERIOD OF ATTENDANCE
                </td>
                <td class="label-gray" rowspan="2" width="10.5%">
                    HIGHEST LEVEL/ UNITS EARNED (if not graduated)
                </td>
                <td class="label-gray" rowspan="2" width="8%">
                    YEAR GRADUATED
                </td>
                <td class="label-gray" rowspan="2" width="9.5%">
                    SCHOLARSHIP/ ACADEMIC HONORS RECEIVED
                </td>
            </tr>

            <tr>
                <td class="label-gray" width="7.8%">
                    From
                </td>
                <td class="label-gray" width="7.8%">
                    To
                </td>
            </tr>

            <!-- Start Elementary -->
            <tr>
                <td class="label-gray">
                    ELEMENTARY
                </td>
                <td>
                    {{ $educational->elementary_school }}
                </td>
                <td>
                    {{ $educational->elementary_course }}
                </td>
                <td>
                    {{ $educational->elementary_from }}
                </td>
                <td>
                    {{ $educational->elementary_to }}
                </td>
                <td>
                    {{ $educational->elementary_units }}
                </td>
                <td>
                    {{ $educational->elementary_graduated }}
                </td>
                <td>
                    {{ $educational->elementary_honors }}
                </td>
            </tr>
            <!-- End Elementary -->

            <!-- Start Secondary -->
            <tr>
                <td class="label-gray">
                    SECONDARY
                </td>
                <td>
                    {{ $educational->secondary_school }}
                </td>
                <td>
                    {{ $educational->secondary_course }}
                </td>
                <td>
                    {{ $educational->secondary_from }}
                </td>
                <td>
                    {{ $educational->secondary_to }}
                </td>
                <td>
                    {{ $educational->secondary_units }}
                </td>
                <td>
                    {{ $educational->secondary_graduated }}
                </td>
                <td>
                    {{ $educational->secondary_honors }}
                </td>
            </tr>
            <!-- End Secondary -->

            <!-- Start Vocational -->
            <tr>
                <td class="label-gray">
                    VOCATIONAL / TRADE COURSE
                </td>
                <td>
                    {{ $educational->vocational_school }}
                </td>
                <td>
                    {{ $educational->vocational_course }}
                </td>
                <td>
                    {{ $educational->vocational_from }}
                </td>
                <td>
                    {{ $educational->vocational_to }}
                </td>
                <td>
                    {{ $educational->vocational_units }}
                </td>
                <td>
                    {{ $educational->vocational_graduated }}
                </td>
                <td>
                    {{ $educational->vocational_honors }}
                </td>
            </tr>
            <!-- End Vocational -->

            <!-- Start College -->
            <tr>
                <td class="label-gray">
                    COLLEGE
                </td>
                <td>
                    {{ $educational->college_school }}
                </td>
                <td>
                    {{ $educational->college_course }}
                </td>
                <td>
                    {{ $educational->college_from }}
                </td>
                <td>
                    {{ $educational->college_to }}
                </td>
                <td>
                    {{ $educational->college_units }}
                </td>
                <td>
                    {{ $educational->college_graduated }}
                </td>
                <td>
                    {{ $educational->college_honors }}
                </td>
            </tr>
            <!-- End College -->

            <!-- Start Graduate Studies -->
            <tr>
                <td class="label-gray">
                    GRADUATE STUDIES
                </td>
                <td>
                    {{ $educational->studies_school }}
                </td>
                <td>
                    {{ $educational->studies_course }}
                </td>
                <td>
                    {{ $educational->studies_from }}
                </td>
                <td>
                    {{ $educational->studies_to }}
                </td>
                <td>
                    {{ $educational->studies_units }}
                </td>
                <td>
                    {{ $educational->studies_graduated }}
                </td>
                <td>
                    {{ $educational->studies_honors }}
                </td>
            </tr>
            <!-- End Graduate Studies -->
        </tbody>
    </table>
    <!-- ========= End Educational Background ========= -->

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

    <!-- Start Footer Page -->
    <htmlpagefooter name="page-footer">
        <div style="width:100%; text-align:right;">
            <span class="footer-pagetext">
                CS FORM 212 (Revised 2017), Page 1 of 4
            </span>
        </div>
    </htmlpagefooter>
    <!-- End Footer Page -->

</body>

</html>