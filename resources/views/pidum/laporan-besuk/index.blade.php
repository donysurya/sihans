@extends('pidum.layouts.main')

@section('title', 'Data Kunjungan | Petugas Pidum')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('pidum.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Kunjungan</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-person-booth me-2"></i>Data Kunjungan</h6>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pt-3">
                        <div class="row mb-3 align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Daftar Kunjungan</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-search me-2"></i>Filter Pencarian</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    <form method="get" action="">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="name" value="{{$_GET['name'] ?? ''}}" placeholder="Nama Tahanan">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="nik" value="{{$_GET['nik'] ?? ''}}" placeholder="NIK Tahanan">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary btn-sm ms-auto"><i class="fa fa-search me-2"></i>Cari</button>
                                                <a href="{{ route('pidum.besuk') }}" class="btn btn-success btn-sm ms-auto"><i class="fa fa-th me-2"></i>Tampilkan Semua</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card">
                                <div class="card-body px-0 py-3">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">No</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Identitas Pengunjung</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Identitas Tahanan</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Status Kunjungan</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($besuk as $index => $item)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <p class="text-md text-secondary mb-0">
                                                                {{$index+1}}
                                                            </p>
                                                        </td>
                                                        <td style="white-space:normal!important;" class="align-middle">
                                                            <div class="d-flex px-2 py-1 align-items-center">
                                                                <div>
                                                                    <div class="avatar avatar-sm me-3 mt-1 bg-gradient-primary shadow-danger text-center rounded-circle">
                                                                        <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $item->user->nama }}</h6>
                                                                    <h6 class="mb-0 text-sm">NIK: {{ $item->user->nik }}</h6>
                                                                    <h6 class="mb-0 text-sm">Email: {{ $item->user->email }}</h6>
                                                                    <h6 class="mb-0 text-sm">No HP: {{ $item->user->phone }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="white-space:normal!important;" class="align-middle">
                                                            <div class="d-flex px-2 py-1 align-items-center">
                                                                <div>
                                                                    <div class="avatar avatar-sm me-3 mt-1 bg-gradient-primary shadow-danger text-center rounded-circle">
                                                                        <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $item->tahanan->nama }}</h6>
                                                                    <h6 class="mb-0 text-sm">NIK: {{ $item->tahanan->nik }}</h6>
                                                                    <h6 class="mb-0 text-sm">Reg. Tahanan: {{ $item->tahanan->no_tahanan }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="badge bg-gradient-warning">{{$item->status}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a class="btn btn-link text-primary px-2 mb-0" href="{{ route('pidum.besuk.show', ['id' => $item->id]) }}"><i class="fas fa-eye text-primary me-2" aria-hidden="true"></i>Lihat</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">
                                                            <p class="text-sm text-secondary font-weight-bolder mb-0">- No data found -</p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3"></div>
                            {{ $besuk->withQueryString()->links() }}
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