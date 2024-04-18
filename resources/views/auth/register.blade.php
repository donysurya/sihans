@extends('auth.layout')

@section('title', 'SIHANS | Surat Izin Mengunjungi Tahanan Jaksa')

@push('css')
@endpush

@push('headscript')
@endpush

@section('modal')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center gy-4 my-5">
            <div class="col-xl-8 col-lg-8 col-md-8 d-flex flex-column mx-lg-0 mx-auto">
                <div class="card card-plain bg-white pt-4">
                    <div class="card-header pb-0 text-start">
                        <div class="row align-items-center">
                            <div class="col-4 d-xl-none d-lg-none d-md-none d-block">
                                <img src="{{ asset('argon/img/sihans.png') }}" alt="logo" class="img-fluid d-lg-none d-md-none d-flex " style="width: 100%; z-index:1;">
                            </div>
                            <div class="col-8">
                                <h4 class="font-weight-bolder">Registrasi Akun</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(isset ($errors) && count($errors) > 0)
                                <div>
                                    <span class="font-medium">Ensure that these requirements are met:</span>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <form role="form" action="{{ route('register.perform') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input class="form-control p-2 @error('name') is-invalid @enderror" type="text" placeholder="{{ __('Nama') }}" aria-label="{{ __('Nama') }}" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control p-2 @error('phone') is-invalid @enderror" type="number" placeholder="{{ __('No Telepon') }}" aria-label="{{ __('No Telepon') }}" name="phone"
                                                value="{{ old('phone') }}" required autocomplete="phone">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control p-2 @error('email') is-invalid @enderror" type="email" placeholder="{{ __('E-Mail') }}" name="email"
                                                value="{{ old('email') }}" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input class="form-control p-2 @error('password') is-invalid @enderror" type="password" placeholder="{{ __('Password') }}" name="password" id="password" required autocomplete="new-password" aria-describedby="basic-addon1">
                                        <span class="input-group-text" id="basic-addon1" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Password"><a href="#" class="text-decoration-none" onclick="myFunction()"><i class="fa fa-eye"></i></a></span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input class="form-control" type="password" placeholder="{{ __('Konfirmasi Password') }}" name="password_confirmation" id="confirm_password" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Password"><a href="#" class="text-decoration-none" onclick="myFunction2()"><i class="fa fa-eye"></i></a></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input class="form-control p-2 @error('nik') is-invalid @enderror" type="number" minlength="16" maxlength="16" placeholder="{{ __('NIK') }}" aria-label="{{ __('NIK') }}" name="nik"
                                                value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                                        @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control p-2 @error('pekerjaan') is-invalid @enderror" type="text" placeholder="{{ __('Pekerjaan') }}" aria-label="{{ __('Pekerjaan') }}" name="pekerjaan"
                                                value="{{ old('pekerjaan') }}" required autocomplete="pekerjaan">
                                        @error('pekerjaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <select name="pendidikan" id="pendidikan" class="form-control" required>
                                            <option value="" disabled selected>-Pendidikan Terakhir-</option>
                                            @foreach($pendidikan as $item)
                                                <option value="{{$item}}" {{old('pendidikan') ?? 'Strata 1 (S1)' == $item ? 'selected' : ''}}>{{$item}}</option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                            <option value="" disabled selected>-Jenis Kelamin-</option>
                                            @foreach($jenis_kelamin as $item)
                                                <option value="{{$item}}" {{old('jenis_kelamin') ?? 'Laki-laki' == $item ? 'selected' : ''}}>{{$item}}</option>
                                            @endforeach
                                        </select>
                                        @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="desc" aria-describedby="alamatHelp" placeholder="{{ __('Alamat') }}" required autocomplete="alamat">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-danger btn-lg w-100 mt-4 mb-0">Registrasi</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-header pt-2 text-start bg-transparent">
                        <p class="mb-0 fw-bold">Sudah memiliki akun? <a href="{{ route('login.show') }}">Login</a></p>
                    </div>
                    <div class="card-header pt-2 text-start bg-transparent">
                        <div class="d-flex align-items-center mb-3 justify-content-center">
                            <img src="{{ asset('argon/img/logo_pidum.png') }}" alt="logo" class="img-fluid m-1" style="width: 5%; z-index:1;">
                            <img src="{{ asset('argon/img/satya.png') }}" alt="logo" class="img-fluid m-1" style="width: 5%; z-index:1;">
                            <img src="{{ asset('argon/img/lanri.png') }}" alt="logo" class="img-fluid m-1" style="width: 12%; z-index:1;">
                            <img src="{{ asset('argon/img/trapsila.png') }}" alt="logo" class="img-fluid m-1" style="width: 12%; z-index:1;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('bottomscript')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("confirm_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endpush