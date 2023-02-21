<div class="landingpage-courses">
    <div class="landingpage-courses-header">
        <h1>E-books</h1>
        <a href="{{ route('allEbooks') }}"><p>See All E-books</p> <i class="ri-arrow-right-fill"></i></a>
    </div>
    <div class="landingpage-courses-grid">

        @foreach ($ebook as $ebook)
        <div class="landingpage-courses-grid-body">
            <a href="/main/ebook/{{Crypt::encrypt($ebook->id)}}">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('ebook/'.$ebook->image)}}" >
                 {{-- @foreach ($ebook_image as $e_img)
                    @if($ebook->id === $e_img->ebook_id)
                     <img src="{{ asset('course/'.$e_img->ebook_image)}}" >
                    @else
                     <img src="#" alt="Course Image">
                    @endif
                @endforeach --}}
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>{{ Str::limit($ebook->title, 60) }}</h2>
            </a>
                <p>Author: {{$ebook->user->name}}</p>
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
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; {{ number_format($ebook->real_price, 2)}}</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>



{{-- Mobile Courses --}}
<div class="mobile-landingpage-courses swiper">
    <div class="mobile-landingpage-courses-header">
        <h1>Our E-Books</h1>
        <a href="/main/ebooks"><p>See All E-Books</p> <i class="ri-arrow-right-fill"></i></a>
    </div>
    <div class="mobile-landingpage-courses-grid swiper-wrapper">

        @foreach ($mobile_ebook as $mobile_ebook)
        <div class="mobile-landingpage-courses-grid-body swiper-slide">
            <a href="/main/ebook/{{Crypt::encrypt($mobile_ebook->id)}}">
            <div class="mobile-landingpage-courses-grid-body-image">
                <img src="{{ asset('ebook/'.$mobile_ebook->image)}}">
                {{-- <i class="ri-play-fill play"></i> --}}
            </div>
            <div class="mobile-landingpage-courses-grid-body-contents">
                <h2>{{Str::limit($mobile_ebook->title, 65)}}</h2>
            </a>
                <p>A Course By: {{$mobile_ebook->user->name}}</p>
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
                    <h2 style="font-family: poppins !imporatant;">&#8358;{{number_format($mobile_ebook->real_price)}}</h2>
                </div>
            </div>
        </div>
        @endforeach



    </div>
</div>
{{-- Mobile Courses --}}
