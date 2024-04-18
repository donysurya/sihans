@extends('home.layout')

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
            <div class="col-xl-6 col-lg-6 col-md-6 d-flex flex-column mx-lg-0 mx-auto">
                <div class="card bg-white pt-4">
                    <div class="card-body text-center">
                        <!-- <i class="fas fa-bullhorn fa-4x text-warning mb-2"></i> -->
                        <div class="row justify-content-center">
                            <div class="col-4 d-xl-none d-lg-none d-md-none d-block">
                                <img src="{{ asset('argon/img/sihans.png') }}" alt="logo" class="img-fluid d-lg-none d-md-none d-flex " style="width: 100%; z-index:1;">
                            </div>
                        </div>
                        <h4 class="fw-bold mt-2 mb-1">Selamat Datang</h4>
                        <h4 class="fw-bold mt-0 mb-4">Pengunjung Tahanan Jaksa</h4>
                        <h6 class="fw-bold mt-2 mb-4 px-lg-5 px-md-4 px-2">SIHANS Merupakan sebuah sistem yang bertujuan untuk mempermudah pengunjung tahanan ketika ingin melakukan kunjungan dengan mengisi form pengunjung dari mana saja tanpa harus mengunjungi tahanan terlebih dahulu untuk melakukan registrasi.</h6>
                        @auth
                            <div class="row justify-content-center">
                                <div class="col-md-6"><a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a></div>
                                <div class="col-md-6"><a href="{{ route('logout') }}" class="btn btn-danger">Keluar</a></div>
                            </div>
                        @endauth
                        @guest
                            <div class="row">
                                <div class="col-md-6"><a href="{{ route('login.show') }}" class="btn btn-primary">Pengunjung</a></div>
                                <div class="col-md-6"><a href="{{ route('pidum.login') }}" class="btn btn-danger">Petugas PIDUM</a></div>
                            </div>
                        @endguest
                    </div>
                    <div class="card-header pt-2 text-start bg-transparent">
                        <div class="d-flex align-items-center mb-3 justify-content-center">
                            <img src="{{ asset('argon/img/logo_pidum.png') }}" alt="logo" class="img-fluid m-1" style="width: 5%; z-index:1;">
                            <img src="{{ asset('argon/img/satya.png') }}" alt="logo" class="img-fluid m-1" style="width: 5%; z-index:1;">
                            <img src="{{ asset('argon/img/lanri.png') }}" alt="logo" class="img-fluid m-1" style="width: 12%; z-index:1;">
                            <img src="{{ asset('argon/img/trapsila.png') }}" alt="logo" class="img-fluid m-1" style="width: 12%; z-index:1;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('bottomscript')
@endpush