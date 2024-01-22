@extends('layouts.app')
@section('content')
<p class="text-end">
    <a href="{{ route('prestaciones.familiares.create') }}" class="btn btn-primary" role="button">Crear Familiar</a>
    <a href="{{ route('prestaciones.familiares.index') }}" class="btn btn-primary" role="button">Lista de Familiar</a>
</p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5">{{ __('Prestaciones/Expediente electrónico del Familiar') }} </div> 
        @if (session('msg_tipo'))
        <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section style="background-color: #eee;">
        <div class="container py-5">
          {{-- <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
              </nav>
            </div>
          </div> --}}
      
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <p class="text-end m-2">
                    <a href="{{ url('prestaciones/familiares/'.$familiar->id .'/edit')}}" class="btn btn-warning btn-sm" title="Editar registro">
                      <i class="bi bi-pencil-square"></i>
                  </a> 
                </p>
                  @if(($familiar->photo))
                  <img src="{{Storage::url($familiar->photo)}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                  @else
                  <img src="{{asset('img/avatar.png')}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                  @endif
                  <h5 class="my-3"></h5>
                  <p class="text-muted mb-1"><strong>ESTATUS</strong></p>
                  <p class="text-muted mb-4"><strong>@if($familiar->family_status){{$familiar->family_status}}@endif</strong></p>
                  <div class="d-flex justify-content-center mb-2">
                    {{-- <button type="button" class="btn btn-primary">Follow</button>
                    <button type="button" class="btn btn-outline-primary ms-1">Message</button> --}}
                  </div>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0 text-primary font-italic me-1">Datos Bancarios</p>
                    </li>   
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>No de Cuenta</strong></p>
                      <p class="mb-0">@if($familiar->account_number){{$familiar->account_number}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CLABE</strong></p>
                      <p class="mb-0">@if($familiar->clabe){{$familiar->clabe}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Banco</strong></p>
                      <p class="mb-0">@if($familiar->bank){{$familiar->bank->name}}@endif</p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0 mt-2">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0 text-primary font-italic me-1">Representante Legal</p>
                    </li>   
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Nombre</strong></p>
                      <p class="mb-0">@if($familiar->representative_name){{$familiar->representative_name}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>RFC</strong></p>
                      <p class="mb-0">@if($familiar->representative_rfc){{$familiar->representative_rfc}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                      <p class="mb-0">@if($familiar->representative_curp){{$familiar->representative_curp}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Parentesco</strong></p>
                      <p class="mb-0">@if($familiar->representative_relationship){{$familiar->representative_relationship}}@endif</p>
                    </li>
                  </ul>
                </div>
              </div>
              @if($familiar->affiliate)
              <div class="card mb-4 mb-lg-0 mt-2">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0 text-primary font-italic me-1">Familiar de:</p>
                    </li>   
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>No. de Expediente</strong></p>
                      <p class="mb-0">@if($familiar->affiliate->file_number){{$familiar->affiliate->file_number}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Nombre</strong></p>
                      <p class="mb-0">@if($familiar->affiliate->last_name_1){{$familiar->affiliate->last_name_1.' '.$familiar->affiliate->last_name_2.' '.$familiar->affiliate->name}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Fecha de Nacimiento</strong></p>
                      <p class="mb-0">@if($familiar->affiliate->birthday){{$familiar->affiliate->birthday}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>RFC</strong></p>
                      <p class="mb-0">@if($familiar->affiliate->rfc){{$familiar->affiliate->rfc}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                      <p class="mb-0">@if($familiar->affiliate->curp){{$familiar->affiliate->curp}}@endif</p>
                    </li>
                  </ul>
                </div>
              </div> 
              @endif                           
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong></strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="mb-2"><strong>DATOS GENERALES</strong></p>
                    </div>
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>No de Expediente</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($familiar->file_number){{$familiar->file_number}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Fecha de Ingreso</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($familiar->start_date){{$familiar->start_date}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong></strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="mb-0"><strong>DATOS PERSONALES</strong></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Nombre</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($familiar->last_name_1){{$familiar->last_name_1.' '.$familiar->last_name_2.' '.$familiar->name}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Fecha de Nacimiento</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($familiar->birthday){{$familiar->birthday}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Sexo</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($familiar->sex){{$familiar->sex}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>RFC</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($familiar->rfc){{$familiar->rfc}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($familiar->curp){{$familiar->curp}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>¿DIVERSAS CAPACIDADES?</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($familiar->disabled_person){{$familiar->disabled_person}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>DIRECCION</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($familiar->address){{$familiar->address}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>OBSERVACIONES</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($familiar->observations){{$familiar->observations}}@endif</p>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection