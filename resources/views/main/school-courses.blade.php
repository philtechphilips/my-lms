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
            <p style="padding-left: 5px; font-weight: 500 !important;">Courses/E-Books</p>
    </div>
    <h2>
        Courses/E-Book For {{$school->name}}
     </h2>
</div>

{{-- Desktop Courses --}}
<div class="landingpage-courses">
    <div class="landingpage-courses-header">
        <h1>Courses</h1>
        {{-- <a href="#"><p>See All Courses</p> <i class="ri-arrow-right-fill"></i></a> --}}
    </div>
    <div class="landingpage-courses-grid">

        @forelse ($courses as $courses)
        <div class="landingpage-courses-grid-body">
            <a href="/main/course/{{$courses->slug}}">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('course/'.$courses->image)}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>{{Str::limit($courses->title, 65)}}</h2>
            </a>
                <p>A Course By: {{$courses->course->name}}</p>
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
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; {{number_format($courses->real_price)}}</span>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div style="padding: 15px; background-color: #1A1A3B; width: 100%;">
            <h4 style="text-transform: uppercase; color: #fff;">There is no course Avaliable for this school.</h4>
        </div>
        @endforelse
    </div>
</div>
{{-- Desktop Courses --}}


{{-- Desktop Ebooks --}}
<div class="landingpage-courses" style="background-color: #e4e4e4;">
    <div class="landingpage-courses-header">
        <h1>E-Books</h1>
        {{-- <a href="#"><p>See All Courses</p> <i class="ri-arrow-right-fill"></i></a> --}}
    </div>
    <div class="landingpage-courses-grid" >

        @forelse ($ebooks as $ebooks)
        <div class="landingpage-courses-grid-body" >
            <a href="/main/course/{{$ebooks->slug}}">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('ebook/'.$ebooks->image)}}">
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>{{Str::limit($ebooks->title, 60)}}</h2>
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
        @empty
        <div style="padding: 15px; background-color: #1A1A3B; width: 100%;">
            <h4 style="text-transform: uppercase; color: #fff;">There is no E-Book Avaliable for this school.</h4>
        </div>
        @endforelse
    </div>
</div>
{{-- Desktop Ebooks --}}


{{-- All Courses Mobile View --}}

<div class="all-courses-featured-courses desktop-hide" style="background-color: #fafafa;">
    <div class="landingpage-courses-header">
        <h1>All Courses</h1>
    </div>


    <div class="all-courses-page-all-courses-sections-flex">
        <div class="all-courses-page-all-courses-sections-flex-right">
            <h6 style="margin-left: 87%; margin-bottom:20px; font-size: 18px;">{{number_format($m_all_courses_c)}} Results</h6>

        @foreach ($m_all_courses as $m_all_courses)
        <a href="/main/ebook/{{$m_all_courses->slug}}" style="text-decoration: none; color: #222;">
        <div class="all-courses-page-all-courses-sections-flex-right-body">
            <div class="all-courses-page-all-courses-sections-flex-right-body-left">
                <img src="{{ asset('course/'.$m_all_courses->image) }}">
            </div>

            <div class="all-courses-page-all-courses-sections-flex-right-body-center-c" style="width 100%">
                <h1 style="font-size: 17px;">{{Str::limit($m_all_courses->title, 55)}}</h1>
                <p>{{$m_all_courses->course->name}}</p>
                <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                    <p>{{$m_all_courses->hour}} Total Hours</p>
                    <p>35 Lectures</p>
                </div>
                <div class="all-courses-page-all-courses-sections-flex-right-body-center-review">
                    <h3>&#8358;{{number_format($m_all_courses->real_price)}}</h3>
                    <h3 style="opacity: .5; margin-left: 5px; text-decoration: line-through; font-weight: 500;">&#8358;{{number_format($m_all_courses->ini_price)}}</h3>
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


{{-- All Courses Mobile View --}}

<div class="all-courses-featured-courses desktop-hide" style="background-color: #f5f5f5;">
    <div class="landingpage-courses-header">
        <h1>All E-Books</h1>
    </div>


    <div class="all-courses-page-all-courses-sections-flex">

        <div class="all-courses-page-all-courses-sections-flex-right">
            <h6 style="margin-left: 87%; margin-bottom:20px; font-size: 18px;">{{number_format($m_all_ebooks_c)}} Results</h6>

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

@endsection
