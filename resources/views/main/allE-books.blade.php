@extends('main.index')

@section('title')

@endsection

@section('content')

<div class="shopping_cart_header">
    <div class="shopping-cart-links">
        <a href="{{ route('homePage') }}">
            <p style="padding-right: 5px; font-weight: 500 !important;">Home</p>
        </a>
        <i class="fa-solid fa-angle-right"></i>
        <a href="{{ route('allcourses') }}">
            <p style="padding-left: 5px; font-weight: 500 !important;">All E-Books</p>
        </a>
    </div>
    <h1>
        All E-Books
     </h1>
</div>

{{-- Desktop Courses --}}
<div class="landingpage-courses">
    <div class="landingpage-courses-header">
        <h1> E-Books to get you started</h1>
        {{-- <a href="#"><p>See All Courses</p> <i class="ri-arrow-right-fill"></i></a> --}}
    </div>
    <div class="landingpage-courses-grid">
        <div class="landingpage-courses-grid-body">
            <a href="#">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div class="landingpage-courses-grid-body-contents-button">
                    <a href="#">
                        <i class="ri-shopping-cart-2-line" style="padding-right: 5px;"></i>
                        <span style="padding-right: 5px; font-family: Poppins !important">Buy</span>
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; 2,500</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="landingpage-courses-grid-body">
            <a href="#">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div class="landingpage-courses-grid-body-contents-button">
                    <a href="#">
                        <i class="ri-shopping-cart-2-line" style="padding-right: 5px;"></i>
                        <span style="padding-right: 5px; font-family: Poppins !important">Buy</span>
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; 2,500</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="landingpage-courses-grid-body">
            <a href="#">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div class="landingpage-courses-grid-body-contents-button">
                    <a href="#">
                        <i class="ri-shopping-cart-2-line" style="padding-right: 5px;"></i>
                        <span style="padding-right: 5px; font-family: Poppins !important">Buy</span>
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; 2,500</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="landingpage-courses-grid-body">
            <a href="#">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div class="landingpage-courses-grid-body-contents-button">
                    <a href="#">
                        <i class="ri-shopping-cart-2-line" style="padding-right: 5px;"></i>
                        <span style="padding-right: 5px; font-family: Poppins !important">Buy</span>
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; 2,500</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="landingpage-courses-grid-body">
            <a href="#">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div class="landingpage-courses-grid-body-contents-button">
                    <a href="#">
                        <i class="ri-shopping-cart-2-line" style="padding-right: 5px;"></i>
                        <span style="padding-right: 5px; font-family: Poppins !important">Buy</span>
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; 2,500</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="landingpage-courses-grid-body">
            <a href="#">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/finalcourse.png')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div class="landingpage-courses-grid-body-contents-button">
                    <a href="#">
                        <i class="ri-shopping-cart-2-line" style="padding-right: 5px;"></i>
                        <span style="padding-right: 5px; font-family: Poppins !important">Buy</span>
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; 2,500</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Desktop Courses --}}



{{-- Mobile Courses --}}
<div class="mobile-landingpage-courses swiper">
    <div class="mobile-landingpage-courses-header">
        <h1>E-Books to get you started</h1>
        {{-- <a href="#"><p>See All Courses</p> <i class="ri-arrow-right-fill"></i></a> --}}
    </div>
    <div class="mobile-landingpage-courses-grid swiper-wrapper">

        <div class="mobile-landingpage-courses-grid-body swiper-slide">
            <a href="#">
            <div class="mobile-landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="mobile-landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="mobile-landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div>
                    <h2 style="font-family: poppins !imporatant;">&#8358;3,200</h2>
                </div>
            </div>
        </div>


        <div class="mobile-landingpage-courses-grid-body swiper-slide">
            <a href="#">
            <div class="mobile-landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="mobile-landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="mobile-landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div>
                    <h2 style="font-family: poppins !imporatant;">&#8358;3,200</h2>
                </div>
            </div>
        </div>




        <div class="mobile-landingpage-courses-grid-body swiper-slide">
            <a href="#">
            <div class="mobile-landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="mobile-landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="mobile-landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div>
                    <h2 style="font-family: poppins !imporatant;">&#8358;3,200</h2>
                </div>
            </div>
        </div>


        <div class="mobile-landingpage-courses-grid-body swiper-slide">
            <a href="#">
            <div class="mobile-landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="mobile-landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="mobile-landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div>
                    <h2 style="font-family: poppins !imporatant;">&#8358;3,200</h2>
                </div>
            </div>
        </div>


        <div class="mobile-landingpage-courses-grid-body swiper-slide">
            <a href="#">
            <div class="mobile-landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="mobile-landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="mobile-landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div>
                    <h2 style="font-family: poppins !imporatant;">&#8358;3,200</h2>
                </div>
            </div>
        </div>


        <div class="mobile-landingpage-courses-grid-body swiper-slide">
            <a href="#">
            <div class="mobile-landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="mobile-landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="mobile-landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div>
                    <h2 style="font-family: poppins !imporatant;">&#8358;3,200</h2>
                </div>
            </div>
        </div>


        <div class="mobile-landingpage-courses-grid-body swiper-slide">
            <a href="#">
            <div class="mobile-landingpage-courses-grid-body-image">
                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="mobile-landingpage-courses-grid-body-contents">
                <h2>The Billionaire Master Class (Finance)</h2>
            </a>
                <p>A Course By: Temidara Matthew</p>
                <div class="mobile-landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>547</span>
                    </div>
                    <div class="right">
                        <i class="ri-star-fill"></i>
                        <span>547</span>
                    </div>
                </div>
                <div>
                    <h2 style="font-family: poppins !imporatant;">&#8358;3,200</h2>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Mobile Courses --}}


{{-- Featured Courses --}}
<div class="all-courses-featured-courses">
    <div class="landingpage-courses-header">
        <h1>Featured  E-Book</h1>
    </div>

    <div class="all-courses-featured-courses-flex">
        <div class="all-courses-featured-courses-flex-body">
            <div class="all-courses-featured-courses-flex-body-left">
                <img src="{{ asset('assets/images/spiritual knowledge.jpg') }}">
            </div>
            <div class="all-courses-featured-courses-flex-body-right">
                <h1>What Is Spiritual Knowledge?</h1>
                <p class="course-info">Spiritual knowledge of Christ will be a personal knowledge. I cannot know Jesus through another person’s acquaintance with Him.</p>
                <p class="course-by">By Temidara Matthew</p>
                <div class="all-courses-featured-courses-flex-info-flex">
                    <p class="updated">Updated November 2022.</p>
                    <p>5 Total Hours</p>
                    <p>30 Lessons</p>
                </div>

                <div class="all-courses-featured-courses-flex-body-right-money">
                    <h2>&#8358;5000</h2>
                    <span>&#8358;20,000</span>
                </div>
            </div>
        </div>

    </div>
</div>
{{-- Featured Courses --}}


{{-- All Courses --}}

<div class="all-courses-featured-courses mobile-hide" style="background-color: #f5f5f5;">
    <div class="landingpage-courses-header">
        <h1>All  E-Books</h1>
    </div>


    <div class="all-courses-page-all-courses-sections-flex">
        <div class="all-courses-page-all-courses-sections-flex-left">
            <div class="all-courses-page-all-courses-sections-flex-left-flex">
                <a href="#"><i class="ri-filter-3-line"></i> Filter</a>
                <select>
                    <option>Most Popular</option>
                    <option>Most Popular</option>
                    <option>Most Popular</option>
                </select>
            </div>

            <div class="left-info">
                
             <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings">
                <h1>Ratings</h1>
                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="radio" name="filter-start">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <p>4.5 & up</p>
                    <p>(1,200)</p>
                    </div>
                </div>


                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="radio" name="filter-start">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <p>4.5 & up</p>
                    <p>(1,200)</p>
                    </div>
                </div>


                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="radio" name="filter-start">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <p>4.5 & up</p>
                    <p>(1,200)</p>
                    </div>
                </div>


                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="radio" name="filter-start">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <p>4.5 & up</p>
                    <p>(1,200)</p>
                    </div>
                </div>
                </div>
            
                <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings">
                <h1>Video Duration</h1>
                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="checkbox" name="filter-start" style="height: 20px;
                    width: 20px;">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <p style="font-size: 16px;"> 0-1 Hour</p>
                    <p style="font-size: 16px;">(1,200)</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="checkbox" name="filter-start" style="height: 20px;
                    width: 20px;">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <p style="font-size: 16px;"> 0-1 Hour</p>
                    <p style="font-size: 16px;">(1,200)</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="checkbox" name="filter-start" style="height: 20px;
                    width: 20px;">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <p style="font-size: 16px;"> 0-1 Hour</p>
                    <p style="font-size: 16px;">(1,200)</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="checkbox" name="filter-start" style="height: 20px;
                    width: 20px;">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <p style="font-size: 16px;"> 0-1 Hour</p>
                    <p style="font-size: 16px;">(1,200)</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="checkbox" name="filter-start" style="height: 20px;
                    width: 20px;">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <p style="font-size: 16px;"> 0-1 Hour</p>
                    <p style="font-size: 16px;">(1,200)</p>
                    </div>
                </div>
             </div>
            </div>

        </div>
       
        <div class="all-courses-page-all-courses-sections-flex-right">
            <h6 style="margin-left: 87%; margin-bottom:20px; font-size: 18px;">5,300 Results</h6>
            <div class="all-courses-page-all-courses-sections-flex-right-body">
                <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                    <img src="{{ asset('assets/images/spiritual knowledge.jpg') }}">
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-center">
                    <h1>What Is Spiritual Knowledge?</h1>
                    <p class="infor">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus et doloremque praesentium!</p>
                    <p>Temidara Matthew</p>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p class="reviewss">5.7</p>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <p style="margin-left: 6px;">(450)</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p>5 Total Hours</p>
                        <p>35 Lectures</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-right">
                    <h3>&#8358;6,000</h3>
                    <h3 style="opacity: .5; text-decoration: line-through; font-weight: 500;">&#8358;10,000</h3>
                </div>
            </div>
            <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>

            <div class="all-courses-page-all-courses-sections-flex-right-body">
                <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                    <img src="{{ asset('assets/images/spiritual knowledge.jpg') }}">
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-center">
                    <h1>What Is Spiritual Knowledge?</h1>
                    <p class="infor">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus et doloremque praesentium!</p>
                    <p>Temidara Matthew</p>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p class="reviewss">5.7</p>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <p style="margin-left: 6px;">(450)</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p>5 Total Hours</p>
                        <p>35 Lectures</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-right">
                    <h3>&#8358;6,000</h3>
                    <h3 style="opacity: .5; text-decoration: line-through; font-weight: 500;">&#8358;10,000</h3>
                </div>
            </div>
            <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>


            <div class="all-courses-page-all-courses-sections-flex-right-body">
                <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                    <img src="{{ asset('assets/images/spiritual knowledge.jpg') }}">
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-center">
                    <h1>What Is Spiritual Knowledge?</h1>
                    <p class="infor">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus et doloremque praesentium!</p>
                    <p>Temidara Matthew</p>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p class="reviewss">5.7</p>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <p style="margin-left: 6px;">(450)</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p>5 Total Hours</p>
                        <p>35 Lectures</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-right">
                    <h3>&#8358;6,000</h3>
                    <h3 style="opacity: .5; text-decoration: line-through; font-weight: 500;">&#8358;10,000</h3>
                </div>
            </div>
            <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>



            <div class="all-courses-page-all-courses-sections-flex-right-body">
                <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                    <img src="{{ asset('assets/images/spiritual knowledge.jpg') }}">
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-center">
                    <h1>What Is Spiritual Knowledge?</h1>
                    <p class="infor">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus et doloremque praesentium!</p>
                    <p>Temidara Matthew</p>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p class="reviewss">5.7</p>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <p style="margin-left: 6px;">(450)</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p>5 Total Hours</p>
                        <p>35 Lectures</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-right">
                    <h3>&#8358;6,000</h3>
                    <h3 style="opacity: .5; text-decoration: line-through; font-weight: 500;">&#8358;10,000</h3>
                </div>
            </div>
            <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>
        </div>
    </div>


</div>

{{-- All Courses --}}


{{-- All Courses Mobile View --}}

<div class="all-courses-featured-courses desktop-hide" style="background-color: #f5f5f5;">
    <div class="landingpage-courses-header">
        <h1>All E-Books</h1>
    </div>


    <div class="all-courses-page-all-courses-sections-flex">
        <div class="all-courses-page-all-courses-sections-flex-left">
            <div class="all-courses-page-all-courses-sections-flex-left-flex">
                <a href="#"><i class="ri-filter-3-line"></i> Filter</a>
                <select>
                    <option>Most Popular</option>
                    <option>Most Popular</option>
                    <option>Most Popular</option>
                </select>
            </div>

            <div class="left-info">
                
             <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings">
                <h1>Ratings</h1>
                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="radio" name="filter-start">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <p>4.5 & up</p>
                    <p>(1,200)</p>
                    </div>
                </div>


                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="radio" name="filter-start">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <p>4.5 & up</p>
                    <p>(1,200)</p>
                    </div>
                </div>


                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="radio" name="filter-start">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <p>4.5 & up</p>
                    <p>(1,200)</p>
                    </div>
                </div>


                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="radio" name="filter-start">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <i class="ri-star-s-fill"></i>
                    <p>4.5 & up</p>
                    <p>(1,200)</p>
                    </div>
                </div>
                </div>
            
                <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings">
                <h1>Video Duration</h1>
                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="checkbox" name="filter-start" style="height: 20px;
                    width: 20px;">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <p style="font-size: 16px;"> 0-1 Hour</p>
                    <p style="font-size: 16px;">(1,200)</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="checkbox" name="filter-start" style="height: 20px;
                    width: 20px;">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <p style="font-size: 16px;"> 0-1 Hour</p>
                    <p style="font-size: 16px;">(1,200)</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="checkbox" name="filter-start" style="height: 20px;
                    width: 20px;">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <p style="font-size: 16px;"> 0-1 Hour</p>
                    <p style="font-size: 16px;">(1,200)</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="checkbox" name="filter-start" style="height: 20px;
                    width: 20px;">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <p style="font-size: 16px;"> 0-1 Hour</p>
                    <p style="font-size: 16px;">(1,200)</p>
                    </div>
                </div>

                <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex">
                    <input type="checkbox" name="filter-start" style="height: 20px;
                    width: 20px;">
                    <div class="all-courses-page-all-courses-sections-flex-left-ratings-flex-star" style="display: flex; align-items:center;">
                    <p style="font-size: 16px;"> 0-1 Hour</p>
                    <p style="font-size: 16px;">(1,200)</p>
                    </div>
                </div>
             </div>
            </div>

        </div>
       
        <div class="all-courses-page-all-courses-sections-flex-right">
            <h6 style="margin-left: 87%; margin-bottom:20px; font-size: 18px;">5,300 Results</h6>

            <div class="all-courses-page-all-courses-sections-flex-right-body">
                <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                    <img src="{{ asset('assets/images/spiritual knowledge.jpg') }}">
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-center-c" style="width 100%">
                    <h1 style="font-size: 17px;">What Is Spiritual Knowledge?</h1>
                    <p>Temidara Matthew</p>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p class="reviewss">5.7</p>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <p style="margin-left: 6px;">(450)</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p>5 Total Hours</p>
                        <p>35 Lectures</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <h3>&#8358;6,000</h3>
                        <h3 style="opacity: .5; margin-left: 5px; text-decoration: line-through; font-weight: 500;">&#8358;10,000</h3>
                    </div>
                </div>
            </div>
            <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>


            <div class="all-courses-page-all-courses-sections-flex-right-body">
                <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                    <img src="{{ asset('assets/images/spiritual knowledge.jpg') }}">
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-center-c" style="width 100%">
                    <h1 style="font-size: 17px;">What Is Spiritual Knowledge?</h1>
                    <p>Temidara Matthew</p>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p class="reviewss">5.7</p>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <p style="margin-left: 6px;">(450)</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p>5 Total Hours</p>
                        <p>35 Lectures</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <h3>&#8358;6,000</h3>
                        <h3 style="opacity: .5; margin-left: 5px; text-decoration: line-through; font-weight: 500;">&#8358;10,000</h3>
                    </div>
                </div>
            </div>
            <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>


            <div class="all-courses-page-all-courses-sections-flex-right-body">
                <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                    <img src="{{ asset('assets/images/spiritual knowledge.jpg') }}">
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-center-c" style="width 100%">
                    <h1 style="font-size: 17px;">What Is Spiritual Knowledge?</h1>
                    <p>Temidara Matthew</p>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p class="reviewss">5.7</p>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <p style="margin-left: 6px;">(450)</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p>5 Total Hours</p>
                        <p>35 Lectures</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <h3>&#8358;6,000</h3>
                        <h3 style="opacity: .5; margin-left: 5px; text-decoration: line-through; font-weight: 500;">&#8358;10,000</h3>
                    </div>
                </div>
            </div>
            <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>


            <div class="all-courses-page-all-courses-sections-flex-right-body">
                <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                    <img src="{{ asset('assets/images/spiritual knowledge.jpg') }}">
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-center-c" style="width 100%">
                    <h1 style="font-size: 17px;">What Is Spiritual Knowledge?</h1>
                    <p>Temidara Matthew</p>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p class="reviewss">5.7</p>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <p style="margin-left: 6px;">(450)</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p>5 Total Hours</p>
                        <p>35 Lectures</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <h3>&#8358;6,000</h3>
                        <h3 style="opacity: .5; margin-left: 5px; text-decoration: line-through; font-weight: 500;">&#8358;10,000</h3>
                    </div>
                </div>
            </div>
            <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>


            <div class="all-courses-page-all-courses-sections-flex-right-body">
                <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                    <img src="{{ asset('assets/images/spiritual knowledge.jpg') }}">
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-center-c" style="width 100%">
                    <h1 style="font-size: 17px;">What Is Spiritual Knowledge?</h1>
                    <p>Temidara Matthew</p>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p class="reviewss">5.7</p>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <i class="ri-star-s-fill reviewss"></i>
                        <p style="margin-left: 6px;">(450)</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p>5 Total Hours</p>
                        <p>35 Lectures</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <h3>&#8358;6,000</h3>
                        <h3 style="opacity: .5; margin-left: 5px; text-decoration: line-through; font-weight: 500;">&#8358;10,000</h3>
                    </div>
                </div>
            </div>
            <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>


        </div>
    </div>


</div>

{{-- All Courses Mobile View --}}









@endsection

@section('scripts')
<script>
    const swiper = new Swiper('.swiper', {
    // loop: true,
    spaceBetween: 20,
    slidesPerView: 1,
});
</script>
@endsection
