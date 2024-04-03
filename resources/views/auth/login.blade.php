@extends('layouts.applogin')

@section('tittle','Login')


@section('content')
<div class="bg-info flex align-items-center" style="width: 100% ; height:100% ; bg-gradient">
<div class="login-box mx-auto" style="width: 40%">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header">
      <img class="mx-auto" style="width: 70% ; height:160px"  src="{{asset('backend/dist/img/restaurante.jpeg')}}" alt="">
    </div>
    <div class="card-body">
      <p class="login-box-msg text-xl">Iniciar sesion</p>

      <form method="POST" action="{{ route('login') }}">
      @csrf
        <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <div class="col-6">
                <a href="{{ route('register') }}" class="btn btn-primary btn-block">Registro</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <div class="ro">
        <div class="col-12 text-center">
            <p class="my-2">
                @if (Route::has('password.request'))
                <a href="password/reset">Olvide mi contraseña</a>
                @endif
            </p>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
</div>
@endsection
