@extends('user.layouts.main')

@section('title', 'Dashboard | Pengunjung')

@push('css')
    <style>
        @media only screen and (max-width: 576px) {
            /* For smartphone: */
            .img_pidum{
                width:5rem!important;
            }

            .img_welcome{
                width:10rem!important;
                padding-right:1rem;
            }
        }

        @media only screen and (min-width: 577px) {
            /* For smartphone: */
            .img_pidum{
                width:7rem!important;
            }

            .img_welcome{
                width:18.5rem!important;
                padding-right:1rem;
            }
        }

        @media only screen and (min-width: 768px) {
            /* For tablets: */
            .img_pidum{
                width:9rem!important;
            }

            .img_welcome{
                width:19rem!important;
                padding-right:1rem;
            }
        }

        @media only screen and (min-width: 992px) {
            /* For desktop: */
            .img_pidum{
                width:9rem!important;
            }

            .img_welcome{
                width:19rem!important;
                padding-right:1.5rem;
            }
        }

        @media only screen and (min-width: 1200px) {
            /* For desktop: */
            .img_pidum{
                width:10rem!important;
            }

            .img_welcome{
                width:20rem!important;
                padding-right:2rem;
            }
        }
    </style>
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="#">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="ni ni-tv-2 me-2"></i>Dashboard</h6>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Surat Persetujuan</p>
                                    <h5 class="font-weight-bolder">{{ $besuk->count() }}</h5>
                                    <a class="btn btn-link text-danger px-1 py-0 mb-0 text-sm" href="{{ route('besuk.index') }}">Lihat Detail <i class="fa fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fas fa-file-contract text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Info Besuk</p>
                                    <h5 class="font-weight-bolder">0</h5>
                                    <a class="btn btn-link text-danger px-1 py-0 mb-0 text-sm" href="#">Lihat Detail <i class="fa fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle">
                                    <i class="fas fa-person-booth text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card card-frame">
                    <div class="card-body position-relative">
                        <h4 class="mb-4"><i class="fas fa-door-open me-2"></i>Selamat Datang</h4>
                        <!-- <img src="{{ asset('argon/img/logo_pidum.png') }}" alt="logo" class="img_pidum"> -->
                        <img src="{{ asset('argon/img/sihans.png') }}" alt="logo" class="w-25">
                        <div class="position-absolute top-50 end-0 translate-middle-y z-index-3">
                            <img src="{{ asset('argon/img/welcome.png') }}" alt="logo" class="img_welcome">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                @if($besuk_ditolak->count() > 0)
                <div class="alert alert-danger text-light" role="alert">
                    <span class="alert-icon"><i class="fas fa-info-circle"></i></span>
                    <span class="alert-text"><strong>Pemberitahuan! Surat permohonan anda ditolak!</strong> </span>
                </div>
                @endif
                @if($besuk->count() > 0)
                <div class="alert alert-warning text-dark" role="alert">
                    <span class="alert-icon"><i class="fas fa-info-circle"></i></span>
                    <span class="alert-text"><strong>Pemberitahuan! Surat persetujuan anda telah diterbitkan!</strong> </span>
                </div>
                @endif
                <div class="alert alert-primary text-light" role="alert">
                    <span class="alert-icon"><i class="fas fa-info-circle"></i></span>
                    <span class="alert-text"><strong>Pemberitahuan!</strong> Masa berlaku akun terhitung 3 hari aktif!</span>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            @if ((auth()->user()->image == null) && (auth()->user()->ktp == null))
                <div class="col-lg-12 mt-0 mb-4">
                    <div class="card ">
                        <div class="card-header p-3 d-flex justify-content-between align-items-center">
                            <p class="font-weight-bold mb-0"><i class="fas fa-user-check me-2"></i>Update Profile</p>
                            <a href="#" class="text-danger"><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="card-body pt-0 pb-3">
                            <div class="row">
                                <div class="card">
                                    <div class="card-body px-0 py-3">
                                        <span class="alert-text">Update informasi pengunjung sebelum melakukan pengisian form kunjungan!</span>
                                        <div class="row mt-4 align-items-center">
                                            <div class="col-md-6 text-center">
                                                <img src="{{ asset('argon/img/tim.png') }}" alt="Foto" width="50%">
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{ asset('argon/img/ktp.png') }}" alt="KTP" width="80%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-12 mb-lg-0 mt-0 mb-4">
                <div class="card ">
                    <div class="card-header p-3">
                        <p class="font-weight-bold mb-0"><i class="fas fa-info-circle me-2"></i>Informasi kunjungan</p>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card">
                                <div class="card-body px-0 py-3">
                                    <p class="alert-text">Syarat besuk tahanan hanya pada hari kerja di rumah tahanan negara pada hari Senin s/d Jum’at jam besuk mulai pukul 08.00 wib – 11.00 wib.</p>
                                    <p class="alert-text">Pemohon wajib mengisi formulir dan upload KTP di kolom yang tersedia</p>
                                    <p class="alert-text">Formulir permohonan ijin mengunjungi tahanan (diisi oleh pemohon yang hendak mengunjungi tersangka/terdakwa)</p>
                                </div>
                            </div>
                            <div class="mt-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('pidum.partials.footer')
        <!-- End Footer -->

    </div>
@endsection

@push('bottomscript')
@endpush