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
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body px-4 py-4-5">
                        <h4 class="mb-4 color-primary"><i class="icon-mid bi bi-gear-fill me-2"></i>General</h4>
                        <form class="form-horizontal mt-5" method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <img class="rounded mb-3" style="width: 107px; height: 100%;" id="show_image" src="{{ (!empty($editData->profile_photo_path)) ? url('upload/user_images/'.$editData->profile_photo_path) : url('upload/user_images/default_photo.png') }}" alt="Profile Photo">
                                    </div>

                                    <div class="custom-file">
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <a id="delete_photo" href="{{ route('user.remove.avatar') }}" class="btn btn-light border form-control mt-3">Delete Photo</a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="form-label fw-bold">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $editData->first_name }}">
                                        @error('first_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="form-label fw-bold">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $editData->last_name }}">
                                        @error('last_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label fw-bold">Email Address</label>
                                        @if ($editData->identifier != 'local')
                                        <span class="badge bg-success py-2"><i class="bi bi-check-circle-fill"></i> Email Linked | {{ $editData->email }}</span>
                                        <input type="hidden" class="form-control" name="email" id="email" placeholder="Email Address" value="{{ $editData->email }}">
                                        @else
                                        <input type="text" class="form-control mb-1" name="email" id="email" placeholder="Email Address" value="{{ $editData->email }}">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small><br />
                                        @enderror
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle-fill"></i> Email Verified
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-label fw-bold mb-3">Gender</label>
                                        <br />
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" value="Male" type="radio" name="gender" {{ ($editData->gender == "Male") ? "checked" : "" }} />
                                            <label class="form-check-label" for="Male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" value="Female" type="radio" name="gender" {{ ($editData->gender == "Female") ? "checked" : "" }} />
                                            <label class="form-check-label" for="Female">
                                                Female
                                            </label>
                                        </div>
                                        @error('gender')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn custom-btn float-end">Update Profile</button>
                            </div>
                        </form>

                    </div>
                </div> <!-- End Card -->
            </div> <!-- End Col -->

            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body px-4 py-4-5">
                        @if ($editData->password == NULL)
                        @else
                        <h4 class="mb-4 color-primary"><i class="icon-mid bi bi-shield-fill me-2"></i>Security and Login</h4>
                        <form class="form-horizontal mt-5" method="POST" action="{{ route('user.password.update') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="current_password" class="form-label fw-bold">Current Password</label>
                                <input type="password" class="form-control" name="old_password" id="current_password">
                                @error('old_password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="password" class="form-label fw-bold">New Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn custom-btn float-end">Update Password</button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div> <!-- End Card -->
            </div> <!-- End Col -->
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