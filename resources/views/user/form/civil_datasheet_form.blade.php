<form class="mt-4" action="{{ route('civil.datasheet.update') }}" method="POST">
    @csrf

    <div class="row mb-2">
        <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="cse_type" class="form-label request-form-label">CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE BARANGAY ELIGIBILITY / DRIVER'S LICENSE:<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="cse_type" value="{{ ($civil->cse_type != '') ? $civil->cse_type : old('cse_type')  }}" disabled>
                @error('cse_type')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="cse_rating" class="form-label request-form-label">Rating (If applicable)</label>
                <input class="form-control" type="text" name="cse_rating" value="{{ ($civil->cse_rating != '') ? $civil->cse_rating : old('cse_rating')  }}" disabled>
                @error('cse_rating')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="cse_date" class="form-label request-form-label">DATE OF EXAMINATION / CONFERMENT<span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="cse_date" value="{{ ($civil->cse_date != '') ? $civil->cse_date : old('cse_date')  }}" disabled>
                @error('cse_date')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="cse_place" class="form-label request-form-label">PLACE OF EXAMINATION / CONFERMENT<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="cse_place" value="{{ ($civil->cse_place != '') ? $civil->cse_place : old('cse_place')  }}" disabled>
                @error('cse_place')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2 border-top pt-2 mt-4">
        <span class="by-section-heading">License:</span>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="cse_license_number" class="form-label request-form-label">Number<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="cse_license_number" value="{{ ($civil->cse_license_number != '') ? $civil->cse_license_number : old('cse_license_number')  }}" disabled>
                @error('cse_license_number')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="cse_license_date" class="form-label request-form-label">Date of Validity<span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="cse_license_date" value="{{ ($civil->cse_license_date != '') ? $civil->cse_license_date : old('cse_license_date')  }}" disabled>
                @error('cse_license_date')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Update</button>
</form>