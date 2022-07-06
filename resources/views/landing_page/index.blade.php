@extends('landing_page.user_master')

@section('content')
<!-- ======= hero Section ======= -->
<section id="hero">

    <div class="hero-content" data-aos="fade-up">
        <h2>Making <span>your ideas</span><br>happen!</h2>
        <div>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="#portfolio" class="btn-projects scrollto">Our Projects</a>
        </div>
    </div>

    <div class="hero-slider swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image: url('{{ asset('landing_page/assets/img/hero-carousel/1.jpg') }}');"></div>
            <div class="swiper-slide" style="background-image: url('{{ asset('landing_page/assets/img/hero-carousel/2.jpg') }}');"></div>
            <div class="swiper-slide" style="background-image: url('{{ asset('landing_page/assets/img/hero-carousel/3.jpg') }}');"></div>
            <div class="swiper-slide" style="background-image: url('{{ asset('landing_page/assets/img/hero-carousel/4.jpg') }}');"></div>
            <div class="swiper-slide" style="background-image: url('{{ asset('landing_page/assets/img/hero-carousel/5.jpg') }}');"></div>
        </div>
    </div>

</section><!-- End Hero Section -->

<!-- ======= Start Message From SDS Section ======= -->
<section id="about">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6 about-img">
                <img src="assets/img/about-img.jpg" alt="">
            </div>

            <div class="col-lg-6 content">
                <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>

                <ul>
                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>

            </div>
        </div>

    </div>
</section><!-- End Message From SDS Section -->


<!-- ======= Start Our Affiliates Section ======= -->
<section id="clients">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Clients</h2>
            <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>

        <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Our Affiliates Section -->
@endsection