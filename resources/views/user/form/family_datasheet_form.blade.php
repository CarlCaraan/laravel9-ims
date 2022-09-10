<form class="mt-4" action="{{ route('family.datasheet.update') }}" method="POST">
    @csrf
    <div class="row mb-2">
        <span><i>Spouse Information:</i></span>
        <div class="col-3">
            <div class="form-group">
                <label for="spouse_lname" class="form-label request-form-label">Spouse's Surname*</label>
                <input class="form-control" type="text" name="spouse_lname" value="{{ ($family->spouse_lname != '') ? $family->spouse_lname : old('spouse_lname')  }}" disabled required>
                @error('spouse_lname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="spouse_fname" class="form-label request-form-label">Spouse's First Name*</label>
                <input class="form-control" type="text" name="spouse_fname" value="{{ ($family->spouse_fname != '') ? $family->spouse_fname : old('spouse_fname')  }}" disabled required>
                @error('spouse_fname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="spouse_mname" class="form-label request-form-label">Spouse's Middle Name*</label>
                <input class="form-control" type="text" name="spouse_mname" value="{{ ($family->spouse_mname != '') ? $family->spouse_mname : old('spouse_mname') }}" disabled required>
                @error('spouse_mname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="spouse_ename" class="form-label request-form-label">Spouse's Name Extension*</label>
                <input class="form-control" type="text" name="spouse_ename" value="{{ ($family->spouse_ename != '') ? $family->spouse_ename : old('spouse_ename') }}" disabled>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <div class="form-group">
                <label for="occupation" class="form-label request-form-label">Occupation*</label>
                <input class="form-control" type="text" name="occupation" value="{{ ($family->occupation != '') ? $family->occupation : old('occupation')  }}" placeholder="Optional" disabled>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="employer_name" class="form-label request-form-label">Employer/Business Name*</label>
                <input class="form-control" type="text" name="employer_name" value="{{ ($family->employer_name != '') ? $family->employer_name : old('employer_name')  }}" placeholder="Optional" disabled>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="business_address" class="form-label request-form-label">Business Address*</label>
                <input class="form-control" type="text" name="business_address" value="{{ ($family->business_address != '') ? $family->business_address : old('business_address') }}" placeholder="Optional" disabled>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="telephone" class="form-label request-form-label">Telephone No.*</label>
                <input class="form-control" type="text" name="telephone" value="{{ ($family->telephone != '') ? $family->telephone : old('telephone') }}" placeholder="Optional" disabled>
            </div>
        </div>
    </div>
    <div class="row mb-2 border-top pt-2 mt-4">
        <span><i>Father Information:</i></span>
        <div class="col-3">
            <div class="form-group">
                <label for="father_lname" class="form-label request-form-label">Father's Surname*</label>
                <input class="form-control" type="text" name="father_lname" value="{{ ($family->father_lname != '') ? $family->father_lname : old('father_lname')  }}" disabled required>
                @error('father_lname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="father_fname" class="form-label request-form-label">Father's First Name*</label>
                <input class="form-control" type="text" name="father_fname" value="{{ ($family->father_fname != '') ? $family->father_fname : old('father_fname')  }}" disabled required>
                @error('father_fname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="father_mname" class="form-label request-form-label">Father's Middle Name*</label>
                <input class="form-control" type="text" name="father_mname" value="{{ ($family->father_mname != '') ? $family->father_mname : old('father_mname') }}" disabled required>
                @error('father_mname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="father_ename" class="form-label request-form-label">Father's Name Extension*</label>
                <input class="form-control" type="text" name="father_ename" value="{{ ($family->father_ename != '') ? $family->father_ename : old('father_ename') }}" disabled>
            </div>
        </div>
    </div>
    <div class="row mb-2 border-top pt-2 mt-4">
        <span><i>Mother Information:</i></span>
        <div class="col-3">
            <div class="form-group">
                <label for="mother_lname" class="form-label request-form-label">Mother's Surname*</label>
                <input class="form-control" type="text" name="mother_lname" value="{{ ($family->mother_lname != '') ? $family->mother_lname : old('mother_lname')  }}" disabled required>
                @error('mother_lname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="mother_fname" class="form-label request-form-label">Mother's First Name*</label>
                <input class="form-control" type="text" name="mother_fname" value="{{ ($family->mother_fname != '') ? $family->mother_fname : old('mother_fname')  }}" disabled required>
                @error('mother_fname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="mother_mname" class="form-label request-form-label">Mother's Middle Name*</label>
                <input class="form-control" type="text" name="mother_mname" value="{{ ($family->mother_mname != '') ? $family->mother_mname : old('mother_mname') }}" disabled required>
                @error('mother_mname')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="mother_maiden_name" class="form-label request-form-label">Mother's Maiden Name*</label>
                <input class="form-control" type="text" name="mother_maiden_name" value="{{ ($family->mother_maiden_name != '') ? $family->mother_maiden_name : old('mother_maiden_name') }}" disabled required>
                @error('mother_maiden_name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-2 border-top pt-2 mt-4">
        <div class="col-12">
            <span><i>Children Information:</i></span>
            @foreach ($children as $child)
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <label for="children_name" class="form-label request-form-label">Children's Name*</label>
                        <input class="form-control" type="text" name="children_name" value="{{ ($child->children_name != '') ? $child->children_name : old('children_name')  }}" disabled required>
                        @error('children_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="mother_fname" class="form-label request-form-label">Children's Date of Birth*</label>
                        <input class="form-control flatpickr" type="text" name="children_dob" value="{{ ($child->children_dob != '') ? $child->children_dob : old('children_dob')  }}" placeholder="Select Date" disabled required>
                        @error('children_dob')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            @endforeach
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