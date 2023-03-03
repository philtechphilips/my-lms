@extends('studentLearning.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Dashboard | Video-Page
@endsection

@section('content')

<div class="video-page-container">
    <div class="video-page-container-left">
        <div class="canvas-head canvas-head-video flexitem">
            <div class="logo desktop-hide">
                <a href="/">
                    MoGah
                </a>
            </div>
            <a href="javscript:void(0);" class="t-close vid-menu-close"><i class="ri-close-line"></i></a>
        </div>
       <div class="video-page-container-left-header">
            <p style="text-transform: uppercase">COURSES > {{$course->school}} </p>
            <h3>{{$course->title}}</h3>
       </div>
       <p style="padding: 20px;">Finished Lesson(s) {{$finished_lessons_count}}/{{$all_lessons_count}}</p>

      @forelse ($topics as $topics)
      <hr style="opacity: .3;">
      <div class="video-page-container-left-topic-content">

           <div class="video-page-container-left-topic-content-header">
               <i class="ri-arrow-up-s-line" style="font-size: 18px"></i>
               <h3>{{$topics->name}} </h3>
           </div>
           <p style="padding: 0px 20px 20px 20px; ">
                {{$topics->summary}}
           </p>
           @php
               $count = 1;
           @endphp
           @foreach ($topics->lesson as $lesson)
            <ul class="lesson-links">
            <li>
            <a href="/dashboard/take-lessons/{{$course->id}}/{{$lesson->id}}">
                <div class="video-page-container-left-topic-content-videos">
                <div style="width: 100%; height: 3px; border-bottom: 1px solid #efefef;"></div>
                <div class="video-page-container-left-topic-content-videos">
               <div class="video-page-container-left-topic-content-videos-body">
                   <div class="video-page-container-left-topic-content-videos-left">
                       <i class="ri-play-circle-fill"></i>
                       <p>{{$count++}}.</p>

                                    <h4>{{$lesson->name}}</h4>
                   </div>

                   <div class="video-page-container-left-topic-content-videos-right">
                    @foreach ($finished_lessons as $fl)
                        @if($fl->lesson_id === $lesson->id)
                            <i class="ri-checkbox-circle-fill" style="color: #54b551; font-size: 24px;"></i>
                        @else

                        @endif
                    @endforeach

                   </div>
               </div>
               <p style="padding-left: 60px; margin-top: -12px; margin-bottom: 15px; opacity: .6;">Duration: {{$lesson->duration}}</p>
                </div>
                </div>
             </a>
            </li>
            </ul>
           @endforeach




      </div>
      @empty

      @endforelse

      @php
          $divide = $finished_lessons_count/$all_lessons_count;
          $finish_percent = $divide * 100;
      @endphp

      @if($quiz != '')
      @if($finish_percent > 70 && $question !='')
      <hr style="opacity: .3;">
      <a href="/dashboard/attempt/quiz/{{Crypt::encrypt($quiz->course_id)}}/{{Crypt::encrypt($quiz->id)}}/{{Crypt::encrypt($question->id)}}" disabled style="text-decoration: none; color: #222;">
          <div class="video-page-container-left-topic-content">

         <div class="video-page-container-left-topic-content-header">
             <i class="ri-lock-unlock-fill" style="font-size: 18px"></i>
             <h3>Attempt Quiz </h3>
         </div>
          </div>
      </a>
      @else
      <hr style="opacity: .3;" >
      <a href="javascript:void(0)" id="quiz" disabled style="text-decoration: none; color: #666666;">
          <div class="video-page-container-left-topic-content">

         <div class="video-page-container-left-topic-content-header">
             <i class="ri-lock-fill"  style="font-size: 18px; color:rgba(179, 6, 6, 0.61)"></i>
             <h3>Attempt Quiz </h3>
         </div>
          </div>
      </a>
      @endif

      @endif

</div>

<div class="video-page-container-right">
    <div class="video-page-lessons-content-navigation open-trigger">
        <i class="ri-menu-unfold-fill"></i>
        <p>Lesson Navigation</p>
    </div>
    <h2>{{$w_lesson->name}}</h2>
    {{-- <div class="plyr_video-embed" id="player">
        <iframe width="800" height="500" src="{{$w_lesson->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div> --}}

             @if($w_lesson->source == "mp4")
                <video id="player" playsinline controls data-poster="{{asset('course/'.$course->image)}}">
                 <source src="{{asset('lesson_video/'.$w_lesson->video->video)}}" type="video/mp4" />
               </video>
               @elseif($course->source == "vm")
               <div class="plyr__video-embed" playsinline controls id="player">
                 <iframe
                 src="{{$$w_lesson->url}}"
                   allowfullscreen
                   allowtransparency
                   allow="autoplay"
                 ></iframe>
               </div>
                @else
                <div class="plyr_video-embed" playsinline controls id="player">
                      <iframe  name="iframe" src="{{$w_lesson->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 </div>
                @endif
    <h3 style="margin-top: 30px;">Lesson Description</h3>
    <p style="margin-top: 10px; font-size: 12px !important;">{!! htmlspecialchars_decode(nl2br($w_lesson->content)) !!}</p>
    <hr style="opacity: .3; margin: 20px 0;">
    <div class="video-page-container-right-prev">
        <div class="video-page-container-right-prev-left">
            @if($prev_count > 0)
            <a href="/dashboard/take-lessons/{{$course->id}}/{{$prev->id}}" style="text-decoration: none; color: #000;">
                <h6>PREV</h6>
                <h5 style="font-size: 14px;">{{$prev->name}}</h5>
            </a>
            @endif
        </div>
        <div class="video-page-container-right-prev-right">
            @if($next_count > 0)
            <a href="/dashboard/take-lessons/{{$course->id}}/{{$next->id}}" id="submit" style="text-decoration: none; color: #000;">
                <h6>NEXT</h6>
                <h5 style="font-size: 14px;">{{$next->name}}</h5>
                <form style="display: none;">
                    @csrf
                    <input type="hidden" value="{{$course->id}}" id="course_id">
                    <input type="hidden" value="{{$w_lesson->id}}" id="lesson_id">
                    <input type="hidden" value="{{$w_lesson->topic_id}}" id="topic_id">
                    <input type="hidden" value="{{$next->id}}" id="next">
                </form>
            </a>
            @else
                <a href="/dashboard/take-lessons/{{$course->id}}/{{$w_lesson->id}}" id="submit" style="text-decoration: none; color: #000;">
                <h6>NEXT</h6>
                <h5 style="font-size: 14px;">Finish Course</h5>
                <form style="display: none;">
                    @csrf
                    <input type="hidden" value="{{$course->id}}" id="course_id">
                    <input type="hidden" value="{{$w_lesson->id}}" id="lesson_id">
                    <input type="hidden" value="{{$w_lesson->topic_id}}" id="topic_id">
                    <input type="hidden" value="{{$w_lesson->id}}" id="next">
                </form>
                </a>
            @endif
        </div>
    </div>

    <div class="video-page-container-right-comment">
        <h3 style="margin-top: 30px;">{{$comment->count()}} Comment(s)</h3>
        <div style="background: #000; height: 2px; width: 40px;"></div>



        <div class="video-page-container-right-comment-body-container">

            @forelse  ($comment as $comment)
            <hr style="opacity: .3; margin: 40px 0;">
            <div class="video-page-container-right-comment-body-container-flex">
                <div class="video-page-container-right-comment-body-container-flex-image">
                    <img src="{{asset('image/'.$comment->user->passport)}}" width="60" height="60" style="border-radius: 50%;">
                </div>
                <div class="video-page-container-right-comment-body-container-flex-body">
                    <div class="video-page-container-right-comment-body-container-flex-body-flex-two">
                        <div style="display: flex; align-items: center;">
                            <h4 style="margin-right: 15px;">{{$comment->user->name}}</h4>
                            <p style="font-size: 13px;">
                                @php
                                // date("M jS, Y", strtotime("2011-01-05"));
                                $c_date = strtotime($comment->created_at);
                                echo date("M j, Y", $c_date);
                                @endphp
                            </p>
                        </div>
                    </div>
                    <p>{{$comment->comment}}</p>
                </div>
            </div>
            {{-- Reply --}}
            @foreach ($reply as $r)
            @if($comment->id === $r->course_id)
            <div class="video-page-reply">
                <hr style="opacity: .3; margin: 25px 0;">
                <div class="video-page-container-right-comment-body-container-flex">
                    <div class="video-page-container-right-comment-body-container-flex-image">
                        <img src="{{asset('image/'.$r->user->passport)}}" width="60" height="60" style="border-radius: 50%;">
                    </div>
                    <div class="video-page-container-right-comment-body-container-flex-body">
                        <div class="video-page-container-right-comment-body-container-flex-body-flex-two">
                            <div style="display: flex;">
                                <h4 style="margin-right: 15px;">{{$r->user->name}}</h4>
                                <p style="font-size: 13px;">
                                @php
                                // date("M jS, Y", strtotime("2011-01-05"));
                                $r_date = strtotime($r->created_at);
                                echo date("M j, Y", $r_date);
                                @endphp
                                </p>
                            </div>
                            <a href="#">Reply</a>
                        </div>
                        <p>{{$r->comment}}</p>
                    </div>
                </div>


            </div>
            @else

            @endif
            @endforeach


        {{-- Reply --}}
        </div>
            @empty
            <div style="width: 100%; background-color: rgb(158, 0, 0); padding: 0 10px 2px 10px; ">
                <p style="margin-top: 20px; font-size: 14px; color: #fff;">No Comment Yet</p>
            </div>
            @endforelse





        <hr style="opacity: .3; margin: 40px 0;">

        <div class="video-page-post-comment">
            <h3>Leave a comment</h3>
            <p>Name: {{Auth::user()->name}}</p>
            <form action="/dashboard/course-comment" method="POST">
                @csrf
                @if ($message = Session::get('success'))
                <div style="background: rgb(0, 80, 53); width: 100%;">
                    <p style="color: #fff; font-size: 12px; text-align: center;">{{ $message }}</p>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div style="background: rgb(158, 0, 0); width: 100%;">
                    <p style="color: #fff; font-size: 12px; text-align: center;">{{ $message }}</p>
                </div>
            @endif
                <div>
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="hidden" name="lesson_id" value="{{$w_lesson->id}}">
                    <textarea name="comment">Comment*</textarea>
                </div>
                <div>
                    <input type="submit" value="Submit Comment">
                </div>
            </form>
        </div>

    </div>
</div>

</div>



@endsection

@section('scripts')
{{-- <script>
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('ul a').forEach(link => {
        if(link.href.includes(`${activePage}`)){
            // console.log(`${activePage}`)
            link.classList.add('active');
        }
    });
</script> --}}
{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
const navmenuButton = document.querySelector('.open-trigger'),
// closeButton = document.querySelector('.t-close'),
vidaddclass = document.querySelector('.video-page-container'),
vidrclass = document.querySelector('.vid-menu-close'),
left = document.querySelector('.video-page-container-left');
navmenuButton.addEventListener('click', function(){
    vidaddclass.classList.toggle('showvidnav');
    left.classList.replace('video-page-container-left', 'video-page-container-left-open')
});
vidrclass.addEventListener('click', function(){
    vidaddclass.classList.remove('showvidnav');
    left.classList.replace('video-page-container-left-open', 'video-page-container-left');
});


</script>

<script>
    const activeLink = window.location.pathname;
    const courseLinks = document.querySelectorAll('ul a').forEach(link => {
        if(link.href.includes(`${activeLink}`)){
            link.classList.add('lesson_active');
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('#quiz').click(function (e) {
            toastr.warning("Complete 70% of course before atempting quiz!", 'Error', {timeOut: 4000});
        })
    })
</script>
<script>
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
            let course_id = $("#course_id").val();
            let lesson_id = $("#lesson_id").val();
            let topic_id = $("#topic_id").val();
            let next = $("#next").val();
            // alert(course_id);
            // alert(lesson_id);
            // alert(topic_id);

            $.ajax({
            method: "POST",
            url: "/dashboard/complete-lesson",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                'course_id': course_id,
                'lesson_id': lesson_id,
                'topic_id': topic_id,
            },


            success: function (response){
                alert(response);
                    if(response === 'Lesson Finished Successfully!'){
                        window.location.replace("/dashboard/take-lessons/"+course_id+'/'+next);
                    }else if(response === 'Error'){
                        toastr.warning("Couldn't Add Lesson", 'Error', {timeOut: 4000});
                    }else{
                        toastr.warning("Empty Field(s)", 'Error', {timeOut: 4000});
                    }

            }
            });
        });
    });
</script>

<script>
    player.on('ended', (event) => {
        let course_id = $("#course_id").val();
            let lesson_id = $("#lesson_id").val();
            let topic_id = $("#topic_id").val();
            let next = $("#next").val();
            // alert(course_id);
            // alert(lesson_id);
            // alert(topic_id);

            $.ajax({
            method: "POST",
            url: "/dashboard/complete-lesson",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                'course_id': course_id,
                'lesson_id': lesson_id,
                'topic_id': topic_id,
            },


            success: function (response){
                alert(response);
                    if(response === 'Lesson Finished Successfully!'){
                        window.location.replace("/dashboard/take-lessons/"+course_id+'/'+next);
                    }else if(response === 'Error'){
                        toastr.warning("Couldn't Add Lesson", 'Error', {timeOut: 4000});
                    }else{
                        toastr.warning("Empty Field(s)", 'Error', {timeOut: 4000});
                    }

            }
            });
    });
</script>
<script>
    $(document).ready(function() {
       function disablePrev() { window.history.forward() }
       window.onload = disablePrev();
       window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
 </script>
@endsection
