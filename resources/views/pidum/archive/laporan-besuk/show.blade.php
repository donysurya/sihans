@extends('pidum.layouts.main')

@section('title', 'Lihat Data Kunjungan | Petugas Pidum')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('pidum.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Lihat Data Kunjungan</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-person-booth me-2"></i>Data Kunjungan</h6>
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
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('pidum.besuk') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
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
                                            <div class="row align-items-center gy-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="keperluan" class="form-control-label">Status Kunjungan</label>
                                                        <span class="badge bg-gradient-warning">{{$besuk->status}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($besuk->status!='Selesai')
                                            <div class="col-md-12 mb-3">
                                                <form action="{{ route('pidum.besuk.update', ['id' => $besuk->id]) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nomor_surat" class="form-control-label mt-1">Nomor Surat</label>
                                                                <input class="form-control @error('nomor_surat') is-invalid @enderror" value="{{ old('nomor_surat') }}" name="nomor_surat" type="text" placeholder="Nomor Surat">
                                                                @error('nomor_surat')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="tgl_kunjungan" class="form-control-label mt-1">Tanggal Kunjungan</label>
                                                                <input class="form-control @error('tgl_kunjungan') is-invalid @enderror" value="{{ old('tgl_kunjungan') }}" name="tgl_kunjungan" type="date" placeholder="Tanggal Kunjungan">
                                                                @error('tgl_kunjungan')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="start_time" class="form-control-label mt-1">Jam Mulai Kunjungan</label>
                                                                <input class="form-control @error('start_time') is-invalid @enderror" value="{{ old('start_time') }}" name="start_time" type="time" placeholder="Jam Mulai Kunjungan">
                                                                @error('start_time')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="end_time" class="form-control-label mt-1">Jam Berakhir Kunjungan</label>
                                                                <input class="form-control @error('end_time') is-invalid @enderror" value="{{ old('end_time') }}" name="end_time" type="time" placeholder="Jam Berakhir Kunjungan">
                                                                @error('end_time')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="keperluan" class="form-control-label">Perbaharui Status Kunjungan</label>
                                                                <select name="status" id="status" class="col-9 ml-2 my-2 form-control" >
                                                                    <option> Pilih Status </option>
                                                                    <option value="Selesai"> Selesai </option>
                                                                    <option value="Ditolak"> Ditolak </option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-md ms-auto my-2"><i class="fa fa-edit me-2"></i>Perbaharui Data</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            <div class="col-md-12 mb-3">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-0">
                                                            <span class="badge bg-gradient-danger">Surat T-10 Telah dikirim ke Pengunjung</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 text-end">
                                                        <a href="{{ route('pidum.besuk.cetak', ['id' => $besuk->id]) }}" target="_blank" rel="noopener noreferrer" class="btn btn-icon btn-3 btn-info mb-0" type="button">
                                                            <span class="btn-inner--icon"><i class="far fa-file-pdf me-2"></i></span>
                                                            <span class="btn-inner--text">T-10</span>
                                                        </a>
                                                        <a href="{{ asset('file/'.$besuk->t10) }}" target="_blank" rel="noopener noreferrer" class="btn btn-icon btn-3 btn-secondary mb-0" type="button">
                                                            <span class="btn-inner--icon"><i class="far fa-file-pdf me-2"></i></span>
                                                            <span class="btn-inner--text">T-10 - CMS</span>
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
                                                            <div class="col-md-auto"><img src="{{ asset('user/'.$besuk->user->name.'/'.$besuk->user->image) }}" alt="{{$besuk->user->name}}" width="150"></div>
                                                            <div class="col-md-auto"><img src="{{ asset('user/'.$besuk->user->name.'/'.$besuk->user->ktp) }}" width="250"></div>
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush