@extends('user.user_master')

@section('title') Archived Service Record | Division of Laguna @endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container mt-2">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Archived Service Record</h2>
            <ol>
                <li><a href="{{ route('view.request.servicerecord') }}">Request Service Record</a></li>
                <li>Archived Service Record</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page pt-4">
    <div class="container">
        <div class="section-header">
            <h2><i class="fas fa-archive"></i> Archived Service Record</h2>
        </div>

        <!-- Start Table -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header">
                <strong class="color-secondary">List of your Archives</strong>
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
                                <th>
                                    Date Archived
                                </th>
                                <th width="25%">

                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(count($sr_requests) == 0)
                            <tr>
                                <td class="text-center" colspan="6">
                                    You have no archived yet.
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
                                    <span class="badge bg-success"><i class="fa-regular fa-circle-check"></i> Done</span>
                                </td>
                                <td>
                                </td>
                                <td>
                                    {{ date('m/d/Y - h:ia', strtotime($sr_request->created_at)) }}
                                </td>
                                <td>
                                    {{ date('m/d/Y - h:ia', strtotime($sr_request->updated_at)) }}
                                </td>
                                <td>
                                    <a id="restore" class="btn custom-btn" href="{{ route('restore.archive.servicerecord', $sr_request->id) }}">Restore</a>
                                    <a id="delete" class="btn btn-danger" href="{{ route('delete.archive.servicerecord', $sr_request->id) }}">Delete Permanently</a>
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
                        <a href="">View Archives</a>
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