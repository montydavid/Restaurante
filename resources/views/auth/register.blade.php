@extends('layouts.applogin')

@section('tittle','Register')

@section('content')



<div class="bg-success flex align-items-center" style="width: 100% ; height:100% ; bg-gradient">
    <div class="login-box mx-auto" style="width: 40%">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <img class="mx-auto" style="width: 70% ; height:150px"  src="{{asset('backend/dist/img/restaurante.jpeg')}}" alt="">
            </div>
            <div class="card-body">
                <p class="login-box-msg text-xl">Registro</p>

                <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="input-group mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>

                    <div class="input-group mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>

                    <div class="input-group mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirme Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                            
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary py-1 px-5 mx-auto">
                                {{ __('REGISTRO') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row mt-4">
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="text-lg font-weight-bold">¿Ya tiene una cuenta?</p>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-block py-1 px-1">Ingresar</a>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    <!-- /.card -->
    </div>
</div>
@endsection
