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
        <div class="col-12">
            <!-- ========== Start Service Record Statistics Section ========== -->
            <div class="row">
                <h4><i class="fas fa-chart-bar"></i> Service Record Statistics</h4>
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <div class="stats-icon green">
                                        <i class="fas fa-file-invoice"></i>
                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <h6 class="text-muted font-semibold">Service Record Completed (Monthly Average)</h6>
                                    <h6 class="font-extrabold mb-0">{{ substr($average_sr_permonth,0,4) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <div class="stats-icon red">
                                        <i class="fas fa-id-card-alt"></i>
                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <h6 class="text-muted font-semibold">Total Applicants</h6>
                                    <h6 class="font-extrabold mb-0">{{ $sr_total_applicant }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Completed Record ({{ date('Y') }})</h4>
                            <span class="mx-2"><span style="color: #3B72BB">■</span> <small>Q1</small></span>
                            <span class="mx-2"><span style="color: #57ACED">■</span> <small>Q2</small></span>
                            <span class="mx-2"><span style="color: #4DA49E">■</span> <small>Q3</small></span>
                            <span class="mx-2"><span style="color: #5CB155">■</span> <small>Q4</small></span>
                        </div>
                        <div class="card-body">
                            <canvas id="sr_bar_calendar" height="50px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== End Service Record Statistics Section ========== -->

            <!-- ========== Start PDS Statistics Section ========== -->
            <div class="row mt-5">
                <h4><i class="fas fa-chart-area"></i> PDS Statistics</h4>
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <div class="stats-icon green">
                                        <i class="fas fa-check-square"></i>
                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <h6 class="text-muted font-semibold">Verified (Monthly Average)</h6>
                                    <h6 class="font-extrabold mb-0">{{ substr($average_pds_permonth,0,4) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <div class="stats-icon red">
                                        <i class="fas fa-id-card-alt"></i>
                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <h6 class="text-muted font-semibold">Total Applicants</h6>
                                    <h6 class="font-extrabold mb-0">{{ $pds_total_applicant }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Verfied PDS ({{ date('Y') }})</h4>
                            <span class="mx-2"><span style="color: #3B72BB">■</span> <small>Q1</small></span>
                            <span class="mx-2"><span style="color: #57ACED">■</span> <small>Q2</small></span>
                            <span class="mx-2"><span style="color: #4DA49E">■</span> <small>Q3</small></span>
                            <span class="mx-2"><span style="color: #5CB155">■</span> <small>Q4</small></span>
                        </div>
                        <div class="card-body">
                            <canvas id="pds_bar_calendar" height="50px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== End PDS Statistics Section ========== -->

            <!-- ========= Start PDS and SR Section ========= -->
            <div class="row mt-5">
                <h4><i class="fas fa-eye"></i> Montoring</h4>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Personal Datasheet (Current)</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="pds_bar" height="100px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Service Record (Current)</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="sr_bar" height="100px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========= End PDS and SR Section ========= -->

            <!-- ========== Start Lastest Inquiries Section ========== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4>Latest Inquiries</h4>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('user.inquiries.view') }}" class='font-bold float-lg-end float-sm-start'>Go to Manage Inquiries</a>
                                </div>
                            </div>
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
            <!-- ========== End Lastest Inquiries Section ========== -->

            <!-- ========== Start System Roles and Recent Users Section ========== -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>System Roles</h4>
                        </div>
                        <div class="card-body">
                            <!-- <div id="chart-visitors-profile"></div> -->
                            <canvas id="roles_pie"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>Recent Register User</h4>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('user.view') }}" class='font-bold float-lg-end float-sm-start'>Go to Manage Users</a>
                                </div>
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== End System Roles and Recent Users Section ========== -->
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

    // Calendary Bar (SR)
    var configBarSRCalendar = document.getElementById("sr_bar_calendar");
    var SRBarCalendar = new Chart(configBarSRCalendar, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                    label: 'January',
                    backgroundColor: "#3B72BB",
                    data: ['{{ $january_sr }}', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'February',
                    backgroundColor: "#3B72BB",
                    data: [0, '{{ $february_sr }}', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'March',
                    backgroundColor: "#3B72BB",
                    data: [0, 0, '{{ $march_sr }}', 0, 0, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'April',
                    backgroundColor: "#57ACED",
                    data: [0, 0, 0, '{{ $april_sr }}', 0, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'May',
                    backgroundColor: "#57ACED",
                    data: [0, 0, 0, 0, '{{ $may_sr }}', 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'June',
                    backgroundColor: "#57ACED",
                    data: [0, 0, 0, 0, 0, '{{ $june_sr }}', 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'July',
                    backgroundColor: "#4DA49E",
                    data: [0, 0, 0, 0, 0, 0, '{{ $july_sr }}', 0, 0, 0, 0, 0]
                },
                {
                    label: 'August',
                    backgroundColor: "#4DA49E",
                    data: [0, 0, 0, 0, 0, 0, 0, '{{ $august_sr }}', 0, 0, 0, 0]
                },
                {
                    label: 'September',
                    backgroundColor: "#4DA49E",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, '{{ $september_sr }}', 0, 0, 0]
                },
                {
                    label: 'October',
                    backgroundColor: "#5CB155",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, '{{ $october_sr }}', 0, 0]
                },
                {
                    label: 'November',
                    backgroundColor: "#5CB155",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{{ $november_sr }}', 0]
                },
                {
                    label: 'December',
                    backgroundColor: "#5CB155",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{{ $december_sr }}']
                },
            ]
        },
    });

    // Calendary Bar (PDS)
    var configBarPDSCalendar = document.getElementById("pds_bar_calendar");
    var PDSBarCalendar = new Chart(configBarPDSCalendar, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                    label: 'January',
                    backgroundColor: "#3B72BB",
                    data: ['{{ $january_pds }}', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'February',
                    backgroundColor: "#3B72BB",
                    data: [0, '{{ $february_pds }}', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'March',
                    backgroundColor: "#3B72BB",
                    data: [0, 0, '{{ $march_pds }}', 0, 0, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'April',
                    backgroundColor: "#57ACED",
                    data: [0, 0, 0, '{{ $april_pds }}', 0, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'May',
                    backgroundColor: "#57ACED",
                    data: [0, 0, 0, 0, '{{ $may_pds }}', 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'June',
                    backgroundColor: "#57ACED",
                    data: [0, 0, 0, 0, 0, '{{ $june_pds }}', 0, 0, 0, 0, 0, 0]
                },
                {
                    label: 'July',
                    backgroundColor: "#4DA49E",
                    data: [0, 0, 0, 0, 0, 0, '{{ $july_pds }}', 0, 0, 0, 0, 0]
                },
                {
                    label: 'August',
                    backgroundColor: "#4DA49E",
                    data: [0, 0, 0, 0, 0, 0, 0, '{{ $august_pds }}', 0, 0, 0, 0]
                },
                {
                    label: 'September',
                    backgroundColor: "#4DA49E",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, '{{ $september_pds }}', 0, 0, 0]
                },
                {
                    label: 'October',
                    backgroundColor: "#5CB155",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, '{{ $october_pds }}', 0, 0]
                },
                {
                    label: 'November',
                    backgroundColor: "#5CB155",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{{ $november_pds }}', 0]
                },
                {
                    label: 'December',
                    backgroundColor: "#5CB155",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{{ $december_pds }}']
                },
            ]
        },
    });
</script>
<!-- ========== End Chart Js Section ========== -->
@endsection