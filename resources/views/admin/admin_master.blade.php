<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/shared/iconly.css') }}">

    <!-- Toastify CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
    <div id="app">
        <!-- Start Sidebar -->
        @include('admin.body.sidebar')
        <!-- End Sidebar -->

        <div id="main" class='layout-navbar'>
            <!-- Start Header -->
            @include('admin.body.header')
            <!-- End Header -->

            <div id="main-content">
                <!-- Start Content -->
                @yield('content')
                <!-- End Content -->

                <!-- Start Footer -->
                @include('admin.body.footer')
                <!-- End Footer -->
            </div>

        </div>
    </div>

    <!-- ========= All SCRIPTS ========= -->
    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/dashboard.js') }}"></script>

    <!-- Toastify JS CDN -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        @if(Session::has('message'))
        Toastify({
            text: "{{ Session::get('message') }}",
            className: "{{ Session::get('alert-type') }}",
            close: true,
        }).showToast();
        @endif
    </script>
    <style>
        .success {
            background: #5cb85c;
        }

        .error {
            background: #d9534f;
        }

        .info {
            background: #5bc0de;
        }

        .warning {
            background: #f0ad4e;
        }

        .primary {
            background: #0275d8;
        }
    </style>

</body>

</html>