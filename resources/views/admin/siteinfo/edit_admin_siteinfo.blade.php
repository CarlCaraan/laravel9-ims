@extends('admin.admin_master')

@section('title') Edit Site Info | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-success">Edit Site Info</h3>
                <p class="text-subtitle text-muted">Fill up the form below.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Site Info</li>
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
                        <div class="col-md-8">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.siteinfo.update', $editData->id) }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Header Brand -->
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label">Header Brand</label>
                                    <div class="col-md-9 text-left">
                                        <img class="mb-3 img-fluid img-thumbnail" id="show_image" src="{{ (!empty($editData->admin_brand)) ? url('upload/admin_siteinfo/'.$editData->admin_brand) : url('upload/admin_siteinfo/default_photo.png') }}" alt="Admin Brand">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" name="admin_brand" id="image">
                                        </div>
                                        @error('admin_brand')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Remove Image -->
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                    <div class="col-md-9">
                                        <a href="" class="btn btn-secondary">Remove</a>
                                    </div>
                                </div>
                                <hr />

                                <!-- Header Brand Mini -->
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label">Header Brand Mini</label>
                                    <div class="col-md-9 text-left">
                                        <img class="mb-3 img-fluid img-thumbnail" id="show_image2" src="{{ (!empty($editData->auth_brand)) ? url('upload/admin_siteinfo/'.$editData->auth_brand) : url('upload/admin_siteinfo/default_photo.png') }}" alt="Admin Brand">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" name="auth_brand" id="image2">
                                        </div>
                                        @error('auth_brand')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Remove Image -->
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                    <div class="col-md-9">
                                        <a href="" class="btn btn-secondary">Remove</a>
                                    </div>
                                </div>
                                <hr />

                                <div class="form-group row">
                                    <label for="footer" class="col-sm-3 text-right control-label col-form-label">Footer Text</label>
                                    <div class="col-sm-9">
                                        <input id="content" type="hidden" class="form-control" name="footer" id="footer" placeholder="Footer Text" value="{{ $editData->footer }}">
                                        <trix-editor input="content"></trix-editor>
                                        @error('footer')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
    $(document).ready(function() {
        $('#image2').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show_image2').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection