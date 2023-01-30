@extends('main.index')

@section('title')

@endsection

@section('content')


<section class="course_content">
    <div class="course_content_banner">
         <div class="course_content_banner_header" id="">
            <div class="course_content_right_links">
                <a href="" style="padding-right: 5px;">{{$course->school}}
                </a>
                <i class="fa-solid fa-angle-right" style="color: #fff"></i>
                <a href="" style="padding-left: 5px;">{{$course->title}}</a>
            </div>
            <h1>{{$course->title}}</h1>
            <p>{{ Str::limit($course->title, 55)}} | {{$course->school}} | Becoming A Billionaire</p>
            <div class="course_content_right_ratings" style="display: flex;">
                <p>4.7
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <a href="" style="color: rgb(255, 8, 58);">(1,327) ratings</a>
                        <a> 3498 Students</a>
                </p>
            </div>

            <div class="course_content_right_bottom">
                <p>Created By {{$course->course->name}}</p>
                <p><i class="fa-solid fa-upload"></i>
                    <span>
                        <a>Last Updated {{$course->updated_at}}</a>
                    </span>
                </p>

                <p><i class="fa-solid fa-earth-americas"></i>
                    <span>
                        <a>English</a>
                    </span>
                </p>

            </div>

            <div class="course_content_header_cta">
                <h1 style="font-weight: 600; padding-bottom: 10px">&#x20A6;20,000</h1>
                <a href="#" id="mobile_cart"> Add to Cart </a>
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
                    <li>
                        Willingness to take the course
                    </li>
                    <li>
                        Dedicated time for the course
                    </li>
                </ul>
            </div>
        </div>



        <div class="course_content_requirements">
            <div class="course-info-right-demo-video">
                <h1>Demo Video</h1>
                {{-- <video src="" autoplay controls></video> --}}
                <div class="plyr_video-embed" id="player">
                    <iframe width="800" height="500" src="https://www.youtube.com/watch?v=HR1VG8L7iGU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
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
                <a class="more"> <i class="fa-solid fa-angle-down"></i></a>
            </div>
        </div>


        <div class="course_content_requirements">
            <div class="course_content_requirements">
                <h1>Who this course is for:</h1>
                <ul>
                    <li>Those who are wishing to become billionaires.</li>
                    <li>Those Who want to learn how to get wealth from God.</li>
                    <li>Those who want to learn how to maintain their finance</li>
                </ul>
            </div>
        </div>


        <div class="course_content_requirements">
            <div class="course_content_requirements">
                <h1>Instructors</h1>
                <div class="instructor">
                    <h3 style="color: rgb(255, 8, 58); text-decoration: underline;">Temidara Matthew</h3>
                </div>
                <div class="instruction_profile">
                    <div class="instruction_image">
                        <img src="{{ asset('assets/images/281449169_3219140161738409_6693812234263747743_n.jpg') }}">
                    </div>
                    <div class="instruction_profile_body">
                        <p><span><i class="fa-solid fa-star"></i></span> 4.4 Instructor Rating</p>
                        <p><span><i class="fa-solid fa-award" style="padding-right: 5px;"></i></span> 74,429 Reviews</p>
                        <p><span><i class="fa-solid fa-users"></i></span> 900,672 Students</p>
                        <p><span><i class="fa-solid fa-circle-play"></i></span> 16 Courses</p>
                    </div>
                </div>
                <div class="description_body">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos, ratione quae incidunt recusandae nam molestias rerum quibusdam aliquid esse nisi voluptatibus, accusantium adipisci minus quam expedita accusamus nulla. A, temporibus.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse neque quos autem quam magnam nobis enim, fugiat impedit iusto quae repudiandae quo perspiciatis doloribus animi itaque natus ut ea? Accusamus?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi nulla autem commodi, eius sunt voluptate omnis. Voluptates, pariatur. Error optio deserunt esse alias a atque minima veritatis nobis dolorum?
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla esse porro quia sed distinctio dolore enim, laboriosam dolorem, error corporis in iste numquam quisquam. Neque aut rerum temporibus harum aliquam.
                    </p>
                </div>
                <a class="more"> <i class="fa-solid fa-angle-down"></i></a>
            </div>
        </div>


        <div class="course_content_requirements">
            <div class="course_content_requirements review">
                <h1>Reviews:</h1>
                <div class="review_row">
                    <div class="review_row_right">
                        <h3>OS</h3>
                    </div>
                    <div class="review_row_left">
                        <h3>OLA S.</h3>
                        <p>
                            <span>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            2 weeks ago
                            <p>I have been greatly blessed after taking this course, my life has been greatly transformed.</p>
                        </p>
                        <a href=""><i class="fa-regular fa-thumbs-up"></i></a>
                        <a href=""><i class="fa-regular fa-thumbs-down"></i></a>
                    </div>
                </div>
                <hr style="opacity: .3; margin-top: 15px; margin-bottom: 15px;">



                <div class="review_row">
                    <div class="review_row_right">
                        <h3>OS</h3>
                    </div>
                    <div class="review_row_left">
                        <h3>OLA S.</h3>
                        <p>
                            <span>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            2 weeks ago
                            <p>I have been greatly blessed after taking this course, my life has been greatly transformed.</p>
                        </p>
                        <a href=""><i class="fa-regular fa-thumbs-up"></i></a>
                        <a href=""><i class="fa-regular fa-thumbs-down"></i></a>
                    </div>
                </div>
                <hr style="opacity: .3; margin-top: 15px; margin-bottom: 15px;">


                <div class="review_row">
                    <div class="review_row_right">
                        <h3>OS</h3>
                    </div>
                    <div class="review_row_left">
                        <h3>OLA S.</h3>
                        <p>
                            <span>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            2 weeks ago
                            <p>I have been greatly blessed after taking this course, my life has been greatly transformed.</p>
                        </p>
                        <a href=""><i class="fa-regular fa-thumbs-up"></i></a>
                        <a href=""><i class="fa-regular fa-thumbs-down"></i></a>
                    </div>
                </div>
                <hr style="opacity: .3; margin-top: 15px; margin-bottom: 15px;">


                <div class="review_row">
                    <div class="review_row_right">
                        <h3>OS</h3>
                    </div>
                    <div class="review_row_left">
                        <h3>OLA S.</h3>
                        <p>
                            <span>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            2 weeks ago
                            <p>I have been greatly blessed after taking this course, my life has been greatly transformed.</p>
                        </p>
                        <a href=""><i class="fa-regular fa-thumbs-up"></i></a>
                        <a href=""><i class="fa-regular fa-thumbs-down"></i></a>
                    </div>
                </div>
                <hr style="opacity: .3; margin-top: 15px; margin-bottom: 15px;">


            </div>
        </div>


        <div class="course_content_requirements">
            <div class="course_content_requirements">
                <h1>More Courses by <span style="font-weight: 600; color:#FF083A;"><b>Temidara Matthew</b></span></h1>
                <div class="more-courses-grid">

                    <div class="more-courses-grid-body">

                        <div class="more-courses-grid-body-image">
                            <a>
                                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                            </a>
                        </div>
                        <div class="more-courses-grid-body-contents">
                        <a href="#">
                            <h2>The Billionaire Master Class (Finance)</h2>
                        </a>
                            <p>A Course By: Temidara Matthew</p>
                            <h2> &#8358;3,500</h2>
                        </div>
                    </div>

                    <hr style="display: none;">

                    <div class="more-courses-grid-body">

                        <div class="more-courses-grid-body-image">
                            <a>
                                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                            </a>
                        </div>
                        <div class="more-courses-grid-body-contents">
                        <a href="#">
                            <h2>The Billionaire Master Class (Finance)</h2>
                        </a>
                            <p>A Course By: Temidara Matthew</p>
                            <h2> &#8358;3,500</h2>
                        </div>
                    </div>

                    <hr style="display: none;">

                    <div class="more-courses-grid-body">

                        <div class="more-courses-grid-body-image">
                            <a>
                                <img src="{{ asset('assets/images/billionaire.jpg')}}">
                            </a>
                        </div>
                        <div class="more-courses-grid-body-contents">
                        <a href="#">
                            <h2>The Billionaire Master Class (Finance)</h2>
                        </a>
                            <p>A Course By: Temidara Matthew</p>
                            <h2> &#8358;3,500</h2>
                        </div>
                    </div>
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
                 @else
                    <div class="sticky_buttons" style="margin-top: 40px">
                        <a href="/login" class="course_content_sticky_right_body_button_three">Get Started Now</a>
                    </div>
                 @endif
                <p style="margin-top: 20px; text-align: center;">Full Lifetime Access</p>
                <div id="share"></div>
            </div>
        </div>

    </div>

    <div class="course_content_requirements">
        <div class="course_content_requirements sticky_footer">
            <div class="sticky_footer_content">
                <p>&#8358;24,000</p>
                <a href="">Buy Now</a>
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
    })
</script>


<script>
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
</script>

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
@endsection
