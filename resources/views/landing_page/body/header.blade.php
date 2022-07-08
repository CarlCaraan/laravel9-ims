@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div id="logo">
            <h1><a href="{{ route('welcome') }}">DepEd <span>SDO</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link {{ ($route == 'welcome') ? 'active' : '' }}" href="{{ route('welcome')  }}">Home</a></li>
                <li class="dropdown"><a href="#"><span class="{{ ($prefix == '/about') ? 'active' : '' }}">About Us</span> <i class="bi bi-chevron-down {{ ($prefix == '/about') ? 'active' : '' }}"></i></a>
                    <ul>
                        <li><a class="{{ ($route == 'about.mission.view') ? 'active' : '' }}" href="{{ route('about.mission.view') }}">Mission Vission</a></li>
                        <li><a class="{{ ($route == 'about.quality.view') ? 'active' : '' }}" href="{{ route('about.quality.view') }}">Quality Policy</a></li>
                        <li><a class="{{ ($route == 'about.message.view') ? 'active' : '' }}" href="{{ route('about.message.view') }}">Message from SDS</a></li>
                        <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li> -->
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Sections</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Offices</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                    </ul>
                </li>
                <li><a class="nav-link {{ ($route == 'user.contact.add') ? 'active' : '' }}" href="{{ route('user.contact.add') }}">Contact Us</a></li>
                <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>