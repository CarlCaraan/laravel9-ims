@extends('user.user_master')

@section('title') Edit Profile | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container mt-2">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Account Settings</h2>
            <ol>
                <li><a href="{{ route('user.welcome') }}">Home</a></li>
                <li><a href="{{ route('user.profile.view') }}">Account Info</a></li>
                <li>Account Settings</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->

<!-- Start Content -->
<section class="inner-page pt-4">
    <div class="container">
        <div class="section-header">
            <h2>Account Settings</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md">
                                <h4 class="mb-4 text-success"><i class="icon-mid bi bi-gear-fill me-2"></i>General</h4>
                                <form class="form-horizontal mt-5" method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-3 text-right control-label col-form-label">Profile Avatar</label>
                                        <div class="col-md-9 text-left">
                                            <img class="rounded-circle mb-3" style="width: 90px; height: 90px;" id="show_image" src="{{ (!empty($editData->profile_photo_path)) ? url('upload/user_images/'.$editData->profile_photo_path) : url('upload/user_images/default_photo.png') }}" alt="User Avatar">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
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
                                            <a href="{{ route('user.remove.avatar') }}" class="btn btn-secondary">Remove</a>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="form-group row mb-2">
                                        <label for="first_name" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $editData->first_name }}">
                                            @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="last_name" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $editData->last_name }}">
                                            @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
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
                                    <div class="form-group row mb-2">
                                        <label for="email" class="col-sm-3 text-right control-label col-form-label">Email Address</label>
                                        <div class="col-sm-9">
                                            @if ($editData->identifier != 'local')
                                            <span class="badge bg-success py-2"><i class="bi bi-check-circle-fill"></i> Email Linked | {{ $editData->email }}</span>
                                            <input type="hidden" class="form-control" name="email" id="email" placeholder="Email Address" value="{{ $editData->email }}">
                                            @else
                                            <input type="text" class="form-control mb-1" name="email" id="email" placeholder="Email Address" value="{{ $editData->email }}">
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle-fill"></i> Email Verified
                                            </span>
                                            @endif
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="border-top mt-4">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if ($editData->password == NULL)
                            @else
                            <div class="col-md">
                                <h4 class="mb-4 text-success"><i class="icon-mid bi bi-shield-fill me-2"></i>Security and Login</h4>
                                <form class="form-horizontal mt-5" method="POST" action="{{ route('user.password.update') }}">
                                    @csrf
                                    <div class="form-group row mb-2">
                                        <label for="current_password" class="col-sm-3 text-right control-label col-form-label">Current Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="old_password" id="current_password" placeholder="Current Password">
                                            @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="password" class="col-sm-3 text-right control-label col-form-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
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
                                            <button type="submit" class="btn btn-success">Update Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->

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