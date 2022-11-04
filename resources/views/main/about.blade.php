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
        <p>To hold your hands and take you to where the Living God has ordained for you in all
            areas of life and to help you live the most beautiful life in all areas of this world;
            release of your destiny and victory at all times.
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
        <p>To provide the best coaching services that meet your needs, solve your problems,
            answer the unanswered questions of your heart, and reveal and show you how to
            fulfill the reason you are in this world.</p>
    </div>


    <div class="who-we-are">
        <h1>Who we are</h1>
        <p>We walk you through victory by coaching you out of every problem. We use God's
            Word to solve life's complex problems. This training center helps you overcome
            financial troubles, personal problems, family crises, health challenges, career issues,
            and business distress. We help you stand against delays in areas of your life. We walk
            alongside you to ensure you have victory over any area of concern. This training
            center equips you to gain victory over unknown spiritual battles that people fight
            unknowingly. We answer the unanswered questions of your heart and help you see
            desired results in areas of concern. We also help you develop your leadership destiny
            by knowing who you are, building you up, and confirming your spot in life. We solve
            life-threatening problems that others cannot solve.
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
