<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/shared/iconly.css') }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.ico') }}" type="image/png">">

    <!-- Toastify CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/pages/simple-datatables.css') }}">

    <!-- Trix CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
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

    <!-- Datatable JS -->
    <script src="{{ asset('admin/assets/js/extensions/simple-datatables.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // SweetAlert2
        // ~Delete
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this Row?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });

        // ~Archive
        $(function() {
            $(document).on('click', '#archive', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Archive this Row?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, archive it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Archived!',
                            'Your file has been Archived.',
                            'success'
                        )
                    }
                })
            });
        });

        // ~Restore
        $(function() {
            $(document).on('click', '#restore', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Restore this Row?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, restore it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Restored!',
                            'Your file has been Recovered.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>

    <!-- Fontawesome JS CDN -->
    <script src="https://kit.fontawesome.com/fbaf02a1c1.js"></script>

    <!-- Trix Js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
</body>

</html>