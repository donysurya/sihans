@extends('user.layouts.main')

@section('title', 'Data Kunjungan | Buat Data Kunjungan')

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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Tahanan</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fas fa-person-booth me-2"></i>Buat Data Kunjungan</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Buat Data Kunjungan</h6>
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
                                        <p class="mb-0"><i class="fa fa-user-slash me-2"></i>Pilih Tahanan</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('besuk.create') }}" method="get">
                                        @csrf
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="tahanan" id="tahanan" class="form-control @error('tahanan') is-invalid @enderror" aria-describedby="tahanan">
                                                        <option value="" disabled selected>-Pilih Tahanan-</option>
                                                        @foreach($tahanan as $item)
                                                            <option value="{{$item->id}}" {{old('tahanan') ?? '' == $item ? 'selected' : ''}}>{{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="tahanan" class="form-control-label">Pilih tahanan yang ingin dikunjungi</label>
                                                    @error('tahanan')
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
@endpush