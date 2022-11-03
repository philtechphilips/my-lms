@extends('main.index')

@section('title')

@endsection

@section('content')

<section class="cart">
    <div class="shopping_cart_header">
      <div class="shopping-cart-links">
          <p style="padding-right: 5px; font-weight: 500 !important;">Home</p>
          <i class="fa-solid fa-angle-right"></i>
          <p style="padding-left: 5px; font-weight: 500 !important;">Checkout</p>
      </div>
      <h1>
        Checkout Page
      </h1>
    </div>

    <div class="checkout">
        <div class="cheeckout-grid">
            <div class="checkout-grid-left">
                <h1 style="font-size: 20px">Confirm Your Purchase</h1>
                <p style="font-size: 17px">You can now make your purchase, Isola Pelumi</p>
                <div class="checkout-grid-left-body">
                    <form>
                        <div class="checkout-grid-left-body-flex">
                            <label style="display: flex; align-items: center;">
                                <input type="radio" name="paystack" style="margin-right: 5px;">
                                <p>Pay With Paystack</p>
                            </label>
                            <img src="{{ asset('assets/images/paystack.png')}}"  width="100" height="20">
                        </div>
                        <button><i class="fa-solid fa-cart-shopping"></i> Complete Purchase</button>
                    </form>
                </div>
            </div>
            <div class="checkout-grid-right">
                <p style="font-size: 15px; font-weight: 600;">Cart (1 Course)</p>
                <hr style="opacity: .2">


                <div class="checkout-grid-right-flex">
                    <img src="{{ asset('assets/images/course.png')}}" width="100">
                    <div class="checkout-grid-right-flex2" style="padding-left: 10px;">
                        <h1 style="font-size: 20px;">Creative Watercolor Sketching for Beginners</h1>
                        <p>A Course by Temidara Matthew</p>
                    </div>
                    <p style="font-size: 18px; font-weight: 700;">&#x20A6; 2000</p>
                </div>
                <hr style="opacity: .2;">


                <div class="checkout-grid-right-flex">
                    <img src="{{ asset('assets/images/course.png')}}" width="100">
                    <div class="checkout-grid-right-flex2" style="padding-left: 10px;">
                        <h1 style="font-size: 20px;">Creative Watercolor Sketching for Beginners</h1>
                        <p>A Course by Temidara Matthew</p>
                    </div>
                    <p style="font-size: 18px; font-weight: 700;">&#x20A6; 2000</p>
                </div>
                <hr style="opacity: .2; margin-bottom: 15px;">


                <div class="checkout-grid-right-bottom-flex">
                    <p>Total</p>
                    <p class="naira">&#x20A6;2,000</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
