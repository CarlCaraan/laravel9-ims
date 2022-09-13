<form class="mt-4" action="{{ route('civil.datasheet.update') }}" method="POST">
    @csrf

    <div class="row mb-2">
        <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="work_date_from" class="form-label request-form-label">Inclusive Dates <br /> (From):<span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="work_date_from" value="{{ ($work->work_date_from != '') ? $work->work_date_from : old('work_date_from')  }}" disabled>
                @error('work_date_from')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="work_date_to" class="form-label request-form-label">Inclusive Dates <br /> (To):<span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="work_date_to" value="{{ ($work->work_date_to != '') ? $work->work_date_to : old('work_date_to')  }}" disabled>
                @error('work_date_to')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="job_title" class="form-label request-form-label">Position Title <br />(Write in full/Do not abbreviate):<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="job_title" value="{{ ($work->job_title != '') ? $work->job_title : old('job_title')  }}" disabled>
                @error('job_title')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="job_type" class="form-label request-form-label">DEPARTMENT / AGENCY / OFFICE / COMPANY <br /> (Write in full/Do not abbreviate):<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="job_type" value="{{ ($work->job_type != '') ? $work->job_type : old('job_type')  }}" disabled>
                @error('job_type')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="monthly_salary" class="form-label request-form-label"><br />Monthly Salary:<span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="monthly_salary" value="{{ ($work->monthly_salary != '') ? $work->monthly_salary : old('monthly_salary')  }}" disabled>
                @error('monthly_salary')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="salary_grade" class="form-label request-form-label">SALARY/ JOB/ PAY GRADE (if applicable) <br /> STEP (Format "00-0")/ INCREMENT:</label>
                <input class="form-control" type="text" name="salary_grade" value="{{ ($work->salary_grade != '') ? $work->salary_grade : old('salary_grade')  }}" disabled placeholder="00-0">
                @error('salary_grade')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="status_of_appointment" class="form-label request-form-label">Status of Appointment:<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="status_of_appointment" value="{{ ($work->status_of_appointment != '') ? $work->status_of_appointment : old('status_of_appointment')  }}" disabled>
                @error('status_of_appointment')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="gov_service" class="form-label request-form-label"><br />GOV'T SERVICE:<span class="text-danger">*</span></label>
                <select class="form-select" name="gov_service" disabled required>
                    <option value="" selected>Select</option>
                    <option value="Yes" {{ ($work->gov_service == "Yes" || old('gov_service') == "Yes") ? "selected" : "" }}>Yes</option>
                    <option value="No" {{ ($work->gov_service == "No" || old('gov_service') == "No") ? "selected" : "" }}>No</option>
                </select>
                @error('gov_service')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Update</button>
</form>