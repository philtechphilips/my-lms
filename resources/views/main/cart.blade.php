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
    <p style="font-size: 18px; margin-bottom: -30px;">1 Course in Shopping Cart</p>
      <div class="shopping_cart_body">
        <div class="shopping_cart_body_left">
           <div class="shopping_cart_body_left_images">
                <img src="{{ asset('assets/images/background.png') }}" width="120" height="100">
           </div>
           <div class="shopping_cart_body_left_text">
            <div class="shopping_cart_body_left_text_heading">
                <a href="">
                    <h1>
                        Spiritual Intelligence/Wisdom from God
                    </h1>
                </a>
                <a href="" class="remove" style="margin-right: 30px">
                    Remove
                </a>
                <p class="money" style="color: rgb(180, 0, 0); font-weight: 700; font-size: 18px;"> ₦3,500</p>
            </div>
            <a href="" class="school">Shool of Spiritual Intelligence</a>
            <div class="shopping-cart-video-info">
                <p>By Isola Pelumi</p>
                <p>4.5 Total Hours</p>
                <p>8 Lessons</p>
            </div>

           </div>
        </div>

        <div class="shopping_cart_body_right">
            <div class="shopping_cart_body_right_body">
                <p style="font-weight: 600">Total:</p>
                <h1>&#8358; 15,000</h1>
                <div class="price_offer">
                    <p style="font-weight: 600; ">Original Price</p>
                    <p style="font-weight: 600; color: rgb(180, 0, 0);">&#8358; 20,000</p>
                </div>
                <hr style="color: #efefef; opacity: .3; margin: 10px 0px">
                <div class="price_offer">
                    <p style="font-weight: 600; ">Discount Offer</p>
                    <p style="font-weight: 600; color: rgb(180, 0, 0); text-decoration: line-through;">-&#8358;15,000</p>
                </div>
                <hr style="color: #efefef; opacity: .3; margin: 10px 0px">
                <div class="price_offer">
                    <p style="font-weight: 600; ">Discount Percent</p>
                    <p style="font-weight: 600; color: rgb(180, 0, 0);">60%</p>
                </div>
                <hr style="color: #efefef; opacity: .3; margin: 10px 0px">
                <div class="price_offer" style="margin-bottom: 25px">
                    <p style="font-weight: 600; ">Total Courses</p>
                    <p style="font-weight: 600; color: rgb(180, 0, 0);">1</p>
                </div>
                {{-- <hr style="color: #efefef; opacity: .3; margin: 10px 0px"> --}}
                <a href="{{ route('checkout') }}">Check Out Now</a>
            </div>
        </div>
      </div>
</div>
    </section>

@endsection



@section('scripts')
<script>
    function myFunction(){
        // alert('Good');
    }
</script>

@endsection
