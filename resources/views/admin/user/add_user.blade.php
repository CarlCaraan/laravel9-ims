@extends('admin.admin_master')

@section('title') Add Users | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-success">Add User</h3>
                <p class="text-subtitle text-muted">Add Account.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add User</li>
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
                    <div class="col-md-6">
                        <form class="form-horizontal" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title text-success">Basic Information</h4>
                            <br />
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">Profile Photo</label>
                                <div class="col-md-9 text-left">
                                    <img class="rounded-circle mb-3" style="width: 90px; height: 90px;" id="show_image" src="{{ url('upload/user_images/default_photo.png') }}" alt="User Avatar">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label">Image Upload</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <br />
                            <br />
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                    @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 text-right control-label col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                <div class="col-md-9 pt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" value="Male" type="radio" name="gender" />
                                        <label class="form-check-label" for="Male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" value="Female" type="radio" name="gender" />
                                        <label class="form-check-label" for="Female">
                                            Female
                                        </label>
                                    </div>
                                    @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_type" class="col-sm-3 text-right control-label col-form-label">User Role</label>
                                <div class="col-md-9 pt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" value="Admin" type="radio" name="user_type" />
                                        <label class="form-check-label" for="Admin">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" value="HR" type="radio" name="user_type" />
                                        <label class="form-check-label" for="HR">
                                            HR
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" value="User" type="radio" name="user_type" />
                                        <label class="form-check-label" for="User">
                                            User
                                        </label>
                                    </div>
                                    @error('user_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="border-top mt-4">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success">Add User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End Page Content -->

<script>
    // Show Chosen Image Ajax
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection