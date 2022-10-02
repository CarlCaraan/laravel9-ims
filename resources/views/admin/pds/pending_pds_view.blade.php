@extends('admin.admin_master')

@section('title') For Verification PDS | Division of Laguna @endsection

@section('content')
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-warning"><i class="bi bi-info-circle-fill"></i> For Verification PDS</h3>
                <p class="text-subtitle text-muted">All List of Pending PDS.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Pending PDS</li>
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
                                <th>Action</th>
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
                                    <a href="{{ route('pds.pending.archive', $value->id) }}" class="btn icon btn-danger" id="archive"><i class="fas fa-archive"></i></a>
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

                                            <h6>User Details:</h6>
                                            <div class="border rounded p-2 mb-4 shadow-sm">
                                                <span><strong>Email:</strong> {{ $value['user']['email'] }}</span><br />
                                                <span><strong>Name:</strong> {{ $value['user']['first_name'] . " " . $value['user']['last_name']  }}</span><br />
                                                <span><strong>Sex:</strong> {{ $value['user']['gender'] }}</span> <br />
                                                <small><strong>User Secret ID:</strong> <ins>{{ $value['user']['tracking_id'] }}</ins></small> <br />
                                                <hr class="my-1" style=" border-top: 1px dashed #fff;">
                                                <span><strong>Attachment:</strong>
                                                    [
                                                    <a class="text-underline" href="{{ url('upload/pdf_uploads/'.$value->pds_filename) }}" target="_blank">
                                                        Preview
                                                    </a>
                                                    ]
                                                </span> <br />
                                                <small><strong>Document Tracking ID:</strong> <ins>{{ $value->pds_tracking_no }}</ins></small>
                                            </div>

                                            <form action="{{ route('pds.pending.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $value->id }}">

                                                <div class="form-group">
                                                    <label class="form-label" for="pds_status">Status</label>
                                                    <select name="pds_status" id="status{{ $value->id }}" class="form-select mb-2" required>
                                                        <option value="" selected>Select</option>
                                                        <option value="Verified">Verified</option>
                                                        <option value="Invalid">Invalid</option>
                                                    </select>
                                                </div>

                                                <div class="form-group" style="display: none;" id="comment{{ $value->id }}">
                                                    <label class="form-label" for="pds_message">Comment <span class="text-muted">(if invalid)</span><span class="text-danger">*</span></label>
                                                    <textarea id="comment_textarea{{ $value->id }}" class="form-control" name="pds_message" rows="3" placeholder="Just leave a comment why it is invalid." required></textarea>
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

                            <!-- Start Hidden Comment Textarea -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $("#status{{ $value->id }}").change(function() {
                                        $('#comment{{ $value->id }}').hide();
                                        $('#comment_textarea{{ $value->id }}').removeAttr('required', 'required');

                                        var optvalue = $("#status{{ $value->id }}").find(":selected").val();
                                        if (optvalue == "Invalid") {
                                            $('#comment{{ $value->id }}').show();
                                            $('#comment_textarea{{ $value->id }}').attr('required', 'required');
                                        }
                                    });
                                });
                            </script>
                            @endforeach
                            <!-- End Hidden Comment Textarea -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End Page Content -->
@endsection