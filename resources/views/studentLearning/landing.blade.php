@extends('studentLearning.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Dashboard
@endsection

@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600;">Dashboard</h3>
        </div>
    </div>



    <div class="student-learn-dashboard-cont">
        <div class="student-learn-dashboard-cont-explore">
            <h2>Begin your learning path</h2>
        </div>
        <div class="student-dashboard-display-flex">
            <div class="student-dashboard-display-flex-right">
                <img src="{{asset('image/learning-path.d5b3ca56.png')}}">
            </div>
            <div class="student-dashboard-display-flex-left">
                <a href="/dashboard/my-courses">Begin Learning</a>
            </div>
        </div>

        <div class="student-learn-dashboard-cont-explore">
            <h2>Explore LMS</h2>
        </div>
        <div class="student-dashboard-display-grid">
            <div class="student-dashboard-display-grid-body">
                <a href="/dashboard/learn/history">
                    <i class="ri-bar-chart-box-fill child-1"></i>
                    <p>Assessment History</p>
                </a>
            </div>

            <div class="student-dashboard-display-grid-body">
                <a href="/dashboard/my-courses">
                    <i class="ri-vidicon-fill child-2"></i>
                    <p>Live Class Schedule</p>
                </a>
            </div>

            <div class="student-dashboard-display-grid-body">
                <a href="/dashboard/my-courses">
                    <i class="ri-play-circle-fill child-3"></i>
                    <p>Courses</p>
                </a>
            </div>

            <div class="student-dashboard-display-grid-body">
                <a href="/dashboard/my-ebooks">
                    <i class="ri-book-fill child-4"></i>
                    <p>E-Books</p>
                </a>
            </div>

            <div class="student-dashboard-display-grid-body">
                <a href="/dashboard/payments">
                    <i class="ri-bank-card-fill child-5"></i>
                    <p>Payments</p>
                </a>
            </div>

            <div class="student-dashboard-display-grid-body">
                <a href="/dashboard/certificate">
                    <i class="ri-file-download-fill child-6"></i>
                    <p>Certificates</p>
                </a>
            </div>

            {{-- <div class="student-dashboard-display-grid-body">
                <a href="">
                    <i class="ri-volume-up-fill child-7"></i>
                    <p>Annoncements</p>
                </a>
            </div> --}}

            <div class="student-dashboard-display-grid-body">
                <a href="/dashboard/feedback">
                    <i class="ri-feedback-fill child-7"></i>
                    <p>Feedback</p>
                </a>
            </div>

            {{-- <div class="student-dashboard-display-grid-body">
                <a href="">
                    <i class="ri-volume-up-fill child-7"></i>
                    <p>Annoncements</p>
                </a>
            </div> --}}

            {{-- <div class="student-dashboard-display-grid-body">
                <a href="">
                    <i class="ri-arrow-down-circle-fill child-8"></i>
                    <p>Referrals</p>
                </a>
            </div> --}}

            <div class="student-dashboard-display-grid-body">
                <a href="/main/profile">
                    <i class="ri-user-2-fill child-9"></i>
                    <p>Profile</p>
                </a>
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

@endsection
