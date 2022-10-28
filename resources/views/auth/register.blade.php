<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | DEPED Division of Laguna</title>
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
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="center mb-4">
                        <a href="{{ route('welcome') }}" title="HOMEPAGE">
                            <img class="img-fluid" width="150px" height="150px" src="{{ asset('auth/images/auth_brand.png') }}" alt="Logo">
                        </a>
                    </div>
                    <!-- <h1 class="auth-title">Sign Up</h1> -->
                    <p class="auth-subtitle mb-4">Input your data to register to our website.</p>

                    <!-- Start Validation Message -->
                    <x-jet-validation-errors class="alert alert-secondary text-danger border border-danger" />
                    <!-- End Validation Message -->

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group form-floating position-relative has-icon-left">
                            <input type="text" class="form-control form-control-xl" placeholder="First Name" type="text" id="first_name" name="first_name" value="{{old('first_name')}}" autofocus autocomplete="first_name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <label class="ms-5" for="name">First Name</label>
                        </div>
                        <div class="form-group form-floating position-relative has-icon-left">
                            <input type="text" class="form-control form-control-xl" placeholder="Last Name" type="text" id="last_name" name="last_name" value="{{old('last_name')}}" autocomplete="first_name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <label class="ms-5" for="name">Last Name</label>
                        </div>
                        <div class="form-group form-floating position-relative has-icon-left">
                            <input type="email" class="form-control form-control-xl" placeholder="Email Address" id="email" type="email" name="email" value="{{old('email')}}">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <label class="ms-5" for="email">Email Address</label>
                        </div>
                        <div class="form-group form-floating position-relative has-icon-left">
                            <input type="password" class="form-control form-control-xl" minlength="8" maxlength="24" placeholder="Password" id="password" name="password" autocomplete="new-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <label class="ms-5" for="password">Password</label>
                        </div>
                        <div class="form-group form-floating position-relative has-icon-left">
                            <input type="password" class="form-control form-control-xl" minlength="8" maxlength="24" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                            <div class=" form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <label class="ms-5" for="password_confirmation">Confirm Password</label>
                        </div>
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                            <select class="form-select form-select-xl" id="inputGroupSelect01" name="gender">
                                <option selected value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                        </div>

                        <!-- Start Terms and Condition -->
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" />

                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-custom hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-custom hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </x-jet-label>
                        </div>
                        @endif
                        <!-- End Terms and Condition -->

                        <button class="btn btn-block btn-lg mt-4 custom-btn"><i class="fa-solid fa-right-to-bracket me-1"></i> Sign Up</button>
                    </form>
                    <div class="text-center mt-4">
                        <p class='text-gray-600'>Already have an account? <a href="{{route('login')}}" class="font-bold text-custom">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 d-none d-xl-block">
                <div class="auth-background" id="auth-right"></div>
            </div>
        </div>

    </div>
</body>

</html>