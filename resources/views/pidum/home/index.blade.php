@extends('pidum.layouts.main')

@section('title', 'Dashboard | Petugas Pidum')

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
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pengunjung</p>
                                    <h5 class="font-weight-bolder">{{ $user->count() }}</h5>
                                    <a class="btn btn-link text-danger px-1 py-0 mb-0 text-sm" href="{{ route('pidum.user') }}">Lihat Detail <i class="fa fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Besuk</p>
                                    <h5 class="font-weight-bolder">{{$besuk->count()}}</h5>
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
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Tahanan</p>
                                    <h5 class="font-weight-bolder">{{ $tahanan->count() }}</h5>
                                    <a class="btn btn-link text-danger px-1 py-0 mb-0 text-sm" href="{{ route('pidum.tahanan') }}">Lihat Detail <i class="fa fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="fas fa-users-slash text-lg opacity-10" aria-hidden="true"></i>
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
                        <img src="{{ asset('argon/img/logo_pidum.png') }}" alt="logo" class="img_pidum">
                        <img src="{{ asset('argon/img/sihans.png') }}" alt="logo" class="w-25">
                        <div class="position-absolute top-50 end-0 translate-middle-y z-index-3">
                            <img src="{{ asset('argon/img/welcome.png') }}" alt="logo" class="img_welcome">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header p-3">
                        @if($expiredUser->count() > 0) 
                            <div class="row mb-0 align-items-center">
                                <div class="col-12 mb-2">
                                    <span class="badge bg-gradient-danger">
                                        <i class="fas fa-exclamation-circle me-2"></i>Mohon segera hapus akun yang telah kadaluwarsa!
                                    </span>
                                </div>
                                <div class="col-12">
                                    <a class="btn bg-gradient-danger mb-0" href="{{ route('pidum.user') }}"><i class="fas fa-trash"></i>&nbsp;&nbsp;Hapus Semua Akun</a>
                                </div>
                            </div>
                        @else
                            <div class="row mb-0 align-items-center">
                                <div class="col-12 mb-2">
                                    <span class="badge bg-gradient-primary">
                                        <i class="fas fa-user-check me-2"></i>Pengunjung Aktif
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card">
                                <div class="card-body px-0 py-3">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">No</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Identitas Pengunjung</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Tgl. Kadaluwarsa</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Informasi</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($expiredUser as $index => $item)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <p class="text-md text-secondary mb-0">
                                                                {{$index+1}}
                                                            </p>
                                                        </td>
                                                        <td style="white-space:normal!important;" class="align-middle">
                                                            <div class="d-flex py-1 align-items-center">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $item->nama }}</h6>
                                                                    <h6 class="mb-0 text-sm">NIK: {{ $item->nik }}</h6>
                                                                    <h6 class="mb-0 text-sm">Email: {{ $item->email }}</h6>
                                                                    <h6 class="mb-0 text-sm">No HP: {{ $item->phone }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">Updated by: {{ $item->admin->name ?? 'Petugas Pidum'}}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->expired_date }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold"><span class="badge bg-gradient-danger">Akun telah kadaluwarsa</span></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-user{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>Hapus</a><br>
                                                        </td>

                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="modal-delete-user{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-user{{ $item->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="py-3 text-center">
                                                                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                                            <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                                            <p>Apakah anda yakin ingin menghapus Akun Pengunjung {{ $item->name }}?</p>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <form action="{{ route('pidum.user.destroy', ['id' => $item->id]) }}" method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-trash me-2"></i>Hapus Data</button>
                                                                            </form>
                                                                            <button type="button" class="btn btn-danger text-white ml-auto" data-bs-dismiss="modal"><i class="fa fa-close me-2"></i>Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Delete Modal -->

                                                        <!-- Delete All User Modal -->
                                                        <div class="modal fade" id="modal-deleteAllUser{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-deleteAllUser{{ $item->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="py-3 text-center">
                                                                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                                            <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                                            <p>Apakah anda yakin ingin menghapus Semua Akun Pengunjung yang telah Kadaluwarsa?</p>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <form action="{{ route('pidum.user.destroy', ['id' => $item->id]) }}" method="post">
                                                                                @csrf
                                                                                @method('put')
                                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-check me-2"></i>Hapus Data</button>
                                                                            </form>
                                                                            <button type="button" class="btn btn-danger text-white ml-auto" data-bs-dismiss="modal"><i class="fa fa-close me-2"></i>Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Set Active Modal -->
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <p class="text-sm text-secondary font-weight-bolder mb-0">- No data found -</p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3"></div>
                            
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