@extends('main.index')


@section('content')

<div class="about-us">
    <div class="about-us-banner">
        <div class="about-us-banner-container">
            <div class="about-us-banner-container-left">
                <h1>We share knowledge with the world</h1>
            </div>
            <div class="about-us-banner-container-right">
                <img src="{{ asset('assets/images/banner.png') }}" width="400" alt="">
            </div>
        </div>
    </div>

    <div class="get-to-know-us">
        <h3>Get to Know About Us</h3>
    </div>

    <div class="our-vission">
        <h1>Our Vision</h1>
        <p>
            {!! htmlspecialchars_decode(nl2br($vision->vision)) !!}
        </p>
    </div>

    <div class="about-grid">
        <div class="about-grid-body">
            <i class="ri-user-follow-fill"></i>
            <p>2,000,000+ Professional Trained</p>
        </div>

        <div class="about-grid-body">
            <i class="ri-video-fill"></i>
            <p>1000+ Courses</p>
        </div>

        <div class="about-grid-body">
            <i class="ri-book-read-fill"></i>
            <p>400+ E-Books</p>
        </div>

        <div class="about-grid-body">
            <i class="ri-bar-chart-line"></i>
            <p>1.5k Course Enrollment</p>
        </div>
    </div>

    <div class="our-vission" style="background-color: var(--primary-color-sharp); color: #fff; margin-bottom: 30px;">
        <h1>Our Mission</h1>
        <p>
            {!! htmlspecialchars_decode(nl2br($mission->mission)) !!}
        </p>
    </div>


    <div class="who-we-are">
        <h1>Who we are</h1>
        <p>
            {!! htmlspecialchars_decode(nl2br($about->about)) !!}
        </p>
    </div>




</div>
<div class="about-sticky-footer">
    <div class="about-sticky-footer-grid">
        <div class="about-sticky-footer-grid-body">
            <a href="#">Email Us: mogah@gmail.com</a>
        </div>

        <div class="about-sticky-footer-grid-body">
            <a href="#">Call Us: 09054657898</a>
        </div>

        <div class="about-sticky-footer-grid-body">
            <a href="#">Live Chat</a>
        </div>
    </div>
</div>


@endsection

@section('scripts')

@endsection
