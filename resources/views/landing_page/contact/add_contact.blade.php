@extends('landing_page.user_master')

@section('title') Contact | Division of Laguna @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white">
                        Fill up information below, once we received wait atleast 3-4 business days
                    </div>
                    <div class="card-body">
                        <div class="card-contet">
                            <form action="{{ route('user.contact.store') }}" method="POST">
                                @csrf
                                <div class="form-group row mb-2">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{old('name')}}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email Address" value="{{old('email')}}">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Message</label>
                                    <textarea placeholder="Message" class="form-control" name="message" id="message" rows="5">{{old('message')}}</textarea>
                                    @error('message')
                                    <small class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button class="btn mt-2 custom-btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img class="img-fluid" src="{{ asset('landing_page/assets/img/contact/contact_bg.svg') }}" alt="contact">
            </div>
        </div>


        <div class="section-header mt-5">
            <h2>Our Location</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <iframe class="border" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1878.2638120317586!2d121.41797510357654!3d14.27640747501679!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397e314eff663e1%3A0xe0f99b67d115a8ee!2sDepartment%20of%20Education%20-%20Schools%20Division%20Office%20of%20Laguna!5e0!3m2!1sen!2sph!4v1664203063986!5m2!1sen!2sph" width="100%" height="500" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </div>
</section>
<!-- End Content -->
@endsection