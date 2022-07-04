@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item">No notification available</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ (Auth::user()->user_type == "Admin") ? "Administrator" : Auth::user()->user_type}}</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <!-- <div class="avatar avatar-md">
                                    <img src="assets/images/faces/1.jpg">
                                </div> -->
                                <div class="avatar me-3">
                                    @if (!empty(Auth::user()->profile_photo_path))
                                    <img class="img-fluid" src="{{ url('upload/user_images/'.Auth::user()->profile_photo_path) }}" alt="User Avatar">
                                    @else
                                    <span class="avatar-content bg-warning rounded-circle">{{ substr(Auth::user()->first_name,0,1) . substr(Auth::user()->last_name,0,1)}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</h6>
                        </li>
                        <li><a class="dropdown-item {{ ($prefix == '/profile') ? 'active' : '' }} " href="{{ route('admin.profile.view') }}"><i class="icon-mid bi bi-gear me-2"></i>
                                Account Settings
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>