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

                    </li>


                    <li class="nav-label">BLOG</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="ri-global-fill"></i>
							<span class="nav-text">Manage Blog</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{ route('BlogPage')}}">Add New Blog Post</a></li>
                            <li><a href="{{ route('vision') }}">Blog Post</a></li>
						</ul>

                    </li>

                    <li class="nav-label first">Profile</li>
                    <li><a class="ai-icon" href="/administrator/profile" aria-expanded="false">
                            <i class="ri-user-line"></i>
							<span class="nav-text">My Profile</span>
						</a>
                    </li>
                </ul>
                </div>
				<div class="copyright">
					<p><strong>Mogah Admin Dashboard</strong> © @php
                        echo date('Y');
                    @endphp All Rights Reserved</p>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
