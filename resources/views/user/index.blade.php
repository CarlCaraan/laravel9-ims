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

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link text-start side-navlink active" id="v-pills-personal-tab" data-bs-toggle="pill" data-bs-target="#v-pills-personal" type="button" role="tab" aria-controls="v-pills-personal" aria-selected="true">I.) Personal Information</button>
                    <button class="nav-link text-start side-navlink" id="v-pills-family-tab" data-bs-toggle="pill" data-bs-target="#v-pills-family" type="button" role="tab" aria-controls="v-pills-family" aria-selected="false">II.) Family Background</button>
                    <button class="nav-link text-start side-navlink" id="v-pills-educational-tab" data-bs-toggle="pill" data-bs-target="#v-pills-educational" type="button" role="tab" aria-controls="v-pills-educational" aria-selected="false">III.) Educational Background</button>
                </div>
                <br>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-personal" role="tabpanel" aria-labelledby="v-pills-personal-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">I.) Personal Information</span>
                                <button class="btn custom-btn text-light float-end" id="btn-edit">Edit</button>
                            </div>
                            <div class="card-body">
                                <small class="float-end">
                                    CS Form No. 212
                                    <br />
                                    Revised 2017
                                </small>
                                <br />
                                <form class="mt-4" action="{{ route('personal.datasheet.update') }}" method="POST">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="last_name" class="form-label request-form-label">Surname*</label>
                                                <input class="form-control" type="text" name="last_name" value="{{ ($user->last_name != '') ? $user->last_name : old('last_name')  }}" disabled>
                                                @error('last_name')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="first_name" class="form-label request-form-label">First Name*</label>
                                                <input class="form-control" type="text" name="first_name" value="{{ ($user->first_name != '') ? $user->first_name : old('first_name')  }}" disabled>
                                                @error('first_name')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="middle_name" class="form-label request-form-label">Middle Name*</label>
                                                <input class="form-control" type="text" name="middle_name" value="{{ ($personal->middle_name != '') ? $personal->middle_name : old('middle_name') }}" disabled>
                                                @error('middle_name')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="extension_name" class="form-label request-form-label">Name Extension*</label>
                                                <input class="form-control" type="text" name="extension_name" value="{{ ($personal->extension_name != '') ? $personal->extension_name : old('extension_name') }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="dob" class="form-label request-form-label">Date of Birth*</label>
                                                <input class="form-control" type="text" id="flatpickr" name="dob" value="{{ ($personal->dob != '') ? $personal->dob : old('dob') }}" placeholder="Select Date" disabled>
                                                @error('dob')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="pob" class="form-label request-form-label">Place of Birth*</label>
                                                <input class="form-control" type="text" name="pob" value="{{ ($personal->pob != '') ? $personal->pob : old('pob') }}" disabled>
                                                @error('pob')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="gender" class="form-label request-form-label">Sex*</label>
                                                <select class="form-select" name="gender" disabled required>
                                                    <option value="" selected>Choose</option>
                                                    <option value="Male" {{ ($user->gender == "Male" || old('gender') == "Male") ? "selected" : "" }}>Male</option>
                                                    <option value="Female" {{ ($user->gender == "Female" || old('gender') == "Female") ? "selected" : "" }}>Female</option>
                                                </select>
                                                @error('gender')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 border-top pt-2 mt-4">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="civil_status" class="form-label request-form-label">Civil Status*</label>
                                                <select class="form-select" name="civil_status" disabled required>
                                                    <option value="" selected>Select</option>
                                                    <option value="Single" {{ ($personal->civil_status == "Single" || old('civil_status') == "Single") ? "selected" : "" }}>Single</option>
                                                    <option value="Married" {{ ($personal->civil_status == "Married" || old('civil_status') == "Married") ? "selected" : "" }}>Married</option>
                                                    <option value="Widowed" {{ ($personal->civil_status == "Widowed" || old('civil_status') == "Widowed") ? "selected" : "" }}>Widowed</option>
                                                    <option value="Separated" {{ ($personal->civil_status == "Separated" || old('civil_status') == "Separated") ? "selected" : "" }}>Separated</option>
                                                    <option value="Other" {{ ($personal->civil_status == "Other" || old('civil_status') == "Other") ? "selected" : "" }}>Other/s:</option>
                                                </select>
                                                @error('civil_status')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="height" class="form-label request-form-label">Height*</label>
                                                <input class="form-control" type="text" name="height" value="{{ ($personal->height != '') ? $personal->height : old('height') }}" disabled>
                                                @error('height')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="weight" class="form-label request-form-label">Weight*</label>
                                                <input class="form-control" type="text" name="weight" value="{{ ($personal->weight != '') ? $personal->weight : old('weight') }}" disabled>
                                                @error('weight')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="blood_type" class="form-label request-form-label">Blood Type*</label>
                                                <input class="form-control" type="text" name="blood_type" value="{{ ($personal->blood_type != '') ? $personal->blood_type : old('blood_type') }}" disabled>
                                                @error('blood_type')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="gsis_id_no" class="form-label request-form-label">GSIS ID No.*</label>
                                                <input class="form-control" type="text" name="gsis_id_no" value="{{ ($personal->gsis_id_no != '') ? $personal->gsis_id_no : old('gsis_id_no') }}" disabled>
                                                @error('gsis_id_no')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="pagibig_id_no" class="form-label request-form-label">PAG-IBIG ID No.*</label>
                                                <input class="form-control" type="text" name="pagibig_id_no" value="{{ ($personal->pagibig_id_no != '') ? $personal->pagibig_id_no : old('pagibig_id_no') }}" disabled>
                                                @error('pagibig_id_no')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="philhealth_no" class="form-label request-form-label">PHILHEALTH No.*</label>
                                                <input class="form-control" type="text" name="philhealth_no" value="{{ ($personal->philhealth_no != '') ? $personal->philhealth_no : old('philhealth_no') }}" disabled>
                                                @error('philhealth_no')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="sss_no" class="form-label request-form-label">SSS No.*</label>
                                                <input class="form-control" type="text" name="sss_no" value="{{ ($personal->sss_no != '') ? $personal->sss_no : old('sss_no') }}" disabled>
                                                @error('sss_no')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="tin_no" class="form-label request-form-label">TIN No.*</label>
                                                <input class="form-control" type="text" name="tin_no" value="{{ ($personal->tin_no != '') ? $personal->tin_no : old('tin_no') }}" disabled>
                                                @error('tin_no')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="agency_employee_no" class="form-label request-form-label">AGENCY EMPLOYEE No.*</label>
                                                <input class="form-control" type="text" name="agency_employee_no" value="{{ ($personal->agency_employee_no != '') ? $personal->agency_employee_no : old('agency_employee_no') }}" disabled>
                                                @error('agency_employee_no')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-8">
                                            <label for="citizenship" class="form-label request-form-label">Citizenship*</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="option1" disabled>
                                                        <label class="form-check-label" for="option1">
                                                            Filipino
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="option2" disabled>
                                                        <label class="form-check-label" for="option2">
                                                            Dual Citizenship
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="option3" disabled>
                                                        <label class="form-check-label" for="option3">
                                                            by birth
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="option4" disabled>
                                                        <label class="form-check-label" for="option4">
                                                            by naturalization
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="citizenship_country" class="form-label request-form-label">Pls indicate country.*</label>
                                                        <select class="form-select" name="citizenship_country" disabled required>
                                                            <option value="" selected>Select</option>
                                                            <option value="Afghanistan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Afghanistan</option>
                                                            <option value="Åland Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Åland Islands</option>
                                                            <option value="Albania" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Albania</option>
                                                            <option value="Algeria" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Algeria</option>
                                                            <option value="American Samoa" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>American Samoa</option>
                                                            <option value="Andorra" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Andorra</option>
                                                            <option value="Angola" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Angola</option>
                                                            <option value="Anguilla" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Anguilla</option>
                                                            <option value="Antarctica" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Antarctica</option>
                                                            <option value="Antigua and Barbuda" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Antigua and Barbuda</option>
                                                            <option value="Argentina" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Argentina</option>
                                                            <option value="Armenia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Armenia</option>
                                                            <option value="Aruba" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Aruba</option>
                                                            <option value="Australia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Australia</option>
                                                            <option value="Austria" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Austria</option>
                                                            <option value="Azerbaijan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Azerbaijan</option>
                                                            <option value="Bahamas" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Bahamas</option>
                                                            <option value="Bahrain" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Bahrain</option>
                                                            <option value="Bangladesh" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Bangladesh</option>
                                                            <option value="Barbados" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Barbados</option>
                                                            <option value="Belarus" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Belarus</option>
                                                            <option value="Belgium" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Belgium</option>
                                                            <option value="Belize" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Belize</option>
                                                            <option value="Benin" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Benin</option>
                                                            <option value="Bermuda" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Bermuda</option>
                                                            <option value="Bhutan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Bhutan</option>
                                                            <option value="Bolivia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Bolivia</option>
                                                            <option value="Bosnia and Herzegovina" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Bosnia and Herzegovina</option>
                                                            <option value="Botswana" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Botswana</option>
                                                            <option value="Bouvet Island" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Bouvet Island</option>
                                                            <option value="Brazil" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Brazil</option>
                                                            <option value="British Indian Ocean Territory" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>British Indian Ocean Territory</option>
                                                            <option value="Brunei Darussalam" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Brunei Darussalam</option>
                                                            <option value="Bulgaria" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Bulgaria</option>
                                                            <option value="Burkina Faso" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Burkina Faso</option>
                                                            <option value="Burundi" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Burundi</option>
                                                            <option value="Cambodia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Cambodia</option>
                                                            <option value="Cameroon" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Cameroon</option>
                                                            <option value="Canada" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Canada</option>
                                                            <option value="Cape Verde" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Cape Verde</option>
                                                            <option value="Cayman Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Cayman Islands</option>
                                                            <option value="Central African Republic" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Central African Republic</option>
                                                            <option value="Chad" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Chad</option>
                                                            <option value="Chile" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Chile</option>
                                                            <option value="China" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>China</option>
                                                            <option value="Christmas Island" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Christmas Island</option>
                                                            <option value="Cocos (Keeling) Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Cocos (Keeling) Islands</option>
                                                            <option value="Colombia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Colombia</option>
                                                            <option value="Comoros" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Comoros</option>
                                                            <option value="Congo" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Congo</option>
                                                            <option value="Congo, The Democratic Republic of The" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Congo, The Democratic Republic of The</option>
                                                            <option value="Cook Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Cook Islands</option>
                                                            <option value="Costa Rica" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Costa Rica</option>
                                                            <option value="Cote D'ivoire" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Cote D'ivoire</option>
                                                            <option value="Croatia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Croatia</option>
                                                            <option value="Cuba" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Cuba</option>
                                                            <option value="Cyprus" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Cyprus</option>
                                                            <option value="Czech Republic" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Czech Republic</option>
                                                            <option value="Denmark" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Denmark</option>
                                                            <option value="Djibouti" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Djibouti</option>
                                                            <option value="Dominica" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Dominica</option>
                                                            <option value="Dominican Republic" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Dominican Republic</option>
                                                            <option value="Ecuador" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Ecuador</option>
                                                            <option value="Egypt" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Egypt</option>
                                                            <option value="El Salvador" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>El Salvador</option>
                                                            <option value="Equatorial Guinea" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Equatorial Guinea</option>
                                                            <option value="Eritrea" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Eritrea</option>
                                                            <option value="Estonia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Estonia</option>
                                                            <option value="Ethiopia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Ethiopia</option>
                                                            <option value="Falkland Islands (Malvinas)" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Falkland Islands (Malvinas)</option>
                                                            <option value="Faroe Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Faroe Islands</option>
                                                            <option value="Fiji" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Fiji</option>
                                                            <option value="Finland" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Finland</option>
                                                            <option value="France" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>France</option>
                                                            <option value="French Guiana" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>French Guiana</option>
                                                            <option value="French Polynesia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>French Polynesia</option>
                                                            <option value="French Southern Territories" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>French Southern Territories</option>
                                                            <option value="Gabon" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Gabon</option>
                                                            <option value="Gambia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Gambia</option>
                                                            <option value="Georgia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Georgia</option>
                                                            <option value="Germany" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Germany</option>
                                                            <option value="Ghana" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Ghana</option>
                                                            <option value="Gibraltar" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Gibraltar</option>
                                                            <option value="Greece" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Greece</option>
                                                            <option value="Greenland" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Greenland</option>
                                                            <option value="Grenada" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Grenada</option>
                                                            <option value="Guadeloupe" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Guadeloupe</option>
                                                            <option value="Guam" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Guam</option>
                                                            <option value="Guatemala" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Guatemala</option>
                                                            <option value="Guernsey" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Guernsey</option>
                                                            <option value="Guinea" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Guinea</option>
                                                            <option value="Guinea-bissau" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Guinea-bissau</option>
                                                            <option value="Guyana" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Guyana</option>
                                                            <option value="Haiti" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Haiti</option>
                                                            <option value="Heard Island and Mcdonald Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Heard Island and Mcdonald Islands</option>
                                                            <option value="Holy See (Vatican City State)" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Holy See (Vatican City State)</option>
                                                            <option value="Honduras" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Honduras</option>
                                                            <option value="Hong Kong" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Hong Kong</option>
                                                            <option value="Hungary" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Hungary</option>
                                                            <option value="Iceland" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Iceland</option>
                                                            <option value="India" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>India</option>
                                                            <option value="Indonesia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Indonesia</option>
                                                            <option value="Iran, Islamic Republic of" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Iran, Islamic Republic of</option>
                                                            <option value="Iraq" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Iraq</option>
                                                            <option value="Ireland" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Ireland</option>
                                                            <option value="Isle of Man" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Isle of Man</option>
                                                            <option value="Israel" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Israel</option>
                                                            <option value="Italy" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Italy</option>
                                                            <option value="Jamaica" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Jamaica</option>
                                                            <option value="Japan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Japan</option>
                                                            <option value="Jersey" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Jersey</option>
                                                            <option value="Jordan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Jordan</option>
                                                            <option value="Kazakhstan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Kazakhstan</option>
                                                            <option value="Kenya" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Kenya</option>
                                                            <option value="Kiribati" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Kiribati</option>
                                                            <option value="Korea, Democratic People's Republic of" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Korea, Democratic People's Republic of</option>
                                                            <option value="Korea, Republic of" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Korea, Republic of</option>
                                                            <option value="Kuwait" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Kuwait</option>
                                                            <option value="Kyrgyzstan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Kyrgyzstan</option>
                                                            <option value="Lao People's Democratic Republic" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Lao People's Democratic Republic</option>
                                                            <option value="Latvia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Latvia</option>
                                                            <option value="Lebanon" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Lebanon</option>
                                                            <option value="Lesotho" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Lesotho</option>
                                                            <option value="Liberia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Liberia</option>
                                                            <option value="Libyan Arab Jamahiriya" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Libyan Arab Jamahiriya</option>
                                                            <option value="Liechtenstein" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Liechtenstein</option>
                                                            <option value="Lithuania" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Lithuania</option>
                                                            <option value="Luxembourg" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Luxembourg</option>
                                                            <option value="Macao" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Macao</option>
                                                            <option value="Macedonia, The Former Yugoslav Republic of" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Macedonia, The Former Yugoslav Republic of</option>
                                                            <option value="Madagascar" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Madagascar</option>
                                                            <option value="Malawi" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Malawi</option>
                                                            <option value="Malaysia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Malaysia</option>
                                                            <option value="Maldives" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Maldives</option>
                                                            <option value="Mali" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Mali</option>
                                                            <option value="Malta" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Malta</option>
                                                            <option value="Marshall Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Marshall Islands</option>
                                                            <option value="Martinique" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Martinique</option>
                                                            <option value="Mauritania" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Mauritania</option>
                                                            <option value="Mauritius" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Mauritius</option>
                                                            <option value="Mayotte" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Mayotte</option>
                                                            <option value="Mexico" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Mexico</option>
                                                            <option value="Micronesia, Federated States of" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Micronesia, Federated States of</option>
                                                            <option value="Moldova, Republic of" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Moldova, Republic of</option>
                                                            <option value="Monaco" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Monaco</option>
                                                            <option value="Mongolia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Mongolia</option>
                                                            <option value="Montenegro" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Montenegro</option>
                                                            <option value="Montserrat" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Montserrat</option>
                                                            <option value="Morocco" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Morocco</option>
                                                            <option value="Mozambique" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Mozambique</option>
                                                            <option value="Myanmar" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Myanmar</option>
                                                            <option value="Namibia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Namibia</option>
                                                            <option value="Nauru" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Nauru</option>
                                                            <option value="Nepal" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Nepal</option>
                                                            <option value="Netherlands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Netherlands</option>
                                                            <option value="Netherlands Antilles" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Netherlands Antilles</option>
                                                            <option value="New Caledonia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>New Caledonia</option>
                                                            <option value="New Zealand" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>New Zealand</option>
                                                            <option value="Nicaragua" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Nicaragua</option>
                                                            <option value="Niger" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Niger</option>
                                                            <option value="Nigeria" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Nigeria</option>
                                                            <option value="Niue" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Niue</option>
                                                            <option value="Norfolk Island" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Norfolk Island</option>
                                                            <option value="Northern Mariana Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Northern Mariana Islands</option>
                                                            <option value="Norway" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Norway</option>
                                                            <option value="Oman" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Oman</option>
                                                            <option value="Pakistan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Pakistan</option>
                                                            <option value="Palau" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Palau</option>
                                                            <option value="Palestinian Territory, Occupied" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Palestinian Territory, Occupied</option>
                                                            <option value="Panama" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Panama</option>
                                                            <option value="Papua New Guinea" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Papua New Guinea</option>
                                                            <option value="Paraguay" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Paraguay</option>
                                                            <option value="Peru" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Peru</option>
                                                            <option value="Philippines" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Philippines</option>
                                                            <option value="Pitcairn" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Pitcairn</option>
                                                            <option value="Poland" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Poland</option>
                                                            <option value="Portugal" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Portugal</option>
                                                            <option value="Puerto Rico" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Puerto Rico</option>
                                                            <option value="Qatar" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Qatar</option>
                                                            <option value="Reunion" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Reunion</option>
                                                            <option value="Romania" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Romania</option>
                                                            <option value="Russian Federation" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Russian Federation</option>
                                                            <option value="Rwanda" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Rwanda</option>
                                                            <option value="Saint Helena" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Saint Helena</option>
                                                            <option value="Saint Kitts and Nevis" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Saint Kitts and Nevis</option>
                                                            <option value="Saint Lucia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Saint Lucia</option>
                                                            <option value="Saint Pierre and Miquelon" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Saint Pierre and Miquelon</option>
                                                            <option value="Saint Vincent and The Grenadines" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Saint Vincent and The Grenadines</option>
                                                            <option value="Samoa" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Samoa</option>
                                                            <option value="San Marino" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>San Marino</option>
                                                            <option value="Sao Tome and Principe" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Sao Tome and Principe</option>
                                                            <option value="Saudi Arabia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Saudi Arabia</option>
                                                            <option value="Senegal" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Senegal</option>
                                                            <option value="Serbia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Serbia</option>
                                                            <option value="Seychelles" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Seychelles</option>
                                                            <option value="Sierra Leone" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Sierra Leone</option>
                                                            <option value="Singapore" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Singapore</option>
                                                            <option value="Slovakia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Slovakia</option>
                                                            <option value="Slovenia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Slovenia</option>
                                                            <option value="Solomon Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Solomon Islands</option>
                                                            <option value="Somalia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Somalia</option>
                                                            <option value="South Africa" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>South Africa</option>
                                                            <option value="South Georgia and The South Sandwich Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>South Georgia and The South Sandwich Islands</option>
                                                            <option value="Spain" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Spain</option>
                                                            <option value="Sri Lanka" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Sri Lanka</option>
                                                            <option value="Sudan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Sudan</option>
                                                            <option value="Suriname" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Suriname</option>
                                                            <option value="Svalbard and Jan Mayen" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Svalbard and Jan Mayen</option>
                                                            <option value="Swaziland" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Swaziland</option>
                                                            <option value="Sweden" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Sweden</option>
                                                            <option value="Switzerland" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Switzerland</option>
                                                            <option value="Syrian Arab Republic" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Syrian Arab Republic</option>
                                                            <option value="Taiwan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Taiwan</option>
                                                            <option value="Tajikistan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Tajikistan</option>
                                                            <option value="Tanzania, United Republic of" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Tanzania, United Republic of</option>
                                                            <option value="Thailand" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Thailand</option>
                                                            <option value="Timor-leste" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Timor-leste</option>
                                                            <option value="Togo" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Togo</option>
                                                            <option value="Tokelau" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Tokelau</option>
                                                            <option value="Tonga" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Tonga</option>
                                                            <option value="Trinidad and Tobago" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Trinidad and Tobago</option>
                                                            <option value="Tunisia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Tunisia</option>
                                                            <option value="Turkey" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Turkey</option>
                                                            <option value="Turkmenistan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Turkmenistan</option>
                                                            <option value="Turks and Caicos Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Turks and Caicos Islands</option>
                                                            <option value="Tuvalu" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Tuvalu</option>
                                                            <option value="Uganda" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Uganda</option>
                                                            <option value="Ukraine" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Ukraine</option>
                                                            <option value="United Arab Emirates" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>United Arab Emirates</option>
                                                            <option value="United Kingdom" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>United Kingdom</option>
                                                            <option value="United States" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>United States</option>
                                                            <option value="United States Minor Outlying Islands" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>United States Minor Outlying Islands</option>
                                                            <option value="Uruguay" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Uruguay</option>
                                                            <option value="Uzbekistan" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Uzbekistan</option>
                                                            <option value="Vanuatu" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Vanuatu</option>
                                                            <option value="Venezuela" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Venezuela</option>
                                                            <option value="Viet Nam" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Viet Nam</option>
                                                            <option value="Virgin Islands, British" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Virgin Islands, British</option>
                                                            <option value="Virgin Islands, U.S." {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Virgin Islands, U.S.</option>
                                                            <option value="Wallis and Futuna" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Wallis and Futuna</option>
                                                            <option value="Western Sahara" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Western Sahara</option>
                                                            <option value="Yemen" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Yemen</option>
                                                            <option value="Zambia" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Zambia</option>
                                                            <option value="Zimbabwe" {{ ($personal->citizenship_country == "Single" || old('citizenship_country') == "Single") ? "selected" : "" }}>Zimbabwe</option>
                                                        </select>
                                                        @error('citizenship_country')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 border-top pt-2 mt-4">
                                        <span><i>Residential Address:</i></span>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="r_house_no" class="form-label request-form-label">House/Block/Lot No.*</label>
                                                <input class="form-control" type="text" name="r_house_no" value="{{ ($personal->r_house_no != '') ? $personal->r_house_no : old('r_house_no') }}" disabled>
                                                @error('r_house_no')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="r_street" class="form-label request-form-label">Street*</label>
                                                <input class="form-control" type="text" name="r_street" value="{{ ($personal->r_street != '') ? $personal->r_street : old('r_street') }}" disabled>
                                                @error('r_street')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="r_subdivision" class="form-label request-form-label">Subdivision/Village*</label>
                                                <input class="form-control" type="text" name="r_subdivision" value="{{ ($personal->r_subdivision != '') ? $personal->r_subdivision : old('r_subdivision') }}" disabled>
                                                @error('r_subdivision')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="r_barangay" class="form-label request-form-label">Barangay*</label>
                                                <input class="form-control" type="text" name="r_barangay" value="{{ ($personal->r_barangay != '') ? $personal->r_barangay : old('r_barangay') }}" disabled>
                                                @error('r_barangay')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="r_city" class="form-label request-form-label">City/Municipality*</label>
                                                <input class="form-control" type="text" name="r_city" value="{{ ($personal->r_city != '') ? $personal->r_city : old('r_city') }}" disabled>
                                                @error('r_city')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="r_province" class="form-label request-form-label">Province*</label>
                                                <input class="form-control" type="text" name="r_province" value="{{ ($personal->r_province != '') ? $personal->r_province : old('r_province') }}" disabled>
                                                @error('r_province')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="r_zip_code" class="form-label request-form-label">Zip Code*</label>
                                                <input class="form-control" type="text" name="r_zip_code" value="{{ ($personal->r_zip_code != '') ? $personal->r_zip_code : old('r_zip_code') }}" disabled>
                                                @error('r_zip_code')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 border-top pt-2 mt-4">
                                        <span><i>Permanent Address:</i></span>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="p_house_no" class="form-label request-form-label">House/Block/Lot No.*</label>
                                                <input class="form-control" type="text" name="p_house_no" value="{{ ($personal->p_house_no != '') ? $personal->p_house_no : old('p_house_no') }}" disabled>
                                                @error('p_house_no')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="p_street" class="form-label request-form-label">Street*</label>
                                                <input class="form-control" type="text" name="p_street" value="{{ ($personal->p_street != '') ? $personal->p_street : old('p_street') }}" disabled>
                                                @error('p_street')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="p_subdivision" class="form-label request-form-label">Subdivision/Village*</label>
                                                <input class="form-control" type="text" name="p_subdivision" value="{{ ($personal->p_subdivision != '') ? $personal->p_subdivision : old('p_subdivision') }}" disabled>
                                                @error('p_subdivision')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="p_barangay" class="form-label request-form-label">Barangay*</label>
                                                <input class="form-control" type="text" name="p_barangay" value="{{ ($personal->p_barangay != '') ? $personal->p_barangay : old('p_barangay') }}" disabled>
                                                @error('p_barangay')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="p_city" class="form-label request-form-label">City/Municipality*</label>
                                                <input class="form-control" type="text" name="p_city" value="{{ ($personal->p_city != '') ? $personal->p_city : old('p_city') }}" disabled>
                                                @error('p_city')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="p_province" class="form-label request-form-label">Province*</label>
                                                <input class="form-control" type="text" name="p_province" value="{{ ($personal->p_province != '') ? $personal->p_province : old('p_province') }}" disabled>
                                                @error('p_province')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="p_zip_code" class="form-label request-form-label">Zip Code*</label>
                                                <input class="form-control" type="text" name="p_zip_code" value="{{ ($personal->p_zip_code != '') ? $personal->p_zip_code : old('p_zip_code') }}" disabled>
                                                @error('p_zip_code')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 border-top pt-2 mt-4">
                                        <span><i>Contact:</i></span>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="telephone" class="form-label request-form-label">Telephone No.*</label>
                                                <input class="form-control" type="text" name="telephone" value="{{ ($personal->telephone != '') ? $personal->telephone : old('telephone') }}" placeholder="Optional" disabled>
                                                @error('telephone')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="mobile" class="form-label request-form-label">Mobile No*</label>
                                                <input class="form-control" type="text" name="mobile" value="{{ ($personal->mobile != '') ? $personal->mobile : old('mobile') }}" disabled>
                                                @error('mobile')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="contact_email" class="form-label request-form-label">Email (If any)*</label>
                                                <input class="form-control" type="email" name="contact_email" value="{{ ($personal->contact_email != '') ? $personal->contact_email : old('contact_email') }}" placeholder="Optional" disabled>
                                                @error('contact_email')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn custom-btn text-light float-end" id="btn-update" style="display:none;">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-family" role="tabpanel" aria-labelledby="v-pills-family-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">II.) Family Background</span>
                                <button class="btn btn-success text-light float-end" id="btn-edit">Edit</button>
                                <a href="" class="btn btn-success text-light float-end" id="btn-update" style="display:none;">Update</a>
                            </div>
                            <div class="card-body">
                                <p>Fill up information below.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-educational" role="tabpanel" aria-labelledby="v-pills-educational-tab">
                        <div class="card shadow-sm border-0">
                            <div class="card-header">
                                <span class="float-start mt-2 fw-bold">III.) Educational Background</span>
                                <button class="btn btn-success text-light float-end" id="btn-edit">Edit</button>
                                <a href="" class="btn btn-success text-light float-end" id="btn-update" style="display:none;">Update</a>
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

<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Edit Button -->
<script>
    $(document).ready(function() {
        $("#btn-edit").click(function() {
            $("#btn-edit").hide();
            $("#btn-update").show();
            $(".form-control").removeAttr('disabled');
            $(".form-check-input").removeAttr('disabled');
            $(".form-select").removeAttr('disabled');
        });
    });
</script>

<!-- Flatpickr Script -->
<script>
    flatpickr('#flatpickr', {
        enableTime: false,
        enableSeconds: false
    })
</script>
@endsection