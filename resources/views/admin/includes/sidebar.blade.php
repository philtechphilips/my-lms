     <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<div class="main-profile">
					<div class="image-bx">
						<img src="{{ asset('image/'.Auth::user()->passport)}}" alt="">
					</div>
					<h5 class="name"><span class="font-w400">Hello,</span> {{Auth::user()->name }}</h5>
				</div>
				<ul class="metismenu" id="menu">
                    <li class="nav-label first">DASHBOARD</li>
                    <li><a class="ai-icon" href="{{ route('admin-landing')}}" aria-expanded="false">
                            <i class="ri-organization-chart"></i>
							<span class="nav-text">Analytics</span>
						</a>
                    </li>


					<li class="nav-label">USERS</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="ri-user-follow-line"></i>
							<span class="nav-text">Users</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{ url('/administrator/all-admins') }}">Admin</a></li>
							<li><a href="{{ url('/administrator/all-users') }}">Users</a></li>
							<li><a href="my-wallets.html">Teachers</a></li>
                            <li><a href="{{ url('/administrator/add-admin') }}">Add Admin</a></li>
						</ul>
                    </li>

                    <li class="nav-label">WEBSITE</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="ri-global-fill"></i>
							<span class="nav-text">Manage Website</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{ route('BannerPage')}}">Banner Text</a></li>
                            <li><a href="{{ route('vision') }}">Vision</a></li>
							<li><a href="{{ route('mision') }}">Mission</a></li>
                            <li><a href="{{ route('who-we-are') }}">Who We Are</a></li>
                            <li><a href="{{ route('IntroVideo') }}">Intro Video</a></li>
						</ul>

                    </li>


                    <li class="nav-label">COURSES</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="ri-video-line"></i>
							<span class="nav-text">Manage Courses / Schools</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{ route('adminSchools') }}">Schools</a></li>
						</ul>

                        <ul aria-expanded="false">
							<li><a href="{{ route('CreateCourse') }}">Create a Course</a></li>
						</ul>

                        <ul aria-expanded="false">
							<li><a href="/admin/course-comment">Course Comments</a></li>
						</ul>


                        <ul aria-expanded="false">
							<li><a href="{{ route('ViewCourse') }}">View Courses</a></li>
						</ul>


                        <ul aria-expanded="false">
							<li><a href="/administrator/schedule-live-class">Schedule Live Class</a></li>
						</ul>

                        <ul aria-expanded="false">
							<li><a href="/administrator/certificate">Upload Certificate</a></li>
						</ul>
                    </li>

                    <li class="nav-label">Ebooks</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="ri-video-line"></i>
							<span class="nav-text">Manage Ebooks / Upload</span>
						</a>

                        <ul aria-expanded="false">
							<li><a href="{{ url('/administrator/create-ebook') }}">Create New E-Book</a></li>
						</ul>

                        <ul aria-expanded="false">
							<li><a href="/administrator/view-ebooks">View E-Books</a></li>
						</ul>
                    </li>

                    <li class="nav-label">REVIEWS</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="ri-star-fill"></i>
							<span class="nav-text">Manage Reviews</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="/administrator/ebook-reviews">E-Book Reviews</a></li>
                            <li><a href="/administrator/course-reviews">Course Reviews</a></li>
                            <li><a href="/administrator/feedbacks">Feedback</a></li>
						</ul>

                    </li>


                    <li class="nav-label">PURCHASES</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="ri-shopping-cart-line"></i>
							<span class="nav-text">Carts</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{ url('/administrator/cart') }}">View Carts</a></li>
						</ul>
                    </li>

                    <li class="nav-label">PAYMENTS</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="ri-bank-card-fill"></i>
							<span class="nav-text">Manage Payment</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{ url('/administrator/payments') }}">View All Payments</a></li>
						</ul>
                    </li>

                    <li class="nav-label">QUIZ</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="ri-question-answer-line"></i>
							<span class="nav-text">Quiz Attempts</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{ url('/administrator/cart') }}">View Carts</a></li>
						</ul>
                    </li>



                    <li class="nav-label">BLOG</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="ri-global-fill"></i>
							<span class="nav-text">Manage Blog</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{ route('BlogPage')}}">Add New Blog Post</a></li>
                            <li><a href="{{ route('AllBlogPost') }}">Blog Posts</a></li>
                            <li><a href="/administrator/blog-comment">Blog Comment</a></li>
						</ul>

                    </li>

                    <li class="nav-label">PROFILE</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="ri-user-line"></i>
							<span class="nav-text">Manage Profile</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="/administrator/about-me">About Me</a></li>
                            <li><a href="/administrator/profile">Edit Profile</a></li>
						</ul>

                    </li>

                </ul>
                <div class="copyright">
					<p><strong>{{{getenv("APP_NAME")}}} Admin Dashboard</strong> © @php
                        echo date('Y');
                    @endphp All Rights Reserved <b class="text text-danger">Developed By: 07063623539</b></p>
			</div>
                </div>

        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
