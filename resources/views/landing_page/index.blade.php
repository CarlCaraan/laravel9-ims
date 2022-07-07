@extends('landing_page.user_master')

@section('content')
<!-- ======= hero Section ======= -->
<section id="hero">

    <!-- <div class="hero-content" data-aos="fade-up">
        <h2>Making <span>your ideas</span><br>happen!</h2>
        <div>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="#portfolio" class="btn-projects scrollto">Our Projects</a>
        </div>
    </div> -->

    <div class="hero-slider swiper">
        <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide" style="background-image: url('{{ asset('landing_page/assets/img/hero-carousel/1.jpg') }}');"></div>
            <div class="swiper-slide" style="background-image: url('{{ asset('landing_page/assets/img/hero-carousel/2.jpg') }}');"></div>
            <div class="swiper-slide" style="background-image: url('{{ asset('landing_page/assets/img/hero-carousel/3.jpg') }}');"></div>
            <div class="swiper-slide" style="background-image: url('{{ asset('landing_page/assets/img/hero-carousel/4.jpg') }}');"></div>
            <div class="swiper-slide" style="background-image: url('{{ asset('landing_page/assets/img/hero-carousel/5.jpg') }}');"></div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</section><!-- End Hero Section -->

<!-- ======= Start Message From SDS Section ======= -->
<section id="about">
    <div class="container" data-aos="fade-up">
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
</section><!-- End Message From SDS Section -->


<!-- ======= Start Our Affiliates Section ======= -->
<section id="clients">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Our Affiliates</h2>
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