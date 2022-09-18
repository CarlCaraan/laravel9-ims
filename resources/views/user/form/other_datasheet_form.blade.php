<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form class="mt-4" action="{{ route('other.datasheet.update') }}" method="POST">
    @csrf

    <div class="add_item5">
        @foreach ($others as $key => $other)
        <div class="delete_whole_extra_item_add5" id="delete_whole_extra_item_add5">
            <h2>{{ $key+1 }}.)</h2>
            <div class="row mb-2">
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="special_skill" class="form-label request-form-label">Special Skills and Hobbies<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="special_skill[]" value="{{ ($other->special_skill != '') ? $other->special_skill : old('special_skill')  }}" disabled required>
                        @error('special_skill')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="recognition" class="form-label request-form-label">Non-Academic Distinctions / Recognition (Write in full)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="recognition[]" value="{{ ($other->recognition != '') ? $other->recognition : old('recognition')  }}" disabled required>
                        @error('recognition')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2 border-bottom pb-4">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="organization" class="form-label request-form-label">Membership In Association/Organization (Write in full)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="organization[]" value="{{ ($other->organization != '') ? $other->organization : old('organization')  }}" disabled required>
                        @error('organization')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore5" style="display: none;"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore5" style="display: none;"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div> <!-- End delete_whole_extra_item -->
        @endforeach
    </div> <!-- End Add Item -->

    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Update</button>
</form>

<!-- Start Hidden Row Javascript -->
<div style="display: none;">
    <div class="whole_extra_item_add5" id="whole_extra_item_add5">
        <div class="delete_whole_extra_item_add5" id="delete_whole_extra_item_add5">
            <h2>Add Item</h2>
            <div class="row mb-2">
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="special_skill" class="form-label request-form-label">Special Skills and Hobbies<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="special_skill[]" value="{{ old('special_skill')  }}" disabled required>
                        @error('special_skill')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="recognition" class="form-label request-form-label">Non-Academic Distinctions / Recognition (Write in full)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="recognition[]" value="{{ old('recognition')  }}" disabled required>
                        @error('recognition')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2 border-bottom pb-4">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="organization" class="form-label request-form-label">Membership In Association/Organization (Write in full)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="organization[]" value="{{ old('organization')  }}" disabled required>
                        @error('organization')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore5" style="display: none;"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore5" style="display: none;"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var counter5 = 0;
        $(document).on("click", ".addeventmore5", function() {
            var whole_extra_item_add5 = $('#whole_extra_item_add5').html();
            $(this).closest(".add_item5").append(whole_extra_item_add5);
            counter5++;
        });
        $(document).on("click", ".removeeventmore5", function(event) {
            $(this).closest(".delete_whole_extra_item_add5").remove();
            counter5 -= 1;
        });
    });
</script>
<!-- End Hidden Row Javascript -->