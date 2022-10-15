@extends('admin.admin_master')

@section('title') Create Service Record | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-primary">Create Service Record</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Service Record</li>
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
                    <div class="alert alert-success">
                        <strong>Note:</strong> User will be notified through their email.
                    </div>

                    <!-- Start User Details -->
                    <div class="card border p-2 mb-4 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-10 mb-2">
                                    <h6>User Details:</h6><br />
                                    <span><strong>Email:</strong> {{ $editData['user']['email'] }}</span><br />
                                    <span><strong>Name:</strong> {{ $editData['user']['first_name'] . " " . $editData['user']['last_name']  }}</span><br />
                                    <span><strong>Sex:</strong> {{ $editData['user']['gender'] }}</span> <br />
                                    <small><strong>User Secret ID:</strong> <ins>{{ $editData['user']['tracking_id'] }}</ins></small> <br />
                                </div>
                                <div class="col-lg-2 mb-2">
                                    @if (!empty($editData['user']['profile_photo_path']))
                                    <img class="img-fluid float-end rounded" src="{{ url('upload/user_images/'.$editData['user']['profile_photo_path']) }}" alt="Profile Photo">
                                    @else
                                    <img class="img-fluid" src="{{ (!empty($editData['user']['profile_photo_path'])) ? url('upload/user_images/'.$value['user']['profile_photo_path']) : url('upload/user_images/default_photo.png') }}" alt="Profile Photo">
                                    @endif
                                </div>
                            </div> <!-- End Row -->
                        </div>
                    </div>
                    <!-- End User Details -->

                    <form action="{{ route('update.request.sr') }}" method="POST">
                        @csrf

                        <h6>Fill Up Service Record:</h6>
                        <input type="hidden" name="id" value="{{ $editData->id }}">

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
                                    </div>
                                </div> <!-- End Row -->

                            </div> <!-- End delete_whole_extra_item_add -->
                        </div> <!-- End Add Item -->
                        <button type="submit" class="btn btn-primary float-end">Create Service Record</button>
                    </form>
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