@extends('main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Blog Page
@endsection

@section('content')
        <div class="blog-single-page-container">
            <div class="blog-single-page-container-col-1">
                {{-- <img src="{{asset('blogImages/20221127221108.jpg')}}"> --}}
                <h2 style="margin-bottom: 10px;">{{$blogs->name}}</h2>
                <div class="blog-info-flex" style="display: flex;">
                    {{-- <p style="margin-right: 10px;">Author: Admin</p> --}}
                    <p>Last Updated: @php
                        // date("M jS, Y", strtotime("2011-01-05"));
                        $b_date = strtotime($blogs->created_at);
                        echo date("M j, Y", $b_date);
                        @endphp.</p>
                </div>
                <p style="margin-top: 40px;">
                    {!! htmlspecialchars_decode(nl2br($blogs->blog)) !!}
                </p>


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
                                <p style="margin-top: -15px;">{{$comment->comment}}</p>
                            </div>
                        </div>
                        {{-- Reply --}}
                        {{-- @foreach ($reply as $r)
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
                        @endforeach --}}


                    {{-- Reply --}}
                        @empty
                        <div style="width: 100%; background-color: rgb(158, 0, 0); padding: 0 10px 2px 10px; ">
                            <p style="margin-top: 20px; font-size: 14px; color: #fff;">No Comment Yet</p>
                        </div>
                        @endforelse





                    <hr style="opacity: .3; margin: 40px 0;">

                    <div class="video-page-post-comment">
                        <h3>Leave a comment</h3>
                        <p>Name: {{Auth::user()->name}}</p>
                        <form action="/dashboard/blog-comment" method="POST">
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
                                <input type="hidden" name="blog_id" value="{{$blogs->id}}">
                                {{-- <input type="hidden" name="lesson_id" value="{{$w_lesson->id}}"> --}}
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
            <div class="blog-single-page-container-col-2">
                <h3>Recent Posts</h3>


                @foreach ($recent as $recent)
                    <div class="blog-single-page-container-col-2-grid-cont">
                    <img src="{{asset('blogImages/'.$recent->image)}}" alt="" width="60">
                    <div>
                        <h4>{{$recent->name}}</h4>
                        <div class="blog-info-flex" style="display: flex;">
                            <p style="margin-right: 5px;">Author: Admin</p>
                            <p>
                                @php
                                // date("M jS, Y", strtotime("2011-01-05"));
                                $r_date = strtotime($recent->created_at);
                                echo date("M j, Y", $r_date);
                                @endphp
                            </p>
                        </div>
                    </div>
                    </div>
                    <hr style="opacity: .4">
                @endforeach


            </div>

        </div>


@endsection

@section('scripts')

@endsection
