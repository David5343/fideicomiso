@extends('layouts.app')
@section('content')
<p class="text-end">
    <a href="{{ route('prestaciones.afiliados.create') }}" class="btn btn-primary" role="button">Crear Afiliado</a>
    <a href="{{ route('prestaciones.afiliados.index') }}" class="btn btn-primary" role="button">Lista de Afiliados</a>
</p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5">{{ __('Prestaciones/Expediente electrónico') }}</div>
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
                  @if(($afiliado->photo))
                  <img src="{{Storage::url($afiliado->photo)}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                  @else
                  <img src="{{asset('img/avatar.png')}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                  @endif
                  <h5 class="my-3"></h5>
                  <p class="text-muted mb-1"><strong>ESTATUS</strong></p>
                  <p class="text-muted mb-4"><strong>@if($afiliado->affiliate_status){{$afiliado->affiliate_status}}@endif</strong></p>
                  <div class="d-flex justify-content-center mb-2">
                    {{-- <button type="button" class="btn btn-primary">Follow</button>
                    <button type="button" class="btn btn-outline-primary ms-1">Message</button> --}}
                    @if($afiliado->signature))
                    <img src="{{Storage::url($afiliado->signature)}}"  class="rounded-circle img-fluid" style="width: 150px;">
                  @endif
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
                      <p class="mb-0">@if($afiliado->account_number){{$afiliado->account_number}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CLABE</strong></p>
                      <p class="mb-0">@if($afiliado->clabe){{$afiliado->clabe}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Banco</strong></p>
                      <p class="mb-0">@if($afiliado->bank->name){{$afiliado->bank->name}}@endif</p>
                    </li>
                  </ul>
                </div>
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0 text-primary font-italic me-1">Representante Legal</p>
                    </li>   
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Nombre</strong></p>
                      <p class="mb-0">@if($afiliado->representative_name){{$afiliado->representative_name}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>RFC</strong></p>
                      <p class="mb-0">@if($afiliado->representative_rfc){{$afiliado->representative_rfc}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                      <p class="mb-0">@if($afiliado->representative_curp){{$afiliado->representative_curp}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Parentesco</strong></p>
                      <p class="mb-0">@if($afiliado->representative_relationship){{$afiliado->representative_relationship}}@endif</p>
                    </li>
                  </ul>
                </div>
              </div>
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
                      <p class="text-muted mb-0">@if($afiliado->file_number){{$afiliado->file_number}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Dependencia</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->subdependency->name){{$afiliado->subdependency->name}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Fecha de Ingreso</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$afiliado->start_date}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Lugar de Trabajo</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$afiliado->work_place}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Motivo de Registro</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->register_motive){{$afiliado->register_motive}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Observaciones</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->observations){{$afiliado->observations}}@endif</p>
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
                      <p class="text-muted mb-0">@if($afiliado->last_name_1){{$afiliado->last_name_1.' '.$afiliado->last_name_2.' '.$afiliado->name}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Fecha de Nacimiento</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->birthday){{$afiliado->birthday}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Lugar de Nacimiento</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->birthplace){{$afiliado->birthplace}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Sexo</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->sex){{$afiliado->sex}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Estado Civil</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->marital_status){{$afiliado->marital_status}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>RFC</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->rfc){{$afiliado->rfc}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->curp){{$afiliado->curp}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Teléfono</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->phone){{$afiliado->phone}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Correo electrónico</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->email){{$afiliado->email}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Estado</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->state){{$afiliado->state}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Municipio</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->county){{$afiliado->county}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Colonia</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->neighborhood){{$afiliado->neighborhood}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Tipo de Vialidad</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->roadway_type){{$afiliado->roadway_type}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Nombre de la Vialidad (Calle)</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->street){{$afiliado->street}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>No. de Exterior</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->outdoor_number){{$afiliado->outdoor_number}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>CP</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->cp){{$afiliado->cp}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Localidad</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($afiliado->locality){{$afiliado->locality}}@endif</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection