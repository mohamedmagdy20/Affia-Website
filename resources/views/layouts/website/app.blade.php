<!DOCTYPE html>
<html dir="rtl" lang="ar">


<!-- Mirrored from demo.rels.ws/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 13:28:27 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>بوابة العافية</title>
    
    {{-- <meta name="csrf-token" content="{{_csrf()}}"> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net/">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&amp;display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css -->
    <link href="{{asset('assets/lib/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/lib/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/lib/tobii/css/tobii.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/tiny-slider/tiny-slider.css')}}" rel="stylesheet">

    <link href="{{asset('assets/lib/swiper/css/swiper.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/website/aos.css')}}" />
    
    <script src="https://cdn.tiny.cloud/1/2u0iksfhs2yfo42566pdhvqmrf9o7pzxegoho87x4lsh8rdy/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>




   
    <link rel="preload" as="style" href="{{asset('assets/lib/tailwind-23e1b14b.css')}}" />
    <link rel="modulepreload" href="{{asset('assets/lib/app-1b7146db.js')}}" />
    <link rel="stylesheet" href="{{asset('assets/lib/tailwind-23e1b14b.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script type="module" src="{{asset('assets/lib/app-1b7146db.js')}}"></script> <!-- Livewire Styles -->
  
    <style>
        
        .bg-footer {
            background-image: url({{asset('storage/images/footer/bg.gif')}});
        }

    </style>
    @yield('css')
</head>

<body lang="en" class=" font-almarai text-base text-black   scroll-smooth antialiased" dir="ltr">

    <!-- Start Navbar -->
    @include('layouts.website.nav')
    <!--end header-->
    <!-- End Navbar -->
    <!-- Start Hero -->
    <!--end section-->
    <!-- Hero End -->
    @yield('content')

    <!-- Footer Start -->
    @include('layouts.website.footer')
    <!--end footer-->
    <!-- Footer End -->


    <!-- JAVASCRIPTS -->
    <script src="{{asset('assets/lib/tobii/js/tobii.min.js')}}"></script>

    <script src="{{asset('assets/lib/swiper/js/swiper.min.js')}}"></script>
    <script src="{{asset('assets/lib/tiny-slider/min/tiny-slider.js')}}"></script>
    <script src="{{asset('assets/lib/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/lib/plugins.init.js')}}"></script>
    <script src="{{asset('assets/lib/easy_background.js')}}"></script>
    <script src="{{asset('assets/lib/shufflejs/shuffle.min.js')}}"></script>
    <script src="{{asset('assets/website/aos.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/lib/app.js')}}"></script>
    <!-- Livewire Scripts -->

    <script src="{{asset('assets/lib/livewire4a5a.js')}}" data-turbo-eval="false" data-turbolinks-eval="false"></script>


    <script src="{{ asset('assets/admin/libs/jquery/jquery.min.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

       @if (Session::has('success'))
           <script>
               toastr.success('{{ Session::get('success') }}', 'success');
           </script>
       @endif

       @if (Session::has('error'))
           <script>
               toastr.error('{{ Session::get('error') }}', 'error');
           </script>
       @endif

       
       @if (Session::has('info'))
           <script>
               toastr.info('{{ Session::get('info') }}', 'info');
           </script>
       @endif
       <script>
        AOS.init();
      </script>
    @yield('js')
</body>


<!-- Mirrored from demo.rels.ws/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 13:30:08 GMT -->

</html>