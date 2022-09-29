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
                                <th>User Email</th>
                                <th>Date Uploaded</th>
                                <th>Attachment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value['user']['email'] }}</td>
                                <td>{{ $value->pds_date_uploaded }}</td>
                                <td><a href="{{ url('upload/pdf_uploads/'.$value->pds_filename) }}" target="_blank" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> Preview</a></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#no{{ $value->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('pds.pending.archive', $value->id) }}" class="btn icon btn-danger" id="archive"><i class="fas fa-archive"></i></a>
                                </td>
                            </tr>

                            <!-- Start Modal -->
                            <div class="modal fade" id="no{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Manage PDS</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="mb-4">Email: {{ $value['user']['email'] }}</h6>
                                            <form action="{{ route('pds.pending.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $value->id }}">
                                                <label class="form-label" for="pds_status">Status</label>
                                                <select name="pds_status" class="form-select mb-2">
                                                    <option value="" disabled>Select</option>
                                                    <option class="text-success" value="Verified">Verified</option>
                                                    <option class="text-danger" value="Invalid">Invalid</option>
                                                </select>

                                                <label class="form-label" for="pds_message">Comment <strong class="text-danger">(if invalid)</strong></label>
                                                <textarea class="form-control" name="pds_message" cols="30" rows="10" placeholder="Just leave a comment."></textarea>
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