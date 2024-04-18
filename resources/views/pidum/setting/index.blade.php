@extends('pidum.layouts.main')

@section('title', 'Setting | Petugas')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('pidum.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Setting</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-cogs me-2"></i>Petugas</h6>
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
                            {{ auth()->guard('pidum')->user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Sihans
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
                                <h6 class="mb-0 font-weight-bolder">Detail Data {{ auth()->guard('pidum')->user()->name }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-eye me-2"></i>Informasi {{ auth()->guard('pidum')->user()->name }}</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('pidum.setting.update-information', ['id' => auth()->guard('pidum')->user()->id]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" value="{{ auth()->guard('pidum')->user()->email }}" name="email" type="email" disabled placeholder="Email Administrator">
                                                    <label for="email" class="form-control-label mt-1">Email Petugas</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" value="{{ auth()->guard('pidum')->user()->name }}" name="name" type="text" placeholder="Name">
                                                    <label for="name" class="form-control-label">Nama Petugas</label>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" value="{{ auth()->guard('pidum')->user()->phone }}" name="phone" type="text" placeholder="Telepon">
                                                    <label for="phone" class="form-control-label">Nomor Telepon Petugas</label>
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="address" class="form-control" style="height:100px;" id="desc" aria-describedby="addressHelp">{{ auth()->guard('pidum')->user()->address }}</textarea>
                                                    <label for="address" class="form-control-label">Alamat Kantor</label>
                                                    @error('address')
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
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Password Administrator</h6>
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
                                    <form action="{{ route('pidum.setting.update-password') }}" method="post">
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

        <!-- Footer -->
        @include('pidum.partials.footer')
        <!-- End Footer -->
    </div>
@endsection

@push('bottomscript')
@endpush