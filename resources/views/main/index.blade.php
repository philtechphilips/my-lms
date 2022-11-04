<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Mogah">
    <meta name="keywords" content="Mogah, Destiny Changer">
	<title>
        @yield('title')
    </title>
    <style>
        @media screen and (max-width: 800px) {
            .school{
                grid-template-columns: repeat(2, 1fr) !important;
                padding: 30px 20px !important;
            }
        }
    </style>
    <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href={{ asset('css/remix-icons.css') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('styles/mainstyle.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/header-style.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/courseinfo.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/shoppimgcart.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/studingpage.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/mylearning.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/studypage.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/coursesLanding.css')}}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/landingpagecta.css')}}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/allcourses.css')}}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/about-us.css')}}>
    <link rel="stylesheet" href={{ asset('css/swiper.css')}} >
    <link rel="stylesheet" type="text/css" href={{ asset('styles/checkout.css') }}>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('styles/ebook-info.css')}}">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
 <!-- Docs styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.css" />

</head>
<body onscroll="myFunction()">
<div id="page" class="site">
    {{-- Including Navigation Bar --}}
    @include('main.includes.navbar')
    {{-- Including Navigation Bar --}}

    {{-- Including Main Content --}}
    <main>
        @yield('content')
    </main>
    {{-- Including Main Content --}}

    {{-- Including Footer --}}
    @include('main.includes.footer')
    {{-- Including Footer --}}

    {{-- Overlay On Menu Open For Mobile --}}
        <div class="overlay"></div>
    {{-- Overlay On Menu Open For Mobile --}}


</div>




    {{-- Adding Jquery --}}
    <script  src={{ asset('scripts/jquery.js') }}></script>
     {{-- Adding Jquery --}}

      {{-- Adding Main Navigation Script--}}
    <script src={{ asset('scripts/mainnavigation.js')}}></script>
    {{-- Adding Main Navigation Script--}}

    {{-- Adding IonIcons Script--}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    {{-- Adding IonIcons Script--}}

    {{-- Adding IonIcons Script--}}
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    {{-- Adding IonIcons Script--}}

    {{-- Adding Swifty Sliders Script--}}
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    {{-- Adding Swifty Sliders Script--}}

    {{-- Adding FontAwesome Script--}}
    <script src={{ asset('scripts/font-awesome.js') }}></script>
    {{-- Adding FontAwesome Script--}}

    {{-- Adding Swiper Script--}}
    <script src={{ asset('scripts/swiper.js') }}></script>
    {{-- Adding Swiper Script--}}

    {{-- Adding PlyrJs Script--}}
    <script src="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.js"></script>
    {{-- Adding PlyrJs Script--}}

    {{-- Adding OwlCarousel Script--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Adding OwlCarousel Script--}}

    {{-- Adding Extra Script From Other Pages--}}
    @yield('scripts')
    {{-- Adding Extra Script From Other Pages--}}
</body>
</html>
