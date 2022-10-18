<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify your Email | DEPED Division of Laguna</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/pages/auth.css') }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.ico') }}" type="image/png">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-xl-5 col-12">
                <div id="auth-left">
                    <div class="center mb-4">
                        <a href="{{ route('welcome') }}" title="HOMEPAGE">
                            <img class="img-fluid" width="150px" height="150px" src="{{ asset('auth/images/auth_brand.png') }}" alt="Logo">
                        </a>
                    </div>
                    <!-- <h1 class="auth-title center">Log in.</h1> -->
                    <p class="auth-subtitle mb-4">DEPED - School Division Office Centralized Document Management System.</p>

                    <!-- Start Validation Message -->
                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                    </div>
                    @endif
                    <!-- End Validation Message -->

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button class="btn btn-block btn-lg custom-btn"> {{ __('Resend Verification Email') }}</button>
                    </form>

                    <form method="get" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-secondary btn-block btn-lg shadow-lg mt-2">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-xl-7 d-none d-xl-block">
                <div id="auth-right">
                    <img class="img-fluid h-100" src="{{ asset('auth/images/auth_background.jpg') }}" alt="background">
                </div>
            </div>
        </div>

    </div>
</body>

</html>