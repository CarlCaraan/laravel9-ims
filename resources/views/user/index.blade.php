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
                *READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.*
            </span>

            <!-- ========= Start Error Message Validation ========= -->
            @if ($errors->any())
            <div class="text-danger mt-2 fw-bold">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Citizenship Error Message -->
            @if (Session::has('citizenship-error-message'))
            <div class="text-danger mt-2 fw-bold">
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
                    <button class="nav-link text-start side-navlink active" id="v-pills-personal-tab" data-bs-toggle="pill" data-bs-target="#v-pills-personal" type="button" role="tab" aria-controls="v-pills-personal" aria-selected="true">
                        I.) Personal Information
                    </button>
                    <button class="nav-link text-start side-navlink" id="v-pills-family-tab" data-bs-toggle="{{ ($personal->middle_name == '') ? 'tooltip' : 'pill' }}" title="{{ ($personal->middle_name == '') ? 'Complete I.) Personal Information to Proceed.' : '' }}" data-bs-placement="right" data-bs-target="#v-pills-family" type="button" role="tab" aria-controls="v-pills-family" aria-selected="false" style="{{ ($personal->middle_name == '') ? 'cursor: not-allowed' : '' }}">
                        II.) Family Background <i class="{{ ($personal->middle_name == '') ? 'fas fa-lock' : '' }}"></i>
                    </button>
                    <button class="nav-link text-start side-navlink" id="v-pills-educational-tab" data-bs-toggle="{{ ($family->father_lname == '') ? 'tooltip' : 'pill' }}" title="{{ ($family->father_lname == '') ? 'Complete II.) Family Background to Proceed.' : '' }}" data-bs-placement="right" data-bs-target="#v-pills-educational" type="button" role="tab" aria-controls="v-pills-educational" aria-selected="false" style="{{ ($family->father_lname == '') ? 'cursor: not-allowed' : '' }}">
                        III.) Educational Background <i class="{{ ($family->father_lname == '') ? 'fas fa-lock' : '' }}"></i>
                    </button>
                    <button class="nav-link text-start side-navlink" id="v-pills-civil-tab" data-bs-toggle="{{ ($educational->elementary_school == '') ? 'tooltip' : 'pill' }}" title="{{ ($educational->elementary_school == '') ? 'Complete III.) Educational Background to Proceed.' : '' }}" data-bs-placement="right" data-bs-target="#v-pills-civil" type="button" role="tab" aria-controls="v-pills-civil" aria-selected="false" style="{{ ($educational->elementary_school == '') ? 'cursor: not-allowed' : '' }}">
                        IV.) Civil Service Eligibility <i class="{{ ($educational->elementary_school == '') ? 'fas fa-lock' : '' }}"></i>
                    </button>
                    <button class="nav-link text-start side-navlink" id="v-pills-work-tab" data-bs-toggle="{{ ($civils[0]->cse_type == '') ? 'tooltip' : 'pill' }}" title="{{ ($civils[0]->cse_type == '') ? 'Complete IV.) Civil Service Eligibility to Proceed.' : '' }}" data-bs-placement="right" data-bs-target="#v-pills-work" type="button" role="tab" aria-controls="v-pills-work" aria-selected="false" style="{{ ($civils[0]->cse_type == '') ? 'cursor: not-allowed' : '' }}">
                        V.) Work Experience <i class="{{ ($civils[0]->cse_type == '') ? 'fas fa-lock' : '' }}"></i>
                    </button>
                    <button class="nav-link text-start side-navlink" id="v-pills-voluntary-tab" data-bs-toggle="pill" data-bs-target="#v-pills-voluntary" type="button" role="tab" aria-controls="v-pills-voluntary" aria-selected="false">
                        VI.) Voluntary Work <span class="text-muted">(Optional)</span>
                    </button>
                    <button class="nav-link text-start side-navlink" id="v-pills-learning-tab" data-bs-toggle="pill" data-bs-target="#v-pills-learning" type="button" role="tab" aria-controls="v-pills-learning" aria-selected="false">
                        VII.) Learning Program <span class="text-muted">(Optional)</span>
                    </button>
                    <button class="nav-link text-start side-navlink" id="v-pills-other-tab" data-bs-toggle="pill" data-bs-target="#v-pills-other" type="button" role="tab" aria-controls="v-pills-other" aria-selected="false">
                        VIII.) Other Information <span class="text-muted">(Optional)</span>
                    </button>
                    <button class="nav-link text-start side-navlink" id="v-pills-generate-tab" data-bs-toggle="{{ ($works[0]->work_date_from == '') ? 'tooltip' : 'pill' }}" title="{{ ($works[0]->work_date_from == '') ? 'Complete Personal Datasheet to Proceed.' : '' }}" data-bs-placement="right" data-bs-target="#v-pills-generate" type="button" role="tab" aria-controls="v-pills-generate" aria-selected="false" style="{{ ($works[0]->work_date_from == '') ? 'cursor: not-allowed' : '' }}">
                        Generate Personal Datasheet <i class="{{ ($works[0]->work_date_from == '') ? 'fas fa-lock' : '' }}"></i>
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
                                <small class="float-start">
                                    CS Form No. 212
                                    <br />
                                    Revised 2017
                                </small>
                                <br />
                                <!-- Personal Information Form -->
                                @include('user.form.personal_datasheet_form')
                            </div>
                            <div class="card-footer">
                                <span class="float-start text-muted">I.) PERSONAL INFORMATION</span>
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
                            <div class="card-footer">
                                <span class="float-start text-muted">II.) FAMILY BACKGROUND</span>
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Family Background ========= -->

                    <!-- ========= Start Educational Background ========= -->
                    <div class="tab-pane fade" id="v-pills-educational" role="tabpanel" aria-labelledby="v-pills-educational-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">III.) EDUCATIONAL BACKGROUND</span>
                                <button class="btn custom-btn text-light float-end btn-edit">Edit</button>
                            </div>
                            <div class="card-body">
                                <!-- Educational Background Form -->
                                @include('user.form.educational_datasheet_form')
                            </div>
                            <div class="card-footer">
                                <span class="float-start text-muted">III.) EDUCATIONAL BACKGROUND</span>
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Educational Background ========= -->

                    <!-- ========= Start Civil Service ========= -->
                    <div class="tab-pane fade" id="v-pills-civil" role="tabpanel" aria-labelledby="v-pills-civil-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">IV.) CIVIL SERVICE ELIGIBILITY</span>
                                <button class="btn custom-btn text-light float-end btn-edit">Edit</button>
                            </div>
                            <div class="card-body">
                                <!-- Civil Background Form -->
                                @include('user.form.civil_datasheet_form')
                            </div>
                            <div class="card-footer">
                                <span class="float-start text-muted">IV.) CIVIL SERVICE ELIGIBILITY</span>
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Civil Service ========= -->

                    <!-- ========= Start Work Experience ========= -->
                    <div class="tab-pane fade" id="v-pills-work" role="tabpanel" aria-labelledby="v-pills-work-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">V.) WORK EXPERIENCE</span>
                                <button class="btn custom-btn text-light float-end btn-edit">Edit</button>
                            </div>
                            <div class="card-body">
                                <p>
                                    (Include private employment. Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet.)
                                </p>
                                <!-- Work Experience Form -->
                                @include('user.form.work_datasheet_form')
                            </div>
                            <div class="card-footer">
                                <span class="float-start text-muted">V.) WORK EXPERIENCE</span>
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Work Experience ========= -->

                    <!-- ========= Start Voluntary Work ========= -->
                    <div class="tab-pane fade" id="v-pills-voluntary" role="tabpanel" aria-labelledby="v-pills-voluntary-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start fw-bold">VI.) VOLUNTARY WORK OR INVOLVEMENT IN CIVIC <br /> NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</span>
                                <button class="btn custom-btn text-light float-end btn-edit mt-1">Edit</button>
                            </div>
                            <div class="card-body">
                                <!-- Voluntary Work Form -->
                                @include('user.form.voluntary_datasheet_form')
                            </div>
                            <div class="card-footer">
                                <span class="float-start text-muted">VI.) VOLUNTARY WORK OR INVOLVEMENT IN CIVIC <br /> NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</span>
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Voluntary Work ========= -->

                    <!-- ========= Start Learning Program ========= -->
                    <div class="tab-pane fade" id="v-pills-learning" role="tabpanel" aria-labelledby="v-pills-learning-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">VII.) LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED</span>
                                <button class="btn custom-btn text-light float-end btn-edit mt-1">Edit</button>
                            </div>
                            <div class="card-body">
                                <p>
                                    (Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)
                                </p>
                                <!-- Learning Program Form -->
                                @include('user.form.learning_datasheet_form')
                            </div>
                            <div class="card-footer">
                                <span class="float-start text-muted">VII.) LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED</span>
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Learning Program  ========= -->

                    <!-- ========= Start Other Information ========= -->
                    <div class="tab-pane fade" id="v-pills-other" role="tabpanel" aria-labelledby="v-pills-other-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">VIII.) OTHER INFORMATION</span>
                                <button class="btn custom-btn text-light float-end btn-edit mt-1">Edit</button>
                            </div>
                            <div class="card-body">
                                <!-- Other Information Form -->
                                @include('user.form.other_datasheet_form')
                            </div>
                            <div class="card-footer">
                                <span class="float-start text-muted">VIII.) OTHER INFORMATION</span>
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Other Information  ========= -->

                    <!-- ========= Start Generate PDS ========= -->
                    <div class="tab-pane fade" id="v-pills-generate" role="tabpanel" aria-labelledby="v-pills-generate-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start fw-bold">GENERATE PERSONAL DATA SHEET</span>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <strong>Note::</strong> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit temporibus ex distinctio rerum. Voluptas officia dolorem, pariatur id natus, reprehenderit veniam delectus voluptatem quaerat sit, molestias fuga accusantium voluptatibus ad?
                                </div>
                                <div class="row">
                                    <div class="col-md-3 center">
                                        <div class="border p-3">
                                            <span class="fw-bold">PAGE 1</span>
                                            <hr />
                                            <a class="btn custom-btn-secondary text-light w-100 mb-2" href="{{ route('page_one_front.generate.pdf') }}" target="_blank">Front Page</a>
                                            <a class="btn custom-btn-secondary text-light w-100" href="{{ route('page_one_back.generate.pdf') }}" target="_blank">Back Page</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 center">
                                        <div class="border p-3">
                                            <span class="fw-bold">PAGE 2</span>
                                            <hr />
                                            <a class="btn custom-btn-secondary text-light w-100 mb-2" href="{{ route('page_two_front.generate.pdf') }}" target="_blank">Front Page</a>
                                            <a class="btn custom-btn-secondary text-light w-100" href="{{ asset('pdf/c4.pdf') }}" target="_blank">Back Page</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ========= End Generate PDS ========= -->
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

            $(".addeventmore").show(); // Family Background
            $(".removeeventmore").show(); // Family Background
            $(".addeventmore1").show(); // Civil Service Eligibility
            $(".removeeventmore1").show(); // Civil Service Eligibility
            $(".addeventmore2").show(); // Work Experience
            $(".removeeventmore2").show(); // Work Experience
            $(".addeventmore3").show(); // Voluntary Work
            $(".removeeventmore3").show(); // Voluntary Work
            $(".addeventmore4").show(); // Learning Program
            $(".removeeventmore4").show(); // Learning Program
            $(".addeventmore5").show(); // Other Information
            $(".removeeventmore5").show(); // Other Information

            $("[role='prev_next']").hide();
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