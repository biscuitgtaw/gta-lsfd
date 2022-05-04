<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- Antelope.io - Website Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ APPLICATION_FULL_NAME }} :: @yield('title')</title>

        <!-- Antelope.io - Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
        <!-- Antelope.io - Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- Antelope.io - Typography CSS -->
        <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
        <!-- Antelope.io - DataTables CSS -->
        <link rel="stylesheet" href="{{ asset('css/jquery.datatables.min.css') }}">
        <!-- Antelope.io - Toastr CSS -->
        <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
        <!-- Antelope.io - Style CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Antelope.io - Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Antelope.io - App CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Antelope.io - Page CSS -->
        @yield('css')

    </head>
    <body>

        <x-master.loader/>

        <!-- Antelope.io - Global Wrapper -->
        <div class="wrapper">

            <x-master.sidebar/>
            <x-master.header title="{{ View::getSection('title', 'An error has occured...') }}" breadcrumb="{{ View::getSection('breadcrumb', __('core.home')) }}"/>

            <!-- Antelope.io - Page Content  -->
            @yield('content')
            <!-- #END - Page Content  -->

            <!-- Antelope.io - Modals -->
            @yield('modals')
            <!-- #END - Modals -->

        </div>
        <!-- #END - Global Wrapper -->

        <x-master.footer/>

        <!-- Antelope.io - Javascript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/assets/jquery.min.js') }}"></script>
        <script src="{{ asset('js/assets/popper.min.js') }}"></script>
        <script src="{{ asset('js/assets/bootstrap.min.js') }}"></script>

        <!-- Appear JavaScript -->
        <script src="{{ asset('js/assets/jquery.appear.js') }}"></script>

        <!-- Countdown JavaScript -->
        <script src="{{ asset('js/assets/countdown.min.js') }}"></script>

        <!-- Counterup JavaScript -->
        <script src="{{ asset('js/assets/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/assets/jquery.counterup.min.js') }}"></script>

        <!-- Wow JavaScript -->
        <script src="{{ asset('js/assets/wow.min.js') }}"></script>

        <!-- Apexcharts JavaScript -->
        <script src="{{ asset('js/assets/apexcharts.js') }}"></script>

        <!-- Slick JavaScript -->
        <script src="{{ asset('js/assets/slick.min.js') }}"></script>

        <!-- Select2 JavaScript -->
        <script src="{{ asset('js/assets/select2.min.js') }}"></script>

        <!-- FontAwesome Javascript -->
        <script src="https://kit.fontawesome.com/f13f05acf9.js" crossorigin="anonymous"></script>

        <!-- Owl Carousel JavaScript -->
        <script src="{{ asset('js/assets/owl.carousel.min.js') }}"></script>

        <!-- Magnific Popup JavaScript -->
        <script src="{{ asset('js/assets/jquery.magnific-popup.min.js') }}"></script>

        <!-- Smooth Scrollbar JavaScript -->
        <script src="{{ asset('js/assets/smooth-scrollbar.js') }}"></script>

        <!-- lottie JavaScript -->
        <script src="{{ asset('js/assets/lottie.js') }}"></script>

        <!-- Chart Custom JavaScript -->
        <script src="{{ asset('js/assets/chart-custom.js') }}"></script>

        <!-- DataTable JavaScript -->
        <script src="{{ asset('js/assets/datatables.min.js') }}"></script>

        <!-- SweetAlert2 JavaScript -->
        <script src="{{ asset('js/assets/sweetalert2.min.js') }}"></script>

        <!-- Toastr JavaScript -->
        <script src="{{ asset('js/assets/toastr.min.js') }}"></script>

        <!-- Sofbox JavaScript -->
        <script src="{{ asset('js/sofbox.js') }}"></script>

        <!-- Localization JavaScript -->
        <script src="{{ asset('js/localization.js') }}"></script>

        <!-- App JavaScript -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- X-Elements JavaScript -->
        <script src="{{ asset('js/views/master/header.js') }}"></script>

        <!-- PHP JavaScript -->
        @yield('phpjs')

        <!-- Page JavaScript -->
        @yield('javascript')
        <!-- #END - Javascript -->

    </body>
</html>
