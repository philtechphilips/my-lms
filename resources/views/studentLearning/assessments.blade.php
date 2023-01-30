@extends('studentLearning.index')


@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600; font-size: 15px;">Assessment History</h3>
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
                {{-- <div class="student-learn-dashboard-ebook-cont-right-content">
                    <img src="{{asset('image/empty-box.de242ea5.png')}}">
                    <p>No Assessment History (No registered Course)</p>
                </div> --}}


                <div class="student-learn-dashboard-ebook-cont-right-assess-content">
                    <img src="{{asset('image/goal.814f415c.png')}}">
                    <p>Your average quiz score is <b style="color: #b44545;">0%</b></p>
                </div>
                <div class="student-learn-dashboard-ebook-cont-right-assess-content-heading">
                    <p>S/N</p>
                    <p>Course Name</p>
                    <p>Status</p>
                    <p>Score</p>
                </div>
                <div class="student-learn-dashboard-ebook-cont-right-assess-content-body">
                    <div class="wrapper-cont">
                    <i class="ri-focus-2-fill"></i>
                    <p>Course Name</p>
                    <p>Status</p>
                    <p>Score</p>
                    </div>

                    <div class="wrapper-cont">
                        <i class="ri-focus-2-fill"></i>
                        <p>Course Name</p>
                        <p>Status</p>
                        <p>Score</p>
                        </div>


                </div>
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
