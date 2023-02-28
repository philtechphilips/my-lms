@extends('main.index')

@section('title')

@endsection

@section('content')


<section class="course_content">
    <div class="popup" id="popup-1">
        <div class="n_overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup()">&times;</div>
            <div class="container auth-form">
                <form method="POST" id="form" class="form" autocomplete="off">
                    @csrf
                    <div class="form-heading">
                        <h1>Give us a Feedback About The Course</h1>
                    </div>
                    <div class="input-group">
                        <input type="text" class="input-active" id="input2" onchange="Form()" name="title" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="title" id="placeholder2" class="i_active">Title</label>

                        <input type="hidden" id="course" value="{{$course->id}} ">
                        {{-- @error('email')
                        <span style="color: rgb(124, 0, 0);">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror --}}
                    </div>
                    <div class="input-group">
                        <textarea  class="input-active" id="input3" onchange="Form()" rows="7" name="comment" required autocomplete="current-password"></textarea>
                        <label for="comment" id="placeholder3" class="i_active">Comment</label>

                        {{-- @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror --}}
                    </div>
                    <div class="input-group">
                        <input type="submit" id="submit" name="submit" class="submit">
                    </div>


                    <hr style="margin-top: 20px;">
                    <h4 style="text-align: center; margin-top: 10px; font-weight: 700;">Rate E-Book</h4>
                  <div class="ebook-datails-rating">
                    <a href="#" id="rating-star-1"><i class="ri-star-line"></i></a>
                    <a href="#" id="rating-star-2"><i class="ri-star-line"></i></a>
                    <a href="#" id="rating-star-3"><i class="ri-star-line"></i></a>
                    <a href="#" id="rating-star-4"><i class="ri-star-line"></i></a>
                    <a href="#" id="rating-star-5"><i class="ri-star-line"></i></a>
                  </div>
                </form>
            </div>
        </div>
    </div>
    <div class="course_content_banner">
         <div class="course_content_banner_header" id="">
            <div class="course_content_right_links">
                <a href="javscript:void(0)" style="padding-right: 5px;">{{$course->school}}
                </a>
                <i class="fa-solid fa-angle-right" style="color: #fff"></i>
                <a href="javscript:void(0)" style="padding-left: 5px;">{{$course->title}}</a>
            </div>
            <h1>{{$course->title}}</h1>
            <p>{{ Str::limit($course->title, 55)}} | {{$course->school}}</p>
            <div class="course_content_right_ratings" style="display: flex;">
                <p>
                    <a href="javscript:void(0)" style="color: rgb(255, 37, 81);">{{$reviews_count}} Review(s)</a>
                    <a> {{$registered_students}} Registered Student(s)</a>
                </p>
            </div>

            <div class="course_content_right_bottom">
                <p>Created By {{$course->course->name}}</p>
                <p><i class="fa-solid fa-upload"></i>
                    <span>
                        <a>Last Updated  @php
                            // date("M jS, Y", strtotime("2011-01-05"));
                            $c_date = strtotime($course->updated_at);
                            echo date("M j, Y", $c_date);
                            @endphp</a>
                    </span>
                </p>

                <p><i class="fa-solid fa-earth-americas"></i>
                    <span>
                        <a>English</a>
                    </span>
                </p>

            </div>

            <div class="course_content_header_cta">
                <h1 style="font-weight: 600; padding-bottom: 10px">&#x20A6; {{number_format($course->real_price)}}</h1>
                @if(Auth::check())
                    <a href="javascript:void(0)" id="mobile_cart"> Add to Cart </a>
                @else
                    <a href="/login" id="mobile_cart">Login</a>
                @endif
            </div>
        </div>

        </div>
    </div>

    <div class="course_content_contents">
        <div class="course_content_what_you_learn">
            <div class="course_content_what_you_learn_body">
                <h1>What you'll learn</h1>
                <div class="course_content_what_you_learn_body_grid">
                    @foreach ($what_you_learn as $what_you_learn)
                        <p><span><i class="fa-solid fa-check-double"></i></span>{{$what_you_learn}}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="course_content_requirements">
            <div class="course_content_requirements">
                <h1>Requirements</h1>
                <ul>
                    @foreach ($requirement as $requirement)
                    <li>
                        {{$requirement}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>



        <div class="course_content_requirements">
            <div class="course-info-right-demo-video">
                <h1>Demo Video</h1>
                {{-- <video src="" autoplay controls></video> --}}
                @if($course->source == "mp4")
                <video id="player" playsinline controls data-poster="{{asset('course/'.$course->image)}}">
                 <source src="{{asset('video/'.$course->video->video)}}" type="video/mp4" />
               </video>
               @elseif($course->source == "vm")
               <div class="plyr__video-embed" playsinline controls id="player">
                 <iframe
                 src="{{$course->url}}"
                   allowfullscreen
                   allowtransparency
                   allow="autoplay"
                 ></iframe>
               </div>
                @else
                <div class="plyr_video-embed" playsinline controls id="player">
                      <iframe  name="iframe" src="{{$course->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 </div>
                @endif
            </div>
        </div>


        <div class="course_content_requirements">
            <div class="course_content_what_to_learn">
                <div class="course_contents_hedline">
                    <h1>Lessons in This Class</h1>
                    <p>5 Lessons (5hrs)</p>
                </div>
                <div class="course_contents">
                    <div class="course_contents_body">
                        <ion-icon name="lock-closed-outline" style="padding-right: 15px; font-size: 18px; padding-top: 3px;"></ion-icon>
                        <p style="padding-right: 5px; font-size: 17px; padding-top: 2px;"> 1. </p>
                        <h4 style="font-size: 17px; font-weight: 600;">Introduction</h4>
                    </div>
                    <p>1:44</p>
                </div>


                <div class="course_contents">
                    <div class="course_contents_body">
                        <ion-icon name="lock-closed-outline" style="padding-right: 15px; font-size: 18px; padding-top: 3px;"></ion-icon>
                        <p style="padding-right: 5px;  font-size: 18px;"> 2. </p>
                        <h4 style="font-size: 18px; font-weight: 600;">Seven Steps To becoming a billionaire</h4>
                    </div>
                    <p>10:54</p>
                </div>


                <div class="course_contents">
                    <div class="course_contents_body">
                        <ion-icon name="lock-closed-outline" style="padding-right: 15px; font-size: 18px; padding-top: 3px;"></ion-icon>
                        <p style="padding-right: 5px; font-size: 18px;"> 3. </p>
                        <h4 style="font-size: 18px; font-weight: 600;">Gods Wealth</h4>
                    </div>
                    <p>5:24</p>
                </div>


                <div class="course_contents">
                    <div class="course_contents_body">
                        <ion-icon name="lock-closed-outline" style="padding-right: 15px; font-size: 18px; padding-top: 3px;"></ion-icon>
                        <p style="padding-right: 5px; font-size: 18px;"> 4. </p>
                        <h4 style="font-size: 18px; font-weight: 600;">Maintaining God's Wealth</h4>
                    </div>
                    <p>6:37</p>
                </div>


                <div class="course_contents">
                    <div class="course_contents_body">
                        <ion-icon name="lock-closed-outline" style="padding-right: 15px; font-size: 18px; padding-top: 3px;"></ion-icon>
                        <p style="padding-right: 5px; font-size: 18px;"> 5. </p>
                        <h4 style="font-size: 18px; font-weight: 600;">Financial Breakthrough</h4>
                    </div>
                    <p>1:44</p>
                </div>

            </div>
            <p class="see_all">See All Lessons</p>
        </div>



        <div class="course_content_requirements">
            <div class="course_content_requirements">
                <div class="description_body">
                    <h1>Description</h1>
                    <div style="text-align: left">
                        {!! htmlspecialchars_decode(nl2br($course->description)) !!}
                    </div>
                </div>
                <a class="more"> </a>
            </div>
        </div>


        <div class="course_content_requirements">
            <div class="course_content_requirements">
                <h1>Who this course is for:</h1>
                <ul>
                    @foreach ($audience as $audience)
                    <li>
                        {{$audience}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <div class="course_content_requirements">
            <div class="course_content_requirements">
                <h1>Instructor</h1>
                <div class="instructor">
                    <h3 style="color: rgb(255, 8, 58); text-decoration: underline;">{{$course->course->name}}</h3>
                </div>
                <div class="instruction_profile">
                    <div class="instruction_image">
                        <img src="{{ asset('image/'.$course->course->passport) }}">
                    </div>
                    <div class="instruction_profile_body">
                        <p><span><i class="fa-solid fa-star"></i></span> 4.4 Instructor Rating</p>
                        <p><span><i class="fa-solid fa-award" style="padding-right: 5px;"></i></span> 74,429 Reviews</p>
                        <p><span><i class="fa-solid fa-users"></i></span> 900,672 Students</p>
                        <p><span><i class="fa-solid fa-circle-play"></i></span> 16 Courses</p>
                    </div>
                </div>
                <div class="description_body">
                    @if($course->about != '')
                    <p>
                        {!! htmlspecialchars_decode(nl2br($course->about->describe)) !!}
                    </p>
                    @else
                        <p>About Instructor Not Avaliable</p>
                    @endif
                </div>
                <a class="more"> </a>
            </div>
        </div>


        <div class="course_content_requirements">
            <div class="course_content_requirements review">
                <h1 style="font-size: 28px; font-weight: 600;">Reviews:</h1>
                <div class="all-review-grid">
                @foreach ($review as $review)

                <div class="review_row" style="margin-top: 20px;">
                    <div class="review_row_right">
                        {{-- <img src="{{ asset('image/'.Auth::user()->passport) }}" style="border: solid 1px #efefef;" width="50px"> --}}
                        <h3>@php
                            $f= $review->user->name;
                            $n = preg_split("/\s+/", $f);
                            $acrony = "";
                            foreach ($n as $wf) {
                                $acrony .= $wf[0];
                            }
                            echo substr($acrony, 0, 2);
                       @endphp</h3>
                    </div>
                    <div class="review_row_left">
                        <h3>{{$review->user->name}}.</h3>
                        <p>
                            <span>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </span>

                            @php
                                $date_string = $review->created_at;
                                echo date("W", strtotime($date_string)) . "weeks(s) ago";
                            @endphp
                            <h5>{{$review->title}}</h5>
                            <p>{{$review->content}}</p>
                        </p>
                        {{-- <span>Helpful?</span>
                        <a href=""><i class="fa-regular fa-thumbs-up" style="font-size: 14px;"></i></a>
                        <a href=""><i class="fa-regular fa-thumbs-down" style="font-size: 14px;"></i></a> --}}
                    </div>
                </div>
                @endforeach

            </div>
            </div>
        </div>

        <div class="course_content_requirements">
            <div class="course_content_requirements">
                <h1>More Courses by <span style="font-weight: 600; color:#FF083A;"><b>{{$course->course->name}}</b></span></h1>
                <div class="more-courses-grid">

                    @foreach ($more_course  as $more_course)
                    <div class="more-courses-grid-body">

                        <div class="more-courses-grid-body-image">
                            <a href="/main/course/{{Crypt::encrypt($more_course->id)}}">
                                <img src="{{ asset('/course/'.$more_course->image)}}">
                            </a>
                        </div>
                        <div class="more-courses-grid-body-contents">
                        <a href="/main/course/{{Crypt::encrypt($more_course->id)}}">
                            <h2>{{$more_course->title}}</h2>
                        </a>
                            <p>A Course By: {{$more_course->course->name}}</p>
                            <h2> &#8358;{{number_format($more_course->real_price)}}</h2>
                        </div>
                    </div>

                    <hr style="display: none;">
                    @endforeach


                </div>
            </div>
        </div>


        <div class="course_content_sticky_right" id="course_content_sticky_right">
            {{-- <div class="plyr_video-embed"  id="player">
                <iframe style="width: 100%;" height="220" src="https://www.youtube.com/embed/jD-cb2drhh0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> --}}
            <div class="course_content_sticky_right_body">
                <h1 style="margin-bottom: 20px;">&#8358;{{number_format($course->real_price, 0)}}</h1>
                 @if(Auth::check())
                    @if($enrolled_course !='')
                        <a href="javascript:void(0)" class="course_content_sticky_right_body_button">Lessons</a>
                        <div class="sticky_buttons" style="margin-top: 40px">
                            <a href="javascript:void(0)" class="course_content_sticky_right_body_button_two" onclick="togglePopup()">Review</a>
                        </div>

                    @else
                        <a href="javascript:void(0)" class="course_content_sticky_right_body_button" id="cart">Add to Cart</a>
                        <div class="sticky_buttons" style="margin-top: 40px">
                        <a href="" class="course_content_sticky_right_body_button_two">Buy Course</a>
                        </div>
                        <form>
                       @csrf
                       <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
                       <input type="hidden" id="course_id" value="{{$course->id}}">
                       <input type="hidden" id="course_title" value="{{$course->title}}">
                       <input type="hidden" id="course_price" value="{{$course->real_price}}">
                       <input type="hidden" id="ini_price" value="{{$course->ini_price}}">
                        </form>
                    @endif

                 @else
                    <div class="sticky_buttons" style="margin-top: 40px">
                        <a href="/login" class="course_content_sticky_right_body_button_three">Get Started Now</a>
                    </div>
                 @endif
                 <div style="margin-top: 20px; font-size: 16px; color: #5e5e5e; display: flex; align-items: center;">
                    <i class="ri-lock-unlock-line"></i>
                    <span>Full Lifetime Access</span>
                </div>

                <div style="margin-top: 12px; font-size: 16px; color: #5e5e5e; display: flex; align-items: center;">
                    <i class="ri-user-line"></i>
                    <span>{{$enrolled_course_number}} Students</span>
                </div>

                <div style="margin-top: 12px; font-size: 16px; color: #5e5e5e; display: flex; align-items: center;">
                    <i class="ri-award-fill"></i>
                    <span>Certificate of Completion</span>
                </div>


                <div style="margin-top: 12px; font-size: 16px; color: #5e5e5e; display: flex; align-items: center;">
                    <i class="ri-user-line"></i>
                    <span>{{$lessons}} Lessons</span>
                </div>
                <div id="share"></div>
            </div>
        </div>

    </div>

    <div class="course_content_requirements">
        <div class="course_content_requirements sticky_footer">
            <div class="sticky_footer_content">
                <p>&#8358;{{number_format($course->real_price)}}</p>
                <a href="javascript:void(0)" id="buy_now">Buy Now</a>
            </div>
        </div>
    </div>
</section>









@endsection


@section('scripts')
<script src="{{ asset('js/jssocials.js') }}"></script>
<script>
    let more = document.querySelectorAll('.more');

    for(let i = 0; i<more.length; i++){
        more[i].addEventListener('click', function(){
            more[i].parentNode.classList.toggle('activate');
        })
    }


    let see_all = document.querySelectorAll('.see_all');

    for(let i = 0; i<see_all.length; i++){
    see_all[i].addEventListener('click', function(){
        see_all[i].parentNode.classList.toggle('see_all_activate');
    })
    }
</script>
<script>
    $(document).ready(function () {
        let cart_error = $('#cart_error')
        let cart = $('#cart');
        let course_id = $('#course_id').val();
        let user_id = $('#user_id').val();
        let course_title = $('#course_title').val();
        let course_price = $('#course_price').val();
        let ini_price = $('#ini_price').val();

        $('#cart').click(function(){
           if(course_id =='' || user_id =='' || course_title=='' ||course_price==''){
                toastr.warning("Mising Parameters", 'Error!', {timeOut: 5000});
           }else{
            $.ajax({
                method: "POST",
                url: "/main/add-to-cart",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'user_id': user_id,
                    'course_id': course_id,
                    'course_title': course_title,
                    'course_price': course_price,
                    'ini_price': ini_price,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'Course Added to Cart Successfully!'){
                        toastr.success('Course Added to Cart Successfully!', 'Success!', {timeOut: 7000});
                        $.ajax({
                                type: "GET",
                                url: "/main/count-cart",
                                success: function(response){
                                 $("#cart_count").text(response);
                                //    alert(response)
                                }
                        })
                    }else{
                        toastr.warning(response, 'Error!', {timeOut: 5000});
                     }
                }
            });
           }
        })


        $('#mobile_cart').click(function(){
           if(course_id =='' || user_id =='' || course_title=='' ||course_price==''){
                toastr.warning("Mising Parameters", 'Error!', {timeOut: 5000});
           }else{
            $.ajax({
                method: "POST",
                url: "/main/add-to-cart",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'user_id': user_id,
                    'course_id': course_id,
                    'course_title': course_title,
                    'course_price': course_price,
                    'ini_price': ini_price,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'Course Added to Cart Successfully!'){
                        toastr.success('Course Added to Cart Successfully!', 'Success!', {timeOut: 7000});
                        $.ajax({
                                type: "GET",
                                url: "/main/count-cart",
                                success: function(response){
                                 $("#cart_count").text(response);
                                //    alert(response)
                                }
                        })
                    }else{
                        toastr.warning(response, 'Error!', {timeOut: 5000});
                     }
                }
            });
           }
        })

        $('#buy_now').click(function(){
           if(course_id =='' || user_id =='' || course_title=='' ||course_price==''){
                toastr.warning("Mising Parameters", 'Error!', {timeOut: 5000});
           }else{
            $.ajax({
                method: "POST",
                url: "/main/add-to-cart",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'user_id': user_id,
                    'course_id': course_id,
                    'course_title': course_title,
                    'course_price': course_price,
                    'ini_price': ini_price,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'Course Added to Cart Successfully!'){
                        toastr.success('Course Added to Cart Successfully!', 'Success!', {timeOut: 7000});
                        $.ajax({
                                type: "GET",
                                url: "/main/count-cart",
                                success: function(response){
                                 $("#cart_count").text(response);
                                //    alert(response)
                                }
                        })
                    }else{
                        toastr.warning(response, 'Error!', {timeOut: 5000});
                     }
                }
            });
           }
        })
    })
</script>


{{-- <script>
    $(document).ready(function () {
        let cart_error = $('#cart_error')
        let mobile_cart = $('#mobile_cart ');
        let course_id = $('#course_id').val();
        let user_id = $('#user_id').val();
        let course_title = $('#course_title').val();
        let course_price = $('#course_price').val();
        let ini_price = $('#ini_price').val();

        $('#mobile_cart').click(function(){
           if(course_id =='' || user_id =='' || course_title=='' ||course_price==''){
                toastr.warning("Mising Parameters", 'Error!', {timeOut: 5000});
           }else{
            $.ajax({
                method: "POST",
                url: "/main/add-to-cart",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'user_id': user_id,
                    'course_id': course_id,
                    'course_title': course_title,
                    'course_price': course_price,
                    'ini_price': ini_price,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'Course Added to Cart Successfully!'){
                        toastr.success('Course Added to Cart Successfully!', 'Success!', {timeOut: 7000});
                        $.ajax({
                                type: "GET",
                                url: "/main/count-cart",
                                success: function(response){
                                 $("#cart_count").text(response);
                                //    alert(response)
                                }
                        })
                    }else{
                        toastr.warning(response, 'Error!', {timeOut: 5000});
                     }
                }
            });
           }
        })
    })
</script> --}}

{{-- JS Socials --}}
<script>
    $("#share").jsSocials({
        shares: ["twitter",
        { share: "facebook", label: "Like our Page"},
        { share: "whatsapp", label: "Send a Message"},
        ]
    })
</script>
{{-- Js Socials --}}

<script>
    function togglePopup(){
        document.getElementById("popup-1").classList.toggle("p_active");
    }
</script>

<script>
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
            let title = $("#input2").val();
            let content = $("#input3").val();
            let course = $("#course").val();
            $.ajax({
            method: "POST",
            url: "/main/add-course-review",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                'title': title,
                'content': content,
                'course': course,
            },

            success: function (response){
                // alert(response);
            if(response == 'Review Submitted Awaiting Approval!'){
                toastr.success(response, 'Success!', {timeOut: 7000});
                $("#form").get(0).reset();
            }else{
                toastr.warning(response, 'Error!', {timeOut: 5000});
            }
            }
            });
        });
    });
</script>
@endsection
