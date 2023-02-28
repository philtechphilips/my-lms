<aside class="site-off desktop-hide">
    <div class="off-canvas">
        <div class="canvas-head flexitem">
            <div class="logo">
                <a href="/">
                    MoGah
                </a>
            </div>
            <a href="javascript:void(0);" class="t-close"><i class="ri-close-line"></i></a>
        </div>
        <div class="departments">
            @if (Auth::check())
              <div class="mobile-head-signin">
                <div class="mobile-head-signin-left">
                    <img src="{{ asset('image/'.Auth::user()->passport) }}" width="60px" height="60px" style="border-radius: 50%;">
                </div>

                <div class="mobile-head-signin-right">
                  <h3>{{ Auth::user()->name }}</h3>
                  <p>Welcome Back</p>
                </div>
              </div>

              <div class="mobile-head-login">
                <ul class="mobile-head-login-links">
                    <li><a href="{{route('homePage')}}">Home</a></li>
                    <li><a href="{{route('about')}}">About Us</a></li>
                    <li><a href="{{route('allcourses')}}">Courses</a></li>
                    <li><a href="{{route('allEbooks')}}">Ebooks</a></li>
                </ul>
                </div>
            @else
                <div class="mobile-head-login">
                <ul class="mobile-head-login-links">
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Sign Up</a></li>
                    <li><a href="{{route('homePage')}}">Home</a></li>
                    <li><a href="{{route('about')}}">About Us</a></li>
                    <li><a href="{{route('allcourses')}}">Courses</a></li>
                    <li><a href="{{route('allEbooks')}}">Ebooks</a></li>
                </ul>
                </div>
            @endif


        </div>
        <hr style="color: #222; opacity: .3; margin: 15px -15px 15px -15px; ">
        <nav>
            <h4>Popular Schools</h4>


            {{-- @foreach ($schools as $nav_sch)
            <div class="mobile-nav-links">
                <a href="#">{{$nav_sch->name}}</a>
            </div>

            @endforeach --}}

            <div class="mobile-nav-links">
                <a href="/main/schools">All Schools</a>
            </div>

        </nav>
        <hr style="color: #222; opacity: .3; margin: 15px -15px 15px -15px; ">
        <div class="thebottom-nav">
            <h4>Follow Us:</h4>
            <div class="thebottom-nav-socials">
                <div class="socials">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                </div>
                <div class="socials">
                    <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
                </div>
                <div class="socials">
                    <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                </div>
            </div>
            <p class="copyright">
                &#169; @php
                    echo date('Y')
                @endphp MoGah All Rights Reserved
            </p>
        </div>
    </div>
</aside>

<header class="header">
    <div class="header-top-links">
        <div>
            <ul class="header-top-links-link">
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-square-whatsapp"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            </ul>
        </div>

        <div>
            <ul class="header-top-links-links">
            <li><a href="{{ route('homePage') }}">Home</a></li>
            <li><a href="{{ route('allcourses') }}">All Courses</a></li>
            <li><a href="{{ route('allEbooks') }}">All E-books</a></li>
            <li><a href="{{ route('schools') }}">Schools</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{route('blog')}}">Blogs</a></li>
            </ul>
        </div>
    </div>

    <div class="header-bottom" id="header-bottom">
        <div class="header-bottom-container">
            <div class="header-bottom-container-menu-icon">
                <a href="javascript:void(0);" class="trigger">
                    <span class="i ri-menu-3-line"></span>
                </a>
            </div>
            <div class="header-bottom-container-left">
                <a href="{{ route('homePage') }}" class="logo">MoGah</a>
                <a href="{{ route('schools') }}" class="menu-hide">
                @if(Auth::check())
                    Schools
                @else
                    All Schools
                @endif
                </a>
            </div>
            <div class="header-bottom-container-center">
                <div class="search-box">
                    <form action="" class="search">
                        <span class="icon-large"><i class="ri-search-line"></i></span>
                        <input type="search" placeholder="Search for anthing">
                    </form>
                </div>
            </div>
            <div class="header-bottom-container-right">
                <div class="header-login-button">
                    <a href="/main/courses" class="menu-hide"><p>Courses</p></a>
                </div>

                <div class="header-login-button user">
                    <a href="/main/profile"><i class="ri-user-line"></i></a>
                </div>

                @if(Auth::check())

                    <div class="header-login-button" style="position: relative;">
                        <a href="{{ route('cart') }}"><i class="cart ri-shopping-cart-line"></i>
                        <div style="position: absolute; right: -9px; top: -6px; background-color: red; text-align: center; color: #fff; width: 17px; height: 20px; padding 0px 50px 50px 50px; border-radius: 50px;">
                            <p id="cart_count" style="margin-top: -2px; font-weight: 600; font-size: 13px;">0</p>
                        </div>
                        </a>
                    </div>
                @else
                <div class="header-login-button">
                    <a href="{{ route('cart') }}"><i class="cart ri-shopping-cart-line"></i></a>
                </div>

                @endif

                @if (Auth::check())
                <div class="header-login-button log-in">
                    @if(Auth::check())
                        @if(Auth::user()->user_type == 'admin')
                            <a href="/admin" class="menu-hide"><p>Dashboard</p></a>
                        @elseif (Auth::user()->user_type == 'teacher')
                            <a href="/teacher/dashboard" class="menu-hide"><p>Dashboard</p></a>
                        @else
                            <a href="/dashboard" class="menu-hide"><p>Dashboard</p></a>
                        @endif
                    @else
                        <a href="{{ route('home') }}" class="menu-hide"><p>Dashboard</p></a>
                    @endif
                </div>

                <div class="header-login-button sign-up">
                    <a href="/main/profile" class="menu-hide"><p>Account</p></a>
                </div>

                {{-- <div class="header-login-button"> --}}
                    {{-- <a href="#" class="menu-hide"><p style="padding: 10px 10px 0px 10px; text-align: center; color:#fff; background-color: rgb(26, 26, 59); border-radius: 50%;">IP</p></a> --}}
                {{-- </div> --}}
                @else
                    {{-- Login Logout Button When Not Authenticated --}}
                <div class="header-login-button log-in">
                    <a href="{{ url('/login') }}">Log in</a>
                </div>

                <div class="header-login-button sign-up">
                    <a href="{{ url('/register') }}">Sign Up</a>
                </div>
                    {{-- Login Logout Button When Not Authenticated --}}
                @endif


            </div>
        </div>
    </div>
</header>
