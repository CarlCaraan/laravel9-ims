<form class="mt-4" action="{{ route('educational.datasheet.update') }}" method="POST">
    @csrf

    <div class="row mb-2">
        <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_school" class="form-label request-form-label">CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE BARANGAY ELIGIBILITY / DRIVER'S LICENSE:<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_school" value="{{ ($educational->elementary_school != '') ? $educational->elementary_school : old('elementary_school')  }}" disabled>
                @error('elementary_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_course" class="form-label request-form-label">Rating (If applicable)</label>
                <input class="form-control" type="text" name="elementary_course" value="{{ ($educational->elementary_course != '') ? $educational->elementary_course : old('elementary_course')  }}" disabled>
                @error('elementary_course')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_school" class="form-label request-form-label">DATE OF EXAMINATION / CONFERMENT<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_school" value="{{ ($educational->elementary_school != '') ? $educational->elementary_school : old('elementary_school')  }}" disabled>
                @error('elementary_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_course" class="form-label request-form-label">PLACE OF EXAMINATION / CONFERMENT<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_course" value="{{ ($educational->elementary_course != '') ? $educational->elementary_course : old('elementary_course')  }}" disabled>
                @error('elementary_course')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2 border-top pt-2 mt-4">
        <span class="by-section-heading">License:</span>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_school" class="form-label request-form-label">Number<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_school" value="{{ ($educational->elementary_school != '') ? $educational->elementary_school : old('elementary_school')  }}" disabled>
                @error('elementary_school')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="elementary_course" class="form-label request-form-label">Date of Validity<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="elementary_course" value="{{ ($educational->elementary_course != '') ? $educational->elementary_course : old('elementary_course')  }}" disabled>
                @error('elementary_course')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Update</button>
</form>