@extends('main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Checkout
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
                    <form id="paymentForm">
                        @csrf
                        <div class="checkout-grid-left-body-flex">
                            <label style="display: flex; align-items: center;">
                                <input type="checkbox" name="paystack" id="paystack" style="margin-right: 5px;">
                                <p>Pay With Paystack</p>
                            </label>
                            <img src="{{ asset('assets/images/paystack.png')}}" width="100" height="20">
                        </div>
                        <button type="submit" id="submit" onclick="payWithPaystack(event)"><i
                                class="fa-solid fa-cart-shopping"></i> Complete Purchase</button>
                    </form>
                </div>
            </div>
            <div class="checkout-grid-right">
                <p style="font-size: 15px; font-weight: 600;">Cart ({{$cart_count}} Course)</p>
                <hr style="opacity: .2">

                @if($cart_count == 0)
                <div class="checkout-grid-right-flex">
                    <div style="background-color: #8F0000; padding: 10px 0 10px 10px; color: #fff; width: 100%;">
                        EMPTY CART!
                    </div>
                </div>
                @else
                @foreach ($cart as $cart)
                <div class="checkout-grid-right-flex">
                    @foreach ($courses_image as $c_img)
                    @if($cart->course_id === $c_img->course_id)
                    <img src="{{ asset('course/'.$c_img->course_image)}}" width="100" height="70">
                    @else
                    {{-- <img src="#" alt="Course Image"> --}}
                    @endif
                    @endforeach
                    <div class="checkout-grid-right-flex2" style="padding-left: 10px;">
                        <h1 style="font-size: 20px;">{{$cart->course_title}}</h1>
                        @foreach ($courses as $school)
                        @if($school->id == $cart->course_id)
                        <p>{{$school->school}}</p>
                        @endif
                        @endforeach
                        <p style="font-size: 18px; font-weight: 700; color: #860000;">
                            &#x20A6;{{number_format($cart->course_price, 0)}}</p>
                    </div>
                </div>
                <hr style="opacity: .2; margin-bottom: 15px;">
                @endforeach
                @endif


                <div class="checkout-grid-right-bottom-flex">
                    <p>Total</p>
                    <p class="naira">&#x20A6;{{number_format($cart_sum, 0)}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(e) {
        e.preventDefault();
        if(document.getElementById('paystack').checked) {
            let handler = PaystackPop.setup({
            key: 'pk_test_7c371d93d1d4c27411cad38812b18a3533b6ff63', // Replace with your public key
            email: "{{Auth::user()->email}}",
            amount: {{$cart_sum}} * 100,
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
            alert('Window closed.');
            },
            callback: function(response){
            let reference = response.reference;

            $.ajax({
                type: "GET",
                url: "/main/verify-payment/"+reference,
                success: function(response){
                    // console.log(response)
                    if(response == 'success'){
                        window.location.replace("/dashboard");
                    }
                }
            })
            }
        });

        handler.openIframe();
        }
    }
</script>


<script>
    $(document).ready(function () {
    $('#submit').click(function (e) {
    e.preventDefault();
    if ($('#paystack').is(':checked')) {
    toastr.warning('Validating Payment Please Wait!!!', 'Warning', {
    closeButton: true,
    progressBar: true,
    timeOut: 100000
    }); }
    })
    })
</script>
@endsection
