<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form class="mt-4" action="{{ route('family.datasheet.update') }}" method="POST">
    @csrf
    <div class="row mb-2">
        <span class="by-section-heading">Spouse Information:</span>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="spouse_lname" class="form-label request-form-label">Spouse's Surname<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="spouse_lname" value="{{ ($family->spouse_lname != '') ? $family->spouse_lname : old('spouse_lname')  }}" disabled required>
                @error('spouse_lname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="spouse_fname" class="form-label request-form-label">Spouse's First Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="spouse_fname" value="{{ ($family->spouse_fname != '') ? $family->spouse_fname : old('spouse_fname')  }}" disabled required>
                @error('spouse_fname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="spouse_mname" class="form-label request-form-label">Spouse's Middle Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="spouse_mname" value="{{ ($family->spouse_mname != '') ? $family->spouse_mname : old('spouse_mname') }}" disabled required>
                @error('spouse_mname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="spouse_ename" class="form-label request-form-label">Spouse's Name Extension</label>
                <input class="form-control" type="text" name="spouse_ename" value="{{ ($family->spouse_ename != '') ? $family->spouse_ename : old('spouse_ename') }}" disabled>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="occupation" class="form-label request-form-label">Occupation<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="occupation" value="{{ ($family->occupation != '') ? $family->occupation : old('occupation')  }}" placeholder="Optional" disabled>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="employer_name" class="form-label request-form-label">Employer/Business Name</label>
                <input class="form-control" type="text" name="employer_name" value="{{ ($family->employer_name != '') ? $family->employer_name : old('employer_name') }}" placeholder="Optional" disabled>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="business_address" class="form-label request-form-label">Business Address</label>
                <input class="form-control" type="text" name="business_address" value="{{ ($family->business_address != '') ? $family->business_address : old('business_address') }}" placeholder="Optional" disabled>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="telephone" class="form-label request-form-label">Business Telephone No.</label>
                <input class="form-control" type="text" name="telephone" value="{{ ($family->telephone != '') ? $family->telephone : old('telephone') }}" placeholder="Optional" disabled>
            </div>
        </div>
    </div>
    <div class="row mb-2 border-top pt-2 mt-4">
        <span class="by-section-heading">Father Information:</span>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="father_lname" class="form-label request-form-label">Father's Surname<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="father_lname" value="{{ ($family->father_lname != '') ? $family->father_lname : old('father_lname')  }}" disabled required>
                @error('father_lname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="father_fname" class="form-label request-form-label">Father's First Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="father_fname" value="{{ ($family->father_fname != '') ? $family->father_fname : old('father_fname')  }}" disabled required>
                @error('father_fname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="father_mname" class="form-label request-form-label">Father's Middle Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="father_mname" value="{{ ($family->father_mname != '') ? $family->father_mname : old('father_mname') }}" disabled required>
                @error('father_mname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="father_ename" class="form-label request-form-label">Father's Name Extension</label>
                <input class="form-control" type="text" name="father_ename" value="{{ ($family->father_ename != '') ? $family->father_ename : old('father_ename') }}" disabled>
            </div>
        </div>
    </div>
    <div class="row mb-2 border-top pt-2 mt-4">
        <span class="by-section-heading">Mother Information:</span>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="mother_lname" class="form-label request-form-label">Mother's Surname<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="mother_lname" value="{{ ($family->mother_lname != '') ? $family->mother_lname : old('mother_lname')  }}" disabled required>
                @error('mother_lname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="mother_fname" class="form-label request-form-label">Mother's First Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="mother_fname" value="{{ ($family->mother_fname != '') ? $family->mother_fname : old('mother_fname')  }}" disabled required>
                @error('mother_fname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="mother_mname" class="form-label request-form-label">Mother's Middle Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="mother_mname" value="{{ ($family->mother_mname != '') ? $family->mother_mname : old('mother_mname') }}" disabled required>
                @error('mother_mname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="mother_maiden_name" class="form-label request-form-label">Mother's Maiden Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="mother_maiden_name" value="{{ ($family->mother_maiden_name != '') ? $family->mother_maiden_name : old('mother_maiden_name') }}" disabled required>
                @error('mother_maiden_name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2 border-top pt-2 mt-4">
        <div class="col-12">
            <span class="by-section-heading">Children Information:</span>
            <div class="add_item">
                @foreach ($children as $child)
                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="children_name" class="form-label request-form-label">Children's Name</label>
                                <input class="form-control" type="text" name="children_name[]" value="{{ ($child->children_name != '') ? $child->children_name : old('children_name')  }}" placeholder="Optional" disabled>
                                @error('children_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-5 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <label for="mother_fname" class="form-label request-form-label">Children's Date of Birth</label>
                                <input class="form-control" type="date" name="children_dob[]" value="{{ ($child->children_dob != '') ? $child->children_dob : old('children_dob')  }}" disabled>
                                @error('children_dob')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-xs-12" style="padding-top: 30px;">
                            <span class="btn btn-success addeventmore" style="display: none;"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger removeeventmore" style="display: none;"><i class="fa fa-minus-circle"></i></span>
                        </div>
                    </div>
                </div> <!-- End delete_whole_extra_item -->
                @endforeach
            </div> <!-- End Add Item -->
        </div>
    </div>

    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Save Changes</button>
    <span class="btn btn-secondary rounded-circle shadow-sm float-start" id="prev-personal" role="prev_next"><i class="fa-solid fa-chevron-left"></i></span>
    <span class="btn btn-secondary rounded-circle shadow-sm float-end" id="next-educational" role="prev_next" data-bs-toggle="{{ ($family->father_lname == '') ? 'tooltip' : 'pill' }}" title="{{ ($family->father_lname == '') ? 'Complete II.) Family Background to Proceed.' : '' }}" data-bs-placement="left" style="{{ ($family->father_lname == '') ? 'cursor: not-allowed' : '' }}"><i class="fa-solid fa-chevron-right"></i></span>
</form>

<!-- Next Prev Button Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#prev-personal").click(function() {
        $("#v-pills-personal-tab").click();
    });
    $("#next-educational").click(function() {
        $("#v-pills-educational-tab").click();
    });
</script>

<!-- Start Hidden Row Javascript -->
<div style="display: none;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="children_name" class="form-label request-form-label">Children's Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="children_name[]" value="{{ old('children_name') }}" disabled required>
                        @error('children_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-5 col-md-8 col-sm-8 col-xs-12">
                    <div class="form-group">
                        <label for="mother_fname" class="form-label request-form-label">Children's Date of Birth<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="children_dob[]" value="{{ old('children_dob') }}" disabled required>
                        @error('children_dob')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-xs-12" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1;
        });
    });
</script>
<!-- End Hidden Row Javascript -->