@extends('pidum.layouts.main')

@section('title', 'Data Pengunjung | Edit Data Pengunjung | Petugas Pidum')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('pidum.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('pidum.user') }}">Data Pengunjung</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Data</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-user me-2"></i>Edit Data Pengunjung</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Edit Data Pengunjung</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('pidum.user') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-edit me-2"></i>Edit Data Pengunjung</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('pidum.user.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" name="email" type="email" placeholder="name@example.com">
                                                    <label for="email" class="form-control-label mt-1">Email Pengunjung.</label>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('nama') is-invalid @enderror" value="{{ $user->name }}" name="nama" type="text" placeholder="Nama Pengunjung">
                                                    <label for="nama" class="form-control-label mt-1">Update Nama lengkap Pengunjung. <br>Contoh: XYZ</label>
                                                    @error('nama')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('nik') is-invalid @enderror" value="{{ $user->nik }}" name="nik" type="number" placeholder="NIK Pengunjung">
                                                    <label for="nik" class="form-control-label mt-1">Update NIK lengkap Pengunjung. <br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>NIK yang diinputkan berupa angka 16 digit.</span></label>
                                                    @error('nik')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ $user->pekerjaan }}" name="pekerjaan" type="text" placeholder="Pekerjaan Pegawai">
                                                    <label for="pekerjaan" class="form-control-label">Update Pekerjaan lengkap Pengunjung</label>
                                                    @error('pekerjaan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" aria-describedby="pendidikan">
                                                        <option value="" disabled selected>-Pilih pendidikan terakhir pengunjung-</option>
                                                        @foreach($pendidikan as $item)
                                                            <option value="{{$item}}" {{old('pendidikan') ?? $user->pendidikan == $item ? 'selected' : ''}}>{{$item}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="pendidikan" class="form-control-label">Pilih pendidikan terakhir pengunjung</label>
                                                    @error('pendidikan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="desc" aria-describedby="alamatHelp">{{ $user->alamat }}</textarea>
                                                    <label for="alamat" class="form-control-label">Update alamat apabila dibutuhkan.</label>
                                                    @error('alamat')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? "checked" : "" }}>
                                                        <label class="form-check-label" for="jenis_kelamin1">
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? "checked" : "" }}>
                                                        <label class="form-check-label" for="jenis_kelamin2">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}" name="phone" type="number" placeholder="No HP Pengunjung">
                                                    <label for="phone" class="form-control-label mt-1">Deskripsikan No HP lengkap Pengunjung. <br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>No HP yang diinputkan berupa angka.</span></label>
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-edit me-2"></i>Edit Data</button>
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