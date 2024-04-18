@extends('pidum.layouts.main')

@section('title', 'Data Pengunjung | Buat Data Pengunjung | Petugas Pidum')

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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('pidum.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('pidum.user') }}">Data Pengunjung</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tambah Data</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fas fa-user me-2"></i>Tambah Data Pengunjung</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Tambah Data Pengunjung</h6>
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
                                        <p class="mb-0"><i class="fa fa-plus me-2"></i>Buat Data Pengunjung</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('pidum.user.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" type="email" placeholder="name@example.com">
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
                                                    <input class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" name="nama" type="text" placeholder="Nama Pengunjung">
                                                    <label for="nama" class="form-control-label mt-1">Deskripsikan Nama lengkap Pengunjung. <br>Contoh: XYZ</label>
                                                    @error('nama')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" name="nik" type="number" placeholder="NIK Pengunjung">
                                                    <label for="nik" class="form-control-label mt-1">Deskripsikan NIK lengkap Pengunjung. <br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>nik yang diinputkan berupa angka 16 digit.</span></label>
                                                    @error('nik')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan') }}" name="pekerjaan" type="text" placeholder="Pekerjaan Pengunjung">
                                                    <label for="pekerjaan" class="form-control-label">Deskripsikan pekerjaan lengkap Pengunjung</label>
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
                                                            <option value="{{$item}}" {{old('pendidikan') ?? 'Strata 1 (S1)' == $item ? 'selected' : ''}}>{{$item}}</option>
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
                                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="desc" aria-describedby="alamatHelp" placeholder="Alamat Pengunjung">{{ old('alamat') }}</textarea>
                                                    <label for="alamat" class="form-control-label">Tambahkan alamat apabila dibutuhkan.</label>
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
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki">
                                                        <label class="form-check-label" for="jenis_kelamin1">
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan">
                                                        <label class="form-check-label" for="jenis_kelamin2">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" type="number" placeholder="No HP Pengunjung">
                                                    <label for="phone" class="form-control-label mt-1">Deskripsikan No HP lengkap Pengunjung. <br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>No HP yang diinputkan berupa angka.</span></label>
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('new_password') is-invalid @enderror" name="password" id="password" autocomplete="password" type="password">
                                                    <label for="password" class="form-control-label mt-1">Password</label>
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
                                                    <label for="password_confirmation" class="form-control-label mt-1">Konfirmasi Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-plus me-2"></i>Tambah Data</button>
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
                imgPreview(this, 'div.imgPreview');
            });
        });    
    </script>
@endpush