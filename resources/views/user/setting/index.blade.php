@extends('user.layouts.main')

@section('title', 'Dashboard | Profile - Pengunjung')

@push('css')
    <style>
        .imgPreview1 img {
            padding: 8px;
            max-width: 150px;
        } 
        .imgPreview2 img {
            padding: 8px;
            max-width: 160px;
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Setting</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-cogs me-2"></i>Pengunjung</h6>
    </nav>
@endsection

@section('content')
<div class="card shadow-lg mx-4 mt-4">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative overflow-hidden">
                        <i class="fa fa-user fa-2x text-primary border border-info shadow-sm p-3 rounded-circle"></i>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="font-weight-bolder mb-1">
                            {{ auth()->user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Pengunjung - Sihans
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-7 col-md-7 col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Detail Data</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-eye me-2"></i>Informasi Pengunjung</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('setting.update', ['id' => auth()->user()->id]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" name="email" type="email" readonly="" placeholder="name@example.com">
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
                                                <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-edit me-2"></i>Update Informasi</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5 col-md-5 col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <h6 class="mb-0 font-weight-bolder"><i class="fa fa-images me-2"></i>Foto Profil</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-3">
                                <div class="row">
                                    <div class="card px-0 mb-3">
                                        <div class="card-body pt-3 px-3 pb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="form-group text-center">
                                                        @if(auth()->user()->image != null)
                                                            <img src="{{ asset('user/'.auth()->user()->name.'/'.auth()->user()->image) }}" alt="{{auth()->user()->name}}" width="240px">
                                                        @else
                                                            <img src="{{ asset('argon/img/tim.png') }}" alt="Foto" width="50%">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card px-0">
                                        <div class="card-header pb-0 px-3">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0"><i class="fa fa-edit me-2"></i>Update Foto Profil</p>
                                            </div>
                                        </div>
                                        <div class="card-body pt-3 px-3 pb-2">
                                            @if(session()->has('error'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ session()->get('error') }}</strong>
                                                </div>
                                            @endif
                                            <form action="{{ route('setting.update.image', ['id' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-1">
                                                            <div class="imgPreview1"> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="images" value="{{ old('file') }}" placeholder="Upload File">
                                                            <label for="file" class="form-control-label mt-1">Upload Foto Profil (*jpg,jpeg,png,bmp,webp).<br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>Maksimum Size: 2 MB.</span></label>
                                                            @error('file')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-edit me-2"></i>Update Foto</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <h6 class="mb-0 font-weight-bolder"><i class="fa fa-images me-2"></i>Foto KTP</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-3">
                                <div class="row">
                                    <div class="card px-0 mb-3">
                                        <div class="card-body pt-3 px-3 pb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="form-group text-center">
                                                        @if(auth()->user()->ktp != null)
                                                            <img src="{{ asset('user/'.auth()->user()->name.'/'.auth()->user()->ktp) }}" alt="{{auth()->user()->ktp}}" width="240px">
                                                        @else
                                                            <img src="{{ asset('argon/img/ktp.png') }}" alt="Foto" width="50%">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card px-0">
                                        <div class="card-header pb-0 px-3">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0"><i class="fa fa-edit me-2"></i>Update Foto KTP</p>
                                            </div>
                                        </div>
                                        <div class="card-body pt-3 px-3 pb-2">
                                            @if(session()->has('error'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ session()->get('error') }}</strong>
                                                </div>
                                            @endif
                                            <form action="{{ route('setting.update.ktp', ['id' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-1">
                                                            <div class="imgPreview2"> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control @error('ktp') is-invalid @enderror" type="file" name="ktp" id="ktp" value="{{ old('ktp') }}" placeholder="Upload File">
                                                            <label for="ktp" class="form-control-label mt-1">Upload Foto KTP (*jpg,jpeg,png,bmp,webp).<br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>Maksimum Size: 2 MB.</span></label>
                                                            @error('ktp')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-edit me-2"></i>Update Foto</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <h6 class="mb-0 font-weight-bolder">Password</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-3">
                                <div class="row">
                                    <div class="card px-0">
                                        <div class="card-header pb-0 px-3">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0"><i class="fa fa-key me-2"></i>Update Password</p>
                                            </div>
                                        </div>
                                        <div class="card-body pt-3 px-3 pb-2">
                                            @if(session()->has('error'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ session()->get('error') }}</strong>
                                                </div>
                                            @endif
                                            <form action="{{ route('setting.update-password') }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('old_password') is-invalid @enderror" name="current_password" id="current_password" autocomplete="current_password" type="password">
                                                            <label for="current_password" class="form-control-label mt-1">Password Lama</label>
                                                            @error('old_password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('new_password') is-invalid @enderror" name="password" id="password" autocomplete="password" type="password">
                                                            <label for="password" class="form-control-label mt-1">Password Baru</label>
                                                            @error('new_password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation" type="password">
                                                            <label for="password_confirmation" class="form-control-label mt-1">Konfirmasi Password Baru</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-key me-2"></i>Update Password</button>
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
            </div>
        </div>  

        <!-- Footer -->
        @include('pidum.partials.footer')
        <!-- End Footer -->
    </div>
@endsection

@push('bottomscript')
    <script>
        $(function() {
            var imgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                imgPreview(this, 'div.imgPreview1');
            });
            $('#ktp').on('change', function() {
                imgPreview(this, 'div.imgPreview2');
            });
        });    
    </script>
@endpush