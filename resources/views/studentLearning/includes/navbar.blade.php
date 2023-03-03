<aside class="site-off desktop-hide">
    <div class="off-canvas">
        <div class="canvas-head flexitem">
            <div class="logo">
                <a href="/">
                    MoGah
                </a>
            </div>
            <a href="#" class="t-close"><i class="ri-close-line"></i></a>
        </div>
        <div class="departments">
            @if (Auth::check())
            <div class="mobile-head-signin">
                <div class="mobile-head-signin-left">
                    <img src="{{ asset('image/'.Auth::user()->passport) }}" width="60px" height="60px"
                        style="border-radius: 50%;">
                </div>

                <div class="mobile-head-signin-right">
                    <h3>{{ Auth::user()->name }}</h3>
                    <p>Welcome Back</p>
                </div>
            </div>
            @endif


        </div>
        <hr style="color: #222; opacity: .3; margin: 15px -15px 15px -15px; ">
        <nav>
            <h3>Quick Links</h3>
            <div class="mobile-nav-links">
                <a href="/dashboard">Home</a>
            </div>

            <div class="mobile-nav-links">
                <a href="/dashboard/my-courses">Courses</a>
            </div>

            <div class="mobile-nav-links">
                <a href="#">E-Books</a>
            </div>

            <div class="mobile-nav-links">
                <a href="#">Quizes</a>
            </div>

            <div class="mobile-nav-links">
                <a href="#">Announcements</a>
            </div>

            <div class="mobile-nav-links">
                <a href="#">Completed Courses</a>
            </div>

            <div class="mobile-nav-links">
                <a href="#">Live-Classes</a>
            </div>

            <div class="mobile-nav-links">
                <a href="#">Payments</a>
            </div>

            <div class="mobile-nav-links">
                <a href="{{ route('profile')}} ">Profile</a>
            </div>

            <div class="mobile-nav-links">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
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


<div class="dashboard-navbar" id="header-bottom'">
    <div class="dashboard-navbar-container my-container">
        <div class="header-bottom-container-menu-icon desktop-hide">
            <a href="javascript:void(0);" class="trigger" style="text-decoration: none;">
                <i class="ri-menu-line"></i>
            </a>
        </div>

        <div class="dashboard-navbar-logo">
            <a href="/" style="text-decoration: none; color: #222;">
                <h1>MoGah</h1>
            </a>
        </div>



        <div class="dashboard-navbar-right mobile-hide" style="display: flex; align-items: center;">
            <div class="dashboard-navbar-links mobile-hide" style="margin-right: 50px;">
                <ul class="dashboard-navbar-links-ul">

                    {{-- <li>
                        <a href="#" style="text-transform: capitalize;"><i class="ri-question-fill"></i>Help</a>
                    </li> --}}
                    {{--
                    <li>
                        <a href="#"><i class="ri-notification-fill"></i></a>
                    </li> --}}


                </ul>
            </div>

            <div class="dashboard-navbar-right-profile-image" style="display: flex; align-items:center;">
                <div class="m-wrapper mobile-hide" style="margin-right: 10px;">
                    <h5>{{Auth::user()->name}}</h5>
                    <p style="text-align: right; font-size: 13px;">Student</p>
                </div>
                <div class="m-wrapper">
                    <a href="javascript:void(0)" class="dropdown-trigger">
                        <img src="{{ asset('image/'.Auth::user()->passport) }}" width="50px" height="50px">
                        <i class="ri-arrow-drop-down-line"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-navbar-right-profile-image-dropdown">
        <ul>
            <li>
                <a href="/dashboard/my-courses">
                    Courses
                </a>
            </li>

            <div class="line"></div>

            <li>
                <a href="#">
                    Ebooks
                </a>
            </li>

            <div class="line"></div>

            <li>
                <a href="{{ route('profile')}}">
                    Profile
                </a>
            </li>

            <div class="line"></div>

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
