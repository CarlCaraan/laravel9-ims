<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.ico') }}" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing_page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_page/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landing_page/assets/css/style.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('landing_page/assets/css/custom.css') }}" rel="stylesheet">

    <!-- Toastr CSS CDN -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" /> -->

    <!-- Filepond CSS CDN -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    <!-- SnackBar CSS -->
    <link href="{{ asset('landing_page/assets/css/snackbar.min.css') }}" rel="stylesheet">

    <!-- Datatable CSS CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
</head>

<body>
    @php
    $userSiteInfos = DB::table('user_site_infos')->first();
    @endphp

    <!-- ========= Header ========= -->
    @include('user.body.header')
    <!-- ========= End Header ========= -->

    <!-- ========= Start Main ========= -->
    <main id="main">
        @yield('content')
    </main>
    <!-- ========= End Main ========= -->

    <!-- ========= Start Footer ========= -->
    @include('landing_page.body.footer')
    <!-- ========= End Footer ========= -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing_page/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing_page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landing_page/assets/js/main.js') }}"></script>

    <!-- PWA SCRIPTS -->
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

    <!-- Start Google Translate API -->
    <script>
        function googleTranslateElementInit() {
            var config = {
                pageLanguage: 'en',
                includedLanguages: 'en,tl',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            };
            var langOptionsID = 'google_translate_element';
            new google.translate.TranslateElement(config, langOptionsID);
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- End Google Translate API -->

    <!-- Toastr JS CDN -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        Toastr
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}")
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}")
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}")
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}")
                break;
        }
        @endif
    </script> -->

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

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

        // ~Delete Photo
        $(function() {
            $(document).on('click', '#delete_photo', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this Photo?",
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
                            'Your Photo has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });

        // ~Send Service Record Request
        $(function() {
            $(document).on('click', '#request', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Request a Service Record?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, send it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Request Sent!',
                            'Your Request has successfully sent.',
                            'success'
                        )
                    }
                })
            });
        });

        // ~Send Service Cancel Request
        $(function() {
            $(document).on('click', '#cancel', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Cancel your request?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, cancel it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Cancelled Succesfully!',
                            'Your Request cancelled successfully.',
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

    <!-- SnackBar JS -->
    <script src="{{ asset('landing_page/assets/js/snackbar.min.js') }}"></script>
    <script>
        // SnackBar
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                Snackbar.show({
                    pos: 'bottom-center',
                    text: "{{ Session::get('message') }}",
                    textColor: "#5bc0de",
                    actionTextColor: "#f7f7f7"
                });
                break;

            case 'success':
                Snackbar.show({
                    pos: 'bottom-center',
                    text: "{{ Session::get('message') }}",
                    textColor: "#5cb85c",
                    actionTextColor: "#f7f7f7"
                });
                break;

            case 'warning':
                Snackbar.show({
                    pos: 'bottom-center',
                    text: "{{ Session::get('message') }}",
                    textColor: "#f0ad4e",
                    actionTextColor: "#f7f7f7"
                });
                break;

            case 'error':
                Snackbar.show({
                    pos: 'bottom-center',
                    text: "{{ Session::get('message') }}",
                    textColor: "#d9534f",
                    actionTextColor: "#f7f7f7"
                });
                break;
        }
        @endif
    </script>
    <!-- If has an error -->
    @if($errors->any())
    <script>
        Snackbar.show({
            pos: 'bottom-center',
            text: "There was an error in saving your information!",
            textColor: "#d9534f",
            actionTextColor: "#f7f7f7"
        });
    </script>
    @endif

    <!-- Datatable JS CDN -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


    <!-- Start of Async Drift Code -->
    <script>
        "use strict";
        ! function() {
            var t = window.driftt = window.drift = window.driftt || [];
            if (!t.init) {
                if (t.invoked) return void(window.console && console.error && console.error("Drift snippet included twice."));
                t.invoked = !0, t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on"],
                    t.factory = function(e) {
                        return function() {
                            var n = Array.prototype.slice.call(arguments);
                            return n.unshift(e), t.push(n), t;
                        };
                    }, t.methods.forEach(function(e) {
                        t[e] = t.factory(e);
                    }), t.load = function(t) {
                        var e = 3e5,
                            n = Math.ceil(new Date() / e) * e,
                            o = document.createElement("script");
                        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                        var i = document.getElementsByTagName("script")[0];
                        i.parentNode.insertBefore(o, i);
                    };
            }
        }();
        drift.SNIPPET_VERSION = '0.3.1';
        drift.load('sgpeumma7u65');
    </script>
    <!-- End of Async Drift Code -->
</body>

</html>