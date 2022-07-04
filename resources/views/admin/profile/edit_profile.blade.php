@extends('admin.admin_master')

@section('title') Edit | Profile @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Profile</h3>
                <p class="text-subtitle text-muted">Fill up the form below.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
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
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4"><i class="icon-mid bi bi-gear-fill me-2"></i>General</h4>
                            <form class="form-horizontal mt-5" method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label">Profile Avatar</label>
                                    <div class="col-md-9 text-left">
                                        <img class="rounded-circle mb-3" style="width: 90px; height: 90px;" id="show_image" src="{{ (!empty($editData->profile_photo_path)) ? url('upload/user_images/'.$editData->profile_photo_path) : asset('admin/assets/images/users/default_photo.png') }}" alt="User Avatar">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input class="form-control" type="file" id="image" name="image">
                                        </div>
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                    <div class="col-md-9">
                                        <a href="{{ route('admin.remove.avatar') }}" class="btn btn-secondary">Remove</a>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group row">
                                    <label for="first_name" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $editData->first_name }}">
                                        @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $editData->last_name }}">
                                        @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" value="{{ $editData->email }}">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-select" style="width: 100%; height:36px;" name="gender">
                                            <option disabled value="">Select</option>
                                            <optgroup label="Choose your gender">
                                                <option value="Male" {{ ($editData->gender == "Male") ? "selected" : ""}}>Male</option>
                                                <option value="Female" {{ ($editData->gender == "Female") ? "selected" : ""}}>Female</option>
                                            </optgroup>
                                        </select>
                                        @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_type" class="col-sm-3 text-right control-label col-form-label">User Role</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-select" name="user_type">
                                            <option disabled value="">Select</option>
                                            <optgroup label="Choose your role">
                                                <option value="Admin" {{ ($editData->user_type == "Admin") ? "selected" : ""}}>Admin</option>
                                                <option value="Customer" {{ ($editData->user_type == "Customer") ? "selected" : ""}}>Customer</option>
                                            </optgroup>
                                        </select>
                                        @error('user_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="border-top mt-4">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4"><i class="icon-mid bi bi-shield-fill me-2"></i>Security and Login</h4>
                            <form class="form-horizontal mt-5" method="POST" action="{{ route('admin.password.update') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="current_password" class="col-sm-3 text-right control-label col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="old_password" id="current_password" placeholder="Current Password">
                                        @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-3 text-right control-label col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password">
                                        @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="border-top mt-4">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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