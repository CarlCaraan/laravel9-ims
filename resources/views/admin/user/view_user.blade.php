@extends('admin.admin_master')

@section('title') View Users | Division of Laguna @endsection

@section('content')
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>View Users</h3>
                <p class="text-subtitle text-muted">All List of Accounts.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Users</li>
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
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Joined Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <div class="avatar">
                                        @if (!empty($user->profile_photo_path))
                                        <img class="img-fluid" style="width: 30px; height: 30px; cursor: zoom-in;" src="{{ url('upload/user_images/'.$user->profile_photo_path) }}" alt="User Avatar" data-bs-toggle="modal" data-bs-target="#galleryModal-{{ $user->id }}">
                                        @else
                                        <span class="avatar-content bg-warning rounded-circle" style="cursor: zoom-in;" data-bs-toggle="modal" data-bs-target="#galleryModal-{{ $user->id }}">{{ substr($user->first_name,0,1) . substr($user->last_name,0,1)}}</span>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $user->first_name . " " . $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->user_type }}</td>
                                <td>{{ date('m-d-Y', strtotime($user->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ route('user.delete', $user->id) }}" class="btn icon btn-danger" id="delete"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>

                            <div class="modal" id="galleryModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle-{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="galleryModalTitle-{{ $user->id }}">Profile Avatar</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="img-fluid" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : asset('admin/assets/images/users/default_photo.png') }}" alt="User Avatar" data-bs-toggle="modal" data-bs-target="#galleryModal-{{ $user->id }}">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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