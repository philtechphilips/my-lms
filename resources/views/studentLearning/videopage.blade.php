@extends('studentLearning.index')


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

      @forelse ($topics as $topics)
      <hr style="opacity: .3;">
      <div class="video-page-container-left-topic-content">

           <div class="video-page-container-left-topic-content-header">
               <i class="ri-arrow-up-s-line" style="font-size: 18px"></i>
               <h3>{{$topics->name}} </h3>
               <p>3/{{$topics->lesson->count()}}</p>
           </div>
           <p style="padding: 0px 20px 20px 20px; ">
                {{$topics->summary}}
           </p>
           @php
               $count = 1;
           @endphp
           @foreach ($topics->lesson as $lesson)
            <div class="video-page-container-left-topic-content-videos">
                <hr style="opacity: .3;">
                <div class="video-page-container-left-topic-content-videos">
               <div class="video-page-container-left-topic-content-videos-body">
                   <div class="video-page-container-left-topic-content-videos-left">
                       <i class="ri-play-circle-fill"></i>
                       <p>{{$count++}}.</p>
                       <h4>{{$lesson->name}}</h4>
                   </div>

                   <div class="video-page-container-left-topic-content-videos-right">
                       <i class="ri-checkbox-circle-line"></i>
                   </div>
               </div>
               <p style="padding-left: 60px; margin-top: -12px; margin-bottom: 15px; opacity: .6;">Duration: {{$lesson->duration}}</p>
                </div>
           </div>
           @endforeach




      </div>
      @empty

      @endforelse




</div>

<div class="video-page-container-right">
    <div class="video-page-lessons-content-navigation open-trigger">
        <i class="ri-menu-unfold-fill"></i>
        <p>Lesson Navigation</p>
    </div>
    <h2>{{$w_lesson->name}}</h2>
    <div class="plyr_video-embed" id="player">
        <iframe width="800" height="500" src="{{$w_lesson->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
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
            <a href="/dashboard/take-lessons/{{$course->id}}/{{$next->id}}" style="text-decoration: none; color: #000;">
                <h6>NEXT</h6>
                <h5 style="font-size: 14px;">{{$next->name}}</h5>
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
                    <img src="{{asset('image/icons8-user-80.png')}}" width="60">
                </div>
                <div class="video-page-container-right-comment-body-container-flex-body">
                    <div class="video-page-container-right-comment-body-container-flex-body-flex-two">
                        <div style="display: flex;">
                            <h4 style="margin-right: 15px;">Commenter Name</h4>
                            @php
                                echo date('d/m/Y')
                            @endphp
                        </div>
                        <a href="#">Reply</a>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloremque iusto vitae, laborum necessitatibus, pariatur nesciunt neque, in quia corrupti facere modi! Minus ipsam nobis, eaque qui veritatis ipsa deleniti.</p>
                </div>
            </div>
            {{-- Reply --}}
            <div class="video-page-reply">
                <hr style="opacity: .3; margin: 25px 0;">
                <div class="video-page-container-right-comment-body-container-flex">
                    <div class="video-page-container-right-comment-body-container-flex-image">
                        <img src="{{asset('image/icons8-user-80.png')}}" width="60">
                    </div>
                    <div class="video-page-container-right-comment-body-container-flex-body">
                        <div class="video-page-container-right-comment-body-container-flex-body-flex-two">
                            <div style="display: flex;">
                                <h4 style="margin-right: 15px;">Commenter Name</h4>
                                @php
                                    echo date('d/m/Y')
                                @endphp
                            </div>
                            <a href="#">Reply</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloremque iusto vitae, laborum necessitatibus, pariatur nesciunt neque, in quia corrupti facere modi! Minus ipsam nobis, eaque qui veritatis ipsa deleniti.</p>
                    </div>
                </div>


            </div>
        {{-- Reply --}}
        </div>
            @empty
            <p>No Comment Yet</p>
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
@endsection
