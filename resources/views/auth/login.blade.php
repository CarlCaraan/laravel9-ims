<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DEPED Division of Laguna</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/pages/auth.css') }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.ico') }}" type="image/png">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
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
                    <p class="auth-subtitle">DEPED - School Division Office Centralized Document Management System.</p>

                    <!-- Google and FB Buttons -->
                    <div class="text-center mt-4">
                        <a class="btn btn-light" href="{{ url('login/google')}}"><i class="bi bi-google text-danger"></i></a>
                        <a class="btn btn-light" href="{{ url('login/facebook')}}"><i class="bi bi-facebook text-primary"></i></a>
                    </div>

                    <div class="divider">
                        <div class="divider-text">or</div>
                    </div>

                    <!-- Start Validation Message -->
                    <x-jet-validation-errors class="alert alert-secondary text-danger border border-danger" />
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- End Validation Message -->

                    <!-- Start Success Message -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible show fade" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <!-- End Success Message -->

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group form-floating position-relative has-icon-left">
                            <input type="email" id="email" name="email" class="form-control form-control-xl" placeholder="Email Address" value="{{ old('email') }}" autofocus required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <label class="ms-5" for="email">Email Address</label>
                        </div>
                        <div class="form-group form-floating position-relative has-icon-left">
                            <input type="password" id="password" minlength="8" maxlength="24" name="password" class="form-control form-control-xl" placeholder="Password" autocomplete="current-password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <label class="ms-5" for="password">Password</label>
                        </div>
                        <div class="float-end mb-4">
                            <small>
                                <a class="text-secondary" href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
                            </small>
                        </div>
                        <!-- <div class="form-check form-check-lg d-flex align-items-end mb-3">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> -->
                        <button class="btn btn-block btn-lg custom-btn"><i class="fa-solid fa-right-to-bracket me-1"></i> Login</button>
                    </form>
                    <div class="text-center mt-5">
                        <p class="text-gray-600">Don't have an account? <a href="{{ route('register')}}" class="font-bold text-custom">Sign
                                up</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 d-none d-xl-block">
                <div class="auth-background" id="auth-right"></div>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>