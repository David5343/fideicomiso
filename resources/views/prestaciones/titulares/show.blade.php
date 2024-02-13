@extends('layouts.app')
@section('content')
<p class="text-end">
    <a href="{{ route('prestaciones.titulares.create') }}" class="btn btn-secondary" role="button">Crear Titular</a>
    <a href="{{ route('prestaciones.titulares.index') }}" class="btn btn-secondary" role="button">Lista de Titulares</a>
</p>
<div class="card mt-1" style="border-color:#333333">
  <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
          {{ __('Prestaciones/Expediente electrónico') }}</div>
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
                    <a href="{{ url('prestaciones/titulares/'.$titular->id .'/edit')}}" class="btn btn-warning btn-sm" title="Editar registro">
                      <i class="bi bi-pencil-square"></i>
                  </a> 
                </p>
                  @if(($titular->photo))
                  <img src="{{Storage::url($titular->photo)}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                  @else
                  <img src="{{asset('img/avatar.png')}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                  @endif
                  <h5 class="my-3"></h5>
                  <p class="text-muted mb-1"><strong>ESTATUS</strong></p>
                  <p class="text-muted mb-4"><strong>@if($titular->affiliate_status){{$titular->affiliate_status}}@endif</strong></p>
                  <div class="d-flex justify-content-center mb-2">
                    {{-- <button type="button" class="btn btn-primary">Follow</button>
                    <button type="button" class="btn btn-outline-primary ms-1">Message</button> --}}
                    @if($titular->signature))
                    <img src="{{Storage::url($titular->signature)}}"  class="rounded-circle img-fluid" style="width: 150px;">
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
                      <p class="mb-0">@if($titular->account_number){{$titular->account_number}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CLABE</strong></p>
                      <p class="mb-0">@if($titular->clabe){{$titular->clabe}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Banco</strong></p>
                      <p class="mb-0">@if($titular->bank){{$titular->bank->name}}@endif</p>
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
                      <p class="mb-0">@if($titular->representative_name){{$titular->representative_name}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>RFC</strong></p>
                      <p class="mb-0">@if($titular->representative_rfc){{$titular->representative_rfc}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                      <p class="mb-0">@if($titular->representative_curp){{$titular->representative_curp}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Parentesco</strong></p>
                      <p class="mb-0">@if($titular->representative_relationship){{$titular->representative_relationship}}@endif</p>
                    </li>
                  </ul>
                </div>
              </div> 
              @if($titular->beneficiaries)              
                @foreach ($titular->beneficiaries as $item)
                <div class="card mb-4 mb-lg-0 mt-2">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0 text-primary font-italic me-1">Familiar</p>
                    </li>   
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>No. de Expediente</strong></p>
                      <p class="mb-0">@if($item->file_number){{$item->file_number}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Nombre</strong></p>
                      <p class="mb-0">@if($item->last_name_1){{$item->last_name_1.' '.$item->last_name_2.' '.$item->name}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Fecha de Nacimiento</strong></p>
                      <p class="mb-0">@if($item->birthday){{$item->birthday}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>RFC</strong></p>
                      <p class="mb-0">@if($item->rfc){{$item->rfc}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                      <p class="mb-0">@if($item->curp){{$item->curp}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Parentesco</strong></p>
                      <p class="mb-0">@if($item->relationship){{$item->relationship}}@endif</p>
                    </li>
                  </ul>
                </div>
              </div> 
                @endforeach
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
                      <p class="text-muted mb-0">@if($titular->file_number){{$titular->file_number}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Dependencia</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->subdependency->name){{$titular->subdependency->name}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Fecha de Ingreso</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$titular->start_date}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Lugar de Trabajo</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$titular->work_place}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Motivo de Registro</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->register_motive){{$titular->register_motive}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Observaciones</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->observations){{$titular->observations}}@endif</p>
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
                      <p class="text-muted mb-0">@if($titular->last_name_1){{$titular->last_name_1.' '.$titular->last_name_2.' '.$titular->name}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Fecha de Nacimiento</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->birthday){{$titular->birthday}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Lugar de Nacimiento</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->birthplace){{$titular->birthplace}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Sexo</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->sex){{$titular->sex}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Estado Civil</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->marital_status){{$titular->marital_status}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>RFC</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->rfc){{$titular->rfc}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->curp){{$titular->curp}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Teléfono</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->phone){{$titular->phone}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Correo electrónico</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->email){{$titular->email}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Estado</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->state){{$titular->state}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Municipio</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->county){{$titular->county}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Colonia</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->neighborhood){{$titular->neighborhood}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Tipo de Vialidad</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->roadway_type){{$titular->roadway_type}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Nombre de la Vialidad (Calle)</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->street){{$titular->street}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>No. de Exterior</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->outdoor_number){{$titular->outdoor_number}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>CP</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->cp){{$titular->cp}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Localidad</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($titular->locality){{$titular->locality}}@endif</p>
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