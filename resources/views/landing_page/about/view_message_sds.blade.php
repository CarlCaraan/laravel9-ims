@extends('landing_page.user_master')

@section('title') Message from SDS | Division of Laguna @endsection

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
            <div class="col-lg-4 about-img">
                <img src="http://depedbenguet.com/wp-content/uploads/2017/03/SDS-grad-pics-300x300.png}" alt="image">
            </div>

            <div class="col-lg-8 content">
                <h2>MARITES A. IBAÑEZ, CESO V</h2>
                <h3 class="fw-normal">Schools Division Superintendent</h3>

                <ul>
                    <li>Welcome to the official website of SDO Laguna, the home of greater opportunities and greater actions. <br /><br />
                        Our website serves as our portal of information, resources and engagement activities concerning SDO Laguna Employees and Officials.
                        The purpose of a web-based program entitled "DEPED School Division Office (SDO) of Laguna Document Management System" is to assist the teachers,
                        officials, and other staff to collect and manage their data in a single location with ease and reliability. <br /><br />
                        Moreover, we welcome and appreciate your feedback and valuable comments as they shall be the source of our continual improvement.<br /><br />
                        Thank you and looking forward that we shall be growing and learning together as a team.<br />
                        LAGO… LAGUNA!
                    </li>
                </ul>

            </div>
        </div>
    </div>
</section>
<!-- End Content -->
@endsection