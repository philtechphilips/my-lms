{{-- Footer Starts Here --}}
<div class="home-page-sections-container footer">
    <div class="home-page-footer-grid">
        <div class="home-page-footer-grid-body">
            <h1>Quick Links</h1>
            <a href="/">Home</a>
            <a href="/main/schools">Schools</a>
            <a href="/main/courses">Courses</a>
            <a href="/main/ebooks">E-Books</a>
            <a href="/main/contact-us">Contact Us</a>
        </div>

        <div class="home-page-footer-grid-body">
            <h1>Join Us</h1>
            <a href="">Tutor Request</a>
        </div>

        <div class="home-page-footer-grid-body">
            <h1>About Us</h1>
            <a href="/main/about-us">About Us</a>
            <a href="/main/blog">Blog</a>
        </div>

        <div class="home-page-footer-grid-body">
            <div class="home-page-footer-grid-body-flex">
                <i class="fa-solid fa-globe"></i>
                <p>English</p>
            </div>
        </div>
    </div>

    <div class="footer-bottom-contects">

    </div>
</div>
{{-- Footer Ends Here --}}


{{-- Footer Menu Starts --}}
    <div class="footer-menu">
        <div class="footer-menu-container">
            <nav>
                <ul class="footer-menu-flex">
                    <li class="footer-menu-links">
                        <a href="/">
                            <i class="ri-home-line"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="footer-menu-links">
                        <a href="/main/courses">
                            <i class="ri-book-read-line"></i>
                            <span>Courses</span>
                        </a>
                    </li>


                    <li class="footer-menu-links">
                        <a href="/main/profile">
                            <i class="ri-user-line"></i>
                            <span>Account</span>
                        </a>
                    </li>


                    <li class="footer-menu-links">
                        <a href="javascript:void()" class="t-search">
                            <i class="ri-search-line"></i>
                            <span>Search</span>
                        </a>

                    </li>


                </ul>
            </nav>
        </div>
    </div>
{{-- Footer Ends Starts --}}

{{-- Footer Search --}}
    <div class="search-bottom">
        <div class="search-bottom-container">
            <form action="/main/search" method="POST" class="search">
                @csrf
                <a href="javascript:void()" class="t-close search-close"><i class="ri-close-line"></i></a>
                <span class="icon-large"><i class="ri-search-line"></i></span>
                <input type="text" name="search" placeholder="Search a course">
            </form>
        </div>
    </div>
{{-- Footer Search --}}
