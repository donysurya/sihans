<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('argon/img/logo_pidum.png') }}"/>
        <title>
            LOGIN | SIHANS
        </title>
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
    </head>

    <body class="">
        <main class="main-content position-relative mt-0">
            <div class="position-absolute top-0 start-0">
                <img src="{{ asset('argon/img/sihans.png') }}" alt="logo" class="img-fluid m-1" style="width: 20%; z-index:1;">
            </div>
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                                <div class="card card-plain bg-white pt-4">
                                    <div class="card-header pb-0 text-start">
                                        <div class="row align-items-center">
                                            <div class="col-4 d-xl-none d-lg-none d-md-none d-block">
                                                <img src="{{ asset('argon/img/sihans.png') }}" alt="logo" class="img-fluid d-lg-none d-md-none d-flex " style="width: 100%; z-index:1;">
                                            </div>
                                            <div class="col-8">
                                                <h4 class="font-weight-bolder">Login</h4>
                                                <p class="mb-0">Masukkan email & password</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if(session()->has('error'))
                                            <div class="alert alert-danger text-light">
                                                <strong>{{ session()->get('error') }}</strong>
                                            </div>
                                        @endif
                                        <form role="form" action="{{ route('pidum.login.check') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="Email" autofocus placeholder="Email" aria-label="Email" id="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" aria-label="Password" id="password" aria-describedby="passwordShow">
                                                <span class="input-group-text border" id="passwordShow" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Password"><a href="#" class="text-decoration-none" onclick="myFunction()"><i class="fa fa-eye"></i></a></span>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-lg btn-danger btn-lg w-100 mt-4 mb-0">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-header pt-2 text-start bg-transparent">
                                        <p class="mb-0 text-danger fw-bold"><span class="ni ni-email-83 me-2"></span>sihans@kejaksaan.go.id</p>
                                    </div>
                                    <div class="card-header pt-2 text-start bg-transparent">
                                        <div class="d-flex align-items-center mb-3 justify-content-center">
                                            <img src="{{ asset('argon/img/logo_pidum.png') }}" alt="logo" class="img-fluid m-1" style="width: 10%; z-index:1;">
                                            <img src="{{ asset('argon/img/satya.png') }}" alt="logo" class="img-fluid m-1" style="width: 10%; z-index:1;">
                                            <img src="{{ asset('argon/img/lanri.png') }}" alt="logo" class="img-fluid m-1" style="width: 22%; z-index:1;">
                                            <img src="{{ asset('argon/img/trapsila.png') }}" alt="logo" class="img-fluid m-1" style="width: 20%; z-index:1;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

        <script>
            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </body>

</html>