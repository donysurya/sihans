@extends('pidum.layouts.main')

@section('title', 'Data Pengunjung | Petugas Pidum')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('pidum.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Pengunjung</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-user me-2"></i>Data Pengunjung</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Daftar Pengunjung</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('pidum.user.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                                                    <input class="form-control" type="text" name="name" value="{{$_GET['name'] ?? ''}}" placeholder="Nama Pengunjung">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="nik" value="{{$_GET['nik'] ?? ''}}" placeholder="NIK Pengunjung">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary btn-sm ms-auto"><i class="fa fa-search me-2"></i>Cari</button>
                                                <a href="{{ route('pidum.user') }}" class="btn btn-success btn-sm ms-auto"><i class="fa fa-th me-2"></i>Tampilkan Semua</a>
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
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Jenis Kelamin</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Pekerjaan</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Pendidikan Terakhir</th>
                                                    @if (auth()->guard('pidum')->user()->is_super == 1)<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Login</th>@endif
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($user as $index => $item)
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
                                                                    <h6 class="mb-0 text-sm">{{ $item->nama }}</h6>
                                                                    <h6 class="mb-0 text-sm">NIK: {{ $item->nik }}</h6>
                                                                    <h6 class="mb-0 text-sm">Email: {{ $item->email }}</h6>
                                                                    <h6 class="mb-0 text-sm">No HP: {{ $item->phone }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">Updated by: {{ $item->admin->name ?? 'Petugas Pidum'}}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->jenis_kelamin }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->pekerjaan }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->pendidikan }}</span>
                                                        </td>
                                                        @if (auth()->guard('pidum')->user()->is_super == 1)
                                                        <td class="align-middle text-center">
                                                            <a href="{{ route('pidum.user.login', ['id' => $item->id]) }}" class="btn btn-danger m-1 py-1 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" style="font-size:10px;" target="_blank" rel="noopener noreferrer">
                                                                <i class="fas fa-sign-in-alt"></i>
                                                            </a>
                                                        </td>
                                                        @endif
                                                        <td class="align-middle text-center">
                                                            <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('pidum.user.edit', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-tahanan{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>Delete</a><br>
                                                            <a class="btn btn-link text-primary px-2 mb-0" href="{{ route('pidum.user.show', ['id' => $item->id]) }}"><i class="fas fa-eye text-primary me-2" aria-hidden="true"></i>Lihat</a>
                                                        </td>

                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="modal-delete-tahanan{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-tahanan{{ $item->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="py-3 text-center">
                                                                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                                            <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                                            <p>Apakah anda yakin ingin menghapus Data Pengunjung?</p>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <form action="{{ route('pidum.user.destroy', ['id' => $item->id]) }}" method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-trash me-2"></i>Hapus Data</button>
                                                                            </form>
                                                                            <button type="button" class="btn btn-danger text-white ml-auto" data-bs-dismiss="modal"><i class="fa fa-close me-2"></i>Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Delete Modal -->
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
                            {{ $user->withQueryString()->links() }}
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