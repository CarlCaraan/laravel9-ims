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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
</head>

<body>

    <!-- ========= Top Bar ========= -->
    @php
    $userSiteInfos = DB::table('user_site_infos')->first();
    @endphp
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">{{ $userSiteInfos->email }}</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $userSiteInfos->mobile }}</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="{{ route('terms.show') }}" target="_blank">Terms</a>
                <a href="{{ route('policy.show') }}" target="_blank">Policy</a>
                <a href="{{ $userSiteInfos->facebook_link }}" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="{{ $userSiteInfos->website_link }}" class="instagram"><i class="bi bi-globe"></i></a>
            </div>
        </div>
    </section>
    <!-- ========= End Top Bar ========= -->

    <!-- ========= Header ========= -->
    @include('landing_page.body.header')
    <!-- ========= End Header ========= -->

    <!-- ========= Start Main ========= -->
    <main id="main">
        @yield('content')
    </main>
    <!-- ========= End Main ========= -->

    <!-- ========= Footer ======= -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        // Toastr
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
    </script>

    <!-- FontAwesome CDN -->
    <script src="https://kit.fontawesome.com/fbaf02a1c1.js"></script>
</body>

</html>