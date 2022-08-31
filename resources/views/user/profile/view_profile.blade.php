@extends('user.user_master')

@section('title') Profile | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container mt-2">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Account Settings</h2>
            <ol>
                <li><a href="{{ route('user.welcome') }}">Home</a></li>
                <li>Account Settings</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->

<!-- Start Content -->
<section class="inner-page pt-4">
    <div class="container">
        <div class="section-header">
            <h2>Account Information</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header py-3 bg-white border-bottom">
                        <a href="{{ route('user.profile.edit') }}" class="btn btn-success">Edit</a>
                        <!-- <small class="text-muted float-end mt-2">Last Updated: {{ date('d-m-Y', strtotime($user->updated_at)) }}</small> -->
                        <small class="text-muted float-end mt-2">Last Updated: {{ Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</small>
                    </div>
                    <div class="card-body px-4 pt-4 pb-5">
                        <h4 class="mb-4 text-success"> Basic Information</h4>
                        <div class="avatar avatar-xl me-3 mb-3">
                            @if (!empty($user->profile_photo_path))
                            <img class="img-fluid rounded-circle mb-2" style="width: 80px; height: 80px;" src="{{ url('upload/user_images/'.$user->profile_photo_path) }}" alt="User Avatar">
                            @else
                            <br>
                            <span class="avatar-content bg-light shadow-sm rounded-circle p-4">{{ substr($user->first_name,0,1) . substr($user->last_name,0,1)}}</span>
                            <br><br>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input class="form-control" type="text" disabled value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input class="form-control" type="text" disabled value="{{ $user->last_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input class="form-control" type="text" disabled value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <input class="form-control" type="text" disabled value="{{ $user->gender }}" placeholder="Set your Gender">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="created_at" class="form-label">Joined</label>
                                    <input class="form-control" type="text" disabled value="{{ date('d-m-Y', strtotime($user->created_at)) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
@endsection