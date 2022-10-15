@extends('admin.admin_master')

@section('title') Invalid PDS | Division of Laguna @endsection

@section('content')
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-danger">Invalid PDS</h3>
                <p class="text-subtitle text-muted">All List of Invalid PDS.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Invalid PDS</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- ========= Start Error Message Validation ========= -->
@if ($errors->any())
<div class="text-danger fw-bold">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

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
                                <th width="10%">Action</th>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#no{{ $value->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('pds.archive', $value->id) }}" class="btn icon btn-danger" id="archive"><i class="fas fa-archive"></i></a>
                                </td>
                            </tr>

                            <!-- Start Modal -->
                            <div class="modal" id="no{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Manage PDS</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success">
                                                <strong>Note:</strong> User will be notified through their email.
                                            </div>

                                            <!-- Start User Details -->
                                            <div class="card shadow border rounded p-2 mb-4 shadow-sm">
                                                <div class="card-body">
                                                    <h6>User Details:</h6>
                                                    <div class="row">
                                                        <div class="col-lg-10 mb-2">
                                                            <span><strong>Name:</strong> {{ $value['user']['first_name'] . " " . $value['user']['last_name']  }}</span><br />
                                                            <span><strong>Email:</strong> {{ $value['user']['email'] }}</span><br />
                                                            <span><strong>Sex:</strong> {{ $value['user']['gender'] }}</span> <br />
                                                            <small><strong>User Secret ID:</strong> <ins>{{ $value['user']['tracking_id'] }}</ins></small> <br />
                                                        </div>
                                                        <div class="col-lg-2 mb-2">
                                                            @if (!empty($value['user']['profile_photo_path']))
                                                            <img class="img-fluid float-end rounded" src="{{ url('upload/user_images/'.$value['user']['profile_photo_path']) }}" alt="Profile Photo">
                                                            @else
                                                            <img class="img-fluid" src="{{ (!empty($value['user']['profile_photo_path'])) ? url('upload/user_images/'.$value['user']['profile_photo_path']) : url('upload/user_images/default_photo.png') }}" alt="Profile Photo">
                                                            @endif
                                                        </div>
                                                    </div> <!-- End Row -->
                                                    <hr class="my-1" style=" border-top: 1px dashed #fff;">
                                                    <span>
                                                        <strong>Attachment:</strong>
                                                        [
                                                        <a class="text-underline" href="{{ url('upload/pdf_uploads/'.$value->pds_filename) }}" target="_blank">
                                                            Preview
                                                        </a>
                                                        ]
                                                    </span> <br />
                                                    <small><strong>Document Tracking ID:</strong> <ins>{{ $value->pds_tracking_no }}</ins></small>
                                                </div>
                                            </div>
                                            <!-- End User Details -->

                                            <h6>Message:</h6>
                                            <div class="mb-4">
                                                {{ $value->pds_message }}
                                            </div>

                                            <form action="{{ route('pds.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $value->id }}">

                                                <div class="form-group">
                                                    <label class="form-label" for="pds_status">Status</label><br />
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" value="For Verification" type="radio" name="pds_status" required />
                                                        <label class="form-check-label" for="pds_status">
                                                            For Verification
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" value="Verified" type="radio" name="pds_status" />
                                                        <label class="form-check-label" for="pds_status">
                                                            Verified
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
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