@extends('studentLearning.index')


@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600; font-size: 15px;">My Courses</h3>
        </div>
    </div>



    <div class="student-learn-dashboard-con">
        <div class="student-learn-dashboard-ebook-cont">
            <div class="student-learn-dashboard-ebook-cont-left">
                <ul class="student-learn-dashboard-ebook-cont-left-ul">
                    <li>
                        <a href="/good"><i class="fa-solid fa-house"></i></a>
                    </li>

                    <li>
                        <a href="/dashboard/my-courses"><i class="fa-solid fa-file-video"></i></a>
                    </li>

                    <li>
                        <a href="/dashboard/learn/history"><i class="fa-solid fa-chart-column"></i></a>
                    </li>

                    <li>
                        <a href="/dashboard/live-class"><i class="fa-solid fa-video"></i></a>
                    </li>


                    <li>
                        <a href="/dashboard/my-ebooks"><i class="fa-solid fa-book"></i></a>
                    </li>


                    <li>
                        <a href="/good"><i class="fa-solid fa-credit-card"></i></a>
                    </li>

                    <li>
                        <a href="/good"><i class="fa-solid fa-bullhorn"></i></a>
                    </li>

                </ul>
            </div>
            <div class="student-learn-dashboard-ebook-cont-right">
                <div class="student-learn-dashboard-ebook-cont-right-back" id="go-back">
                    <i class="ri-arrow-left-s-line"></i>
                    <p>Back</p>
                </div>

                @if($course_count > 0)
                <div class="student-learn-dashboard-ebook-cont-right-assess-content-ebook-grid">
                    @foreach ($mycourses as $mycourses)
                    <div class="student-learn-dashboard-ebook-cont-right-assess-content-ebook-grid-body">
                            <a href="/dashboard/video-course/{{$mycourses->course_id}}" style="text-decoration: none; color: #000 !important;">
                                <img src="{{asset('course/'.$mycourses->course->image)}}">
                            <div style="padding: 10px;">
                            <h4>{{Str::limit($mycourses->course->title, 50) }}</h4>
                            {{-- <p>{{$ebooks->ebook->updated_at}}</p> --}}
                        </a>
                        <p class="time" style="font-size: 12px;">
                            {{-- {{date("jS F Y", $ebooks->ebook->updated_at)}} --}}
                            Last Updated:
                            @php
                                // date("M jS, Y", strtotime("2011-01-05"));
                                $date = strtotime($mycourses->course->updated_at);
                                echo date("M j, Y", $date);
                            @endphp
                        </p>
                        <div class="student-learn-dashboard-ebook-cont-right-assess-content-ebook-grid-body-flex">
                            <div class="student-learn-dashboard-ebook-cont-right-assess-content-ebook-grid-body-flex-time">
                                <i class="ri-time-line"></i>
                                <p>
                                    {{$mycourses->course->hour}}:{{$mycourses->course->minute}}:{{$mycourses->course->seconds}}
                                </p>
                            </div>
                            <div class="student-learn-dashboard-ebook-cont-right-assess-content-ebook-grid-body-flex-time">
                                <i class="ri-star-fill"></i>
                                <p>45</p>
                            </div>
                            <div class="student-learn-dashboard-ebook-cont-right-assess-content-ebook-grid-body-flex-time">
                                <i class="ri-user-line"></i>
                                <p>80</p>
                            </div>
                        </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="student-learn-dashboard-ebook-cont-right-content">
                    <img src="{{asset('image/empty-box.de242ea5.png')}}">
                    <p>No Registered Course</p>
                </div>
                @endif

            </div>
        </div>
    </div>





    {{-- including Your Courses Components --}}
    {{-- @include('studentLearning.components.dashboard-landing.your-courses') --}}
    {{-- including Your Courses Components --}}

    {{-- Including Related Courses Components --}}
    {{-- @include('studentLearning.components.dashboard-landing.related-courses') --}}
    {{-- Including Related Courses Components --}}

@endsection

@section('scripts')
<script>
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('ul a').forEach(link => {
        if(link.href.includes(`${activePage}`)){
            // console.log(`${activePage}`)
            link.classList.add('active');
        }
    });
</script>
@endsection
