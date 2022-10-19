@extends('admin.admin_master')

@section('title') Dashboard | Division of Laguna @endsection

@section('content')
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-success">Dashboard</h3>
                <p class="text-subtitle text-muted">Graphic representation of users data.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Profile Views</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Followers</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Following</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Personal Datasheet Statistics</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="pds_bar"></canvas>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Service Record Statistics</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="sr_bar"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Inquiries</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inquiries as $inquiry)
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <span class="avatar-content bg-secondary shadow-sm rounded-circle">{{ substr($inquiry->name,0,1)}}</span>
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">{{ $inquiry->name }}
                                                        <br>
                                                        <span class="text-muted">
                                                            {{ $inquiry->email }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">{{ $inquiry->message }}</p>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>System Roles</h4>
                </div>
                <div class="card-body">
                    <!-- <div id="chart-visitors-profile"></div> -->
                    <canvas id="roles_pie" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Recent Registered User</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach ($users as $user)
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/user_images/default_photo.png') }}">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">{{ $user->first_name . " " . $user->last_name}}</h5>
                            <h6 class="text-muted mb-0">{{ $user->email }}</h6>
                        </div>
                    </div>
                    @endforeach


                    <div class="px-4">
                        <a href="{{ route('user.view') }}" class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>Go to Manage Users</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- ========== Start Chart Js Section ========== -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pie (System Roles)
    var configPie = document.getElementById('roles_pie');
    const rolesPie = new Chart(
        configPie, {
            type: 'doughnut',
            data: {
                labels: [
                    'Admin',
                    'HR',
                    'Users'
                ],
                datasets: [{
                    label: 'User Roles',
                    data: ['{{ $adminCount }}', '{{ $hrCount }}', '{{ $userCount }}'],
                    backgroundColor: [
                        '#465FBA', // Admin
                        '#6FC4E6', // HR
                        '#3C8458' // Users
                    ],
                    hoverOffset: 4
                }]
            },
        }
    );

    // Bar (PDS)
    var configBarPDS = document.getElementById("pds_bar");
    var PdsBar = new Chart(configBarPDS, {
        type: 'bar',
        data: {
            labels: ['For Verification', 'Verified', 'Invalid'],
            datasets: [{
                label: 'For Verification',
                backgroundColor: "#F8C337",
                data: ['{{ $pdsPendingCount }}', 0, 0]
            }, {
                label: 'Verified',
                backgroundColor: "#4EA44F",
                data: [0, '{{ $pdsVerifiedCount }}', 0]
            }, {
                label: 'Invalid',
                backgroundColor: "#CE4546",
                data: [0, 0, '{{ $pdsInvalidCount }}']
            }]
        },
    });

    // Bar (SR)
    var configBarSR = document.getElementById("sr_bar");
    var SRBar = new Chart(configBarSR, {
        type: 'bar',
        data: {
            labels: ['Pending', 'Completed', 'Archived By Hr'],
            datasets: [{
                label: 'Pending',
                backgroundColor: "#F8C337",
                data: ['{{ $srPendingCount }}', 0, 0]
            }, {
                label: 'Completed',
                backgroundColor: "#4EA44F",
                data: [0, '{{ $srCompletedCount }}', 0]
            }, {
                label: 'Archived By Hr',
                backgroundColor: "#6D757C",
                data: [0, 0, '{{ $srArchivedCount }}']
            }]
        },
    });
</script>
<!-- ========== End Chart Js Section ========== -->


@endsection