<form class="mt-4" action="{{ route('personal.datasheet.update') }}" method="POST" id="PersonalForm">
    @csrf
    <div class="row mb-2">
        <span><i>Basic Information:</i></span>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="last_name" class="form-label request-form-label">Surname*</label>
                <input class="form-control" type="text" name="last_name" value="{{ ($user->last_name != '') ? $user->last_name : old('last_name')  }}" disabled required>
                @error('last_name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="first_name" class="form-label request-form-label">First Name*</label>
                <input class="form-control" type="text" name="first_name" value="{{ ($user->first_name != '') ? $user->first_name : old('first_name')  }}" disabled required>
                @error('first_name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="middle_name" class="form-label request-form-label">Middle Name*</label>
                <input class="form-control" type="text" name="middle_name" value="{{ ($personal->middle_name != '') ? $personal->middle_name : old('middle_name') }}" disabled required>
                @error('middle_name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="extension_name" class="form-label request-form-label">Name Extension*</label>
                <input class="form-control" type="text" name="extension_name" value="{{ ($personal->extension_name != '') ? $personal->extension_name : old('extension_name') }}" disabled>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="dob" class="form-label request-form-label">Date of Birth*</label>
                <input class="form-control flatpickr" type="text" name="dob" value="{{ ($personal->dob != '') ? $personal->dob : old('dob') }}" placeholder="Select Date" disabled required>
                @error('dob')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="pob" class="form-label request-form-label">Place of Birth*</label>
                <input class="form-control" type="text" name="pob" value="{{ ($personal->pob != '') ? $personal->pob : old('pob') }}" disabled required>
                @error('pob')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
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
        <span><i>Additional Information:</i></span>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="height" class="form-label request-form-label">Height*</label>
                <input class="form-control" type="text" name="height" value="{{ ($personal->height != '') ? $personal->height : old('height') }}" disabled required>
                @error('height')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="weight" class="form-label request-form-label">Weight*</label>
                <input class="form-control" type="text" name="weight" value="{{ ($personal->weight != '') ? $personal->weight : old('weight') }}" disabled required>
                @error('weight')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="blood_type" class="form-label request-form-label">Blood Type*</label>
                <input class="form-control" type="text" name="blood_type" value="{{ ($personal->blood_type != '') ? $personal->blood_type : old('blood_type') }}" disabled required>
                @error('blood_type')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="gsis_id_no" class="form-label request-form-label">GSIS ID No.*</label>
                <input class="form-control" type="text" name="gsis_id_no" value="{{ ($personal->gsis_id_no != '') ? $personal->gsis_id_no : old('gsis_id_no') }}" disabled>
                @error('gsis_id_no')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="pagibig_id_no" class="form-label request-form-label">PAG-IBIG ID No.*</label>
                <input class="form-control" type="text" name="pagibig_id_no" value="{{ ($personal->pagibig_id_no != '') ? $personal->pagibig_id_no : old('pagibig_id_no') }}" disabled>
                @error('pagibig_id_no')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="sss_no" class="form-label request-form-label">SSS No.*</label>
                <input class="form-control" type="text" name="sss_no" value="{{ ($personal->sss_no != '') ? $personal->sss_no : old('sss_no') }}" disabled>
                @error('sss_no')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="tin_no" class="form-label request-form-label">TIN No.*</label>
                <input class="form-control" type="text" name="tin_no" value="{{ ($personal->tin_no != '') ? $personal->tin_no : old('tin_no') }}" disabled>
                @error('tin_no')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label for="citizenship" class="form-label request-form-label">Citizenship*</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Filipino" name="by_filipino" id="by_filipino" disabled {{ ($personal->by_filipino == "Filipino" || old('by_filipino') == "Filipino") ? "checked" : "" }}>
                        <label class="form-check-label" for="by_filipino">
                            Filipino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Dual Citizenship" name="by_dual_citizenship" id="by_dual_citizenship" disabled {{ ($personal->by_dual_citizenship == "Dual Citizenship" || old('by_dual_citizenship') == "Dual Citizenship") ? "checked" : "" }}>
                        <label class="form-check-label" for="by_dual_citizenship">
                            Dual Citizenship
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="By Birth" name="by_birth" id="by_birth" disabled {{ ($personal->by_birth == "By Birth" || old('by_birth') == "By Birth") ? "checked" : "" }}>
                        <label class="form-check-label" for="by_birth">
                            by birth
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="By Naturalization" name="by_naturalization" id="by_naturalization" disabled {{ ($personal->by_naturalization == "By Naturalization" || old('by_naturalization') == "By Naturalization") ? "checked" : "" }}>
                        <label class="form-check-label" for="by_naturalization">
                            by naturalization
                        </label>
                    </div>
                </div>
                @if (Session::has('citizenship-error-message'))
                <small class="text-danger">{{ Session::get('citizenship-error-message') }}</small>
                @endif
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="citizenship_country" class="form-label request-form-label">Pls indicate country.*</label>
                        <select class="form-select" name="citizenship_country" disabled required>
                            @include('user.form.country_option')
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
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="r_house_no" class="form-label request-form-label">House/Block/Lot No.*</label>
                <input class="form-control" type="text" name="r_house_no" value="{{ ($personal->r_house_no != '') ? $personal->r_house_no : old('r_house_no') }}" disabled required>
                @error('r_house_no')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="r_street" class="form-label request-form-label">Street*</label>
                <input class="form-control" type="text" name="r_street" value="{{ ($personal->r_street != '') ? $personal->r_street : old('r_street') }}" disabled required>
                @error('r_street')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="r_subdivision" class="form-label request-form-label">Subdivision/Village*</label>
                <input class="form-control" type="text" name="r_subdivision" value="{{ ($personal->r_subdivision != '') ? $personal->r_subdivision : old('r_subdivision') }}" disabled required>
                @error('r_subdivision')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="r_barangay" class="form-label request-form-label">Barangay*</label>
                <input class="form-control" type="text" name="r_barangay" value="{{ ($personal->r_barangay != '') ? $personal->r_barangay : old('r_barangay') }}" disabled required>
                @error('r_barangay')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-5 col-lg-5 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="r_city" class="form-label request-form-label">City/Municipality*</label>
                <input class="form-control" type="text" name="r_city" value="{{ ($personal->r_city != '') ? $personal->r_city : old('r_city') }}" disabled required>
                @error('r_city')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="r_province" class="form-label request-form-label">Province*</label>
                <input class="form-control" type="text" name="r_province" value="{{ ($personal->r_province != '') ? $personal->r_province : old('r_province') }}" disabled required>
                @error('r_province')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="r_zip_code" class="form-label request-form-label">Zip Code*</label>
                <input class="form-control" type="text" name="r_zip_code" value="{{ ($personal->r_zip_code != '') ? $personal->r_zip_code : old('r_zip_code') }}" disabled required>
                @error('r_zip_code')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2 border-top pt-2 mt-4">
        <span><i>Permanent Address:</i></span>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="p_house_no" class="form-label request-form-label">House/Block/Lot No.*</label>
                <input class="form-control" type="text" name="p_house_no" value="{{ ($personal->p_house_no != '') ? $personal->p_house_no : old('p_house_no') }}" disabled required>
                @error('p_house_no')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="p_street" class="form-label request-form-label">Street*</label>
                <input class="form-control" type="text" name="p_street" value="{{ ($personal->p_street != '') ? $personal->p_street : old('p_street') }}" disabled required>
                @error('p_street')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="p_subdivision" class="form-label request-form-label">Subdivision/Village*</label>
                <input class="form-control" type="text" name="p_subdivision" value="{{ ($personal->p_subdivision != '') ? $personal->p_subdivision : old('p_subdivision') }}" disabled required>
                @error('p_subdivision')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="p_barangay" class="form-label request-form-label">Barangay*</label>
                <input class="form-control" type="text" name="p_barangay" value="{{ ($personal->p_barangay != '') ? $personal->p_barangay : old('p_barangay') }}" disabled required>
                @error('p_barangay')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-5 col-lg-5 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="p_city" class="form-label request-form-label">City/Municipality*</label>
                <input class="form-control" type="text" name="p_city" value="{{ ($personal->p_city != '') ? $personal->p_city : old('p_city') }}" disabled required>
                @error('p_city')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="p_province" class="form-label request-form-label">Province*</label>
                <input class="form-control" type="text" name="p_province" value="{{ ($personal->p_province != '') ? $personal->p_province : old('p_province') }}" disabled required>
                @error('p_province')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="p_zip_code" class="form-label request-form-label">Zip Code*</label>
                <input class="form-control" type="text" name="p_zip_code" value="{{ ($personal->p_zip_code != '') ? $personal->p_zip_code : old('p_zip_code') }}" disabled required>
                @error('p_zip_code')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2 border-top pt-2 mt-4">
        <span><i>Contact:</i></span>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="telephone" class="form-label request-form-label">Telephone No.*</label>
                <input class="form-control" type="text" name="telephone" value="{{ ($personal->telephone != '') ? $personal->telephone : old('telephone') }}" placeholder="Optional" disabled>
                @error('telephone')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="mobile" class="form-label request-form-label">Mobile No*</label>
                <input class="form-control" type="text" name="mobile" value="{{ ($personal->mobile != '') ? $personal->mobile : old('mobile') }}" disabled required>
                @error('mobile')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="contact_email" class="form-label request-form-label">Email (If any)*</label>
                <input class="form-control" type="email" name="contact_email" value="{{ ($personal->contact_email != '') ? $personal->contact_email : old('contact_email') }}" placeholder="Optional" disabled>
                @error('contact_email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Update</button>
</form>

<!-- Flatpickr Script -->
<script>
    flatpickr('.flatpickr', {
        enableTime: false,
        enableSeconds: false
    })
</script>

<!-- Validation for Citizenship (Checkbox must be  selected before updating the form) -->
<script>
    (function() {
        const form = document.querySelector('#PersonalForm');
        const checkboxes = form.querySelectorAll('input[type=checkbox]');
        const checkboxLength = checkboxes.length;
        const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

        function init() {
            if (firstCheckbox) {
                for (let i = 0; i < checkboxLength; i++) {
                    checkboxes[i].addEventListener('change', checkValidity);
                }
                checkValidity();
            }
        }

        function isChecked() {
            for (let i = 0; i < checkboxLength; i++) {
                if (checkboxes[i].checked) return true;
            }
            return false;
        }

        function checkValidity() {
            const errorMessage = !isChecked() ? 'At least one checkbox must be selected.' : '';
            firstCheckbox.setCustomValidity(errorMessage);
        }
        init();
    })();
</script>