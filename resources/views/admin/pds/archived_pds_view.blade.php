@extends('admin.admin_master')

@section('title') Archived PDS | Division of Laguna @endsection

@section('content')
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-secondary"><i class="fas fa-archive"></i> Archived PDS</h3>
                <p class="text-subtitle text-muted">All List of Archived PDS.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Archived PDS</li>
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
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID No.</th>
                                <th>Tracking ID No.</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Date Uploaded</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->pds_tracking_no }}</td>
                                <td>{{ $value['user']['email'] }}</td>
                                <td>{{ $value['user']['first_name'] . ' ' . $value['user']['last_name'] }}</td>
                                <td>{{ $value->pds_date_uploaded }}</td>
                                <td>
                                    <a href="{{ route('pds.restore', $value->id) }}" class="btn icon btn-success" id="restore">Restore</a>
                                    <a href="{{ route('pds.delete', $value->id) }}" class="btn icon btn-danger" id="delete">Delete</a>
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