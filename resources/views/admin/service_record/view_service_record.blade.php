@extends('admin.admin_master')

@section('title') All Request | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-warning">Service Record Requested List</h3>
                <p class="text-subtitle text-muted">All List of Request (Service Record).</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Pending Request</li>
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
                                <th>User Secret ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Date Requested</th>
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
                                <td> {{ date('m/d/Y - h:ia', strtotime($value->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('edit.request.sr', $value->id) }}" type="button" class="btn btn-primary">
                                        Create
                                    </a>
                                    <a href="{{ route('pds.archive', $value->id) }}" class="btn icon btn-danger" id="archive">Archive</a>
                                </td>
                            </tr>

                            <!-- Start Modal -->
                            <div class="modal" id="no{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Create Service Record</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success">
                                                <strong>Note:</strong> User will be notified through their email.
                                            </div>

                                            <!-- Start User Details -->
                                            <h6>User Details:</h6>
                                            <div class="border rounded p-2 mb-4 shadow-sm">
                                                <div class="row">
                                                    <div class="col-lg-10 mb-2">
                                                        <span><strong>Email:</strong> {{ $value['user']['email'] }}</span><br />
                                                        <span><strong>Name:</strong> {{ $value['user']['first_name'] . " " . $value['user']['last_name']  }}</span><br />
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
                                            </div>
                                            <!-- End User Details -->

                                            <form action="{{ route('update.request.sr') }}" method="POST">
                                                @csrf

                                                <h6>Fill Up Service Record:</h6>
                                                <input type="hidden" name="id" value="{{ $value->id }}">

                                                <div class="add_item">
                                                    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="sr_from">Service From</label>
                                                                    <input type="date" class="form-control" name="sr_from[]">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="sr_to">Service To</label>
                                                                    <input type="date" class="form-control" name="sr_to[]">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="sr_designation">Designation</label>
                                                                    <select class="form-select" name="sr_designation[]">
                                                                        <option value="" disabled selected>Select</option>
                                                                        <option value="Administrative Aide I">Administrative Aide I</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="sr_status">Status</label>
                                                                    <input type="text" class="form-control" name="sr_status[]">
                                                                </div>
                                                            </div>
                                                        </div> <!-- End Row -->

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="sr_salary">Salary <strong>(Annual)</strong></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">₱</span>
                                                                        <input type="text" class="form-control" name="sr_salary[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="sr_place_of_assignment">Office Entity Station/Place of Assignment</label>
                                                                    <input type="text" class="form-control" name="sr_place_of_assignment[]">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="sr_branch">Branch</label>
                                                                    <input type="text" class="form-control" name="sr_branch[]">
                                                                </div>
                                                            </div>
                                                        </div> <!-- End Row -->

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label" for="sr_leave_of_absence">Leave of Absence w/o pay</label>
                                                                <input type="text" class="form-control" name="sr_leave_of_absence[]">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label" for="sr_separation_date_caused">Separation Date Caused</label>
                                                                <input type="text" class="form-control" name="sr_separation_date_caused[]">
                                                            </div>
                                                            <div class="col-md-4" style="padding-top: 30px;">
                                                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                                                <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                                            </div>
                                                        </div> <!-- End Row -->

                                                    </div> <!-- End delete_whole_extra_item_add -->
                                                </div> <!-- End Add Item -->

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

<!-- Start Hidden Row Javascript -->
<div style="display: none;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <h3 class="border-top mt-4 pt-2">Add Item</h3>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="sr_from">Service From</label>
                        <input type="date" class="form-control" name="sr_from[]">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="sr_to">Service To</label>
                        <input type="date" class="form-control" name="sr_to[]">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="sr_designation">Designation</label>
                        <select class="form-select" name="sr_designation[]">
                            <option value="" disabled selected>Select</option>
                            <option value="Administrative Aide I">Administrative Aide I</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="sr_status">Status</label>
                        <input type="text" class="form-control" name="sr_status[]">
                    </div>
                </div>
            </div> <!-- End Row -->

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="sr_salary">Salary <strong>(Annual)</strong></label>
                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input type="text" class="form-control" name="sr_salary[]">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="sr_place_of_assignment">Office Entity Station/Place of Assignment</label>
                        <input type="text" class="form-control" name="sr_place_of_assignment[]">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label" for="sr_branch">Branch</label>
                        <input type="text" class="form-control" name="sr_branch[]">
                    </div>
                </div>
            </div> <!-- End Row -->

            <div class="row">
                <div class="col-md-4">
                    <label class="form-label" for="sr_leave_of_absence">Leave of Absence w/o pay</label>
                    <input type="text" class="form-control" name="sr_leave_of_absence[]">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="sr_separation_date_caused">Separation Date Caused</label>
                    <input type="text" class="form-control" name="sr_separation_date_caused[]">
                </div>
                <div class="col-md-4" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1;
        });
    });
</script>
<!-- End Hidden Row Javascript -->
@endsection