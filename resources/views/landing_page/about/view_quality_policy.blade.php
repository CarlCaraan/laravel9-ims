@extends('landing_page.user_master')

@section('title') Quality Policy | DEPED Division of Laguna @endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>About Us</h2>
            <ol>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li>About</li>
                <li>Quality Policy</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs Section -->

<!-- Start Content -->
<section class="inner-page pt-4">
    <div class="container">
        <div class="section-header">
            <h2>Quality Policy</h2>
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="card-content p-5">
                    <p class="custom-serif-paragraph">
                        We, at School Division Office of Laguna, are committed to provide effective and efficient basic education services to schools and learning centers in compliance with quality standards, existing statutory, and regulatory policies. <br /><br />
                        We continuously uphold to improve quality management system through highly competent personnel adhering to Transparent, Ethical and Accountable governance for total customer satisfaction.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Content -->
<br /><br /><br /><br /><br /><br /><br /><br />
@endsection