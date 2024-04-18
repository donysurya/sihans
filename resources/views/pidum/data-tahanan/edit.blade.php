@extends('pidum.layouts.main')

@section('title', 'Data Tahanan | Edit Data Tahanan | Petugas Pidum')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('pidum.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('pidum.tahanan') }}">Data Tahanan</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Data</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-user-slash me-2"></i>Edit Data Tahanan</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Edit Data Tahanan</h6>
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
                                        <p class="mb-0"><i class="fa fa-edit me-2"></i>Edit Data Tahanan</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('pidum.tahanan.update', ['id' => $tahanan->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('nama') is-invalid @enderror" value="{{ $tahanan->nama }}" name="nama" type="text" placeholder="Nama Tahanan">
                                                            <label for="nama" class="form-control-label mt-1">Update Nama lengkap Tahanan. <br>Contoh: XYZ</label>
                                                            @error('nama')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('nik') is-invalid @enderror" value="{{ $tahanan->nik }}" name="nik" type="number" placeholder="NIK Tahanan">
                                                            <label for="nik" class="form-control-label mt-1">Update NIK. <br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>NIK yang diinputkan berupa angka 16 digit.</span></label>
                                                            @error('nik')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('no_tahanan') is-invalid @enderror" value="{{ $tahanan->no_tahanan }}" name="no_tahanan" type="text" placeholder="Nomor Tahanan">
                                                            <label for="no_tahanan" class="form-control-label mt-1">Update Reg. Tahanan. </label>
                                                            @error('no_tahanan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ $tahanan->pekerjaan }}" name="pekerjaan" type="text" placeholder="Pekerjaan Pegawai">
                                                            <label for="pekerjaan" class="form-control-label">Update Pekerjaan</label>
                                                            @error('pekerjaan')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" aria-describedby="alamatHelp">{{ $tahanan->alamat }}</textarea>
                                                            <label for="alamat" class="form-control-label">Update alamat.</label>
                                                            @error('alamat')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control @error('agama') is-invalid @enderror" value="{{ $tahanan->agama }}" name="agama" type="text" placeholder="Agama">
                                                            <label for="agama" class="form-control-label mt-1">Deskripsikan Agama. <br>Contoh: Islam / Kristen Protestan / Katolik / Hindu / Budha / Konghucu</label>
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
                                                            <input class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ $tahanan->tempat_lahir }}" name="tempat_lahir" type="text" placeholder="Tempat Lahir">
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
                                                            <input class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ $tahanan->tgl_lahir }}" name="tgl_lahir" type="date" placeholder="Tanggal Lahir">
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
                                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki" {{ $tahanan->jenis_kelamin == 'Laki-laki' ? "checked" : "" }}>
                                                                <label class="form-check-label" for="jenis_kelamin1">
                                                                    Laki-laki
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan" {{ $tahanan->jenis_kelamin == 'Perempuan' ? "checked" : "" }}>
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
                                                                <option value="" disabled selected>-Pilih pendidikan terakhir-</option>
                                                                @foreach($pendidikan as $item)
                                                                    <option value="{{$item}}" {{old('pendidikan') ?? $tahanan->pendidikan == $item ? 'selected' : ''}}>{{$item}}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="pendidikan" class="form-control-label">Pilih pendidikan terakhir</label>
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
                                                                <input class="form-check-input" type="radio" name="kewarganegaraan" id="kewarganegaraan1" value="WNI" {{ $tahanan->kewarganegaraan == 'WNI' ? "checked" : "" }}>
                                                                <label class="form-check-label" for="kewarganegaraan1">
                                                                    WNI (Warga Negara Indonesia)
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="kewarganegaraan" id="kewarganegaraan2" value="WNA" {{ $tahanan->kewarganegaraan == 'WNA' ? "checked" : "" }}>
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
                                                    <textarea name="perkara" class="ckeditor form-control @error('perkara') is-invalid @enderror" id="desc" aria-describedby="perkaraHelp">{{ $tahanan->perkara }}</textarea>
                                                    <label for="perkara" class="form-control-label">Update pasal perkara tahanan.</label>
                                                    @error('perkara')
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush