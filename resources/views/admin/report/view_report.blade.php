@extends('admin.admin_master')

@section('title') Manage Report | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start Breadcrumb -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-primary">Manage Report</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-success" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Report</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Page Content -->
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="alert alert-success">
                <strong>Note:</strong> You can now generate report by Monthly / Yearly or Custom.
            </div>

            <!-- Start Generate PDS -->
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <form action="{{ route('generate.report.pds') }}" method="POST" target="_blank">
                        @csrf
                        <div class="row">
                            <h4>PDS Report</h4>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date_pds" class="form-label">Start Date</label>
                                    <input type="datetime-local" name="start_date_pds" class="form-control" required>
                                    @error('start_date_pds')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date_pds" class="form-label">End Date</label>
                                    <input type="datetime-local" name="end_date_pds" class="form-control" required>
                                    @error('end_date_pds')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-top: 32px;">Generate Report</button>
                            </div>
                        </div> <!-- End Row -->
                    </form>

                </div>
            </div>
            <!-- End Generate PDS -->

            <!-- Start Generate SR -->
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <form action="{{ route('generate.report.sr') }}" method="POST" target="_blank">
                        @csrf
                        <div class="row">
                            <h4>Service Record Report</h4>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date_sr" class="form-label">Start Date</label>
                                    <input type="datetime-local" name="start_date_sr" class="form-control" required>
                                    @error('start_date_sr')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date_sr" class="form-label">End Date</label>
                                    <input type="datetime-local" name="end_date_sr" class="form-control" required>
                                    @error('end_date_sr')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-top: 32px;">Generate Report</button>
                            </div>
                        </div> <!-- End Row -->
                    </form>

                </div>
            </div>
            <!-- End Generate PDS -->
        </div>
    </section>
</div>
<!-- End Page Content -->
@endsection