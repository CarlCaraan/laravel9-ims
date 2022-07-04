@extends('admin.admin_master')

@section('title') {{ Auth::user()->first_name . " " . Auth::user()->last_name }} | Profile @endsection

@section('content')
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-success">Account Settings</h3>
                <p class="text-subtitle text-muted">General Account Settings.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
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
                <div class="card-header border-bottom">
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-success">Edit</a>
                    <!-- <small class="text-muted float-end mt-2">Last Updated: {{ date('d-m-Y', strtotime($user->updated_at)) }}</small> -->
                    <small class="text-muted float-end mt-2">Last Updated: {{ Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</small>
                </div>
                <div class="card-body px-4 py-4-5">
                    <h4 class="mb-4 text-success"> Basic Information</h4>
                    <div class="avatar avatar-xl me-3 mb-4">
                        @if (!empty($user->profile_photo_path))
                        <img class="img-fluid" style="width: 70px; height: 70px;" src="{{ url('upload/user_images/'.$user->profile_photo_path) }}" alt="User Avatar">
                        @else
                        <span class="avatar-content bg-warning rounded-circle">{{ substr($user->first_name,0,1) . substr($user->last_name,0,1)}}</span>
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
                                <input class="form-control" type="text" disabled value="{{ $user->gender }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user_type" class="form-label">Role</label>
                                <input class="form-control" type="text" disabled value="{{ $user->user_type }}">
                            </div>
                        </div>
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
    </section>
</div>
<!-- End Page Content -->
@endsection