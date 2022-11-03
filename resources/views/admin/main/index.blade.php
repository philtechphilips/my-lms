<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:title" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:description" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
    <title>Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
	<link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/owl-carousel/owl.carousel.css"') }} rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	
</head>
<body>

          <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

        <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

{{-- Including Navbar --}}
    @include('admin.includes.navbar')

{{-- Including Navbar --}}

{{-- Including Sidebar --}}
    @include('admin.includes.sidebar')
{{-- Including Sidebar --}}

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
					<h2 class="font-w600 title mb-2 mr-auto ">Dashboard</h2>
					<div class="weather-btn mb-2">
						<span class="mr-3 font-w600 text-black"><i class="fa fa-cloud mr-2"></i>21</span>
						<select class="form-control style-1 default-select  mr-3 ">
							<option>Medan, IDN</option>
							<option>Jakarta, IDN</option>
							<option>Surabaya, IDN</option>
						</select>
					</div>
					<a href="javascript:void(0);" class="btn btn-secondary mb-2"><i class="las la-calendar scale5 mr-3"></i>Filter Periode</a>
				</div>
            </div>
        </div>
    </div>
    <!-- Main Wrapper End -->

{{-- Including Footer --}}
    @include('admin.includes.footer')
{{-- Including Footer --}}


     <!-- Required vendors -->
     <script src={{ asset("vendor/global/global.min.js") }}></script>
     <script src={{ asset("vendor/bootstrap-select/dist/js/bootstrap-select.min.js") }}></script>
     {{-- <script src={{ asset("vendor/chart.js/Chart.bundle.min.js") }}></script>
     
     <!-- Chart piety plugin files -->
     <script src={{ asset("vendor/peity/jquery.peity.min.js") }}></script>
     
     <!-- Apex Chart -->
     <script src={{ asset("vendor/apexchart/apexchart.js") }}></script> --}}
     
     <!-- Dashboard 1 -->
     <script src={{ asset("js/dashboard/dashboard-1.js") }}></script>
{{--      
     <script src={{ asset("vendor/owl-carousel/owl.carousel.js") }}></script> --}}
     <script src={{ asset("js/custom.min.js") }}></script>
     <script src={{ asset("js/deznav-init.js") }}></script>
 
 </body>
 </html>