<form class="mt-4" action="{{ route('family.datasheet.update') }}" method="POST">
    @csrf

    <!-- Start Elementary -->
    <div class="row mb-2">
        <span><i>Elementary:</i></span>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_school" class="form-label request-form-label">Name of School (Write in full)*</label>
                <input class="form-control" type="text" name="elementary_school" value="{{ ($educational->elementary_school != '') ? $educational->elementary_school : old('elementary_school')  }}" disabled required>
                @error('elementary_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_course" class="form-label request-form-label">Basic Education/Degree/Course (Write in full)*</label>
                <input class="form-control" type="text" name="elementary_course" value="{{ ($educational->elementary_course != '') ? $educational->elementary_course : old('elementary_course')  }}" disabled required>
                @error('elementary_course')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_from" class="form-label request-form-label">Year From*</label>
                <input class="form-control" type="text" name="elementary_from" value="{{ ($educational->elementary_from != '') ? $educational->elementary_from : old('elementary_from')  }}" placeholder="YYYY" disabled required>
                @error('elementary_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_to" class="form-label request-form-label">Year To*</label>
                <input class="form-control" type="text" name="elementary_to" value="{{ ($educational->elementary_to != '') ? $educational->elementary_to : old('elementary_to')  }}" placeholder="YYYY" disabled required>
                @error('elementary_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_units" class="form-label request-form-label">Highest Level/Units Earned*</label>
                <input class="form-control" type="text" name="elementary_units" value="{{ ($educational->elementary_units != '') ? $educational->elementary_units : old('elementary_units')  }}" disabled required>
                @error('elementary_units')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="elementary_graduated" class="form-label request-form-label">Year Graduated*</label>
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
                <label for="elementary_honors" class="form-label request-form-label">Scholarship/Academic Honors Received*</label>
                <input class="form-control" type="text" name="elementary_honors" value="{{ ($educational->elementary_honors != '') ? $educational->elementary_honors : old('elementary_honors')  }}" disabled required>
                @error('elementary_honors')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <!-- End Elementary -->

    <div class="row mb-2 border-top pt-2 mt-4">

    </div>
    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Update</button>
</form>