@extends('admin.admin_master')

@section('title') {{ $user->first_name . " " . $user->last_name }} | Service Record @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-success">Service Record Details </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a class="text-success" href="{{ route('all.completed.view') }}">View Completed Request</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Service Record Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Page Content -->
<div class="page-content">
    <section class="row">
        <div class="col-12">

            <!-- Start User Card -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-header border-bottom mb-2">
                        <div class="text-center">
                            Republic of the Philippines<br />
                            Department of Education<br />
                            Region IV<br />
                            <strong>DIVISION OF LAGUNA</strong><br />
                            <h3>Service Record</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <table class="w-100 mt-5 text-center">
                                <tr>
                                    <td rowspan="2">
                                        <strong> Name:</strong>
                                    </td>
                                    <td class="border-bottom text-center">
                                        <span>{{$user->last_name }}</span>
                                    </td>
                                    <td class="border-bottom text-center">
                                        <span>{{ $user->first_name }}</span>
                                    </td>
                                    <td class="border-bottom text-center">

                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <span class="text-muted">(Surname)</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-muted">(Given Name)</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-muted">(Middle Name)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">
                                        <strong> Birth:</strong>
                                    </td>
                                    <td class="border-bottom text-center">
                                        <span>{{$user->last_name }}</span>
                                    </td>
                                    <td class="border-bottom text-center" colspan="2">
                                        <span>{{$user->last_name }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <span class="text-muted">(Date)</span>
                                    </td>
                                    <td class="text-center" colspan="2">
                                        <span class="text-muted">(Place)</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center mx-auto mt-5" style="width: 150px; height: 100%;">
                                @if (!empty($user->profile_photo_path))
                                <img class="img-fluid rounded" src="{{ url('upload/user_images/'.$user->profile_photo_path )}}" alt="Profile Photo">
                                @else
                                <img class="img-fluid" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/user_images/default_photo.png') }}" alt="Profile Photo">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Card -->

            <p class="alert bg-warning text-dark">This is to certify that the employee name herein above actually rendered services in this office as shown by the service record below
                each line which is supported by appointment and other papers actually issued by this office and approved by the authority
            </p>

            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID No.</th>
                                <th>Service From</th>
                                <th>Service To</th>
                                <th>Designation</th>
                                <th>Status</th>
                                <th>Annual Salary</th>
                                <th>Place</th>
                                <th>Branch</th>

                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->sr_from }}</td>
                                <td>{{ $value->sr_to }}</td>
                                <td>{{ $value->sr_designation }}</td>
                                <td>{{ $value->sr_status }}</td>
                                <td>₱{{ $value->sr_salary }}</td>
                                <td>{{ $value->sr_place_of_assignment }}</td>
                                <td>{{ $value->sr_branch }}</td>
                                <td>
                                    <a href="" type="button" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="" class="btn icon btn-danger" id="delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End Page Content -->
@endsection