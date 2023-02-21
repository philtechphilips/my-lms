@extends('studentLearning.index')


@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600; font-size: 15px;">E-Books Deatails/Rating</h3>
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

                <div class="popup" id="popup-1">
                    <div class="n_overlay"></div>
                    <div class="content">
                        <div class="close-btn" onclick="togglePopup()">&times;</div>
                        <div class="container auth-form">
                            <form method="POST" id="form" class="form" autocomplete="off">
                                @csrf
                                <div class="form-heading">
                                    <h1>Give us a Feedback About The E-Book</h1>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="input-active" id="input2" onchange="Form()" name="title" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="title" id="placeholder2" class="i_active">Title</label>

                                    <input type="hidden" id="ebook" value="{{$ebook->id}} ">
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

            <div class="ebook-right-info-rating-flex" style="margin-top: 10px; margin-bottom: 30px;">
                <a href="/dashboard/read-ebook/{{$cart->id}}" target="_blank"  class="btn-1">Read Online</a>
                <a href="#" class="btn-2">Download</a>
                <a href="javasript:void(0)" class="btn-3" onclick="togglePopup()">Rate Now</a>
            </div>


        </div>

        <div class="ebook-right-info-body-right">
            <img src="{{asset('ebook/'.$ebook->image)}}" width="300">
        </div>
    </div>


</section>
            </div>
        </div>
    </div>




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

<script>
    function togglePopup(){
        document.getElementById("popup-1").classList.toggle("p_active");
    }
</script>

{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
 toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
{{-- Toastr --}}
<script>
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
            let title = $("#input2").val();
            let content = $("#input3").val();
            let ebook = $("#ebook").val();
            $.ajax({
            method: "POST",
            url: "/main/add-ebook-review",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                'title': title,
                'content': content,
                'ebook': ebook,
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

<script>
$(document).ready(function () {
    $("#rating-star-1").hover(function(){
        $(this).html("<i class='ri-star-fill'></i>");
    },function(){
        $(this).html("<i class='ri-star-line'></i>");
    });

    $("#rating-star-2").hover(function(){
        $(this).html("<i class='ri-star-fill'></i>");
    },function(){
        $(this).html("<i class='ri-star-line'></i>");
    });


    $("#rating-star-3").hover(function(){
        $(this).html("<i class='ri-star-fill'></i>");
    },function(){
        $(this).html("<i class='ri-star-line'></i>");
    });

    $("#rating-star-4").hover(function(){
        $(this).html("<i class='ri-star-fill'></i>");
    },function(){
        $(this).html("<i class='ri-star-line'></i>");
    });

    $("#rating-star-5").hover(function(){
        $(this).html("<i class='ri-star-fill'></i>");
    },function(){
        $(this).html("<i class='ri-star-line'></i>");
    });
});
</script>
@endsection
