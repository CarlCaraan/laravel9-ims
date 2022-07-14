@extends('admin.admin_master')

@section('title') Add Herosection | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-success">Add Herosection</h3>
                <p class="text-subtitle text-muted">Add Announcement.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('user.herosection.view') }}">Herosection</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Herosection</li>
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
                    <form class="form-horizontal" method="POST" action="{{ route('user.herosection.store') }}" enctype="multipart/form-data">
                        @csrf
                        <h4 class="card-title text-success">Herosection Announcement</h4>
                        <br />
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Banner Image</label>
                            <div class="col-md-9 text-left">
                                <img class="mb-3 img-fluid" id="show_image" src="{{ asset('admin/assets/images/users/default_photo.png') }}" alt="User Avatar">
                            </div>
                        </div>
                        <div class="form-group row">
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

                        <div class="border-top mt-4">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success">Add Herosection</button>
                            </div>
                        </div>
                    </form>
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