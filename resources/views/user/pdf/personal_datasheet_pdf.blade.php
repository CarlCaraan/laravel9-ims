<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Datasheet</title>

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
            padding-top: 6px;
            padding-bottom: 6px;
            padding-left: 5px;
        }

        .label-gray {
            background-color: #EAEAEA;
        }

        .custom-border {
            border: 1px solid #000;
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
    <!-- Start header -->
    <div class="header-custom custom-border">
        <small class="fw-italic fw-bold">CS Form No. 212</small> <br />
        <small class="fw-italic">Revised 2017</small>

        <h1 class="center">PERSONAL DATA SHEET</h1>

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
    <!-- End header -->

    <!-- Start Personal -->
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

            <tr style="border-top: 1px solid #000">
                <td class="label-gray" width="25%" style="border-bottom: none;">
                    3. DATE OF BIRTH
                    (mm/dd/yyyy)
                </td>
                <td>
                    {{ date('m-d-Y', strtotime($personal->dob)) }}
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

            <tr style="border-top: 1px solid #000">
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

            <tr style="border-top: 1px solid #000">
                <td class="label-gray" style="border-bottom: none;">
                    5. SEX
                </td>
                <td>
                    {{ $user->gender }}
                </td>
                <td style="border-right: none;">

                </td>
                <td style="border-left: none;">

                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr style="border-top: 1px solid #000">
            <td class="label-gray" width="25%" style="border-bottom: none;">
                5. CIVIL STATUS
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

        <tr style="border-top: 1px solid #000">
            <td class="label-gray" width="25%" style="border-bottom: none;">
                6. HEIGHT (m)
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



    </table>
    <!-- End Personal -->


</body>

</html>