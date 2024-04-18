@extends('auth.layout')

@section('title', 'Verifikasi - SIHANS | Surat Izin Mengunjungi Tahanan Jaksa')

@push('css')
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center gy-4 my-5">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex">
                <div class="card bg-white">
                    <div class="card-body">
                        <h4 class="font-weight-bolder mb-3"><i class="fas fa-info-circle me-2"></i>Informasi</h4>
                        <p class="mb-3">Terima kasih telah melakukan registrasi SIHANS!</p>
                        <p class="mb-3">Silahkan menunggu 1 x 24 jam untuk dapat melakukan login.</p>
                        <p class="mb-0"><i class="fas fa-phone-square-alt me-2"></i>Telepon : 0811-5187-878</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('bottomscript')
@endpush