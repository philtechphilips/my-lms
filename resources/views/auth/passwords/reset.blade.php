@extends('main.index')

@section('title')

@endsection


@section('content')
<div class="container auth-form" style="margin: 70px 0px;">
    <form method="POST" action="{{ route('password.update') }}" class="form">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        
        <div class="form-heading">
            <h1>Reset Password</h1>
        </div>
        @if (session('status'))
        <div class="alert alert-success" style="text-align: center; color: red;" role="alert">
            {{ session('status') }}
        </div>
        @endif
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
            <input type="password" class="input-active" id="password" name="password" required autocomplete="new-password" autofocus>
            <label for="password" id="placeholder2" class="active">{{ __('Password') }}</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group">
            <input type="password" class="input-active" id="password-confirm" name="password_confirmation" required autocomplete="new-password" autofocus>
            <label for="password-confirm" id="placeholder2" class="active">{{ __('Password') }}</label>
        </div>


        <div class="input-group">
            <input type="submit" name="submit" value="{{ __('Reset Password') }}" class="submit">
        </div>
    </form>
</div>
@endsection

@section('scripts')

@endsection
