<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>@yield('title')</title>

         <!-- Datatable -->
         <link href="{{ asset('assets/./vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">


        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/./images/favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('assets/./vendor/owl-carousel/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/./vendor/owl-carousel/css/owl.theme.default.min.css') }}">
        <link href="{{ asset('assets/./vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/./css/style.css') }}" rel="stylesheet">

       
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
       
    
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

        @include('layouts.partials.header')

        @include('layouts.partials.sidebar')

        {{$slot}}

        @include('layouts.partials.footer')
        



    </div>

    <!-- Required vendors -->
    <script src="{{ asset('assets/./vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/./js/quixnav-init.js') }}"></script>
    <script src="{{ asset('assets/./js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('assets/./vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/./vendor/morris/morris.min.js') }}"></script>


    <script src="{{ asset('assets/./vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/./vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/./vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('assets/./vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/./vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('assets/./vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('assets/./vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/./vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('assets/./vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('assets/./js/dashboard/dashboard-1.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('assets/./vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/./js/plugins-init/datatables.init.js') }}"></script>

    @livewireScripts
    @stack('scripts')

    </body>
</html>
