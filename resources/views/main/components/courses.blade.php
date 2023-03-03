<div class="landingpage-courses">
    <div class="landingpage-courses-header">
        <h1>Our Courses</h1>
        <a href="{{ route('allcourses') }}"><p>See All Courses</p> <i class="ri-arrow-right-fill"></i></a>
    </div>
    <div class="landingpage-courses-grid">
        {{-- Show Courses --}}
        @foreach ($courses as $courses)
        <div class="landingpage-courses-grid-body">
            <a href="/main/course/{{Crypt::encrypt($courses->id)}}">
            <div class="landingpage-courses-grid-body-image">
                <img src="{{ asset('course/'.$courses->image)}}" >
                {{-- @foreach ($courses_image as $c_img)
                    @if($courses->id === $c_img->course_id)
                     <img src="{{ asset('course/'.$c_img->course_image)}}" >
                    @else
                     <img src="#" alt="Course Image">
                    @endif
                @endforeach --}}
                <i class="ri-play-fill play"></i>
            </div>
            <div class="landingpage-courses-grid-body-contents">
                <h2>{{Str::limit($courses->title, 55)}}</h2>
            </a>
                <p>A Course By:
                    {{$courses->course->name}}
                </p>
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
                        <span style="padding-right: 5px; font-family: Poppins !important">&#8358; {{$courses->real_price}}</span>
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
        <h1>Our Courses</h1>
        <a href="/main/courses"><p>See All Courses</p> <i class="ri-arrow-right-fill"></i></a>
    </div>
    <div class="mobile-landingpage-courses-grid swiper-wrapper">
        @foreach ($mobile_courses as $m_c)
            <div class="mobile-landingpage-courses-grid-body swiper-slide">
            <a href="/main/course/{{Crypt::encrypt($m_c->id)}}">
            <div class="mobile-landingpage-courses-grid-body-image">
                <img src="{{ asset('course/'.$m_c->image)}}" >
                {{-- @foreach ($courses_image as $c_img)
                    @if($m_c->id === $c_img->course_id)
                     <img src="{{ asset('course/'.$c_img->course_image)}}" >
                    @else
                     <img src="#" alt="Course Image">
                    @endif
                @endforeach --}}
                <i class="ri-play-fill play"></i>
            </div>
            <div class="mobile-landingpage-courses-grid-body-contents">
                <h2>{{Str::limit($m_c->title, 55)}}</h2>
            </a>
                <p>A Course By: {{$m_c->course->name}}</p>
                <div class="mobile-landingpage-courses-grid-body-contents-flex">
                        <div class="left">
                            <i class="ri-user-line"></i>
                            <span>{{$m_c->cart->count()}}</span>
                        </div>
                        <div class="right">
                            <i class="ri-question-answer-line"></i>
                            <span>{{$m_c->review->count()}}</span>
                        </div>
                </div>
                <div>
                    <h2 style="font-family: poppins !imporatant;">&#8358;{{$m_c->real_price}}</h2>
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>
{{-- Mobile Courses --}}
