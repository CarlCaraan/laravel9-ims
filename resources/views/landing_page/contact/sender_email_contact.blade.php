<div>
    Hi, <br>
    You have Pending Inquiry - DEPED - SDO. <br>
    <small>Please wait to 3-4 business days.</small> <br>
    <strong>Details:</strong> <br>
    <strong>Name:</strong>{{ $data['name'] }} <br>
    <strong>Email:</strong>{{ $data['email'] }} <br>
    <strong>Your Message:</strong>{{ $data['message'] }} <br><br>

</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen,
                Ubuntu, Cantarell, Fira Sans, Droid Sans, vetica Neue, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .bg-gray {
            background: #EDF2F7 !important;
            padding-top: 2rem;
            padding-bottom: 10rem;
        }

        .card {
            border: none;
            border-radius: 2px !important;
            background-color: #fff;
            padding: 2rem;
            width: 75%;
            margin: 0 auto;
        }

        .img-container {
            display: block;
            margin: 2rem auto 2rem auto;
        }
    </style>
</head>

<body>
    <div class="bg-gray">
        <!-- Start Header Image -->
        <img class="img-container" src="https://i.ibb.co/M6vmyQs/auth-brand.png" width="80px" alt="">
        <!-- End Header Image -->

        <!-- Start Card -->
        <div class="card">
            Hi, <br />
            <p>
                You have Pending Inquiry - DEPED - SDO.
            </p>
            <p>
                <small>Please wait to 3-4 business days.</small>
            </p>
            <strong>User Details:</strong> <br>
            <strong>Name: {{ $data['name'] }} </strong> <br>
            <strong>Email: {{ $data['email'] }}</strong> <br>
            <strong>Your Message: {{ $data['message'] }}</strong> <br>
            <small> ============================================ </small><br />
            <small> *** This is an automated message please do not reply. *** </small><br />
            <small> ============================================ </small>
        </div>
        <!-- End Card -->
    </div>
</body>

</html>