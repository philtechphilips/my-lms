@extends('studentLearning.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Dashboard | Live-Class
@endsection

@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600; font-size: 15px;">Payments</h3>
        </div>
    </div>



    <div class="student-learn-dashboard-con">
        <div class="student-learn-dashboard-ebook-cont">
            <div class="student-learn-dashboard-ebook-cont-left">
                <ul class="student-learn-dashboard-ebook-cont-left-ul">
                    <li>
                        <a href="/dashboard"><i class="fa-solid fa-house"></i></a>
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
                        <a href="/dashboard/payments"><i class="fa-solid fa-credit-card"></i></a>
                    </li>

                    <li>
                        <a href="/dashboard/notification"><i class="fa-solid fa-bullhorn"></i></a>

                    </li>

                </ul>
            </div>
            <div class="student-learn-dashboard-ebook-cont-right" style="margin-bottom: 10px !important">
                <div class="student-learn-dashboard-ebook-cont-right-back" id="go-back">
                    <i class="ri-arrow-left-s-line"></i>
                    <p>Back</p>
                </div>

                @if($live->count() > 0)
                <h4 style="margin-top: 30px">All Schedule</h4>
                <table class="payments-table">
                    <thead>
                        <th>S.No</th>
                        <th>Course</th>
                        <th>Date/Time</th>
                        <th>Join Link</th>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($live as $live)
                        <tr>
                            <td data-label="S.No">{{$count++}}.</td>
                            <td data-label="Course" style="text-transform: capitalize;">
                                {{$live->course->title}}
                            </td>
                            <td data-label="Date/Time">
                                {{-- {{$live->date_time}} --}}
                                @php
                                    $c_date = strtotime($live->date_time);
                                    echo date("M j, Y h:i a", $c_date);
                                @endphp
                            </td>
                            <td data-label="Join Link">
                                <a href="javascript:void(0)" style="background-color: #DC3545; text-decoration: none; color: #fff; padding: 10px 20px; border-radius: 10px;">
                                    Join Now
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @else
                <div class="student-learn-dashboard-ebook-cont-right-content">
                    <img src="{{asset('image/empty-box.de242ea5.png')}}">
                    <p>No Live Schedule For This Course</p>
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
