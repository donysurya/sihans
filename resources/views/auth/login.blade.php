@extends('auth.layout')

@section('title', 'SIHANS | Surat Izin Mengunjungi Tahanan Jaksa')

@push('css')
@endpush

@push('headscript')
@endpush

@section('modal')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center gy-4 my-5">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-lg-0 mx-auto">
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
                        <form role="form" action="{{ route('login.perform') }}" method="post">
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
                        <p class="mb-0 fw-bold">Belum memiliki akun? <a href="{{ route('register.show') }}">Registrasi</a></p>
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

            <div class="col-xl-4 col-lg-5 col-md-6 d-flex">
                <div class="card bg-white pt-4">
                    <div class="card-body">
                        <h4 class="font-weight-bolder mb-3"><i class="fas fa-info-circle me-2"></i>Informasi</h4>
                        <p class="mb-3">Sebagai Pengunjung baru Sistem SIHANS, pengunjung dapat mendaftarkan diri terlebih dahulu untuk mendapatkan hak akses login ke dalam Sistem SIHANS atau bisa menghubungi pihak PIDUM untuk melakukan pendaftaran dengan menghubungi kontak informasi yang tertera di bawah ini</p>
                        <p class="mb-0"><i class="fas fa-phone-square-alt me-2"></i>Telepon : 0811-5187-878</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('bottomscript')
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
@endpush