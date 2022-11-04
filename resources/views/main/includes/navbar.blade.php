<aside class="site-off desktop-hide">
    <div class="off-canvas">
        <div class="canvas-head flexitem">
            <div class="logo">
                <a href="#">
                    MoGah
                </a>
            </div>
            <a href="#" class="t-close"><i class="ri-close-line"></i></a>
        </div>
        <div class="departments">
            @if (Auth::check())
              <div class="mobile-head-signin">
                <div class="mobile-head-signin-left">
                  <h3>
                    @php
                        $fetched_name = Auth::user()->name;
                        $name = preg_split("/\s+/", $fetched_name);
                        $acronym = "";
                        foreach ($name as $w) {
                            $acronym .= $w[0];
                        }
                        echo $acronym;
                   @endphp
                  </h3>
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
            <div class="mobile-nav-links">
                <a href="#">School of Politics True Governance</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="mobile-nav-links">
                <a href="#">The Billionaire Masterclass Club</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="mobile-nav-links">
                <a href="#">School of Preminent Power</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="mobile-nav-links">
                <a href="#">School of Politics True Governance</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="mobile-nav-links">
                <a href="#">The Billionaire Masterclass Club</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="mobile-nav-links">
                <a href="#">School of Preminent Power</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="mobile-nav-links">
                <a href="#">School of Politics True Governance</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="mobile-nav-links">
                <a href="#">The Billionaire Masterclass Club</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="mobile-nav-links">
                <a href="#">The Billionaire Masterclass Club</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mobile-nav-links">
                <a href="#">The Billionaire Masterclass Club</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mobile-nav-links">
                <a href="#">The Billionaire Masterclass Club</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>

            <div class="mobile-nav-links">
                <a href="#">All Schools</a>
                <i class="fa-solid fa-angle-right"></i>
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
            <li><a href="#">Blogs</a></li>
            </ul>
        </div>
    </div>

    <div class="header-bottom" id="header-bottom">
        <div class="header-bottom-container">
            <div class="header-bottom-container-menu-icon">
                <a href="#" class="trigger">
                    <span class="i ri-menu-3-line"></span>
                </a>
            </div>
            <div class="header-bottom-container-left">
                <a href="{{ route('homePage') }}" class="logo">MoGah</a>
                <a href="{{ route('schools') }}" class="menu-hide">All Schools</a>
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
                    <a href="#" class="menu-hide"><p>Courses</p></a>
                </div>

                <div class="header-login-button user">
                    <a href="#"><i class="ri-user-line"></i></a>
                </div>

                <div class="header-login-button">
                    <a href="{{ route('cart') }}"><i class="cart ri-shopping-cart-line"></i></a>
                </div>

                @if (Auth::check())
                <div class="header-login-button log-in">
                    <a href="#" class="menu-hide"><p>Dashboard</p></a>
                </div>

                <div class="header-login-button sign-up">
                    <a href="#" class="menu-hide"><p>Account</p></a>
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
