@extends('main.index')

@section('title')

@endsection

@section('content')

<section class="ebook_content">
    <div class="ebook-right-info">
        <div class="ebook-right-info-body">
            <div class="ebook-right-info-flex">
                <p>Ebook</p>
                <p>{{$ebook->pages}} Page(s)</p>
                <p>Average Read Time: {{$ebook->av_read_time}} Hours</p>
            </div>
            <h1>
                {{$ebook->title}}
            </h1>
            <p style="font-size: 17px;">By <span style="font-weight: 600; text-decoration: underline; cursor: pointer;">{{$ebook->user->name}}</span></p>
            <div class="ebook-right-info-rating-flex" style="margin-top: 20px;">
                <div class="rating-container" style="display: flex; align-items:center;">
                    <i class="fa-solid fa-star" style="padding-right: 5px; color: rgb(231, 166, 0);"></i>
                    <i class="fa-solid fa-star" style="padding-right: 5px; color: rgb(231, 166, 0);"></i>
                    <i class="fa-solid fa-star" style="padding-right: 5px; color: rgb(231, 166, 0);"></i>
                    <i class="fa-solid fa-star" style="padding-right: 5px; color: rgb(231, 166, 0);"></i>
                    <i class="fa-solid fa-star" style="padding-right: 5px; color: rgb(231, 166, 0);"></i>
                    <p style="padding-left: 5px; font-size: 18px">4.5/5</p>
                </div>
                <p style="padding-left: 5px; font-size: 18px">(<span style="font-weight: 600;">454 ratings</span>)</p>
            </div>

            <div class="course_content_requirements">
                <div class="course_content_requirements">
                    <div class="description_body">
                        <h1>About</h1>
                        <div style="text-align: left">
                            {!! htmlspecialchars_decode(nl2br($ebook->description)) !!}
                        </div>
                    </div>
                    <a class="more"> <i class="fa-solid fa-angle-down"></i></a>
                </div>
            </div>

            <div class="course_content_requirements">
                <div class="course_content_requirements">
                    <h1 style="font-size: 28px;
                    font-weight: 600;">Author</h1>
                    <div class="instructor">
                        <h3 style="color: rgb(255, 8, 58); text-decoration: underline;">{{$ebook->user->name}}</h3>
                    </div>
                    <div class="instruction_profile">
                        <div class="instruction_image">
                            <img src="{{ asset('assets/images/profile image.jpg') }}">
                        </div>
                        <div class="instruction_profile_body">
                            <p><span><i class="fa-solid fa-star"></i></span> 4.4 Instructor Rating</p>
                            <p><span><i class="fa-solid fa-award" style="padding-right: 5px;"></i></span> 74,429 Reviews</p>
                            <p><span><i class="fa-solid fa-users"></i></span> 900,672 Students</p>
                            <p><span><i class="fa-solid fa-circle-play"></i></span> 16 Courses</p>
                        </div>
                    </div>
                    <div class="description_body">
                        {!! htmlspecialchars_decode(nl2br($ebook->user_details->describe)) !!}
                    </div>
                    <a class="more"> <i class="fa-solid fa-angle-down"></i></a>
                </div>
            </div>

            <div class="course_content_requirements">
                <div class="course_content_requirements review">
                    <h1 style="font-size: 28px; font-weight: 600;">Reviews:</h1>
                    <div class="all-review-grid">
                    @foreach ($review as $review)

                    <div class="review_row" style="margin-top: 20px;">
                        <div class="review_row_right">
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
                                2 weeks ago
                                <h5>{{$review->title}}</h5>
                                <p>{{$review->content}}</p>
                            </p>
                            <span>Helpful?</span>
                            <a href=""><i class="fa-regular fa-thumbs-up" style="font-size: 14px;"></i></a>
                            <a href=""><i class="fa-regular fa-thumbs-down" style="font-size: 14px;"></i></a>
                        </div>
                    </div>
                    @endforeach

                </div>
                </div>
            </div>

            <div class="course_content_requirements">
                <div class="course_content_requirements">
                    <h2 style="margin-bottom: 20px; ">Other E-books by <span style="font-weight: 500; color:#FF083A;"><b>{{$ebook->user->name}}</b></span></h2>
                    <div class="more-courses-grid">
                        @foreach ($related_ebook  as $related_ebook )
                        <div class="more-courses-grid-body">

                            <div class="more-courses-grid-body-image">
                                <a>
                                    @foreach ($ebook_image as $e_img)
                                        @if($related_ebook->id === $e_img->ebook_id)
                                            <img src="{{ asset('course/'.$e_img->ebook_image)}}" >
                                        @else
                                     {{-- <img src="#" alt="Course Image"> --}}
                                    @endif
                                    @endforeach
                                </a>
                            </div>
                            <div class="more-courses-grid-body-contents">
                            <a href="#">
                                <h2>T{{ Str::limit($related_ebook->title, 50, '...') }}</h2>
                            </a>
                                <p>A Course By: {{$related_ebook->user->name}}</p>
                                <h2> &#8358;{{number_format($related_ebook->real_price, 0)}}</h2>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>


        {{-- <div class="book-preview">
            <h1 style="margin-bottom: 20px; font-size: 28px;">Book Preview</h1>
            <iframe src=
"https://media.geeksforgeeks.org/wp-content/cdn-uploads/20210101201653/PDF.pdf"
                width="1000"
                height="1000"></iframe>
        </div> --}}
        </div>





        <div class="course_content_sticky_right" id="course_content_sticky_right">
            {{-- <div class="plyr_video-embed"  id="player">
                <iframe style="width: 100%;" height="220" src="https://www.youtube.com/embed/jD-cb2drhh0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> --}}
            <div class="course_content_sticky_right_body">
                <h1 style="margin-bottom: 20px;">&#8358;{{number_format($ebook->real_price, 0)}}</h1>
                @if(Auth::check())
                <a href="javascript:void(0)" class="course_content_sticky_right_body_button" id="cart">Add to Cart</a>
                <div class="sticky_buttons" style="margin-top: 40px">
                    <a href="" class="course_content_sticky_right_body_button_two">Buy Course</a>
                </div>
                <form>
                   @csrf
                   <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
                   <input type="hidden" id="course_id" value="{{$ebook->id}}">
                   <input type="hidden" id="course_title" value="{{$ebook->title}}">
                   <input type="hidden" id="course_price" value="{{$ebook->real_price}}">
                   <input type="hidden" id="ini_price" value="{{$ebook->ini_price}}">
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


</section>
<div class="course_content_requirements">
    <div class="course_content_requirements sticky_footer">
        <div class="sticky_footer_content">
            <p>&#8358;24,000</p>
            <a href="">Buy Now</a>
        </div>
    </div>
</div>


@endsection

@section('scripts')


<script>
    $(document).ready(function () {
        // let cart_error = $('#cart_error')
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
                url: "/main/add-ebook-to-cart",
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
                    if(response == 'E-Book Added to Cart Successfully!'){
                        toastr.success('E-Book Added to Cart Successfully!', 'Success!', {timeOut: 7000});
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
    let more = document.querySelectorAll('.more');

    for(let i = 0; i<more.length; i++){
        more[i].addEventListener('click', function(){
            more[i].parentNode.classList.toggle('activate');
        })
    }


//     let see_all = document.querySelectorAll('.see_all');

// for(let i = 0; i<see_all.length; i++){
//     see_all[i].addEventListener('click', function(){
//         see_all[i].parentNode.classList.toggle('see_all_activate');
//     })
// }

function myFunction() {
  if (document.body.scrollTop > 1500 || document.documentElement.scrollTop > 1500) {
    document.getElementById("course_content_sticky_right").style.visibility = "hidden";
  }
  else {
    document.getElementById("course_content_sticky_right").style.visibility  = "visible";
  }
}


</script>

{{-- JS Socials --}}
<script src="{{ asset('js/jssocials.js') }}"></script>
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




