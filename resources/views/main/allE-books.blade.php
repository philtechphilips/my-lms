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
        @foreach ($ebooks as $ebooks)
        <div class="landingpage-courses-grid-body">
            <a href="/main/ebook/{{$ebooks->slug}}">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('ebook/'.$ebooks->image)}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>{{Str::limit($ebooks->title, 57)}}</h2>
            </a>
                <p>A Course By: {{$ebooks->user->name}}</p>
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
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; {{number_format($ebooks->real_price)}}</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
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
        @foreach ($m_ebooks as $m_ebooks)
        <div class="mobile-landingpage-courses-grid-body swiper-slide">
            <a href="/main/ebook/{{$m_ebooks->slug}}">
            <div class="mobile-landingpage-courses-grid-body-image">
                <img src="{{ asset('ebook/'.$m_ebooks->image)}}">
                {{-- <i class="ri-play-fill play"></i> --}}
            </div>
            <div class="mobile-landingpage-courses-grid-body-contents">
                <h2>{{Str::limit($m_ebooks->title, 65)}}</h2>
            </a>
                <p>A Course By: {{$m_ebooks->user->name}}</p>
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
                    <h2 style="font-family: poppins !imporatant;">&#8358;{{number_format($m_ebooks->real_price)}}</h2>
                </div>
            </div>
        </div>
        @endforeach
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

{{-- Desktop Courses --}}
<div class="landingpage-courses" style="background-color: #f5f5f5;">
    <div class="landingpage-courses-header">
        <h1> All E-Books </h1>
        {{-- <a href="#"><p>See All Courses</p> <i class="ri-arrow-right-fill"></i></a> --}}
    </div>
    <div class="landingpage-courses-grid">
        @foreach ($all_ebooks as $all_ebooks)
        <div class="landingpage-courses-grid-body">
            <a href="/main/ebook/{{$all_ebooks->slug}}">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('ebook/'.$all_ebooks->image)}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>{{Str::limit($all_ebooks->title, 57)}}</h2>
            </a>
                <p>A Course By: {{$all_ebooks->user->name}}</p>
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
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; {{number_format($all_ebooks->real_price)}}</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{-- Desktop Courses --}}

{{-- All Courses --}}


{{-- All Courses Mobile View --}}

<div class="all-courses-featured-courses desktop-hide" style="background-color: #f5f5f5;">
    <div class="landingpage-courses-header">
        <h1>All E-Books</h1>
    </div>


    <div class="all-courses-page-all-courses-sections-flex">

        <div class="all-courses-page-all-courses-sections-flex-right">
            <h6 style="margin-left: 87%; margin-bottom:20px; font-size: 18px;">5,300 Results</h6>

            @foreach ($m_all_ebooks  as $m_all_ebooks)
            <a href="/main/ebook/{{$m_all_ebooks->slug}}" style="text-decoration: none; color: #222;">
            <div class="all-courses-page-all-courses-sections-flex-right-body">
                <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                    <img src="{{ asset('ebook/'.$m_all_ebooks->image) }}">
                </div>

                <div class="all-courses-page-all-courses-sections-flex-right-body-center-c" style="width 100%">
                    <h1 style="font-size: 17px;">{{Str::limit($m_all_ebooks->title, 57)}}</h1>
                    <p>{{$m_all_ebooks->user->name}}</p>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <p>{{$m_all_ebooks->pages}} Pages</p>
                        <p>@if($m_all_ebooks->av_read_time > 60)
                            @php
                                echo ($m_all_ebooks->av_read_time/60)."Hours Read";
                            @endphp
                        @else
                        {{$m_all_ebooks->av_read_time}} Minute Read
                        @endif</p>
                    </div>
                    <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                        <h3>&#8358;{{number_format($m_all_ebooks->real_price)}}</h3>
                        <h3 style="opacity: .5; margin-left: 5px; text-decoration: line-through; font-weight: 500;">&#8358;{{number_format($m_all_ebooks->ini_price)}}</h3>
                    </div>
                </div>
            </div>
            </a>
            <div style="margin: 15px 0; border: solid 1px #222; opacity: .1;"></div>
            @endforeach


        </div>
    </div>


</div>

{{-- All Courses Mobile View --}}









@endsection

@section('scripts')
<script>
    const swiper = new Swiper('.swiper', {
    loop: true,
    spaceBetween: 20,
    slidesPerView: 1,
});
</script>
@endsection
