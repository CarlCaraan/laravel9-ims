<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/shared/iconly.css') }}">

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
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/dashboard.js') }}"></script>
</body>

</html>