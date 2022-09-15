<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form class="mt-4" action="{{ route('voluntary.datasheet.update') }}" method="POST">
    @csrf

    <div class="add_item3">
        @foreach ($voluntaries as $key => $voluntary)
        <div class="delete_whole_extra_item_add3" id="delete_whole_extra_item_add3">
            <h2>{{ $key+1 }}.)</h2>
            <div class="row mb-2">
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="organization_name_address" class="form-label request-form-label">Name & Address OF Organization (Write in full)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="organization_name_address[]" value="{{ ($voluntary->organization_name_address != '') ? $voluntary->organization_name_address : old('organization_name_address')  }}" disabled required>
                        @error('organization_name_address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="voluntary_date_from" class="form-label request-form-label">Inclusive Dates (From)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="voluntary_date_from[]" value="{{ ($voluntary->voluntary_date_from != '') ? $voluntary->voluntary_date_from : old('voluntary_date_from')  }}" disabled required>
                        @error('voluntary_date_from')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="voluntary_date_to" class="form-label request-form-label">Inclusive Dates (To)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="voluntary_date_to[]" value="{{ ($voluntary->voluntary_date_to != '') ? $voluntary->voluntary_date_to : old('voluntary_date_to')  }}" disabled required>
                        @error('voluntary_date_to')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2 border-bottom pb-4">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="number_of_hours" class="form-label request-form-label">Number of Hours<span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="number_of_hours[]" value="{{ ($voluntary->number_of_hours != '') ? $voluntary->number_of_hours : old('number_of_hours')  }}" disabled required>
                        @error('number_of_hours')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="voluntary_jobtitle" class="form-label request-form-label">Position / Nature of Work<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="voluntary_jobtitle[]" value="{{ ($voluntary->voluntary_jobtitle != '') ? $voluntary->voluntary_jobtitle : old('voluntary_jobtitle')  }}" disabled required>
                        @error('voluntary_jobtitle')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore3" style="display: none;"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore3" style="display: none;"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div> <!-- End delete_whole_extra_item -->
        @endforeach
    </div> <!-- End Add Item -->

    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Update</button>
</form>

<!-- Start Hidden Row Javascript -->
<div style="display: none;">
    <div class="whole_extra_item_add3" id="whole_extra_item_add3">
        <div class="delete_whole_extra_item_add3" id="delete_whole_extra_item_add3">
            <h2>Add Item</h2>
            <div class="row mb-2">
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="organization_name_address" class="form-label request-form-label">Name & Address OF Organization (Write in full)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="organization_name_address[]" value="{{ old('organization_name_address')  }}" disabled required>
                        @error('organization_name_address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="voluntary_date_from" class="form-label request-form-label">Inclusive Dates (From)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="voluntary_date_from[]" value="{{ old('voluntary_date_from')  }}" disabled required>
                        @error('voluntary_date_from')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="voluntary_date_to" class="form-label request-form-label">Inclusive Dates (To)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="voluntary_date_to[]" value="{{ old('voluntary_date_to')  }}" disabled required>
                        @error('voluntary_date_to')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2 border-bottom pb-4">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="number_of_hours" class="form-label request-form-label">Number of Hours<span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="number_of_hours[]" value="{{ old('number_of_hours')  }}" disabled required>
                        @error('number_of_hours')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="voluntary_jobtitle" class="form-label request-form-label">Position / Nature of Work<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="voluntary_jobtitle[]" value="{{ old('voluntary_jobtitle')  }}" disabled required>
                        @error('voluntary_jobtitle')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore3" style="display: none;"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore3" style="display: none;"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var counter3 = 0;
        $(document).on("click", ".addeventmore3", function() {
            var whole_extra_item_add3 = $('#whole_extra_item_add3').html();
            $(this).closest(".add_item3").append(whole_extra_item_add3);
            counter3++;
        });
        $(document).on("click", ".removeeventmore3", function(event) {
            $(this).closest(".delete_whole_extra_item_add3").remove();
            counter3 -= 1;
        });
    });
</script>
<!-- End Hidden Row Javascript -->