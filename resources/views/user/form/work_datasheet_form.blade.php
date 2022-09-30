<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form class="mt-4" action="{{ route('work.datasheet.update') }}" method="POST">
    @csrf

    <div class="add_item2">
        @foreach ($works as $key => $work)
        <div class="delete_whole_extra_item_add2" id="delete_whole_extra_item_add2">
            <h2>{{ $key+1 }}.)</h2>
            <div class="row mb-2">
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="work_date_from" class="form-label request-form-label">Inclusive Dates <br /> (From)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="work_date_from[]" value="{{ ($work->work_date_from != '') ? $work->work_date_from : old('work_date_from')  }}" disabled required>
                        @error('work_date_from')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="work_date_to" class="form-label request-form-label">Inclusive Dates <br /> (To)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="work_date_to[]" value="{{ ($work->work_date_to != '') ? $work->work_date_to : old('work_date_to')  }}" disabled required>
                        @error('work_date_to')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="job_title" class="form-label request-form-label">Position Title <br />(Write in full/Do not abbreviate)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="job_title[]" value="{{ ($work->job_title != '') ? $work->job_title : old('job_title')  }}" disabled required>
                        @error('job_title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="job_type" class="form-label request-form-label">DEPARTMENT / AGENCY / OFFICE / COMPANY (Write in full/Do not abbreviate)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="job_type[]" value="{{ ($work->job_type != '') ? $work->job_type : old('job_type')  }}" disabled required>
                        @error('job_type')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3 border-bottom pb-4">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="monthly_salary" class="form-label request-form-label"><br />Monthly Salary<span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="monthly_salary[]" value="{{ ($work->monthly_salary != '') ? $work->monthly_salary : old('monthly_salary')  }}" min="0" disabled required>
                        @error('monthly_salary')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="salary_grade" class="form-label request-form-label">SALARY/ JOB/ PAY GRADE (if applicable) <br /> STEP (Format "00-0")/ INCREMENT</label>
                        <input class="form-control" type="text" name="salary_grade[]" value="{{ ($work->salary_grade != '') ? $work->salary_grade : old('salary_grade')  }}" disabled placeholder="00-0">
                        @error('salary_grade')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="status_of_appointment" class="form-label request-form-label">Status of Appointment<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="status_of_appointment[]" value="{{ ($work->status_of_appointment != '') ? $work->status_of_appointment : old('status_of_appointment')  }}" disabled required>
                        @error('status_of_appointment')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="gov_service" class="form-label request-form-label"><br />GOV'T SERVICE<span class="text-danger">*</span></label>
                        <select class="form-select" name="gov_service[]" disabled required>
                            <option value="" selected>Select</option>
                            <option value="Yes" {{ ($work->gov_service == "Yes" || old('gov_service') == "Yes") ? "selected" : "" }}>Yes</option>
                            <option value="No" {{ ($work->gov_service == "No" || old('gov_service') == "No") ? "selected" : "" }}>No</option>
                        </select>
                        @error('gov_service')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding-top: 25px;">
                    <span class="btn btn-success addeventmore2" style="display: none;"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore2" style="display: none;"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div> <!-- End delete_whole_extra_item -->
        @endforeach
    </div> <!-- End Add Item -->

    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Save Changes</button>
    <span class="btn btn-secondary rounded-circle shadow-sm float-start" id="prev-civil" role="prev_next"><i class="fa-solid fa-chevron-left"></i></span>
    <span class="btn btn-secondary rounded-circle shadow-sm float-end" id="next-voluntary" role="prev_next"><i class="fa-solid fa-chevron-right"></i></span>
</form>

<!-- Next Prev Button Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#prev-civil").click(function() {
        $("#v-pills-civil-tab").click();
    });
    $("#next-voluntary").click(function() {
        $("#v-pills-voluntary-tab").click();
    });
</script>

<!-- Start Hidden Row Javascript -->
<div style="display: none;">
    <div class="whole_extra_item_add2" id="whole_extra_item_add2">
        <div class="delete_whole_extra_item_add2" id="delete_whole_extra_item_add2">
            <h2>Add Item</h2>
            <div class="row mb-2">
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="work_date_from" class="form-label request-form-label">Inclusive Dates <br /> (From)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="work_date_from[]" value="{{ old('work_date_from') }}" disabled required>
                        @error('work_date_from')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="work_date_to" class="form-label request-form-label">Inclusive Dates <br /> (To)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="work_date_to[]" value="{{ old('work_date_to') }}" disabled required>
                        @error('work_date_to')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="job_title" class="form-label request-form-label">Position Title <br />(Write in full/Do not abbreviate)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="job_title[]" value="{{ old('job_title') }}" disabled required>
                        @error('job_title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="job_type" class="form-label request-form-label">DEPARTMENT / AGENCY / OFFICE / COMPANY (Write in full/Do not abbreviate)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="job_type[]" value="{{ old('job_type') }}" disabled required>
                        @error('job_type')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3 border-bottom pb-4">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="monthly_salary" class="form-label request-form-label"><br />Monthly Salary<span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="monthly_salary[]" value="{{ old('monthly_salary') }}" min="0" disabled required>
                        @error('monthly_salary')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="salary_grade" class="form-label request-form-label">SALARY/ JOB/ PAY GRADE (if applicable) <br /> STEP (Format "00-0")/ INCREMENT</label>
                        <input class="form-control" type="text" name="salary_grade[]" value="{{ old('salary_grade') }}" placeholder="00-0" disabled required>
                        @error('salary_grade')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="status_of_appointment" class="form-label request-form-label">Status of Appointment<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="status_of_appointment[]" value="{{ old('status_of_appointment') }}" disabled required>
                        @error('status_of_appointment')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="gov_service" class="form-label request-form-label"><br />GOV'T SERVICE<span class="text-danger">*</span></label>
                        <select class="form-select" name="gov_service[]" disabled required>
                            <option value="" selected>Select</option>
                            <option value="Yes" {{ (old('gov_service') == "Yes") ? "selected" : "" }}>Yes</option>
                            <option value="No" {{ (old('gov_service') == "No") ? "selected" : "" }}>No</option>
                        </select>
                        @error('gov_service')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding-top: 25px;">
                    <span class="btn btn-success addeventmore2" style="display: none;"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore2" style="display: none;"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var counter2 = 0;
        $(document).on("click", ".addeventmore2", function() {
            var whole_extra_item_add2 = $('#whole_extra_item_add2').html();
            $(this).closest(".add_item2").append(whole_extra_item_add2);
            counter2++;
        });
        $(document).on("click", ".removeeventmore2", function(event) {
            $(this).closest(".delete_whole_extra_item_add2").remove();
            counter2 -= 1;
        });
    });
</script>
<!-- End Hidden Row Javascript -->