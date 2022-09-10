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
            <h2>Personal Data Sheet</h2>
            <div class="alert alert-warning" role="alert">
                <strong>WARNING:</strong> Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing
                of administrative/criminal case/s against the person concerned.
            </div>
            <span class="custom-heading-label">
                READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.
            </span>

            <!-- ========= Start Error Message Validation ========= -->
            @if ($errors->any())
            <div class="text-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Citizenship Error Message -->
            @if (Session::has('citizenship-error-message'))
            <div class="text-danger mt-2">
                <ul>
                    <li>{{ Session::get('citizenship-error-message') }}</li>
                </ul>
            </div>
            @endif
            <!-- ========= End Error Message Validation ========= -->
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link text-start side-navlink active" id="v-pills-personal-tab" data-bs-toggle="pill" data-bs-target="#v-pills-personal" type="button" role="tab" aria-controls="v-pills-personal" aria-selected="true">I.) Personal Information</button>
                    <button class="nav-link text-start side-navlink" id="v-pills-family-tab" data-bs-toggle="{{ ($personal->middle_name == '') ? 'tooltip' : 'pill' }}" title="{{ ($personal->middle_name == '') ? 'Complete I.) Personal Information to Proceed.' : '' }}" data-bs-placement="right" data-bs-target="#v-pills-family" type="button" role="tab" aria-controls="v-pills-family" aria-selected="false">
                        II.) Family Background
                    </button>
                    <button class="nav-link text-start side-navlink" id="v-pills-educational-tab" data-bs-toggle="{{ ($family->father_lname == '') ? 'tooltip' : 'pill' }}" title="{{ ($family->father_lname == '') ? 'Complete II.) Family Background to Proceed.' : '' }}" data-bs-placement="right" data-bs-target="#v-pills-educational" type="button" role="tab" aria-controls="v-pills-educational" aria-selected="false">
                        III.) Educational Background
                    </button>
                </div>
                <br>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">

                    <!-- ========= Start Personal Information ========= -->
                    <div class="tab-pane fade show active" id="v-pills-personal" role="tabpanel" aria-labelledby="v-pills-personal-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">I.) PERSONAL INFORMATION</span>
                                <button class="btn custom-btn text-light float-end btn-edit">Edit</button>
                            </div>
                            <div class="card-body">
                                <small class="float-end">
                                    CS Form No. 212
                                    <br />
                                    Revised 2017
                                </small>
                                <br />
                                <!-- Personal Information Form -->
                                @include('user.form.personal_datasheet_form')
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Personal Information ========= -->

                    <!-- ========= Start Family Background ========= -->
                    <div class="tab-pane fade" id="v-pills-family" role="tabpanel" aria-labelledby="v-pills-family-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">II.) FAMILY BACKGROUND</span>
                                <button class="btn custom-btn text-light float-end btn-edit">Edit</button>
                            </div>
                            <div class="card-body">
                                <!-- Family Information Form -->
                                @include('user.form.family_datasheet_form')
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Family Background ========= -->

                    <!-- ========= Start Educational Background ========= -->
                    <div class="tab-pane fade" id="v-pills-educational" role="tabpanel" aria-labelledby="v-pills-educational-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">III.) EDUCATIONAL BACKGROUND</span>
                                <button class="btn btn-success text-light float-end" id="btn-edit">Edit</button>
                                <a href="" class="btn btn-success text-light float-end" id="btn-update" style="display:none;">Update</a>
                            </div>
                            <div class="card-body">
                                <p>Fill up information below.</p>
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Educational Background ========= -->
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Content -->

<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Edit Button -->
<script>
    $(document).ready(function() {
        $(".btn-edit").click(function() {
            $(".btn-edit").hide();
            $(".btn-update").show();
            $(".form-control").removeAttr('disabled');
            $(".form-check-input").removeAttr('disabled');
            $(".form-select").removeAttr('disabled');
            $(".flatpickr").addClass('bg-white');
        });
    });
</script>

<!-- Tooltip Script -->
<script>
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endsection