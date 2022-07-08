@extends('landing_page.user_master')

@section('title') Contact | DEPED Division of Laguna @endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Contact Us</h2>
            <ol>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li>Contact Us</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs Section -->

<!-- Start Content -->
<section class="inner-page pt-4" id="about">
    <div class="container">
        <div class="section-header">
            <h2>Send us your Inquiries</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="card-contet">
                            <form action="">
                                <div class="form-group row mb-2">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Message</label>
                                    <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                                </div>
                                <button class="btn btn-success mt-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<!-- End Content -->
@endsection