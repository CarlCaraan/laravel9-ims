@extends('landing_page.user_master')

@section('title') DEPED | Division of Laguna @endsection

@section('content')
<!-- ======= hero Section ======= -->
<section id="hero">
    <div class="hero-slider swiper">
        <div class="swiper-wrapper align-items-center">
            @foreach ($herosections as $herosection)
            <div class="swiper-slide" style="background-image: url('/upload/user_siteinfo/herosection/{{ (!empty($herosection->image)) ? $herosection->image : 'default_photo.png' }}');"></div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section><!-- End Hero Section -->

<section class="hero__container--mobile">
    @foreach ($herosections as $herosection)
    <img class="img-fluid" src="{{ url('upload/user_siteinfo/herosection/'.$herosection->image) }}" alt="">
    @endforeach
</section>

<!-- ======= Start Message From SDS Section ======= -->
<section id="about">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Message from SDS</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 about-img">
                <img src="{{ asset('landing_page/assets/img/about-img.png') }}" alt="message-from-sds">
                <!-- <img src="http://depedbenguet.com/wp-content/uploads/2017/03/SDS-grad-pics-300x300.png" alt="sds_image"> -->
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
</section><!-- End Message From SDS Section -->


<!-- ======= Start Our Affiliates Section ======= -->
<section id="clients">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Our Affiliates</h2>
        </div>

        <div class="affiliates-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/1.png') }}" class="img-fluid" loading="lazy" alt="logo1"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/2.png') }}" class="img-fluid" loading="lazy" alt="logo2"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/3.png') }}" class="img-fluid" loading="lazy" alt="logo3"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/4.png') }}" class="img-fluid" loading="lazy" alt="logo4"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/5.png') }}" class="img-fluid" loading="lazy" alt="logo5"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/6.png') }}" class="img-fluid" loading="lazy" alt="logo6"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/7.png') }}" class="img-fluid" loading="lazy" alt="logo7"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/8.png') }}" class="img-fluid" loading="lazy" alt="logo8"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/9.png') }}" class="img-fluid" loading="lazy" alt="logo9"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/10.png') }}" class="img-fluid" loading="lazy" alt="logo10"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/11.png') }}" class="img-fluid" loading="lazy" alt="logo11"></div>
                <div class="swiper-slide"><img src="{{ asset('landing_page/assets/img/affiliates/12.png') }}" class="img-fluid" loading="lazy" alt="logo12"></div>
            </div>
            <div class="swiper-pagination"></div>

            <div class="affiliates__container">
                <div><img src="{{ asset('landing_page/assets/img/affiliates/1.png') }}" class="img-fluid" loading="lazy" alt="logo1"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/2.png') }}" class="img-fluid" loading="lazy" alt="logo2"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/3.png') }}" class="img-fluid" loading="lazy" alt="logo3"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/4.png') }}" class="img-fluid" loading="lazy" alt="logo4"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/5.png') }}" class="img-fluid" loading="lazy" alt="logo5"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/6.png') }}" class="img-fluid" loading="lazy" alt="logo6"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/7.png') }}" class="img-fluid" loading="lazy" alt="logo7"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/8.png') }}" class="img-fluid" loading="lazy" alt="logo8"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/9.png') }}" class="img-fluid" loading="lazy" alt="logo9"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/10.png') }}" class="img-fluid" loading="lazy" alt="logo10"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/11.png') }}" class="img-fluid" loading="lazy" alt="logo11"></div>
                <div><img src="{{ asset('landing_page/assets/img/affiliates/12.png') }}" class="img-fluid" loading="lazy" alt="logo12"></div>
            </div>
        </div>

    </div>
</section><!-- End Our Affiliates Section -->
@endsection