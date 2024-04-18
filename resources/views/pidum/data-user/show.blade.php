@extends('pidum.layouts.main')

@section('title', 'Data Pengunjung | Lihat Data Pengunjung | Petugas Pidum')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('pidum.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('pidum.user') }}">Pengunjung</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Lihat</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-user me-2"></i>Data Pengunjung</h6>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg mx-4 mt-4">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto d-flex align-items-center">
                    <div class="avatar avatar-xl position-relative overflow-hidden">
                        <img src="{{ $user->image != null ? Storage::url($user->image) : asset('argon/img/tim.png') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="h-100">
                        <h5 class="font-weight-bolder mb-1">
                            {{ $user->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $user->email }}
                        </p>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $user->nik }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder"><i class="fa fa-eye me-2"></i>Informasi Pengunjung</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('pidum.user') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-body pt-3 px-3 pb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="alert alert-warning text-white" role="alert">
                                                <i class="fas fa-exclamation-circle me-2"></i><strong>Pemberitahuan!</strong> Masa berlaku akun selama 3 Hari!
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pekerjaan" class="form-control-label">Pekerjaan Pengunjung</label>
                                                <input class="form-control" value="{{ $user->pekerjaan }}" name="pekerjaan" type="text" placeholder="Pekerjaan Pengunjung">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pendidikan" class="form-control-label">Pendidikan Terakhir Pengunjung</label>
                                                <input class="form-control" value="{{ $user->pendidikan }}" name="pendidikan" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                                <input class="form-control" value="{{ $user->jenis_kelamin }}" name="jenis_kelamin" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone" class="form-control-label">Nomor HP Pengunjung</label>
                                                <input class="form-control" value="{{ $user->phone }}" name="phone" type="text" placeholder="Nomor Pengunjung">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat" class="form-control-label">Alamat Pengunjung</label>
                                                <textarea name="alamat" class="form-control" id="desc" aria-describedby="alamatHelp">{{ $user->alamat }}</textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card px-0 mt-3">
                                <div class="card-body pt-3 px-3 pb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="ktp" class="form-control-label">Identitas Pengunjung (KTP)</label><br>
                                                <img src="{{ $user->ktp != null ? Storage::url($user->ktp) : asset('argon/img/ktp.png') }}" alt="{{$user->name}}" width="240px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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