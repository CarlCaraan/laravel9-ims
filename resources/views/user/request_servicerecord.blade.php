@extends('user.user_master')

@section('title') Request Service Record | Division of Laguna @endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container mt-2">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Request Service Record</h2>
            <ol>
                <li>Request Service Record</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page pt-4">
    <div class="container">
        <div class="section-header">
            <h2>Request Service Record</h2>
        </div>

        <div class="alert alert-warning" role="alert">
            <strong>Note:</strong> This is to certify that the employee name herein above actually rendered services in this office as shown by the service record below
            each line which is supported by appointment and other papers actually issued by this office and approved by the authority
        </div>


        <!-- Add Request Button -->
        <a href="{{ route('store.request.servicerecord') }}" id="request" class="btn custom-btn mb-2">Send a Request</a>

        <!-- Start Table -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header">
                <strong class="color-secondary">List of Your Request</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th>
                                    SL No
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Attachment
                                </th>
                                <th>
                                    Date Requested
                                </th>
                                <th width="10%">

                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(count($sr_requests) == 0)
                            <tr>
                                <td class="text-center" colspan="6">
                                    You have no request yet.
                                </td>
                            </tr>
                            @else
                            @endif

                            @foreach ($sr_requests as $key => $sr_request)
                            <tr>
                                <td>
                                    {{ $key+1 }}
                                </td>
                                <td>
                                    @if ($sr_request->service_record_status == "Pending")
                                    <span class="badge bg-warning text-dark"><i class="fa-solid fa-circle-info"></i> Pending Request</span>
                                    @else
                                    <span class="badge bg-success"><i class="fa-regular fa-circle-check"></i> Done</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($sr_request->service_record_status == "Pending")
                                    <button class="btn btn-light btn-sm"><i class="fas fa-hourglass-half"></i> Wait your application form</button>
                                    @else
                                    <a href="{{ route('generate.servicerecord', $sr_request->id) }}" class="btn custom-btn-secondary btn-sm" target="_blank"><i class="fa-solid fa-up-right-from-square"></i> Attachment</a>
                                    @endif
                                </td>
                                <td>
                                    {{ date('m/d/Y - h:ia', strtotime($sr_request->created_at)) }}
                                </td>
                                <td>
                                    @if($sr_request->service_record_status == "Completed")
                                    <a id="archive" class="btn btn-secondary w-100" href="{{ route('archive.request.servicerecord', $sr_request->id) }}">Archive</a>
                                    @else
                                    <a id="cancel" class="btn btn-danger w-100" href="{{ route('delete.request.servicerecord', $sr_request->id) }}">Cancel</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <small>
                    <i>
                        <a href="{{ route('view.archive.servicerecord') }}"><i class="fas fa-archive"></i> View Archives</a>
                    </i>
                </small>
            </div>
        </div>
        <!-- End Table -->



</section>
<br /><br /><br /><br /><br />
<!-- End Content -->

<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endsection