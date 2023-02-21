@extends('main.index')

@section('title')

@endsection


@section('content')

<div class="container auth-form">
    <form method="POST" action="{{ route('register') }}" class="form">
        @csrf
        <div class="form-heading">
            <h1>Sign up and Start Learning</h1>
        </div>
        <div class="input-group">
            <input type="text" class="input-active" id="input" onchange="Form()" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
            <label for="name" id="placeholder" class="active">Full Name</label>
            @error('name')
                <span class="invalid-feedback" style="color: red;" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{-- <div class="input-group">
            <input type="phone" class="input" id="input1" onchange="Form()" name="phone">
            <label for="phone" id="placeholder1" class="placeholder">Phone Number</label>
        </div> --}}
        <div class="input-group">
            <input type="email" class="input-active" id="input2" onchange="Form()" name="email" value="{{ old('email') }}" autocomplete="email">
            <label for="email" id="placeholder2" class="active">Email</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong style="color: red;">{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="input-group">
            <input type="password" class="input-active" id="input3" onchange="Form()" name="password" value="admin" autocomplete="new-password">
            <input type="hidden" name="user_type" value="admin">
            <label for="password" id="placeholder3" class="active">Password</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong style="color: red;">{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="input-group">
            <input type="password" class="input-active" id="input4" onchange="Form()" name="password_confirmation" value="admin" autocomplete="new-password">
            <label for="password" id="placeholder4" class="active">Confirm Password</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong style="color: red;">{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="input-group">
            <input type="submit" name="submit" class="submit">
        </div>
        <p class="form-terms">By signing up, you agree to our <span><a href="#">Terms of Use</a></span> and <span><a href="#">Privacy Policy.</a></span></p>

        <hr style="margin-top: 20px;">

        <p style="text-align: center; font-size: 15px; margin-top: 10px; font-weight: 500;">Already have an account? <span><a href="{{ url("/login") }}" class="login-link"><b>Log in</b></a></span></p>
    </form>
</div>

{{-- <script type="text/javascript">
    function Form() {
            let input = document.getElementById('input').value;
            let input4 = document.getElementById('input4').value;
            let input2 = document.getElementById('input2').value;
            let input3 = document.getElementById('input3').value;

            if (input != "") {
                document.getElementById('placeholder').className = "active";
                document.getElementById('input').className = "input-active";
            }

            if (input4 != "") {
                document.getElementById('placeholder4').className = "active";
                document.getElementById('input4').className = "input-active";
            }

            if (input2 != "") {
                document.getElementById('placeholder2').className = "active";
                document.getElementById('input2').className = "input-active";
            }

            if (input3 != "") {
                document.getElementById('placeholder3').className = "active";
                document.getElementById('input3').className = "input-active";
            }
    }
</script> --}}

@endsection
