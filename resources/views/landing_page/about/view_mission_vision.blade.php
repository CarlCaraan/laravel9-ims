@extends('landing_page.user_master')

@section('title') Mission Vision | DEPED Division of Laguna @endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>About Us</h2>
            <ol>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li>About</li>
                <li>Mission Vision</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs Section -->

<!-- Start Content -->
<section class="inner-page pt-4">
    <div class="container">
        <div class="section-header">
            <h2>Mission</h2>
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="card-content">
                    <p class="">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. A quisquam fuga dicta! Autem sint nemo, tempore pariatur aliquid iste, quos similique illo delectus vel velit eos magni atque, modi expedita.
                    </p>
                </div>
            </div>
        </div>
        <br>
        <div class="section-header">
            <h2>Vission</h2>
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="card-content">
                    <p class="">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. A quisquam fuga dicta! Autem sint nemo, tempore pariatur aliquid iste, quos similique illo delectus vel velit eos magni atque, modi expedita.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
@endsection