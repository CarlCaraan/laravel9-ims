<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DEPED Division of Laguna</title>
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
            <div class="col-xl-5 col-12">
                <div id="auth-left">
                    <div class="center mb-4">
                        <img class="img-fluid" width="150px" height="150px" src="{{ asset('auth/images/auth_brand.png') }}" alt="Logo">
                    </div>
                    <!-- <h1 class="auth-title center">Log in.</h1> -->
                    <p class="auth-subtitle mb-4">DEPED - School Division Office Centralized Document Management System.</p>

                    <!-- Start Validation Message -->
                    <x-jet-validation-errors class="alert alert-secondary text-danger border border-danger" />
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- End Validation Message -->

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group form-floating position-relative has-icon-left">
                            <input type="email" id="email" name="email" class="form-control form-control-xl" placeholder="Email Address" :value="old('email')" autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <label class="ms-5" for="email">Email Address</label>
                        </div>
                        <div class="form-group form-floating position-relative has-icon-left">
                            <input type="password" id="password" name="password" class="form-control form-control-xl" placeholder="Password" autocomplete="current-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <label class="ms-5" for="password">Password</label>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>

                        <div class="text-center mt-4">
                            <a class="btn btn-light" href="{{ url('login/google')}}"><i class="bi bi-google text-danger"></i></a>
                            <a class="btn btn-light" href="{{ url('login/facebook')}}"><i class="bi bi-facebook text-primary"></i></a>
                        </div>
                        <div class="divider">
                            <div class="divider-text">or</div>
                        </div>
                        <button class="btn btn-success btn-block btn-lg shadow-lg">Log in</button>

                    </form>
                    <div class="text-center mt-5">
                        <p class="text-gray-600">Don't have an account? <a href="{{ route('register')}}" class="font-bold text-success">Sign
                                up</a>.</p>
                        <p><a class="font-bold text-success" href="{{ route('password.request') }}">Forgot password?</a></p>
                    </div>
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