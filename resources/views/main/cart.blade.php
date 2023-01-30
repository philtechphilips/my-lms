@extends('main.index')

@section('title')


@endsection


@section('content')

    <section class="cart">
      <div class="shopping_cart_header">
        <div class="shopping-cart-links">
            <p style="padding-right: 5px; font-weight: 500 !important;">Home</p>
            <i class="fa-solid fa-angle-right"></i>
            <p style="padding-left: 5px; font-weight: 500 !important;">Shopping Cart</p>
        </div>
        <h1>
            Shopping Cart
         </h1>
      </div>

<div class="shopping-cart">
    <p style="font-size: 18px; margin-bottom: -30px;">{{$cart_count}} Course(s) in Shopping Cart</p>
      <div class="shopping_cart_body">
        <div class="shopping_cart_body_left" style="flex-direction: column;">
            @if($cart_count == 0)
                <div style="background-color: #8F0000; padding: 10px 0 10px 10px; color: #fff;">
                    EMPTY CART!
                </div>
            @else
            @foreach ($cart as $cart)
                <div style="display: flex;">
                <div class="shopping_cart_body_left_images">
                    <img src="{{ asset('course/'.$cart->image) }}" width="100" height="100">
                {{-- @foreach ($courses_image as $image)
                    @if($image->course_id == $cart->course_id)
                         <img src="{{ asset('course/'.$image->course_image) }}" width="100" height="100">
                    @endif
                @endforeach --}}
                </div>
                <div class="shopping_cart_body_left_text">
             <div class="shopping_cart_body_left_text_heading">
                 <a href="">
                     <h1>
                         {{$cart->course_title}}
                     </h1>
                 </a>
                 <a href="javascript:void(0)" class="remove" onclick="deleteStudent({{$cart->id}})" style="margin-right: 30px">
                     Remove
                     <form style="display: none">
                        @csrf
                     </form>
                 </a>
                 <p class="money" style="color: rgb(180, 0, 0); font-weight: 700; font-size: 18px;"> ₦{{number_format($cart->course_price, 0)}}</p>
             </div>
             <a href="javascript:void(0)" class="school">
                @foreach ($courses as $school)
                    @if($school->id == $cart->course_id)
                            {{$school->school}}
                    @endif
                @endforeach
             </a>
             <div class="shopping-cart-video-info">
                 <p>
                    @foreach ($courses as $school)
                        @if($school->id == $cart->course_id)
                            {{$school->hour . '.' . $school->minute}}
                        @endif
                    @endforeach
                     Total Hours
                  </p>
             </div>
             </div>
                </div>
                <div style="border: solid 1px rgb(241, 241, 241); margin: 10px 0;"></div>
            @endforeach
            @endif
        </div>

        <div class="shopping_cart_body_right">
            <div class="shopping_cart_body_right_body">
                <p style="font-weight: 600">Total:</p>
                <h1>&#8358; {{number_format($cart_sum)}}</h1>
                <div class="price_offer">
                    <p style="font-weight: 600; ">Original Price</p>
                    <p style="font-weight: 600; color: rgb(180, 0, 0);">&#8358; {{number_format($cart_sum, 0)}}</p>
                </div>
                <hr style="color: #efefef; opacity: .3; margin: 10px 0px">
                <div class="price_offer">
                    <p style="font-weight: 600; ">Discount Offer</p>
                    <p style="font-weight: 400; color: rgb(180, 0, 0); text-decoration: line-through;">-&#8358;@php
                        $discount = $cart_ini_sum - $cart_sum;
                    @endphp
                    {{ number_format($discount, 0) }}
                    </p>
                </div>
                <hr style="color: #efefef; opacity: .3; margin: 10px 0px">
                <div class="price_offer">
                    <p style="font-weight: 600; ">Discount Percent</p>
                    <p style="font-weight: 600; color: rgb(180, 0, 0);">
                        @php
                            if ($cart_sum == 0) {
                                $p_percent = 0;
                            }else {
                                $p_percent = ($cart_sum / $cart_ini_sum) * 100;
                            }
                        @endphp
                            {{ round($p_percent, 0) }}%
                    </p>
                </div>
                <hr style="color: #efefef; opacity: .3; margin: 10px 0px">
                <div class="price_offer" style="margin-bottom: 25px">
                    <p style="font-weight: 600; ">Total Courses</p>
                    <p style="font-weight: 600; color: rgb(180, 0, 0);">{{$cart_count}}</p>
                </div>
                {{-- <hr style="color: #efefef; opacity: .3; margin: 10px 0px"> --}}
                @if($cart_sum == 0)
                    <a href="javascript:void(0)" disabled="">Check Out Now</a>
                @else
                    <a href="{{ route('checkout') }}">Check Out Now</a>
                @endif
            </div>


        </div>
      </div>
</div>


<div class="shopping-cart">
    <p style="font-size: 18px; margin-bottom: -30px;">{{$cart_ebook_count}} E-Book(s) in Shopping Cart</p>
      <div class="shopping_cart_body">
        <div class="shopping_cart_body_left" style="flex-direction: column;">
            @if($cart_ebook_count == 0)
                <div style="background-color: #8F0000; padding: 10px 0 10px 10px; color: #fff;">
                    No E-Book In CART!
                </div>
            @else
            @foreach ($cart_ebook as $cart_ebook)
                <div style="display: flex;">
                <div class="shopping_cart_body_left_images">
                {{-- @foreach ($e_image as $e_image)
                    @if($e_image->ebook_id == $cart_ebook->course_id)
                         <img src="{{ asset('course/'.$e_image->ebook_image) }}" width="100" height="100">
                    @endif
                @endforeach --}}
                @foreach ($e_image as $image)
                    @if($image->ebook_id == $cart_ebook->course_id)
                        <img src="{{ asset('course/'.$image->ebook_image) }}" width="100" height="100">
                    @endif
                @endforeach
                </div>
                <div class="shopping_cart_body_left_text">
             <div class="shopping_cart_body_left_text_heading">
                 <a href="">
                     <h1>
                         {{$cart_ebook->course_title}}
                     </h1>
                 </a>
                 <a href="javascript:void(0)" class="remove" onclick="deleteStudent({{$cart_ebook->id}})" style="margin-right: 30px">
                     Remove
                     <form style="display: none">
                        @csrf
                     </form>
                 </a>
                 <p class="money" style="color: rgb(180, 0, 0); font-weight: 700; font-size: 18px;"> ₦{{number_format($cart_ebook->course_price, 0)}}</p>
             </div>
             <a href="javascript:void(0)" class="school">
                @foreach ($ebooks as $e_school)
                    @if($e_school->id == $cart_ebook->course_id)
                            {{$e_school->school}}
                    @endif
                @endforeach
             </a>
             </div>
                </div>
                <div style="border: solid 1px rgb(241, 241, 241); margin: 10px 0;"></div>
            @endforeach
            @endif
        </div>
      </div>
</div>

    </section>

@endsection



@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    function deleteStudent(id){
     swal({
             title: "Are you sure?",
             text: "Once deleted, you will not be able to recover!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
         .then((willDelete) =>{
             if (willDelete) {
                 $.ajax({
                     url:'/main/delete-cart/'+id,
                     type: "Delete",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                        //  $("#sid"+id).remove();
                        //  if($("#sid"+id).remove()){
                            // alert(response)
                             swal({
                                 title: "Successful!",
                                 text: "School Deleted Sucessfully!!",
                                 icon: "success",
                                 buttons: true,
                                 dangerMode: false,
                             }).then((result) =>{
                                 if(result){
                                     location.reload();
                                 }
                             });
                        //  }
                     }
                 });
             }
         })
     }
 </script>
@endsection
