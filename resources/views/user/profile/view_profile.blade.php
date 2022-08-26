@extends('user.user_master')

@section('title') Profile | Division of Laguna @endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container mt-2">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Account Settings</h2>
            <ol>
                <li><a href="{{ route('user.welcome') }}">Home</a></li>
                <li>Account Settings</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->

<!-- Start Content -->
<section class="inner-page pt-4" id="about">
    <div class="container">
        <div class="section-header">
            <h2>Account Information</h2>
        </div>
        <div class="row">

        </div>
    </div>
</section>
<!-- End Content -->
@endsection