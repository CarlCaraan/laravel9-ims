@extends('landing_page.user_master')

@section('title') Message from SDS | DEPED Division of Laguna @endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>About Us</h2>
            <ol>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li>About</li>
                <li>Message from SDS</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs Section -->

<!-- Start Content -->
<section class="inner-page pt-4" id="about">
    <div class="container">
        <div class="section-header">
            <h2>Message from SDS</h2>
        </div>
        <div class="row">
            <div class="col-lg-6 about-img">
                <img src="{{ asset('landing_page/assets/img/about-img.jpg') }}" alt="">
            </div>

            <div class="col-lg-6 content">
                <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>

                <ul>
                    <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam dolor error vel neque natus expedita iusto explicabo corporis laborum ipsa, incidunt assumenda magnam impedit architecto. Odit earum ipsam totam pariatur?.</li>
                </ul>

            </div>
        </div>
    </div>
</section>
<!-- End Content -->
@endsection