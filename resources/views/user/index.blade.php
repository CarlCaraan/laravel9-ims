@extends('user.user_master')

@section('title') DEPED | Division of Laguna @endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container mt-2">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Request Form</h2>
            <ol>
                <li>Home</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page pt-4">
    <div class="container">
        <div class="section-header">
            <h2>Request Form</h2>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link text-start side-navlink active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">1.) Personal Datasheet</button>
                    <button class="nav-link text-start side-navlink" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">2.) Generate Personal Datasheet</button>
                </div>
                <br>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2">Personal Datasheet</span>
                                <button class="btn btn-success text-light float-end" id="btn-edit">Edit</button>
                                <a href="" class="btn btn-success text-light float-end" id="btn-update" style="display:none;">Update</a>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-warning" role="alert">
                                    Fill up information below.
                                </div>
                                <form action="">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first_name" class="form-label request-form-label">First Name*</label>
                                                <input class="form-control" type="text" value="{{ $user->first_name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="last_name" class="form-label request-form-label">Last Name*</label>
                                                <input class="form-control" type="text" value="{{ $user->last_name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="middle" class="form-label request-form-label">Middle Name*</label>
                                                <input class="form-control" type="text" value="{{ $user->middle_name }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                Service Record
                            </div>
                            <div class="card-body">
                                <p>Fill up information below.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#btn-edit").click(function() {
            $("#btn-edit").hide();
            $("#btn-update").show();
            $(".form-control").removeAttr('disabled');
        });
    });
</script>
@endsection