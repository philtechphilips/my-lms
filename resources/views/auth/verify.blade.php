@extends('main.index')

@section('title')

@endsection

@section('content')

<div class="email-verification-page">
    <div class="email-verification-page-content">
        <h1>Mogah</h1>
        <p style="margin-top: 18px; font-size: 20px; font-weight: 500;">Hi {{ Auth::user()->name }},</p>
        <p>We are happy you signed up. To start taking your courses, please confirm your email address.</p>
        <p>A fresh verification link has been sent to your email address. Please check your email for a verification link.</p>

        <h3>If you did not receive the email</h3>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="resend-btn">{{ __('Click Here to Request Another') }}</button>
        </form>

        <p style="margin-top: 25px; font-size: 22px; font-weight: 500;">Welcome to Mogah!</p>
    </div>
</div>


@endsection

@section('scripts')

@endsection
