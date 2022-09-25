@extends('user.user_master')

@section('title') Submit | Division of Laguna @endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container mt-2">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Submit Form</h2>
            <ol>
                <li>Submit PDS Form</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page pt-4">
    <div class="container">
        <div class="section-header">
            <h2>Submit Personal Data Sheet</h2>
            <div class="alert alert-warning" role="alert">
                <strong>WARNING:</strong> Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing
                of administrative/criminal case/s against the person concerned.
            </div>

            <!-- Start Table -->
            <div class="card mb-3 border-0 shadow-sm">
                <div class="card-header bg-white">
                    <strong class="color-secondary">Uploading of Requirements</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        Requirement
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
                                <tr>
                                    <td>
                                        Requirement
                                    </td>
                                    <td>
                                        <span class="badge bg-warning text-dark"><i class="fa-regular fa-clock"></i> For Verification</span>
                                        <span class="badge bg-success"><i class="fa-regular fa-circle-check"></i> Verified</span>
                                        <span class="badge bg-danger"><i class="fa-solid fa-circle-info"></i> Invalid</span>
                                    </td>
                                    <td>
                                        <span class="btn custom-btn-secondary btn-sm">View Attachment</span>
                                    </td>
                                    <td>
                                        09/25/22
                                    </td>
                                    <td>
                                        <a class="text-secondary" href=""><i class="fa-solid fa-xmark"></i></a>
                                    </td>
                                </tr>
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
                <input type="file" name="pdf" />
                <button type="submit" class="btn custom-btn-secondary">Upload</button>
            </form>
            <!-- End Form -->

        </div>
</section>
<!-- End Content -->

<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Filepond JS CDN -->
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- Start Filepond Script -->
<script>
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement, {
        storeAsFile: true,
        acceptedFileTypes: ['application/pdf'],
    });
</script>
<!-- End Filepond Script -->
@endsection