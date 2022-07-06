<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | DEPED Division of Laguna</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.png') }}" type="image/png">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="center mb-4">
                        <img class="img-fluid" width="150px" height="150px" src="{{ asset('auth/images/auth_brand.png') }}" alt="Logo">
                    </div>
                    <h3 class="text-success text-center">Forgot Password</h3>
                    <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>

                    <!-- Start Validation Message -->
                    <x-jet-validation-errors class="alert alert-secondary text-danger border border-danger" />
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- End Validation Message -->

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group form-floating position-relative has-icon-left">
                            <input type="email" class="form-control form-control-xl" placeholder="Email" id="email" type="email" name="email" value="{{old('email')}}" required autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <label class="ms-5" for="email">Email Address</label>
                        </div>
                        <button class="btn btn-success btn-block btn-lg shadow-lg mt-2">Send</button>
                    </form>
                    <div class="text-center mt-4">
                        <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}" class="font-bold text-success">Log
                                in</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <img class="img-fluid h-100 w-100" src="{{ asset('auth/images/auth_background.jpg') }}" alt="background">
                </div>
            </div>
        </div>

    </div>
</body>

</html>