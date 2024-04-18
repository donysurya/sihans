<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('argon/img/logo_pidum.png') }}"/>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('argon/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('argon/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('argon/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('argon/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

        <!-- Another Custom Style -->
        @stack('css') 
        @stack('headscript')

        <!-- Title -->
        <title>@yield('title')</title>
    </head>

    <body class="">

        <!-- Content -->
        @yield('modal')
        <!-- End Content -->
        
        <main class="main-content position-relative mt-0">
            <div class="position-absolute top-0 start-0">
                <img src="{{ asset('argon/img/sihans.png') }}" alt="logo" class="img-fluid m-1" style="width: 20%; z-index:1;">
            </div>
            <section>
                <div class="page-header min-vh-100">
                    <!-- Content -->
                    @yield('content')
                    <!-- End Content -->
                </div>
            </section>
        </main>
        <!--   Core JS Files   -->
        <script src="{{ asset('argon/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('argon/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('argon/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('argon/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('argon/js/argon-dashboard.min.js?v=2.0.4') }}"></script>

        <!-- Another Custom JS -->
        @stack('bottomscript')
    </body>

</html>