<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/F3FvV5D/PDF-file-icon-svg.png">

    <title>PDS Report</title>

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
    <div class="center">
        <span>Republic of the Philippines</span> <br />
        <span>Department of Eduaction</span> <br />
        <span>Region IV</span> <br />
        <strong><span>DIVISION OF LAGUNA</span></strong> <br />
        <h4>Personal Datasheet Report</h4>
    </div>
    <!-- ========= End Header ========= -->


    <div>
        <strong>Report Date</strong><br>
        From: {{ date('m/d/Y - H:ia', strtotime($s_date)) }}<br>
        To: {{ date('m/d/Y - H:ia', strtotime($e_date)) }}
    </div>
    <h4><strong>Total Result:</strong> {{ $total_pds }}</h4>
    <!-- ========= Start Table ========= -->
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <th>SL No</th>
                <th>User Secret Id</th>
                <th>PDS Tracking ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Sex</th>
                <th>PDS Date Uploaded</th>
            </tr>

            <!-- Start Dynamic Row -->
            @foreach ($pds_lists as $key => $pds_list)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $pds_list['user']['tracking_id'] }}</td>
                <td>{{ $pds_list->pds_tracking_no }}</td>
                <td>{{ $pds_list['user']['first_name'] . " " . $pds_list['user']['last_name'] }}</td>
                <td>{{ $pds_list['user']['email'] }}</td>
                <td>{{ $pds_list['user']['gender'] }}</td>
                <td>{{ $pds_list->pds_date_uploaded }}</td>
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
                <td>
                    <span class="footer-pagetext">
                        Date Issued: {{ date('m/d/Y', strtotime(now())) }}
                    </span>
                </td>
            </tr>

        </table>
    </htmlpagefooter>
    <!-- ========= End Footer Page ========= -->

</body>

</html>