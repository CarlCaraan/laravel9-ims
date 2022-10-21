@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3 text-success"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown me-3">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <!-- ========= Start Notification ========= -->
                        <a class="nav-link active dropdown-toggle text-gray-600" id="bell_link" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4'></i>
                            <span id="badge__container">

                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="height: 400px; overflow-y: scroll;" aria-labelledby="dropdownMenuButton">
                            <div id="notification_ul">

                            </div>
                            <li><a class="dropdown-item text-center text-primary" style="cursor:pointer;" id="resolve_btn">clear all resolved</a></li>
                        </ul>
                        <!-- ========= End Notification ========= -->
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
                            <h6 class="dropdown-header">{{ Auth::user()->email }}</h6>
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

<!-- Start Json Get Equipment Type Select Options -->
<script type="text/javascript">
    $(document).ready(function() {
        // Notif List Item
        $.ajax({
            url: "{{ route('admin.get.notification') }}",
            type: "GET",
            // data: {
            //     facility_id: facility_id
            // },
            success: function(data) {
                var html = '<li><h6 class="dropdown-header">Notifications</h6></li>';
                $.each(data, function(key, v) {
                    var formattedTimestamp = new Date(v.timestamp);

                    var simpleDate = (function() {
                        var measures = {
                            second: 1,
                            minute: 60,
                            hour: 3600,
                            day: 86400,
                            week: 604800,
                            month: 2592000,
                            year: 31536000
                        };
                        var chkMultiple = function(amount, type) {
                            return (amount > 1) ? amount + " " + type + "s" : "a " + type;
                        };
                        return function(thedate) {
                            var dateStr, amount, denomination,
                                current = new Date().getTime(),
                                diff = (current - thedate.getTime()) / 1000; // work with seconds
                            if (diff > measures.year) {
                                denomination = "year";
                            } else if (diff > measures.month) {
                                denomination = "month";
                            } else if (diff > measures.week) {
                                denomination = "week";
                            } else if (diff > measures.day) {
                                denomination = "day";
                            } else if (diff > measures.hour) {
                                denomination = "hour";
                            } else if (diff > measures.minute) {
                                denomination = "minute";
                            } else {
                                dateStr = "a few seconds ago";
                                return dateStr;
                            }
                            amount = Math.round(diff / measures[denomination]);
                            dateStr = chkMultiple(amount, denomination) + " ago";
                            return dateStr;
                        };
                    })();

                    if (v.status == 'task') {
                        var style = 'warning'
                    } else {
                        var style = 'success'
                    }
                    html += '<li class="shadow-sm w-100"><a class="dropdown-item"><strong>' + v.user.first_name + " " + v.user.last_name + " </strong>" + v.description + "<br/><small>(" + v.user.email + ")</small> <span class='badge bg-light-" + style + " float-end'>" + v.status + "</span>" + "<small>● " + simpleDate(formattedTimestamp) + "</small></a></li>";
                });
                $('#notification_ul').html(html);
            },
        });

        // Notif Badge Get
        $.ajax({
            url: "{{ route('admin.get.notification.badge') }}",
            type: "GET",
            success: function(data) {
                var html = '';
                html += '<badge class="badge badge-pill bg-danger">' + data + '</badge>';
                $('#badge__container').html(html);
            },
        });

    });

    // Update Badge on Click
    $($('#bell_link')).click(function() {
        $.ajax({
            url: "{{ route('admin.get.notification.update') }}",
            type: "GET",
            success: function(data) {
                var html = '';
                html += '<span>' + data + '</span>';
                $('#badge__container').html(html);
            },
        });
    });

    // Resolve Click
    $($('#resolve_btn')).click(function() {
        $.ajax({
            url: "{{ route('admin.get.notification.resolve') }}",
            type: "GET",
            success: function(data) {
                var html = '<li><h6 class="dropdown-header">Notifications</h6> </li>';
                $.each(data, function(key, v) {
                    var formattedTimestamp = new Date(v.timestamp);

                    var simpleDate = (function() {
                        var measures = {
                            second: 1,
                            minute: 60,
                            hour: 3600,
                            day: 86400,
                            week: 604800,
                            month: 2592000,
                            year: 31536000
                        };
                        var chkMultiple = function(amount, type) {
                            return (amount > 1) ? amount + " " + type + "s" : "a " + type;
                        };
                        return function(thedate) {
                            var dateStr, amount, denomination,
                                current = new Date().getTime(),
                                diff = (current - thedate.getTime()) / 1000; // work with seconds
                            if (diff > measures.year) {
                                denomination = "year";
                            } else if (diff > measures.month) {
                                denomination = "month";
                            } else if (diff > measures.week) {
                                denomination = "week";
                            } else if (diff > measures.day) {
                                denomination = "day";
                            } else if (diff > measures.hour) {
                                denomination = "hour";
                            } else if (diff > measures.minute) {
                                denomination = "minute";
                            } else {
                                dateStr = "a few seconds ago";
                                return dateStr;
                            }
                            amount = Math.round(diff / measures[denomination]);
                            dateStr = chkMultiple(amount, denomination) + " ago";
                            return dateStr;
                        };
                    })();

                    if (v.status == 'task') {
                        var style = 'warning'
                    } else {
                        var style = 'success'
                    }
                    html += '<li class="shadow-sm w-100"><a class="dropdown-item"><strong>' + v.user.first_name + " " + v.user.last_name + " </strong>" + v.description + "<br/><small>(" + v.user.email + ")</small> <span class='badge bg-light-" + style + " float-end'>" + v.status + "</span>" + "<small>● " + simpleDate(formattedTimestamp) + "</small></a></li>";
                });
                $('#notification_ul').html(html);
            },
        });
    });
</script>
<!-- End Json Get Equipment Type Select Options -->