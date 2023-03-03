@component('mail::message')

**{{$user}}**  payment for the following course(s) with the **payment reference** **{{$payment_reference}}**:

@foreach ($cart as $cart)
# **{{$cart->course_title}}**
@endforeach

@endcomponent
