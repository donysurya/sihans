@extends('user.layouts.main')

@section('title', 'Data Kunjungan | Buat Data Kunjungan')

@push('css')
    <style>
        .imgPreview img {
            padding: 8px;
            max-width: 150px;
        } 
    </style>
@endpush

@push('headscript')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('besuk.index') }}">Data Kunjungan</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Buat Data</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fas fa-person-booth me-2"></i>Buat Data Kunjungan</h6>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Buat Data Kunjungan</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('besuk.index') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-person-booth me-2"></i>Buat Data Kunjungan</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('besuk.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nama" class="form-control-label">Nama Tahanan</label>
                                                            <input class="form-control @error('nama') is-invalid @enderror" value="{{ $data_tahanan->nama }}" name="nama" type="text" readonly="">
                                                            <input value="{{ $data_tahanan->id }}" name="id_tahanan" type="hidden">
                                                            @error('nama')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nik" class="form-control-label">NIK</label>
                                                            <input class="form-control @error('nik') is-invalid @enderror" value="{{ $data_tahanan->nik }}" name="nik" type="text" readonly="">
                                                            @error('nik')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="no_tahanan" class="form-control-label">Reg. Tahanan</label>
                                                            <input class="form-control @error('no_tahanan') is-invalid @enderror" value="{{ $data_tahanan->no_tahanan }}" name="no_tahanan" type="text" readonly="">
                                                            @error('no_tahanan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                                                            <input class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ $data_tahanan->pekerjaan }}" name="pekerjaan" type="text" readonly="">
                                                            @error('pekerjaan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="alamat" class="form-control-label">Alamat</label>
                                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" aria-describedby="alamatHelp">{{ $data_tahanan->alamat }}</textarea>
                                                            @error('alamat')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="perkara" class="form-control-label">Pasal Perkara Tahanan.</label>
                                                            <textarea name="perkara" class="form-control @error('perkara') is-invalid @enderror" aria-describedby="perkaraHelp">{{ $data_tahanan->perkara }}</textarea>
                                                            @error('perkara')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                                                            <input class="form-control" value="{{ $data_tahanan->tempat_lahir }}" name="tempat_lahir" type="text" readonly="" placeholder="Tempat Lahir Tahanan">
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
                                                            <input class="form-control" value="{{ $data_tahanan->tgl_lahir }}" name="tgl_lahir" type="text" readonly="" placeholder="Tanggal Lahir Tahanan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                                            <input class="form-control" value="{{ $data_tahanan->jenis_kelamin }}" name="jenis_kelamin" type="text" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="kewarganegaraan" class="form-control-label">Kewarganegaraan</label>
                                                            <input class="form-control" value="{{ $data_tahanan->kewarganegaraan }}" name="kewarganegaraan" type="text" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="pendidikan" class="form-control-label">Pendidikan</label>
                                                            <input class="form-control" value="{{ $data_tahanan->pendidikan }}" name="pendidikan" type="text" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="agama" class="form-control-label">Agama</label>
                                                            <input class="form-control" value="{{ $data_tahanan->agama }}" name="agama" type="text" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="hubungan" class="form-control-label">Deskripsikan hubungan pengunjung terhadap tahanan</label>
                                                    <input class="form-control @error('hubungan') is-invalid @enderror" value="{{ old('hubungan') }}" name="hubungan" type="text" placeholder="Hubungan Pengunjung dengan Tahanan">
                                                    @error('hubungan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="keperluan" class="form-control-label">Deskripsikan keperluan pengunjung terhadap tahanan</label>
                                                    <input class="form-control @error('keperluan') is-invalid @enderror" value="{{ old('keperluan') }}" name="keperluan" type="text" placeholder="Keperluan Pengunjung dengan Tahanan">
                                                    @error('keperluan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-plus me-2"></i>Buat Kunjungan</button>
                                            </div>
                                        </div>
                                    </form>
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