@extends('main.index')

@section('title')

@endsection


@section('content')
<div class="container auth-form" style="margin: 70px 0px;">
    <form method="POST" action="{{ route('password.email') }}" class="form">
        @csrf

        <div class="form-heading">
            <h1>{{ __('Reset Password') }}</h1>
        </div>

        <div class="input-group">
            <input type="email" class="input-active" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <label for="email" id="placeholder2" class="active">{{ __('Email Address') }}</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="input-group">
            <input type="submit" name="submit" value=" {{ __('Send Password Reset Link') }}" class="submit">
        </div>
    </form>
</div>
@endsection

@section('scripts')

@endsection
