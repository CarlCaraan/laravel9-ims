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
            <small>
                CS Form No. 212
                <br />
                Revised 2017
            </small>
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
                                <button class="btn btn-success text-light float-end" id="btn-edit">Edit</button>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-warning" role="alert">
                                    <strong>WARNING:</strong> Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing
                                    of administrative/criminal case/s against the person concerned.
                                </div>
                                <span class="custom-heading-label">
                                    READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.
                                </span>
                                <form class="mt-4" action="{{ route('personal.datasheet.update') }}" method="POST">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="last_name" class="form-label request-form-label">Surname*</label>
                                                <input class="form-control" type="text" name="last_name" value="{{ ($user->last_name != '') ? $user->last_name : old('last_name')  }}" disabled>
                                                @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="first_name" class="form-label request-form-label">First Name*</label>
                                                <input class="form-control" type="text" name="first_name" value="{{ ($user->first_name != '') ? $user->first_name : old('first_name')  }}" disabled>
                                                @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="middle_name" class="form-label request-form-label">Middle Name*</label>
                                                <input class="form-control" type="text" name="middle_name" value="{{ ($personal->middle_name != '') ? $personal->middle_name : old('middle_name') }}" disabled>
                                                @error('middle_name')
                                                <span class="text-danger">{{ $message }}</span>
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
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="pob" class="form-label request-form-label">Place of Birth*</label>
                                                <input class="form-control" type="text" name="pob" value="{{ $user->pob }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="gender" class="form-label request-form-label">Sex*</label>
                                                <select class="form-select" name="gender" disabled>
                                                    <option value="" selected>Choose Gender</option>
                                                    <option value="Male" {{ ($user->gender == "Male") ? "selected" : "" }}>Male</option>
                                                    <option value="Female" {{ ($user->gender == "Female") ? "selected" : "" }}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 border-top pt-2 mt-4">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="civil_status" class="form-label request-form-label">Civil Status*</label>
                                                <select class="form-select" name="civil_status" disabled>
                                                    <option value="" selected>Select</option>
                                                    <option value="Single" {{ ($personal->civil_status == "Single") ? "selected" : "" }}>Single</option>
                                                    <option value="Married" {{ ($personal->civil_status == "Married") ? "selected" : "" }}>Married</option>
                                                    <option value="Widowed" {{ ($personal->civil_status == "Widowed") ? "selected" : "" }}>Widowed</option>
                                                    <option value="Separated" {{ ($personal->civil_status == "Separated") ? "selected" : "" }}>Separated</option>
                                                    <option value="Other" {{ ($personal->civil_status == "Other") ? "selected" : "" }}>Other/s:</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="height" class="form-label request-form-label">Height*</label>
                                                <input class="form-control" type="text" name="height" value="{{ $personal->height }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="weight" class="form-label request-form-label">Weight*</label>
                                                <input class="form-control" type="text" name="weight" value="{{ $personal->weight }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="blood_type" class="form-label request-form-label">Blood Type*</label>
                                                <input class="form-control" type="text" name="blood_type" value="{{ $personal->blood_type }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="gsis_id_no" class="form-label request-form-label">GSIS ID No.*</label>
                                                <input class="form-control" type="text" value="{{ $personal->gsis_id_no }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="pagibig_id_no" class="form-label request-form-label">PAG-IBIG ID No.*</label>
                                                <input class="form-control" type="text" value="{{ $personal->pagibig_id_no }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="philhealth_no" class="form-label request-form-label">PHILHEALTH No.*</label>
                                                <input class="form-control" type="text" value="{{ $personal->philhealth_no }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="sss_no" class="form-label request-form-label">SSS No.*</label>
                                                <input class="form-control" type="text" value="{{ $personal->sss_no }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="tin_no" class="form-label request-form-label">TIN No.*</label>
                                                <input class="form-control" type="text" value="{{ $personal->tin_no }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="agency_employee_no" class="form-label request-form-label">AGENCY EMPLOYEE No.*</label>
                                                <input class="form-control" type="text" value="{{ $personal->agency_employee_no }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
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
                                                        <select class="form-select" disabled>
                                                            <option value="" selected>Select</option>
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Åland Islands">Åland Islands</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bermuda">Bermuda</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bolivia">Bolivia</option>
                                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Central African Republic">Central African Republic</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Congo">Congo</option>
                                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="French Southern Territories">French Southern Territories</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guernsey">Guernsey</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Isle of Man">Isle of Man</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Macao">Macao</option>
                                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Myanmar">Myanmar</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Pitcairn">Pitcairn</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russian Federation">Russian Federation</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Helena">Saint Helena</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                            <option value="Taiwan">Taiwan</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Timor-leste">Timor-leste</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>
                                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Viet Nam">Viet Nam</option>
                                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
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
                                                <input class="form-control" type="text" name="" value="{{ $personal->r_house_no }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="r_street" class="form-label request-form-label">Street*</label>
                                                <input class="form-control" type="text" name="" value="{{ $personal->r_street }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="r_subdivision" class="form-label request-form-label">Subdivision/Village*</label>
                                                <input class="form-control" type="text" name="r_subdivision" value="{{ $personal->r_subdivision }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="r_barangay" class="form-label request-form-label">Barangay*</label>
                                                <input class="form-control" type="text" name="r_barangay" value="{{ $personal->r_barangay }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="r_city" class="form-label request-form-label">City/Municipality*</label>
                                                <input class="form-control" type="text" name="r_city" value="{{ $user->r_city }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="r_province" class="form-label request-form-label">Province*</label>
                                                <input class="form-control" type="text" name="r_province" value="{{ $personal->r_province }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="r_zipcode" class="form-label request-form-label">Zip Code*</label>
                                                <input class="form-control" type="text" name="r_zipcode" value="{{ $personal->r_zipcode }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 border-top pt-2 mt-4">
                                        <span><i>Permanent Address:</i></span>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="p_house_no" class="form-label request-form-label">House/Block/Lot No.*</label>
                                                <input class="form-control" type="text" name="p_house_no" value="{{ $personal->p_house_no }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="p_street" class="form-label request-form-label">Street*</label>
                                                <input class="form-control" type="text" name="p_street" value="{{ $personal->p_street }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="p_subdivision" class="form-label request-form-label">Subdivision/Village*</label>
                                                <input class="form-control" type="text" name="p_subdivision" value="{{ $user->p_subdivision }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="p_barangay" class="form-label request-form-label">Barangay*</label>
                                                <input class="form-control" type="text" name="p_barangay" value="{{ $personal->p_barangay }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="p_city" class="form-label request-form-label">City/Municipality*</label>
                                                <input class="form-control" type="text" name="p_city" value="{{ $personal->p_city }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="p_province" class="form-label request-form-label">Province*</label>
                                                <input class="form-control" type="text" name="p_province" value="{{ $personal->p_province }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="p_zipcode" class="form-label request-form-label">Zip Code*</label>
                                                <input class="form-control" type="text" name="p_zipcode" value="{{ $personal->p_zipcode }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 border-top pt-2 mt-4">
                                        <span><i>Contact:</i></span>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="telephone" class="form-label request-form-label">Telephone No.*</label>
                                                <input class="form-control" type="text" name="telephone" value="{{ $personal->telephone }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="mobile" class="form-label request-form-label">Mobile No*</label>
                                                <input class="form-control" type="text" name="mobile" value="{{ $personal->mobile }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="first_name" class="form-label request-form-label">Email (If any)*</label>
                                                <input class="form-control" type="text" name="contact_email" value="{{ $personal->contact_email }}" placeholder="Optional" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success text-light float-end" id="btn-update" style="display:none;">Update</button>
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