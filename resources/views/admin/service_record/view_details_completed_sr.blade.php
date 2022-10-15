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
                                        <span>{{ $allRequest['0']->sr_middle_name }}</span>
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
                                        <span> {{ date('m/d/Y', strtotime($allRequest['0']->sr_dob)) }} </sp>
                                    </td>
                                    <td class="border-bottom text-center" colspan="2">
                                        <span>{{ $allRequest['0']->sr_pob }}</span>
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

            <!-- Add Button Modal -->
            <div class="w-100">
                <button class="btn btn-primary mb-2 float-end" data-bs-toggle="modal" data-bs-target="#addModal">Add Record</button>
            </div>
            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Service Record</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('storedetails.completed.sr') }}" method="POST">
                                @csrf

                                <input type="hidden" value="{{ $allData['0']->service_request_record_id }}" name="id">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="sr_from">Service From<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="sr_from">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="sr_to">Service To<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="sr_to" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="sr_designation">Designation<span class="text-danger">*</span></label>
                                            <select class="form-select" name="sr_designation" required>
                                                <option value="" disabled selected>Select</option>
                                                <option value="Administrative Aide I">Administrative Aide I</option>
                                                <option value="Administrative Aide II">Administrative Aide II</option>
                                                <option value="Administrative Aide III">Administrative Aide III</option>
                                                <option value="Administrative Aide IV">Administrative Aide IV</option>
                                                <option value="Administrative Aide V">Administrative Aide V</option>
                                                <option value="Administrative Aide VI">Administrative Aide VI</option>
                                                <option value="Administrative Asst. II">Administrative Asst. II</option>
                                                <option value="Administrative Asst. III">Administrative Asst. III</option>
                                                <option value="Administrative Officer II">Administrative Officer II</option>
                                                <option value="Asst. Principal">Asst. Principal</option>
                                                <option value="Disbursing Officer II">Disbursing Officer II</option>
                                                <option value="Head Teacher I">Head Teacher I</option>
                                                <option value="Head Teacher II">Head Teacher II</option>
                                                <option value="Head Teacher III">Head Teacher III</option>
                                                <option value="Head Teacher IV">Head Teacher IV</option>
                                                <option value="Head Teacher V">Head Teacher V</option>
                                                <option value="Head Teacher VI">Head Teacher VI</option>
                                                <option value="Head Teacher VII">Head Teacher VII</option>
                                                <option value="Master Teacher I">Master Teacher I</option>
                                                <option value="Master Teacher II">Master Teacher II</option>
                                                <option value="PSDS">PSDS</option>
                                                <option value="Registrar I">Registrar I</option>
                                                <option value="School Principal I">School Principal I</option>
                                                <option value="School Principal II">School Principal II</option>
                                                <option value="School Principal III">School Principal III</option>
                                                <option value="School Principal IV">School Principal IV</option>
                                                <option value="Senior Bookkeeper">Senior Bookkeeper</option>
                                                <option value="Special Science Teacher I">Special Science Teacher I</option>
                                                <option value="Teacher I">Teacher I</option>
                                                <option value="Teacher II">Teacher II</option>
                                                <option value="Teacher III">Teacher III</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="sr_status">Status<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="sr_status" required>
                                        </div>
                                    </div>
                                </div> <!-- End Row -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="sr_salary">Salary <strong>(Annual)</strong><span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">₱</span>
                                                <input type="text" class="form-control" name="sr_salary" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="sr_place_of_assignment">Office Entity Station/Place of Assignment<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="sr_place_of_assignment" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label" for="sr_branch">Branch<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="sr_branch" required>
                                        </div>
                                    </div>
                                </div> <!-- End Row -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label" for="sr_leave_of_absence">Leave of Absence w/o pay</label>
                                        <input type="text" class="form-control" name="sr_leave_of_absence">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="sr_separation_date_caused">Separation Date Caused</label>
                                        <input type="text" class="form-control" name="sr_separation_date_caused">
                                    </div>
                                </div> <!-- End Row -->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Record</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <br /><br />

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
                                <td> {{ date('m/d/Y', strtotime($value->sr_from)) }} </td>
                                <td> {{ date('m/d/Y', strtotime($value->sr_from)) }}</td>
                                <td>{{ $value->sr_designation }}</td>
                                <td>{{ $value->sr_status }}</td>
                                <td>₱{{ $value->sr_salary }}</td>
                                <td>{{ $value->sr_place_of_assignment }}</td>
                                <td>{{ $value->sr_branch }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $value->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('deletedetails.completed.sr', [$user->email ,$value->id]) }}" class="btn icon btn-danger" id="delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $value->id }}" aria-labelledby="editModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Service Record</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('updatedetails.completed.sr', $value->id) }}" method="POST">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="sr_from">Service From<span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="sr_from" value="{{ $value->sr_from }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="sr_to">Service To<span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="sr_to" value="{{ $value->sr_to }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="sr_designation">Designation<span class="text-danger">*</span></label>
                                                            <select class="form-select" name="sr_designation" required>
                                                                <option value="" disabled selected>Select</option>
                                                                <option value="Administrative Aide I" {{ ($value->sr_designation == "Administrative Aide I") ? 'selected' : '' }}>Administrative Aide I</option>
                                                                <option value="Administrative Aide II" {{ ($value->sr_designation == "Administrative Aide II") ? 'selected' : '' }}>Administrative Aide II</option>
                                                                <option value="Administrative Aide III" {{ ($value->sr_designation == "Administrative Aide III") ? 'selected' : '' }}>Administrative Aide III</option>
                                                                <option value="Administrative Aide IV" {{ ($value->sr_designation == "Administrative Aide IV") ? 'selected' : '' }}>Administrative Aide IV</option>
                                                                <option value="Administrative Aide V" {{ ($value->sr_designation == "Administrative Aide V") ? 'selected' : '' }}>Administrative Aide V</option>
                                                                <option value="Administrative Aide VI" {{ ($value->sr_designation == "Administrative Aide VI") ? 'selected' : '' }}>Administrative Aide VI</option>
                                                                <option value="Administrative Asst. II" {{ ($value->sr_designation == "Administrative Aide VI") ? 'selected' : '' }}>Administrative Asst. II</option>
                                                                <option value="Administrative Asst. III" {{ ($value->sr_designation == "Administrative Asst. III") ? 'selected' : '' }}>Administrative Asst. III</option>
                                                                <option value="Administrative Officer II" {{ ($value->sr_designation == "Administrative Officer II") ? 'selected' : '' }}>Administrative Officer II</option>
                                                                <option value="Asst. Principal" {{ ($value->sr_designation == "Asst. Principal") ? 'selected' : '' }}>Asst. Principal</option>
                                                                <option value="Disbursing Officer II" {{ ($value->sr_designation == "Disbursing Officer II") ? 'selected' : '' }}>Disbursing Officer II</option>
                                                                <option value="Head Teacher I" {{ ($value->sr_designation == "Head Teacher I") ? 'selected' : '' }}>Head Teacher I</option>
                                                                <option value="Head Teacher II" {{ ($value->sr_designation == "Head Teacher II") ? 'selected' : '' }}>Head Teacher II</option>
                                                                <option value="Head Teacher III" {{ ($value->sr_designation == "Head Teacher III") ? 'selected' : '' }}>Head Teacher III</option>
                                                                <option value="Head Teacher IV" {{ ($value->sr_designation == "Head Teacher IV") ? 'selected' : '' }}>Head Teacher IV</option>
                                                                <option value="Head Teacher V" {{ ($value->sr_designation == "Head Teacher V") ? 'selected' : '' }}>Head Teacher V</option>
                                                                <option value="Head Teacher VI" {{ ($value->sr_designation == "Head Teacher VI") ? 'selected' : '' }}>Head Teacher VI</option>
                                                                <option value="Head Teacher VII" {{ ($value->sr_designation == "Head Teacher VII") ? 'selected' : '' }}>Head Teacher VII</option>
                                                                <option value="Master Teacher I" {{ ($value->sr_designation == "Master Teacher I") ? 'selected' : '' }}>Master Teacher I</option>
                                                                <option value="Master Teacher II" {{ ($value->sr_designation == "Master Teacher II") ? 'selected' : '' }}>Master Teacher II</option>
                                                                <option value="PSDS" {{ ($value->sr_designation == "PSDS") ? 'selected' : '' }}>PSDS</option>
                                                                <option value="Registrar I" {{ ($value->sr_designation == "Registrar I") ? 'selected' : '' }}>Registrar I</option>
                                                                <option value="School Principal I" {{ ($value->sr_designation == "School Principal I") ? 'selected' : '' }}>School Principal I</option>
                                                                <option value="School Principal II" {{ ($value->sr_designation == "School Principal II") ? 'selected' : '' }}>School Principal II</option>
                                                                <option value="School Principal III" {{ ($value->sr_designation == "School Principal III") ? 'selected' : '' }}>School Principal III</option>
                                                                <option value="School Principal IV" {{ ($value->sr_designation == "School Principal IV") ? 'selected' : '' }}>School Principal IV</option>
                                                                <option value="Senior Bookkeeper" {{ ($value->sr_designation == "Senior Bookkeeper") ? 'selected' : '' }}>Senior Bookkeeper</option>
                                                                <option value="Special Science Teacher I" {{ ($value->sr_designation == "Special Science Teacher I") ? 'selected' : '' }}>Special Science Teacher I</option>
                                                                <option value="Teacher I" {{ ($value->sr_designation == "Teacher I") ? 'selected' : '' }}>Teacher I</option>
                                                                <option value="Teacher II" {{ ($value->sr_designation == "Teacher II") ? 'selected' : '' }}>Teacher II</option>
                                                                <option value="Teacher III" {{ ($value->sr_designation == "Teacher III") ? 'selected' : '' }}>Teacher III</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="sr_status">Status<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="sr_status" value="{{ $value->sr_status }}" required>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Row -->

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label" for="sr_salary">Salary <strong>(Annual)</strong><span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">₱</span>
                                                                <input type="text" class="form-control" name="sr_salary" value="{{ $value->sr_salary }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="sr_place_of_assignment">Office Entity Station/Place of Assignment<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="sr_place_of_assignment" value="{{ $value->sr_place_of_assignment }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="form-label" for="sr_branch">Branch<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="sr_branch" value="{{ $value->sr_branch }}" required>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Row -->

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label" for="sr_leave_of_absence">Leave of Absence w/o pay</label>
                                                        <input type="text" class="form-control" name="sr_leave_of_absence" value="{{ $value->sr_leave_of_absence }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label" for="sr_separation_date_caused">Separation Date Caused</label>
                                                        <input type="text" class="form-control" name="sr_separation_date_caused" value="{{ $value->sr_separation_date_caused }}">
                                                    </div>
                                                </div> <!-- End Row -->

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Record</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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