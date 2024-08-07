@extends('layouts.login')

@section('content')
<style type="text/css">
    .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
</style>
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="{{asset('img/login.png')}}"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="lead fw-normal mb-0 me-3"></p>
            </div> 
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">
                <img src="{{asset('img/LogoFide.png')}}" width="280">
              </p>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
              name="email" value="{{ old('email') }}" placeholder="Ingrese un correo válido" required autocomplete="email" autofocus />
              <label class="form-label" for="form3Example3">Nombre de usuario</label>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name ="password" placeholder="Ingrese la contraseña" required/>
              <label class="form-label" for="form3Example4">Contraseña</label>
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
  
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input id="remember"  class="form-check-input me-2" type="checkbox" name="remember"/>
                <label class="form-check-label" for="form2Example3">
                  Recuerdame
                </label>
              </div>
              {{-- <a href="#!" class="text-body">Forgot password?</a> --}}
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-secondary"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar Sesión</button>
              {{-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                  class="link-danger">Register</a></p> --}}
            </div>
  
          </form>
        </div>
      </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5" style="background-color:#333333;">
      <!-- Copyright -->
      <div class="mb-3 mb-md-0" style="color:#b09a5b">
        {{-- Copyright © 2020. All rights reserved. --}}
        Tecnologías de la Información.
    </div>
      <!-- Copyright -->
    </div>
  </section>
  @endsection
