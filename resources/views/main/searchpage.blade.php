@extends('main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Search result
@endsection

@section('content')

<div class="shopping_cart_header">
    <div class="shopping-cart-links">
        <a href="{{ route('homePage') }}">
            <p style="padding-right: 5px; font-weight: 500 !important;">Home</p>
        </a>
        <i class="fa-solid fa-angle-right"></i>
        <a href="javascript:void()">
            <p style="padding-left: 5px; font-weight: 500 !important;">Search Page</p>
        </a>
    </div>
    <h1>
        Search Page
    </h1>
</div>

{{-- Desktop Courses --}}
<div class="landingpage-courses">
    <div class="landingpage-courses-header">
        <h1>Courses</h1>
        {{-- <a href="#">
            <p>See All Courses</p> <i class="ri-arrow-right-fill"></i>
        </a> --}}
    </div>
    <div class="landingpage-courses-grid">

        @if($courses->count() < 1) <p
            style="text-align: center; color: red; font-size: 18px; font-weight: 600; margin-bottom: 30px;">No Course
            Found</p>
            @else
            @foreach ($courses as $courses)
            <div class="landingpage-courses-grid-body">
                <a href="/main/course/{{Crypt::encrypt($courses->id)}}">
                    <div class="landingpage-courses-grid-body-image">
                        <img src="{{ asset('course/'.$courses->image)}}">
                        <i class="ri-play-fill play"></i>
                    </div>
                    <div class="landingpage-courses-grid-body-contents">
                        <h2>{{Str::limit($courses->title, 55)}}</h2>
                </a>
                <p>A Course By: {{$courses->course->name}}</p>
                <div class="landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>{{$courses->cart->count()}}</span>
                    </div>
                    <div class="right">
                        <i class="ri-question-answer-line"></i>
                        <span>{{$courses->review->count()}}</span>
                    </div>
                </div>
                <div class="landingpage-courses-grid-body-contents-button">
                    <a href="/main/course/{{Crypt::encrypt($courses->id)}}">
                        <i class="ri-shopping-cart-2-line" style="padding-right: 5px;"></i>
                        <span style="padding-right: 5px; font-family: Poppins !important">Buy</span>
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358;
                            {{number_format($courses->real_price)}}</span>
                    </a>
                </div>
            </div>
    </div>
    @endforeach
    @endif

</div>
</div>
{{-- Desktop Courses --}}



{{-- Mobile Courses --}}
<div class="mobile-landingpage-courses swiper">
    <div class="mobile-landingpage-courses-header">
        <h1>Courses</h1>
        {{-- <a href="#">
            <p>See All Courses</p> <i class="ri-arrow-right-fill"></i>
        </a> --}}
    </div>
    <div class="mobile-landingpage-courses-grid swiper-wrapper">
        @if($m_courses->count() < 1) <p
            style="text-align: center; color: red; font-size: 18px; font-weight: 600; margin-bottom: 30px;">No Course
            Found</p>
            @else
            @foreach ($m_courses as $m_courses)
            <div class="mobile-landingpage-courses-grid-body swiper-slide">
                <a href="/main/course/{{Crypt::encrypt($m_courses->id)}}">
                    <div class="mobile-landingpage-courses-grid-body-image">
                        <img src="{{ asset('course/'.$m_courses->image)}}">
                        <i class="ri-play-fill play"></i>
                    </div>
                    <div class="mobile-landingpage-courses-grid-body-contents">
                        <h2>{{Str::limit($m_courses->title, 55)}}</h2>
                </a>
                <p>A Course By: {{$m_courses->course->name}}</p>
                <div class="mobile-landingpage-courses-grid-body-contents-flex">
                        <div class="left">
                            <i class="ri-user-line"></i>
                            <span>{{$m_courses->cart->count()}}</span>
                        </div>
                        <div class="right">
                            <i class="ri-question-answer-line"></i>
                            <span>{{$m_courses->review->count()}}</span>
                        </div>
                </div>
                <div>
                    <h2 style="font-family: poppins !imporatant;">&#8358;{{number_format($m_courses->real_price)}}</h2>
                </div>
            </div>
    </div>
    @endforeach
    @endif


</div>
</div>
{{-- Mobile Courses --}}




{{-- Desktop Courses --}}
<div class="landingpage-courses">
    <div class="landingpage-courses-header">
        <h1> E-Books</h1>
        {{-- <a href="#">
            <p>See All Courses</p> <i class="ri-arrow-right-fill"></i>
        </a> --}}
    </div>
    <div class="landingpage-courses-grid">
        @if($ebooks->count() < 1) <p
            style="text-align: center; color: red; font-size: 18px; font-weight: 600; margin-bottom: 30px;">No E-Book
            Found</p>
            @else
            @foreach ($ebooks as $ebooks)
            <div class="landingpage-courses-grid-body">
                <a href="/main/ebook/{{Crypt::encrypt($ebooks->id)}}">
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
                        <span>{{$ebooks->cart->count()}}</span>
                    </div>
                    <div class="right">
                        <i class="ri-question-answer-line"></i>
                        <span>{{$ebooks->review->count()}}</span>
                    </div>
                </div>
                <div class="landingpage-courses-grid-body-contents-button">
                    <a href="/main/ebook/{{Crypt::encrypt($ebooks->id)}}">
                        <i class="ri-shopping-cart-2-line" style="padding-right: 5px;"></i>
                        <span style="padding-right: 5px; font-family: Poppins !important">Buy</span>
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358;
                            {{number_format($ebooks->real_price)}}</span>
                    </a>
                </div>
            </div>
    </div>
    @endforeach
    @endif
</div>
</div>
{{-- Desktop Courses --}}


{{-- Mobile Courses --}}
<div class="mobile-landingpage-courses swiper">
    <div class="mobile-landingpage-courses-header">
        <h1>E-Books</h1>
        {{-- <a href="#">
            <p>See All Courses</p> <i class="ri-arrow-right-fill"></i>
        </a> --}}
    </div>
    <div class="mobile-landingpage-courses-grid swiper-wrapper">
        @if($m_ebooks->count() < 1) <p
            style="text-align: center; color: red; font-size: 18px; font-weight: 600; margin-bottom: 30px;">No E-book
            Found</p>
            @else
            @foreach ($m_ebooks as $m_ebooks)
            <div class="mobile-landingpage-courses-grid-body swiper-slide">
                <a href="/main/ebook/{{Crypt::encrypt($m_ebooks->id)}}">
                    <div class="mobile-landingpage-courses-grid-body-image">
                        <img src="{{ asset('ebook/'.$m_ebooks->image)}}">
                        {{-- <i class="ri-play-fill play"></i> --}}
                    </div>
                    <div class="mobile-landingpage-courses-grid-body-contents">
                        <h2>{{Str::limit($m_ebooks->title, 65)}}</h2>
                </a>
                <p>A Course By: {{$m_ebooks->user->name}}</p>
                <div class="landingpage-courses-grid-body-contents-flex">
                    <div class="left">
                        <i class="ri-user-line"></i>
                        <span>{{$m_ebooks->cart->count()}}</span>
                    </div>
                    <div class="right">
                        <i class="ri-question-answer-line"></i>
                        <span>{{$m_ebooks->review->count()}}</span>
                    </div>
                </div>
                <div>
                    <h2 style="font-family: poppins !imporatant;">&#8358;{{number_format($m_ebooks->real_price)}}</h2>
                </div>
            </div>
    </div>
    @endforeach
    @endif
</div>
</div>
{{-- Mobile Courses --}}

<div class="blogPage-container">
    <div class="blogPage-container-header">
        <h1>
            Our Blogs
        </h1>
    </div>
</div>

@if($blogs->count() < 1) <p
    style="text-align: center; color: red; font-size: 18px; font-weight: 600; margin-bottom: 30px;">No Blog Post Found
    </p>
    @else
    <div class="blogPage-container-section1">
        <div class="blogPage-container-section1-grid">

            @foreach ($blogs as $blogs)
            <div class="blogPage-container-section1-body">
                <a href="/main/read-blog-post/{{Crypt::encrypt($blogs->id)}}" style="color: #222;">
                    <img src="{{asset('blogImages/'.$blogs->image)}}" style="width: 300px; height: 250px;">
                    <h2>{{$blogs->name}}</h2>
                </a>
                <p> {!! htmlspecialchars_decode(nl2br(Str::limit($blogs->blog, 100))) !!}</p>
                <a href="/main/read-blog-post/{{Crypt::encrypt($blogs->id)}}">Read Article</a>
            </div>
            @endforeach


        </div>
    </div>
    @endif






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
