@extends('admin.admin_master')

@section('title') Completed Request | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-success">Completed Service Record List</h3>
                <p class="text-subtitle text-muted">All List of Completed (Service Record).</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Completed Request</li>
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
            <div class="w-100 mb-2">
                <a class="btn btn-primary" href="https://app.drift.com/conversations" target="_blank">Go to User Concerns</a>
            </div>
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID No.</th>
                                <th>User Secret ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Date Completed</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value['user']['tracking_id'] }}</td>
                                <td>{{ $value['user']['email'] }}</td>
                                <td>{{ $value['user']['first_name'] . ' ' . $value['user']['last_name'] }}</td>
                                <td> {{ date('m/d/Y - h:ia', strtotime($value->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('viewdetails.completed.sr', [$value['user']['email'], $value->id]) }}" type="button" class="btn btn-primary">
                                        View Details
                                    </a>
                                    <a href="{{ route('archivedetails.completed.sr', [$value['user']['email'], $value->id]) }}" class="btn icon btn-danger" id="archive">Archive</a>
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