@extends('studentLearning.index')


@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600; font-size: 15px;">View Score</h3>
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
            <div class="student-learn-dashboard-ebook-cont-right">
                <div class="student-learn-dashboard-ebook-cont-right-back" id="go-back">
                    <i class="ri-arrow-left-s-line"></i>
                    <p>Back</p>
                </div>

                <div style="margin-top: 25px;">
                    <h4>Total Score: {{$score}} Points/{{ $total_score}} Points</h4>
                </div>

                <div class="student-learn-dashboard-ebook-cont-right-score-grid">


                    @foreach($answers as $ans)
                    <div class="student-learn-dashboard-ebook-cont-right-score-grid-body">
                        <h4>{{$ans->question->quest_number}}</h4>
                        <p>{{$ans->question->question}}</p>
                        <p><b style="color: rgb(255, 166, 0)">Ans:</b> {{$ans->answer}}</p>
                        <p><b style="color: rgb(0, 187, 0)">Correct Ans:</b> {{$ans->correct_answer}}</p>
                        <div style="display: flex; justify-content: space-between;">
                            @if($ans->answer == $ans->correct_answer)
                                <a href="javascript:void()">Correct</a>
                            @else
                                <a href="javascript:void()" class="wrong">Wrong</a>
                            @endif
                            <p style="font-size: 14px; font-weight: 600; color: rgb(209, 1, 1); align-items: center;">{{$ans->point}} Points</p>
                        </div>
                    </div>
                    @endforeach


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
