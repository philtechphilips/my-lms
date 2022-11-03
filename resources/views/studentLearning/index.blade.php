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

</head>
<body>
       {{-- Including Navigation Bar --}}
       @include('studentLearning.includes.navbar')
       {{-- Including Navigation Bar --}}

       {{-- Including Main Content --}}
       <main>
           @yield('content')
       </main>
       {{-- Including Main Content --}}

       {{-- Including Footer --}}
       @include('studentLearning.includes.footer')
       {{-- Including Footer --}}

       {{-- Overlay On Menu Open For Mobile --}}
           <div class="overlay"></div>
       {{-- Overlay On Menu Open For Mobile --}}




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

       {{-- Cursor Scripts --}}
</body>
</html>
