@extends('user.user_master')

@section('title') Submit | Division of Laguna @endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container mt-2">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Submit Scanned Copy of Accomplished PDS</h2>
            <ol>
                <li>Submit (PDS)</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page pt-4">
    <div class="container">
        <div class="section-header">
            <h2>Submit Personal Data Sheet</h2>
        </div>

        <div class="alert alert-warning" role="alert">
            <strong>WARNING:</strong> Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing
            of administrative/criminal case/s against the person concerned.
        </div>

        <!-- Start Error Message -->
        @error('pdf')
        <ul class="mb-3">
            <li class="text-danger fw-bold">{{ $message }}</li>
        </ul>
        @enderror
        <!-- End Error Message -->

        <!-- Start Table -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header">
                <strong class="color-secondary">Uploading of Requirements</strong>
                @php
                $date_uploaded = DB::table('pds_form_lists')->where('user_id', Auth::user()->id)->first();
                @endphp
                <small class="text-muted float-end">Last Updated: {{ Carbon\Carbon::parse($date_uploaded->updated_at)->diffForHumans() }}</small>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="25%">
                                    Requirement
                                </th>
                                <th width="25%">

                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Attachment
                                </th>
                                <th>
                                    Date Uploaded
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pdflists as $pdflist)
                            @if ($pdflist->pds_title == "")
                            <tr>
                                <td class="text-center" colspan="6">
                                    Please upload your pds form below.
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    {{ $pdflist->pds_title }} <i class="fa-solid fa-file-pdf text-danger"></i>
                                    <a class="fw-bold color-primary" href="#" data-bs-toggle="tooltip" title="Document Tracking ID: {{ $pdflist->pds_tracking_no }}" data-bs-placement="right">[?]</a>
                                </td>
                                <td>
                                    <div class="alert alert-warning shadow-sm text-dark" style="display:none;" id="message-invalid" role="alert">
                                        <small>{{ $pdflist->pds_message }}
                                            <span id="message-close-btn">[hide.]</span>
                                        </small>
                                    </div>
                                </td>
                                <td>
                                    @if ($pdflist->pds_status == "For Verification")
                                    <span class="badge bg-warning text-dark"><i class="fa-solid fa-circle-info"></i> For Verification</span>
                                    @elseif ($pdflist->pds_status == "Verified")
                                    <span class="badge bg-success"><i class="fa-regular fa-circle-check"></i> Verified</span>
                                    @else
                                    <span class="badge bg-danger" id="btn-invalid"><i class="fa-solid fa-triangle-exclamation"></i> Invalid</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('upload/pdf_uploads/'.$pdflist->pds_filename) }}" class="btn custom-btn-secondary btn-sm" target="_blank"><i class="fa-solid fa-up-right-from-square"></i> View Attachment</a>
                                </td>
                                <td>
                                    {{ $pdflist->pds_date_uploaded }}
                                </td>
                                <td>
                                    <a id="delete" class="text-secondary" href="{{ route('delete.submit.pdf') }}"><i class="fa-solid fa-xmark"></i></a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <small>
                    <i>
                        Note: If the requirement is marked as invalid, click on the `Invalid` mark to check the remarks.
                    </i>
                </small>
            </div>
        </div>
        <!-- End Table -->

        <br>

        <!-- Start Form -->
        <h5 class="color-secondary fw-bold">
            Scanned Copy of Accomplished Personal Datasheet Form
        </h5>
        <form action="{{ route('update.submit.pdf') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="pdf" accept="application/pdf" />
            <button type="submit" class="btn custom-btn"><i class="fa-solid fa-paperclip"></i> Upload</button>
        </form>
        <!-- End Form -->

    </div>
</section>
<!-- End Content -->

<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Filepond JS CDN -->
<script src="{{ asset('landing_page/assets/js/filepond.min.js') }}"></script>
<script src="{{ asset('landing_page/assets/js/filepond-plugin-file-validate-type.min.js') }}"></script>

<!-- Start Filepond Script -->
<script>
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement, {
        storeAsFile: true,
        acceptedFileTypes: ['application/pdf'],
        labelIdle: `
                    <i class="fa-solid fa-file-pdf custom-pdf-icon"></i>
                    <br/>
                    Drag & Drop your PDF file or <span class="filepond--label-action">Browse</span>
                `,
        credits: ['#', 'Powered By DEPED SDO'],
        required: true,
    });
</script>
<!-- End Filepond Script -->

<!-- Invalid Button -->
<script>
    $(document).ready(function() {
        $("#btn-invalid").click(function() {
            $("#message-invalid").show();
        });
        $("#message-close-btn").click(function() {
            $("#message-invalid").hide();
        });
    });
</script>

<!-- Tooltip Script -->
<script>
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endsection