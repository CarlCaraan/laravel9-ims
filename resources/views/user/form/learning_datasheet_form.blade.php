<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form class="mt-4" action="{{ route('learning.datasheet.update') }}" method="POST">
    @csrf

    <div class="add_item4">
        @foreach ($learnings as $key => $learning)
        <div class="delete_whole_extra_item_add4" id="delete_whole_extra_item_add4">
            <h2>{{ $key+1 }}.)</h2>
            <div class="row mb-2">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="learning_title" class="form-label request-form-label">Title of Learning And Development Interventions/Training Programs (Write in full)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="learning_title[]" value="{{ ($learning->learning_title != '') ? $learning->learning_title : old('learning_title')  }}" disabled required>
                        @error('learning_title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="learning_date_from" class="form-label request-form-label">Inclusive Dates (From)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="learning_date_from[]" value="{{ ($learning->learning_date_from != '') ? $learning->learning_date_from : old('learning_date_from')  }}" disabled required>
                        @error('learning_date_from')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="learning_date_to" class="form-label request-form-label">Inclusive Dates (To)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="learning_date_to[]" value="{{ ($learning->learning_date_to != '') ? $learning->learning_date_to : old('learning_date_to')  }}" disabled required>
                        @error('learning_date_to')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="learning_hours" class="form-label request-form-label">Number of Hours<span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="learning_hours[]" value="{{ ($learning->learning_hours != '') ? $learning->learning_hours : old('learning_hours')  }}" min="0" disabled required>
                        @error('learning_hours')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2 border-bottom pb-4">
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="ld_type" class="form-label request-form-label">Type of LD ( Managerial/ Supervisory/ Technical/etc)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="ld_type[]" value="{{ ($learning->ld_type != '') ? $learning->ld_type : old('ld_type')  }}" disabled required>
                        @error('ld_type')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="conducted_by" class="form-label request-form-label"> Conducted/ Sponsored By (Write in full)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="conducted_by[]" value="{{ ($learning->conducted_by != '') ? $learning->conducted_by : old('conducted_by')  }}" disabled required>
                        @error('conducted_by')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore4" style="display: none;"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore4" style="display: none;"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div> <!-- End delete_whole_extra_item -->
        @endforeach
    </div> <!-- End Add Item -->

    <button type="submit" class="btn custom-btn text-light float-end btn-update" style="display:none;">Update</button>
    <span class="btn btn-secondary rounded-circle shadow-sm float-start" id="prev-voluntary" role="prev_next"><i class="fa-solid fa-chevron-left"></i></span>
    <span class="btn btn-secondary rounded-circle shadow-sm float-end" id="next-other" role="prev_next"><i class="fa-solid fa-chevron-right"></i></span>
</form>

<!-- Next Prev Button Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#prev-voluntary").click(function() {
        $("#v-pills-voluntary-tab").click();
    });
    $("#next-other").click(function() {
        $("#v-pills-other-tab").click();
    });
</script>

<!-- Start Hidden Row Javascript -->
<div style="display: none;">
    <div class="whole_extra_item_add4" id="whole_extra_item_add4">
        <div class="delete_whole_extra_item_add4" id="delete_whole_extra_item_add4">
            <h2>Add Item</h2>
            <div class="row mb-2">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="learning_title" class="form-label request-form-label">Title of Learning And Development Interventions/Training Programs (Write in full)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="learning_title[]" value="{{ old('learning_title')  }}" disabled required>
                        @error('learning_title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="learning_date_from" class="form-label request-form-label">Inclusive Dates (From)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="learning_date_from[]" value="{{ old('learning_date_from')  }}" disabled required>
                        @error('learning_date_from')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="learning_date_to" class="form-label request-form-label">Inclusive Dates (To)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="learning_date_to[]" value="{{ old('learning_date_to')  }}" disabled required>
                        @error('learning_date_to')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="learning_hours" class="form-label request-form-label">Number of Hours<span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="learning_hours[]" value="{{ old('learning_hours')  }}" min="0" disabled required>
                        @error('learning_hours')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-2 border-bottom pb-4">
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="ld_type" class="form-label request-form-label">Type of LD ( Managerial/ Supervisory/ Technical/etc)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="ld_type[]" value="{{ old('ld_type')  }}" disabled required>
                        @error('ld_type')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="conducted_by" class="form-label request-form-label"> Conducted/ Sponsored By (Write in full)<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="conducted_by[]" value="{{ old('conducted_by')  }}" disabled required>
                        @error('conducted_by')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore4" style="display: none;"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore4" style="display: none;"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var counter4 = 0;
        $(document).on("click", ".addeventmore4", function() {
            var whole_extra_item_add4 = $('#whole_extra_item_add4').html();
            $(this).closest(".add_item4").append(whole_extra_item_add4);
            counter4++;
        });
        $(document).on("click", ".removeeventmore4", function(event) {
            $(this).closest(".delete_whole_extra_item_add4").remove();
            counter4 -= 1;
        });
    });
</script>
<!-- End Hidden Row Javascript -->