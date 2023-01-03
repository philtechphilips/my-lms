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
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
	<link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" target="_blank">
    {{-- Toastr --}}

    {{-- Dropzone --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    {{-- Dropzone --}}
    {{-- Plyr JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.css" />
    {{-- Plyr JS --}}

    {{-- VideoJs --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.12.0/video-js.min.css" />
    {{-- VideoJs --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap');

        *{
            font-family: 'Source Sans Pro' !important;
        }
        .upload_box{
            color: white;
            background: #fa462e;
            padding: 15px;
            border: none;
            outline: none;
            border-radius: 50px;
        }

        ::-webkit-file-upload-button{
            color: #222 !important;
            background: #fff;
            outline: none;
            border: none;
            cursor: pointer;
            border-radius: 50px;
            font-weight: 600;
            padding: 3px 10px;
        }

        .file-upload{
            display: inline;
            padding: 0 12px;
            height: 36px;
            line-height: 36px;
            color: blue;
            background-color: transparent;
            border: solid 1px blue;
            cursor: pointer;
        }

        .file-upload input[type="file"]{
            display: none;
        }

        .vid-cont{
            position: relative;
        }

        .vid-cont .popup-video{
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            background: rgba(0, 0, 0, .8);
            height: 100%;
            width: 100%;
            display: none;
        }

        .vid-cont .popup-video iframe{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 750px;
            object-fit: cover;
            height: 500px;
        }

        .vid-cont .popup-video span{
            position: absolute;
            top: 5px;
            right: 20px;
            font-size: 50px;
            color: #fff;
            z-index: 100;
            cursor: pointer;
        }

        @media (max-width: 800px){
            .vid-cont .popup-video iframe{
                width: 90%;
                height: 40%;
            }
        }
    </style>

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
            @yield('contents')
        </div>
    </div>
    <!-- Main Wrapper End -->

{{-- Including Footer --}}
    @include('admin.includes.footer')
{{-- Including Footer --}}


     <!-- Required vendors -->
     <script src={{ asset("vendor/global/global.min.js") }}></script>
     <script src={{ asset("vendor/bootstrap-select/dist/js/bootstrap-select.min.js") }}></script>
     <!-- Dashboard 1 -->
     <script src={{ asset("js/dashboard/dashboard-1.js") }}></script>
{{--
     <script src={{ asset("vendor/owl-carousel/owl.carousel.js") }}></script> --}}
     <script src={{ asset("js/custom.min.js") }}></script>
     <script src={{ asset("js/deznav-init.js") }}></script>
     {{-- Sweet Alert --}}
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     {{-- Swal --}}

    {{-- Adding PlyrJs Script--}}
    <script src="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.js"></script>
    {{-- Adding PlyrJs Script--}}

    {{-- SweetAlert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- SweetAlert --}}

    {{-- Data Table --}}
    <script src={{ asset("vendor/datatables/js/jquery.dataTables.min.js")}}></script>
    <script src={{ asset("js/plugins-init/datatables.init.js") }}></script>


    {{-- Data Table --}}

    {{-- VideoJS --}}
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.12.0/video.min.js"></script>

    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.6.1/Youtube.min.js"></script>
    {{-- VideoJS --}}
     @yield('scripts')
 </body>
 </html>
