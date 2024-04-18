@extends('pidum.layouts.main')

@section('title', 'Data Tahanan | Buat Data Tahanan | Petugas Pidum')

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
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('pidum.tahanan') }}">Data Tahanan</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tambah Data</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fas fa-user-alt-slash me-2"></i>Tambah Data Tahanan</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Tambah Data Tahanan</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('pidum.tahanan') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-plus me-2"></i>Buat Data Tahanan</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('pidum.tahanan.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-3">
                                            <div class="col-md-6">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" name="nama" type="text" placeholder="Nama Tahanan">
                                                            <label for="nama" class="form-control-label mt-1">Deskripsikan Nama lengkap Tahanan. <br>Contoh: XYZ</label>
                                                            @error('nama')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" name="nik" type="number" placeholder="NIK Tahanan">
                                                            <label for="nik" class="form-control-label mt-1">Deskripsikan NIK lengkap Tahanan. <br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>nik yang diinputkan berupa angka 16 digit.</span></label>
                                                            @error('nik')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('no_tahanan') is-invalid @enderror" value="{{ old('no_tahanan') }}" name="no_tahanan" type="text" placeholder="Reg. Tahanan">
                                                            <label for="no_tahanan" class="form-control-label mt-1">Deskripsikan Reg. Tahanan.</label>
                                                            @error('no_tahanan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan') }}" name="pekerjaan" type="text" placeholder="Pekerjaan Tahanan">
                                                            <label for="pekerjaan" class="form-control-label">Deskripsikan pekerjaan lengkap Tahanan</label>
                                                            @error('pekerjaan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" aria-describedby="alamatHelp" placeholder="Alamat">{{ old('alamat') }}</textarea>
                                                            <label for="alamat" class="form-control-label">Tambahkan alamat tahanan.</label>
                                                            @error('alamat')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('agama') is-invalid @enderror" value="{{ old('agama') }}" name="agama" type="text" placeholder="Agama">
                                                            <label for="agama" class="form-control-label mt-1">Deskripsikan Tempat Lahir. <br>Contoh: Islam / Kristen Protestan / Katolik / Hindu / Budha / Konghucu</label>
                                                            @error('agama')
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
                                                            <input class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}" name="tempat_lahir" type="text" placeholder="Tempat Lahir">
                                                            <label for="tempat_lahir" class="form-control-label mt-1">Deskripsikan Tempat Lahir. <br>Contoh: Tamiang Layang</label>
                                                            @error('tempat_lahir')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}" name="tgl_lahir" type="date" placeholder="Tanggal Lahir">
                                                            <label for="tgl_lahir" class="form-control-label mt-1">Deskripsikan Tanggal Lahir. <br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>(Hari/Bulan/Tahun) - Contoh: 01/12/1990</span></label>
                                                            @error('tgl_lahir')
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
                                                            <select name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" aria-describedby="pendidikan">
                                                                <option value="" disabled selected>-Pilih pendidikan terakhir tahanan-</option>
                                                                @foreach($pendidikan as $item)
                                                                    <option value="{{$item}}" {{old('pendidikan') ?? 'Strata 1 (S1)' == $item ? 'selected' : ''}}>{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="pendidikan" class="form-control-label">Pilih pendidikan terakhir tahanan</label>
                                                            @error('pendidikan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="kewarganegaraan" id="kewarganegaraan1" value="WNI">
                                                                <label class="form-check-label" for="kewarganegaraan1">
                                                                    WNI (Warga Negara Indonesia)
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="kewarganegaraan" id="kewarganegaraan2" value="WNA">
                                                                <label class="form-check-label" for="kewarganegaraan2">
                                                                    WNA (Warga Negara Asing)
                                                                </label>
                                                            </div>
                                                            <label for="kewarganegaraan" class="form-control-label">Kewarganegaraan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="perkara" class="ckeditor form-control @error('perkara') is-invalid @enderror" id="desc" aria-describedby="perkaraHelp">{{ old('perkara') }}</textarea>
                                                    <label for="perkara" class="form-control-label">Tambahkan pasal perkara tahanan.</label>
                                                    @error('perkara')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-1">
                                                    <div class="imgPreview"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="images" value="{{ old('file') }}" placeholder="Upload File">
                                                    <label for="file" class="form-control-label mt-1">Upload Foto Tahanan (*jpg,jpeg,png,bmp,webp).<br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>Maksimum Size: 2 MB.</span></label>
                                                    @error('file')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

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