@extends('main.index')

@section('title')

@endsection


@section('content')

<div class="container auth-form">
    <form method="POST" action="{{ route('login') }}" class="form" autocomplete="off">
        @csrf
        <div class="form-heading">
            <h1>Login to your mogah Account</h1>
        </div>
        <div class="input-group">
            <input type="email" class="input" id="input2" onchange="Form()" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <label for="email" id="placeholder2" class="placeholder">Email</label>
        </div>
        <div class="input-group">
            <input type="password" class="input" id="input3" onchange="Form()" name="password" required autocomplete="current-password">
            <label for="password" id="placeholder3" class="placeholder">Password</label>
        </div>
        <div class="remember">
            <input type="checkbox" class="remember-check" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <p style="padding-left: 0px">Remember Me</p>
        </div>
        <div class="input-group">
            <input type="submit" name="submit" class="submit">
        </div>

        @if (Route::has('password.request'))
            <p style="text-align: center; font-size: 15px; margin-top: 10px; font-weight: 500;">or <span><a href="{{ route('password.request') }}" class="login-link"><b>Forgot Password</b></a></span></p>
        @endif
        <hr style="margin-top: 20px;">

        <p style="text-align: center; font-size: 15px; margin-top: 10px; font-weight: 500;">Don't have an account? <span><a href="{{ url("/register") }}" class="login-link"><b>Sign Up</b></a></span></p>
    </form>
</div>
{{-- <footer class="footer">
    <div class="container">
        <div class="footer-row">
                <div class="nav-links">
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Start Learning</a>
                    <a href="#">Login</a>
                    <a href="#">Contact Us</a>
                </div>

                <div class="nav-links">
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Start Learning</a>
                    <a href="#">Login</a>
                    <a href="#">Contact Us</a>
                </div>

                <div class="nav-links">
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Start Learning</a>
                    <a href="#">Login</a>
                    <a href="#">Contact Us</a>
                </div>

                <div class="nav-links">
                    <div class="nav-icons">
                        <img src="facebook.png">
                        <img src="whatsapp.png">
                        <img src="facebook.png">
                    </div>
                </div>
        </div>
    <div>
        <div class="footer-bottom">
            <h1>Mogah</h1>
            <p>&copy 2022 Mogah Ins</p>
        </div>
</footer> --}}
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        let input2 = document.getElementById('input2').value;
            let input3 = document.getElementById('input3').value;

            if (input2 != "") {
                document.getElementById('placeholder2').className = "active";
                document.getElementById('input2').className = "input-active";
            }

            if (input3 != "") {
                document.getElementById('placeholder3').className = "active";
                document.getElementById('input3').className = "input-active";
            }
    });
</script>

<script type="text/javascript">
    function Form() {
            let input2 = document.getElementById('input2').value;
            let input3 = document.getElementById('input3').value;

            if (input2 != "") {
                document.getElementById('placeholder2').className = "active";
                document.getElementById('input2').className = "input-active";
            }

            if (input3 != "") {
                document.getElementById('placeholder3').className = "active";
                document.getElementById('input3').className = "input-active";
            }
    }
</script>
@endsection
