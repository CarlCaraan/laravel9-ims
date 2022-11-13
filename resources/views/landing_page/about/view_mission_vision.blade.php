@extends('landing_page.user_master')

@section('title') Mission Vision | Division of Laguna @endsection

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
            <h2>Vision</h2>
        </div>
        <div class="card border-0">
            <div class="card-body custom-card-body">
                <p class="custom-serif-paragraph">
                    We dream of Filipinos who passionately love their country and whose values and competencies enable them to realize their full potential and contribute meaningfully to building the nation.
                </p>
            </div>
        </div>
        <br>
        <div class="section-header">
            <h2>Mission</h2>
        </div>
        <div class="card border-0">
            <div class="card-body custom-card-body">
                <p class="custom-serif-paragraph">
                    To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where: <br /><br />
                    <strong>Students</strong> learn in child-friendly, gender-sensitive, safe and motivating environment. <br /><br />
                    <strong>Teachers</strong> facilitate learning and constantly nurture every learner. <br /><br />
                    Administrators and Staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen. <br /><br />
                    <strong>Family, Community and other stakeholders</strong> are actively engaged and share responsibility for developing life-long learners.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
@endsection