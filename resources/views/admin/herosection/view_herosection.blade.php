@extends('admin.admin_master')

@section('title') View Herosection | Division of Laguna @endsection

@section('content')
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-success">View Herosection</h3>
                <p class="text-subtitle text-muted">All List of Announcements.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Herosection</li>
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
                <div class="card-header">
                    <a class="btn btn-primary ms-2" href="{{ route('user.herosection.add') }}" role="button">
                        <i class="bi bi-plus-circle-fill"></i> Add
                    </a>
                </div>
                <div class="card-body px-4">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID No.</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img src="{{ (!empty($value->image)) ? url('upload/user_siteinfo/herosection/'.$value->image) : url('upload/user_siteinfo/herosection/default_photo.png') }}" alt="image" class="img-fluid" width="60px">
                                </td>
                                <td>
                                    <a href="{{ route('user.herosection.edit', $value->id) }}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ route('user.herosection.delete', $value->id) }}" class="btn icon btn-danger" id="delete"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
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