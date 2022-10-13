<form class="mt-4" action="{{ route('educational.datasheet.update') }}" method="POST">
    @csrf

    <!-- Start Elementary -->
    <div class="row mb-2">
        <span class="by-section-heading">Elementary:</span>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_school" class="form-label request-form-label">Name of School (Write in full)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_school" value="{{ (old('elementary_school')) ? old('elementary_school') : $educational->elementary_school }}" disabled required>
                @error('elementary_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)</label>
                <input class="form-control" type="text" name="elementary_course" value="n/a" placeholder="If n/a leave it blank" disabled>
                @error('elementary_course')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_from" class="form-label request-form-label">Year From<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_from" value="{{ (old('elementary_from')) ? old('elementary_from') : $educational->elementary_from }}" placeholder="YYYY" disabled required>
                @error('elementary_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_to" class="form-label request-form-label">Year To<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_to" value="{{ (old('elementary_to')) ? old('elementary_to') : $educational->elementary_to }}" placeholder="YYYY" disabled required>
                @error('elementary_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_units" class="form-label request-form-label">Highest Level/Units Earned</label>
                <input class="form-control" type="text" name="elementary_units" value="n/a" placeholder="If n/a leave it blank" disabled>
                @error('elementary_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_graduated" class="form-label request-form-label">Year Graduated<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_graduated" value="{{ (old('elementary_graduated')) ? old('elementary_graduated') : $educational->elementary_graduated }}" placeholder="YYYY" disabled required>
                @error('elementary_graduated')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_honors" class="form-label request-form-label">Scholarship/Academic Honors Received</label>
                <input class="form-control" type="text" name="elementary_honors" placeholder="If none leave it blank" value="{{ (old('elementary_honors')) ? old('elementary_honors') : $educational->elementary_honors }}" disabled>
                @error('elementary_honors')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <!-- End Elementary -->

    <!-- Start Secondary -->
    <div class="row mb-2 border-top pt-2 mt-4">
        <span class="by-section-heading">Secondary:</span>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="secondary_school" class="form-label request-form-label">Name of School (Write in full)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="secondary_school" value="{{ (old('secondary_school')) ? old('secondary_school') : $educational->secondary_school }}" disabled required>
                @error('secondary_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="secondary_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="secondary_course" value="{{ (old('secondary_course')) ? old('secondary_course') : $educational->secondary_course }}" placeholder="Strand/Track" disabled required>
                @error('secondary_course')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="secondary_from" class="form-label request-form-label">Year From<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="secondary_from" value="{{ (old('secondary_from')) ? old('secondary_from') : $educational->secondary_from }}" placeholder="YYYY" disabled required>
                @error('secondary_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="secondary_to" class="form-label request-form-label">Year To<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="secondary_to" value="{{ (old('secondary_to')) ? old('secondary_to') : $educational->secondary_to }}" placeholder="YYYY" disabled required>
                @error('secondary_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_units" class="form-label request-form-label">Highest Level/Units Earned</label>
                <input class="form-control" type="text" name="elementary_units" value="n/a" placeholder="If n/a leave it blank" disabled>
                @error('elementary_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="secondary_graduated" class="form-label request-form-label">Year Graduated<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="secondary_graduated" value="{{ (old('secondary_graduated')) ? old('secondary_graduated') : $educational->secondary_graduated }}" placeholder="YYYY" disabled required>
                @error('secondary_graduated')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="secondary_honors" class="form-label request-form-label">Scholarship/Academic Honors Received</label>
                <input class="form-control" type="text" name="secondary_honors" placeholder="If none leave it blank" value="{{ (old('secondary_honors')) ? old('secondary_honors') : $educational->secondary_honors }}" disabled>
                @error('secondary_honors')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <!-- End Secondary -->

    <!-- Start Vocational -->
    <div class="row mb-2 border-top pt-2 mt-4">
        <span class="by-section-heading">Vocational(Optional):</span>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="vocational_school" class="form-label request-form-label">Name of School (Write in full)</label>
                <input class="form-control" type="text" name="vocational_school" value="{{ (old('vocational_school')) ? old('vocational_school') : $educational->vocational_school }}" disabled>
                @error('vocational_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="vocational_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)</label>
                <input class="form-control" type="text" name="vocational_course" value="{{ (old('vocational_course')) ? old('vocational_course') : $educational->vocational_course }}" disabled>
                @error('vocational_course')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="vocational_from" class="form-label request-form-label">Year From</label>
                <input class="form-control" type="text" name="vocational_from" value="{{ (old('vocational_from')) ? old('vocational_from') : $educational->vocational_from }}" placeholder="YYYY" disabled>
                @error('vocational_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="vocational_to" class="form-label request-form-label">Year To</label>
                <input class="form-control" type="text" name="vocational_to" value="{{ (old('vocational_to')) ? old('vocational_to') : $educational->vocational_to }}" placeholder="YYYY" disabled>
                @error('vocational_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="vocational_units" class="form-label request-form-label">Highest Level/Units Earned</label>
                <input class="form-control" type="text" name="vocational_units" value="n/a" placeholder="If n/a leave it blank" disabled>
                @error('vocational_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="vocational_graduated" class="form-label request-form-label">Year Graduated</label>
                <input class="form-control" type="text" name="vocational_graduated" value="{{ (old('vocational_graduated')) ? old('vocational_graduated') : $educational->vocational_graduated }}" placeholder="YYYY" disabled>
                @error('vocational_graduated')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="vocational_honors" class="form-label request-form-label">Scholarship/Academic Honors Received</label>
                <input class="form-control" type="text" name="vocational_honors" placeholder="If none leave it blank" value="{{ (old('vocational_honors')) ? old('vocational_honors') : $educational->vocational_honors }}" disabled>
                @error('vocational_honors')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <!-- End Vocational -->

    <!-- Start College -->
    <div class="row mb-2 border-top pt-2 mt-4">
        <span class="by-section-heading">College:</span>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="college_school" class="form-label request-form-label">Name of School (Write in full)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="college_school" value="{{ (old('college_school')) ? old('college_school') : $educational->college_school }}" disabled required>
                @error('college_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="college_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="college_course" value="{{ (old('college_course')) ? old('college_course') : $educational->college_course }}" disabled required>
                @error('college_course')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="college_from" class="form-label request-form-label">Year From<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="college_from" value="{{ (old('college_from')) ? old('college_from') : $educational->college_from }}" placeholder="YYYY" disabled required>
                @error('college_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="college_to" class="form-label request-form-label">Year To<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="college_to" value="{{ (old('college_to')) ? old('college_to') : $educational->college_to }}" placeholder="YYYY" disabled required>
                @error('college_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="college_units" class="form-label request-form-label">Highest Level/Units Earned<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="college_units" value="{{ (old('college_units')) ? old('college_units') : $educational->college_units }}" disabled required>
                @error('college_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="college_graduated" class="form-label request-form-label">Year Graduated<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="college_graduated" value="{{ (old('college_graduated')) ? old('college_graduated') : $educational->college_graduated }}" placeholder="YYYY" disabled required>
                @error('college_graduated')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="college_honors" class="form-label request-form-label">Scholarship/Academic Honors Received</label>
                <input class="form-control" type="text" name="college_honors" placeholder="If none leave it blank" value="{{ (old('college_honors')) ? old('college_honors') : $educational->college_honors }}" disabled>
                @error('college_honors')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <!-- End College -->

    <!-- Start Graduate Studies -->
    <div class="row mb-2 border-top pt-2 mt-4">
        <span class="by-section-heading">Graduate Studies(Optional):</span>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="studies_school" class="form-label request-form-label">Name of School (Write in full)</label>
                <input class="form-control" type="text" name="studies_school" value="{{ (old('studies_school')) ? old('studies_school') : $educational->studies_school }}" disabled>
                @error('studies_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="studies_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)</label>
                <input class="form-control" type="text" name="studies_course" value="{{ (old('studies_course')) ? old('studies_course') : $educational->studies_course }}" disabled>
                @error('studies_course')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="studies_from" class="form-label request-form-label">Year From</label>
                <input class="form-control" type="text" name="studies_from" value="{{ (old('studies_from')) ? old('studies_from') : $educational->studies_from }}" placeholder="YYYY" disabled>
                @error('studies_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="studies_to" class="form-label request-form-label">Year To</label>
                <input class="form-control" type="text" name="studies_to" value="{{ (old('studies_to')) ? old('studies_to') : $educational->studies_to }}" placeholder="YYYY" disabled>
                @error('studies_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="studies_units" class="form-label request-form-label">Highest Level/Units Earned</label>
                <input class="form-control" type="text" name="studies_units" placeholder="If n/a leave it blank" value="{{ (old('studies_units')) ? old('studies_units') : $educational->studies_units }}" disabled>
                @error('studies_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="studies_graduated" class="form-label request-form-label">Year Graduated</label>
                <input class="form-control" type="text" name="studies_graduated" value="{{ (old('studies_graduated')) ? old('studies_graduated') : $educational->studies_graduated }}" placeholder="YYYY" disabled>
                @error('studies_graduated')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="studies_honors" class="form-label request-form-label">Scholarship/Academic Honors Received</label>
                <input class="form-control" type="text" name="studies_honors" placeholder="If none leave it blank" value="{{ (old('studies_honors')) ? old('studies_honors') : $educational->studies_honors }}" disabled>
                @error('studies_honors')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <!-- End Graduate Studies -->

    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Save Changes</button>
    <span class="btn btn-secondary rounded-circle shadow-sm float-start" id="prev-family" role="prev_next"><i class="fa-solid fa-chevron-left"></i></span>
    <span class="btn btn-secondary rounded-circle shadow-sm float-end" id="next-civil" role="prev_next" data-bs-toggle="{{ ($educational->elementary_school == '') ? 'tooltip' : 'pill' }}" title="{{ ($educational->elementary_school == '') ? 'Complete III.) Educational Background to Proceed.' : '' }}" data-bs-placement="left" style="{{ ($educational->elementary_school == '') ? 'cursor: not-allowed' : '' }}"><i class="fa-solid fa-chevron-right"></i></span>
</form>

<!-- Next Prev Button Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#prev-family").click(function() {
        $("#v-pills-family-tab").click();
    });
    $("#next-civil").click(function() {
        $("#v-pills-civil-tab").click();
    });
</script>