@extends('admin.admin_master')

@section('title') All Archived | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-secondary"><i class="fas fa-archive"></i> Service Record Archived List</h3>
                <p class="text-subtitle text-muted">All List of Archived (Service Record).</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Archived</li>
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
                                <th>User Secret ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Status</th>
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
                                <td>
                                    @if ($value->service_record_status == "Pending")
                                    <span class="badge bg-warning text-dark"><i class="fas fa-info-circle"></i> Pending Request</span>
                                    @else ($value->service_record_status == "Done")
                                    <span class="badge bg-success"><i class="fas fa-check-circle"></i> Done</span>
                                    @endif
                                </td>
                                <td> {{ date('m/d/Y - h:ia', strtotime($value->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('restore.archived.view', $value->id) }}" type="button" class="btn btn-success" id="restore">
                                        Restore
                                    </a>
                                    <a href="{{ route('delete.archived.view', $value->id) }}" class="btn icon btn-danger" id="delete">Delete</a>
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