@extends('user.layouts.main')

@section('title', 'Data Kunjungan | Lihat Data Kunjungan')

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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Lihat Data</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fas fa-person-booth me-2"></i>Lihat Data Kunjungan</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Lihat Data Kunjungan</h6>
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
                                        <p class="mb-0"><i class="fa fa-person-booth me-2"></i>Lihat Data Kunjungan</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="keperluan" class="form-control-label">Status Kunjungan</label>
                                                <span class="badge bg-gradient-warning">{{$besuk->status}}</span>
                                            </div>
                                        </div>
                                        @if($besuk->status=='Selesai')
                                            <div class="col-md-12 mb-3">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-0">
                                                            <span class="badge bg-gradient-danger">Surat T-10 Telah Disetujui</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 text-end">
                                                        <a href="{{ route('besuk.cetak', ['id' => $besuk->id]) }}" target="_blank" rel="noopener noreferrer" class="btn btn-icon btn-3 btn-info mb-0" type="button">
                                                            <span class="btn-inner--icon"><i class="far fa-file-pdf me-2"></i></span>
                                                            <span class="btn-inner--text">T-10</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="nomor_surat" class="form-control-label">Nomor Surat</label>
                                                    <input class="form-control @error('nomor_surat') is-invalid @enderror" value="{{ $besuk->nomor_surat }}" name="nomor_surat" type="text" readonly="">
                                                </div>
                                            </div>

                                            <!-- Waktu Kunjungan -->
                                            <p class="mb-3"><i class="fas fa-user me-2"></i>Waktu Kunjungan</p>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tgl_kunjungan" class="form-control-label">Tanggal Kunjungan</label>
                                                    <input class="form-control @error('tgl_kunjungan') is-invalid @enderror" value="{{ $besuk->tgl_kunjungan }}" name="tgl_kunjungan" type="text" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="start_time" class="form-control-label">Jam Mulai Kunjungan</label>
                                                    <input class="form-control @error('start_time') is-invalid @enderror" value="{{ $besuk->start_time }}" name="start_time" type="text" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="end_time" class="form-control-label">Jam Berakhir Kunjungan</label>
                                                    <input class="form-control @error('end_time') is-invalid @enderror" value="{{ $besuk->end_time }}" name="end_time" type="text" readonly="">
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Identitas Pengunjung -->
                                        <p class="my-3"><i class="fas fa-user me-2"></i>Identitas Pengunjung</p>
                                        <div class="col-md-12">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama" class="form-control-label">Nama pengunjung</label>
                                                        <input class="form-control @error('nama') is-invalid @enderror" value="{{ $besuk->user->name }}" name="nama" type="text" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="no_tahanan" class="form-control-label">Nomor Identitas</label>
                                                        <input class="form-control @error('no_tahanan') is-invalid @enderror" value="{{ $besuk->user->nik }}" name="no_tahanan" type="text" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="alamat" class="form-control-label">Alamat</label>
                                                        <input class="form-control @error('alamat') is-invalid @enderror" value="{{ $besuk->user->alamat }}" name="alamat" type="text" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                                                        <input class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ $besuk->user->pekerjaan }}" name="pekerjaan" type="text" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="hubungan" class="form-control-label">Hubungan</label>
                                                        <input class="form-control @error('hubungan') is-invalid @enderror" value="{{$besuk->hubungan}}" name="hubungan" type="text" placeholder="Hubungan Pengunjung dengan Tahanan" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="hubungan" class="form-control-label">Identitas</label>
                                                        <div class="row">
                                                            <div class="col-md-auto"><img src="{{Storage::url($besuk->user->image)}}" alt="{{$besuk->user->name}}" width="150"></div>
                                                            <div class="col-md-auto"><img src="{{Storage::url($besuk->user->ktp)}}" alt="{{$besuk->user->name}}" width="250"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Identitas Tahanan -->
                                        <p class="my-3"><i class="fas fa-user me-2"></i>Identitas Tahanan</p>
                                        <div class="col-md-6">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="nama" class="form-control-label">Nama tahanan</label>
                                                        <input class="form-control @error('nama') is-invalid @enderror" value="{{ $besuk->tahanan->nama }}" name="nama" type="text" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="no_tahanan" class="form-control-label">Nomor Identitas</label>
                                                        <input class="form-control @error('no_tahanan') is-invalid @enderror" value="{{ $besuk->tahanan->nik }}" name="no_tahanan" type="text" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="no_tahanan" class="form-control-label">Reg. Tahanan</label>
                                                        <input class="form-control @error('no_tahanan') is-invalid @enderror" value="{{ $besuk->tahanan->no_tahanan }}" name="no_tahanan" type="text" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="alamat" class="form-control-label">Alamat</label>
                                                        <input class="form-control @error('alamat') is-invalid @enderror" value="{{ $besuk->tahanan->alamat }}" name="alamat" type="text" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                                                        <input class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ $besuk->tahanan->pekerjaan }}" name="pekerjaan" type="text" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                                                        <input class="form-control" readonly="" value="{{ $besuk->tahanan->tempat_lahir }}" name="tempat_lahir" type="text" placeholder="Tempat Lahir Tahanan">
                                                    </div> 
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                                        <input class="form-control" readonly="" value="{{ $besuk->tahanan->jenis_kelamin }}" name="jenis_kelamin" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="kewarganegaraan" class="form-control-label">Kewarganegaraan</label>
                                                        <input class="form-control" readonly="" value="{{ $besuk->tahanan->kewarganegaraan }}" name="kewarganegaraan" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pendidikan" class="form-control-label">Pendidikan Terakhir</label>
                                                        <input class="form-control" readonly="" value="{{ $besuk->tahanan->pendidikan }}" name="pendidikan" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="agama" class="form-control-label">Agama</label>
                                                        <input class="form-control" readonly="" value="{{ $besuk->tahanan->agama }}" name="agama" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="perkara" class="form-control-label">Pasal Perkara Tahanan.</label>
                                                <textarea name="perkara" class="ckeditor form-control @error('perkara') is-invalid @enderror" id="desc" aria-describedby="perkaraHelp">{{ $besuk->tahanan->perkara }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="keperluan" class="form-control-label">Keperluan Berkunjung</label>
                                                <input class="form-control @error('keperluan') is-invalid @enderror" value="{{$besuk->keperluan}}" name="keperluan" type="text" placeholder="Keperluan Pengunjung dengan Tahanan">
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