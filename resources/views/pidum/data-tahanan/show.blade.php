@extends('pidum.layouts.main')

@section('title', 'Data Tahanan | Lihat Data Tahanan | Petugas Pidum')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('pidum.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('pidum.tahanan') }}">Tahanan</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Lihat</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-user-slash me-2"></i>Data Tahanan</h6>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg mx-4 mt-4">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative overflow-hidden">
                        <img src="{{ asset('tahanan/'.$tahanan->nama.'/'.$tahanan->image) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="font-weight-bolder mb-1">
                            {{ $tahanan->nama }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $tahanan->pekerjaan }}
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
                                <h6 class="mb-0 font-weight-bolder">Detail Data Tahanan</h6>
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
                                        <p class="mb-0"><i class="fa fa-eye me-2"></i>Informasi Tahanan</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="nik" class="form-control-label mt-1">NIK</label>
                                                        <input class="form-control" value="{{ $tahanan->nik }}" name="nik" type="number" placeholder="NIK Tahanan">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="no_tahanan" class="form-control-label">Reg. Tahanan</label>
                                                        <input class="form-control" value="{{ $tahanan->no_tahanan }}" name="no_tahanan" type="text" placeholder="Nomor Tahanan">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                                                        <input class="form-control" value="{{ $tahanan->pekerjaan }}" name="pekerjaan" type="text" placeholder="Pekerjaan Tahanan">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="alamat" class="form-control-label">Alamat</label>
                                                        <textarea name="alamat" class="form-control" aria-describedby="alamatHelp">{{ $tahanan->alamat }}</textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
                                                        <input class="form-control" value="{{ $tahanan->tgl_lahir }}" name="tgl_lahir" type="text" placeholder="Tanggal Lahir Tahanan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                                                        <input class="form-control" value="{{ $tahanan->tempat_lahir }}" name="tempat_lahir" type="text" placeholder="Tempat Lahir Tahanan">
                                                    </div> 
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                                        <input class="form-control" value="{{ $tahanan->jenis_kelamin }}" name="jenis_kelamin" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="kewarganegaraan" class="form-control-label">Kewarganegaraan</label>
                                                        <input class="form-control" value="{{ $tahanan->kewarganegaraan }}" name="kewarganegaraan" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pendidikan" class="form-control-label">Pendidikan Terakhir</label>
                                                        <input class="form-control" value="{{ $tahanan->pendidikan }}" name="pendidikan" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="agama" class="form-control-label">Agama</label>
                                                        <input class="form-control" value="{{ $tahanan->agama }}" name="agama" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="perkara" class="form-control-label">Pasal Perkara Tahanan</label>
                                                <textarea name="perkara" class="ckeditor form-control" id="desc" aria-describedby="perkaraHelp">{{ $tahanan->perkara }}</textarea>
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush