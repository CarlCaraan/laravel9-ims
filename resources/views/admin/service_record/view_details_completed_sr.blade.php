@extends('admin.admin_master')

@section('title') {{ $user->first_name . " " . $user->last_name }} | Service Record @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-success">Service Record Details of:
                    <span class="text-secondary">{{ $user->first_name . " " . $user->last_name }}</span>
                </h3>

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