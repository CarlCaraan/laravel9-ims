<form class="mt-4" action="{{ route('educational.datasheet.update') }}" method="POST">
    @csrf

    <!-- Start Elementary -->
    <div class="row mb-2">
        <span class="by-section-heading">Elementary:</span>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_school" class="form-label request-form-label">Name of School (Write in full)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_school" value="{{ ($educational->elementary_school != '') ? $educational->elementary_school : old('elementary_school')  }}" disabled required>
                @error('elementary_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)</label>
                <input class="form-control" type="text" name="elementary_course" value="{{ ($educational->elementary_course != '') ? $educational->elementary_course : old('elementary_course')  }}" disabled>
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
                <input class="form-control" type="text" name="elementary_from" value="{{ ($educational->elementary_from != '') ? $educational->elementary_from : old('elementary_from')  }}" placeholder="YYYY" disabled required>
                @error('elementary_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_to" class="form-label request-form-label">Year To<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_to" value="{{ ($educational->elementary_to != '') ? $educational->elementary_to : old('elementary_to')  }}" placeholder="YYYY" disabled required>
                @error('elementary_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_units" class="form-label request-form-label">Highest Level/Units Earned</label>
                <input class="form-control" type="text" name="elementary_units" value="{{ ($educational->elementary_units != '') ? $educational->elementary_units : old('elementary_units')  }}" disabled>
                @error('elementary_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_graduated" class="form-label request-form-label">Year Graduated<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_graduated" value="{{ ($educational->elementary_graduated != '') ? $educational->elementary_graduated : old('elementary_graduated')  }}" placeholder="YYYY" disabled required>
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
                <input class="form-control" type="text" name="elementary_honors" value="{{ ($educational->elementary_honors != '') ? $educational->elementary_honors : old('elementary_honors')  }}" disabled>
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
                <input class="form-control" type="text" name="secondary_school" value="{{ ($educational->secondary_school != '') ? $educational->secondary_school : old('secondary_school')  }}" disabled required>
                @error('secondary_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="secondary_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)</label>
                <input class="form-control" type="text" name="secondary_course" value="{{ ($educational->secondary_course != '') ? $educational->secondary_course : old('secondary_course')  }}" disabled>
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
                <input class="form-control" type="text" name="secondary_from" value="{{ ($educational->secondary_from != '') ? $educational->secondary_from : old('secondary_from')  }}" placeholder="YYYY" disabled required>
                @error('secondary_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="secondary_to" class="form-label request-form-label">Year To<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="secondary_to" value="{{ ($educational->secondary_to != '') ? $educational->secondary_to : old('secondary_to')  }}" placeholder="YYYY" disabled required>
                @error('secondary_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_units" class="form-label request-form-label">Highest Level/Units Earned</label>
                <input class="form-control" type="text" name="elementary_units" value="{{ ($educational->elementary_units != '') ? $educational->elementary_units : old('elementary_units')  }}" disabled>
                @error('elementary_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="secondary_graduated" class="form-label request-form-label">Year Graduated<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="secondary_graduated" value="{{ ($educational->secondary_graduated != '') ? $educational->secondary_graduated : old('secondary_graduated')  }}" placeholder="YYYY" disabled required>
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
                <input class="form-control" type="text" name="secondary_honors" value="{{ ($educational->secondary_honors != '') ? $educational->secondary_honors : old('secondary_honors')  }}" disabled>
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
                <input class="form-control" type="text" name="college_school" value="{{ ($educational->vocational_school != '') ? $educational->vocational_school : old('vocational_school')  }}" disabled>
                @error('vocational_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="vocational_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)</label>
                <input class="form-control" type="text" name="vocational_course" value="{{ ($educational->vocational_course != '') ? $educational->vocational_course : old('vocational_course')  }}" disabled>
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
                <input class="form-control" type="text" name="vocational_from" value="{{ ($educational->vocational_from != '') ? $educational->vocational_from : old('vocational_from')  }}" placeholder="YYYY" disabled>
                @error('vocational_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="vocational_to" class="form-label request-form-label">Year To</label>
                <input class="form-control" type="text" name="vocational_to" value="{{ ($educational->vocational_to != '') ? $educational->vocational_to : old('vocational_to')  }}" placeholder="YYYY" disabled>
                @error('vocational_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="vocational_units" class="form-label request-form-label">Highest Level/Units Earned</label>
                <input class="form-control" type="text" name="vocational_units" value="{{ ($educational->vocational_units != '') ? $educational->vocational_units : old('vocational_units')  }}" disabled>
                @error('vocational_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="vocational_graduated" class="form-label request-form-label">Year Graduated</label>
                <input class="form-control" type="text" name="vocational_graduated" value="{{ ($educational->vocational_graduated != '') ? $educational->vocational_graduated : old('vocational_graduated')  }}" placeholder="YYYY" disabled>
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
                <input class="form-control" type="text" name="vocational_honors" value="{{ ($educational->vocational_honors != '') ? $educational->vocational_honors : old('vocational_honors')  }}" disabled>
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
                <input class="form-control" type="text" name="college_school" value="{{ ($educational->college_school != '') ? $educational->college_school : old('college_school')  }}" disabled required>
                @error('college_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="college_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="college_course" value="{{ ($educational->college_course != '') ? $educational->college_course : old('college_course')  }}" disabled required>
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
                <input class="form-control" type="text" name="college_from" value="{{ ($educational->college_from != '') ? $educational->college_from : old('college_from')  }}" placeholder="YYYY" disabled required>
                @error('college_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="college_to" class="form-label request-form-label">Year To<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="college_to" value="{{ ($educational->college_to != '') ? $educational->college_to : old('college_to')  }}" placeholder="YYYY" disabled required>
                @error('college_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="college_units" class="form-label request-form-label">Highest Level/Units Earned<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="college_units" value="{{ ($educational->college_units != '') ? $educational->college_units : old('college_units')  }}" disabled required>
                @error('college_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="college_graduated" class="form-label request-form-label">Year Graduated<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="college_graduated" value="{{ ($educational->college_graduated != '') ? $educational->college_graduated : old('college_graduated')  }}" placeholder="YYYY" disabled required>
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
                <input class="form-control" type="text" name="college_honors" value="{{ ($educational->college_honors != '') ? $educational->college_honors : old('college_honors')  }}" disabled>
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
                <input class="form-control" type="text" name="studies_school" value="{{ ($educational->studies_school != '') ? $educational->studies_school : old('studies_school')  }}" disabled>
                @error('studies_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="studies_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)</label>
                <input class="form-control" type="text" name="studies_course" value="{{ ($educational->studies_course != '') ? $educational->studies_course : old('studies_course')  }}" disabled>
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
                <input class="form-control" type="text" name="studies_from" value="{{ ($educational->studies_from != '') ? $educational->studies_from : old('studies_from')  }}" placeholder="YYYY" disabled>
                @error('studies_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="studies_to" class="form-label request-form-label">Year To</label>
                <input class="form-control" type="text" name="studies_to" value="{{ ($educational->studies_to != '') ? $educational->studies_to : old('studies_to')  }}" placeholder="YYYY" disabled>
                @error('studies_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="studies_units" class="form-label request-form-label">Highest Level/Units Earned</label>
                <input class="form-control" type="text" name="studies_units" value="{{ ($educational->studies_units != '') ? $educational->studies_units : old('studies_units')  }}" disabled>
                @error('studies_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="studies_graduated" class="form-label request-form-label">Year Graduated</label>
                <input class="form-control" type="text" name="studies_graduated" value="{{ ($educational->studies_graduated != '') ? $educational->studies_graduated : old('studies_graduated')  }}" placeholder="YYYY" disabled>
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
                <input class="form-control" type="text" name="studies_honors" value="{{ ($educational->studies_honors != '') ? $educational->studies_honors : old('studies_honors')  }}" disabled>
                @error('studies_honors')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <!-- End Graduate Studies -->

    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Update</button>
</form>