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
    <link rel="stylesheet" type="text/css" href={{ asset('styles/Learning/navbar.css') }}>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href={{ asset('styles/Learning/landingpage.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/mylearning.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/Learning/footer.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('styles/Learning/profile.css') }}>
    <link rel="stylesheet" type="text/css" href={{asset('styles/Learning/my-ebook.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('styles/Learning/assessment.css')}}>
    <link rel="stylesheet" type="text/css" href="{{asset('styles/Learning/ebook-details.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/Learning/payments.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/Learning/video-page.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/Learning/quiz.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/Learning/view-score.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/certificate.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.css" />
    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" target="_blank">
    {{-- Toastr --}}

    <style>
        .ebook-datails-rating a{
            color: goldenrod;
            font-size: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body class="site" onscroll="myFunction()">
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

       {{-- Font Awesome --}}
       <script src="https://kit.fontawesome.com/42ee96f7b3.js" crossorigin="anonymous"></script>
       {{-- Font Awesome --}}
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

       {{-- Navbar Script --}}
            <script>
                const menutrigger = document.querySelector('.dropdown-trigger');
                const menutrig = document.querySelector('.showdropdown');
                const dropdown = document.querySelector('.dashboard-navbar-right-profile-image-dropdown');
                menutrigger.addEventListener('click', function(){
                    dropdown.classList.toggle('showdropdown')
                });
               if(menutrig != null){
                menutrigger.addEventListener('click', function(){
                    dropdown.classList.remove('showdropdown')
                });
               }

            </script>
       {{-- Navbar Script --}}

       {{-- Go Back Script --}}
            <script>
                const back = document.querySelector('#go-back');
                back.addEventListener('click', function(){
                    history.go(-1);
                });
            </script>

       {{-- Go Back Script --}}

        {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Sweet Alert --}}



       {{-- Adding Extra Script From Other Pages--}}
       @yield('scripts')
       {{-- Adding Extra Script From Other Pages--}}




</body>
</html>
