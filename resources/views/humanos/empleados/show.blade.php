@extends('layouts.app')
@section('content')

<p class="text-end">
    <a href="{{ route('humanos.empleados.create') }}" class="btn btn-secondary" role="button">Crear Empleado</a>
    <a href="{{ route('humanos.empleados.index') }}" class="btn btn-secondary" role="button">Lista de Empleados</a>
</p>
<div class="card mt-1" style="border-color:#333333">
  <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
          {{ __('Humanos/Expediente electrónico') }}</div>
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
                  @if(($empleado->photo))
                  <img src="{{Storage::url($empleado->photo)}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                  @else
                  <img src="{{asset('img/avatar.png')}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                  @endif
                  <h5 class="my-3">{{$empleado->user->email}}</h5>
                  <p class="text-muted mb-1"><strong>{{$empleado->area->name}}</strong></p>
                  <p class="text-muted mb-4"><strong>{{$empleado->place->job_position}}</strong></p>
                  <div class="d-flex justify-content-center mb-2">
                    {{-- <button type="button" class="btn btn-primary">Follow</button>
                    <button type="button" class="btn btn-outline-primary ms-1">Message</button> --}}
                    @if($empleado->signature))
                    <img src="{{Storage::url($empleado->signature)}}"  class="rounded-circle img-fluid" style="width: 150px;">
                  @endif
                  </div>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0 text-primary font-italic me-1">Datos Personales</p>
                    </li>   
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Fecha de Nacimiento</strong></p>
                      <p class="mb-0">{{$empleado->birthday}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Lugar de Nacimiento</strong></p>
                      <p class="mb-0">{{$empleado->birthplace}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Sexo</strong></p>
                      <p class="mb-0">{{$empleado->sex}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>RFC</strong></p>
                      <p class="mb-0">{{$empleado->rfc}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                      <p class="mb-0">{{$empleado->curp}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Teléfono</strong></p>
                      <p class="mb-0">{{$empleado->phone}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Número de Emergencia</strong></p>
                      <p class="mb-0">{{$empleado->emergency_number}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Correo Electrónico</strong></p>
                      <p class="mb-0">{{$empleado->email}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Entidad Federativa</strong></p>
                      <p class="mb-0">{{$empleado->state}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Municipio o Delegación</strong></p>
                      <p class="mb-0">{{$empleado->county}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Colonia</strong></p>
                      <p class="mb-0">{{$empleado->neighborhood}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Tipo de Vialidad</strong></p>
                      <p class="mb-0">{{$empleado->roadway_type}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Nombre de Vialidad (Calle)</strong></p>
                      <p class="mb-0">{{$empleado->street}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>No de Exterior</strong></p>
                      <p class="mb-0">{{$empleado->outdoor_number}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>No de Interior</strong></p>
                      <p class="mb-0">{{$empleado->interior_number}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CP</strong></p>
                      <p class="mb-0">{{$empleado->cp}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Localidad</strong></p>
                      <p class="mb-0">{{$empleado->locality}}</p>
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
                      <p class="mb-0"><strong>Nombre</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->name.' '.$empleado->last_name_1.' '.$empleado->last_name_2}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Fecha de Ingreso</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->start_date}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Plaza</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->place->place_number}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Categoria</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->place->category->name}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Estatus</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->status}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Modificado por</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->modified_by}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Fecha de registro</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->created_at}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Ultima modificación</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->updated_at}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">               
                    <div class="col-sm-3">
                      <p class="mb-0 text-primary font-italic me-1"><strong>Datos Bancarios</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">               
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>No de Cuenta</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->account_number}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">               
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>CLABE</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->clabe}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">               
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Banco</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$empleado->bank->name}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">               
                    <div class="col-sm-3">
                      <p class="mb-0 text-primary font-italic me-1"><strong>Familiares</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"></p>
                    </div>
                  </div>
                  @if($empleado->families)
                  @foreach ($empleado->families as $item)
                  <hr>
                  <div class="row">               
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Nombre</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$item->last_name_1.' '.$item->last_name_2.' '.$item->name}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">               
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Fecha de Ingreso</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$item->start_date}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">               
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$item->curp}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">               
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Parentesco</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$item->relationship}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">               
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Estatus</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$item->status}}</p>
                    </div>
                  </div>
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection