@extends('studentLearning.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Dashboard | Assessment
@endsection

@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600; font-size: 15px;">Quiz</h3>
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


                <div class="student-learn-dashboard-quiz-container">
                    <div class="student-learn-dashboard-quiz-container-header">
                        <p>{{$question->quiz->name}}</p>
                    </div>
                    <div class="student-learn-dashboard-quiz-container-body">


                        <p><b style="padding-right: 10px;">{{$question->quest_number}}:</b>  {{$question->question}}</p>

                        {{-- @if ($question->quiz->summary !='')
                        <p style="font-size: 14px; margin-top: 20px;"><b style="padding-right: 10px; font-size: 14px;">Quiz Description:</b>  {{$question->quiz->summary}}</p>
                        @endif --}}
                    </div>

                    <form>
                        @csrf
                        <div class="student-learn-dashboard-quiz-container-options">
                            <div class="student-learn-dashboard-quiz-container-options-body">
                                <input type="radio" name="answer" value="{{$question->option_a}}">
                                <p>{{$question->option_a}}</p>
                            </div>
                        </div>

                        <div class="student-learn-dashboard-quiz-container-options">
                            <div class="student-learn-dashboard-quiz-container-options-body">
                                <input type="radio" name="answer" value="{{$question->option_b}}">
                                <p>{{$question->option_b}}</p>
                            </div>
                        </div>

                        <div class="student-learn-dashboard-quiz-container-options">
                            <div class="student-learn-dashboard-quiz-container-options-body">
                                <input type="radio" name="answer" value="{{$question->option_c}}">
                                <p>{{$question->option_c}}</p>
                            </div>
                        </div>


                        <div class="student-learn-dashboard-quiz-container-options">
                            <div class="student-learn-dashboard-quiz-container-options-body">
                                <input type="radio" name="answer" value="{{$question->option_d}}">
                                <p>{{$question->option_d}}<p>
                            </div>
                        </div>
                    </form>

                    <div class="student-learn-dashboard-quiz-container-options">
                        <div class="student-learn-dashboard-quiz-container-options-body">
                            <p>Something wrong with the question? <b>Give feedback</b></p>
                        </div>
                    </div>

                    <div class="student-learn-dashboard-quiz-container-buttons">
                        <p>Q{{$answer_count + 1}}/Q{{$question_count}}</p>
                        <a href="#" id="submit">Next</a>
                    </div>
                </div>

                <div>

                </div>
            </div>
        </div>
    </div>


@if($next != '')
<input type="hidden" value="{{Crypt::encrypt($next->id)}}" id="next_id">
<input type="hidden" value="{{Crypt::encrypt($next->course_id)}}" id="next_course">
<input type="hidden" value="{{Crypt::encrypt($next->quiz_id)}}" id="next_quiz">
@else
<input type="hidden" value="finish" id="finish">
<input type="hidden" value="{{Crypt::encrypt($question->course_id)}}" id="next_course">
<input type="hidden" value="{{Crypt::encrypt($question->quiz_id)}}" id="next_quiz">
@endif


    {{-- including Your Courses Components --}}
    {{-- @include('studentLearning.components.dashboard-landing.your-courses') --}}
    {{-- including Your Courses Components --}}

    {{-- Including Related Courses Components --}}
    {{-- @include('studentLearning.components.dashboard-landing.related-courses') --}}
    {{-- Including Related Courses Components --}}

@endsection

@section('scripts')
{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- Toastr --}}
<script>
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('ul a').forEach(link => {
        if(link.href.includes(`${activePage}`)){
            // console.log(`${activePage}`)
            link.classList.add('active');
        }
    });
</script>

<script>
     $(document).ready(function () {
        $('#submit').click(function (e) {
            let ans = $('input[name="answer"]:checked').val();
            let next_id = $('#next_id').val();
            let next_course = $('#next_course').val();
            let next_quiz = $('#next_quiz').val();
            let finish = $('#finish');
            if(ans === undefined){
                toastr.warning("Please Select An Answer", 'Error', {timeOut: 2500});
            }else{
                $.ajax({
            method: "POST",
            url: "/dashboard/submit-answer",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                'ans': ans,
                'c_ans': "{{$question->c_option}}",
                'course_id': "{{Crypt::encrypt($question->course_id)}}",
                'quiz_id': "{{Crypt::encrypt($question->quiz_id)}}",
                'quest_id': "{{Crypt::encrypt($question->id)}}",
            },

                success: function (response){

                    if(response === "Answer Submitted!"){
                        // alert(response)
                        if (finish.val() == "finish") {
                            $.ajax({
                                method: "POST",
                                url: "/dashboard/finish-quiz",
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data:{
                                    'course_id': "{{Crypt::encrypt($question->course_id)}}",
                                    'quiz_id': "{{Crypt::encrypt($question->quiz_id)}}",
                                },

                                success: function (response){
                                    if(response === "Quiz Submitted!"){
                                        toastr.success("Test Completed!", 'Success', {timeOut: 2500});
                                        setTimeout(
                                            function() {
                                            window.location.replace("/dashboard/learn/history");
                                            }, 2500
                                        )
                                    }
                                }
                            })
                        } else {
                            window.location.replace("/dashboard/attempt/quiz/"+next_course+'/'+next_quiz+'/'+next_id);
                        }
                        // alert("Good");
                    }else if(response === 'Error'){
                        toastr.warning("Couldn't Submit Lesson", 'Error', {timeOut: 4000});
                    }else if(ans == ''){
                        toastr.warning("Select Answer", 'Error', {timeOut: 4000});
                    }

                    }
            });
            }

        })
        })
</script>
<script>
      $(document).ready(function() {
         function disablePrev() { window.history.forward() }
         window.onload = disablePrev();
         window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
      });
   </script>
@endsection
