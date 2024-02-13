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
                      <p class="mb-0 text-primary font-italic me-1">Datos Bancarios</p>
                    </li>   
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>No de Cuenta</strong></p>
                      <p class="mb-0">{{$empleado->account_number}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CLABE</strong></p>
                      <p class="mb-0">{{$empleado->clabe}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Banco</strong></p>
                      <p class="mb-0">{{$empleado->bank->name}}</p>
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
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 mb-md-0">
                      <div class="card-body">
                        <p class="mb-4"><span class="text-primary font-italic me-1">Datos Personales</span>
                        </p>                     
                        <p class="mt-1 mb-1"><strong>Fecha de Nacimiento</strong></p>
                        <p class="mt-2 mb-1">{{$empleado->birthday}}</p>
                        <p class="mt-1 mb-1" ><strong>Lugar de Nacimiento</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->birthplace}}</p>
                        <p class="mt-1 mb-1" ><strong>Sexo</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->sex}}</p>
                        <p class="mt-1 mb-1" ><strong>RFC</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->rfc}}</p>
                        <p class="mt-1 mb-1" ><strong>CURP</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->curp}}</p>
                        <p class="mt-1 mb-1" ><strong>Teléfono</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->phone}}</p>
                        <p class="mt-1 mb-1" ><strong>Número de Emergencia</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->emergency_number}}</p>
                        <p class="mt-1 mb-1" ><strong>Correo Electrónico</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->email}}</p>
                        <p class="mt-1 mb-1" ><strong>Entidad Federativa</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->state}}</p>
                        <p class="mt-1 mb-1" ><strong>Municipio o Delegación</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->county}}</p>
                        <p class="mt-1 mb-1" ><strong>Colonia</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->neighborhood}}</p>
                        <p class="mt-1 mb-1" ><strong>Tipo de Vialidad</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->roadway_type}}</p>
                        <p class="mt-1 mb-1" ><strong>Nombre de la Vialidad(Calle)</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->street}}</p>
                        <p class="mt-1 mb-1" ><strong>No de Exterior</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->outdoor_number}}</p>
                        <p class="mt-1 mb-1" ><strong>No de Interior</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->interior_number}}</p>
                        <p class="mt-1 mb-1" ><strong>CP</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->cp}}</p>
                        <p class="mt-1 mb-1" ><strong>Localidad</strong></p>
                        <p class="mt-2 mb-1" >{{$empleado->locality}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card mb-4 mb-md-0">
                      <div class="card-body">
                        <p class="mb-4"><span class="text-primary font-italic me-1">Archivos Escaneados</span>
                        </p>
                        {{-- @if($ae)                       
                        <p class="mt-1 mb-1">Solicitud de Empleo</p>
                        <p class="mt-2 mb-1">{{$ae->job_application}}</p>
                        <p class="mt-1 mb-1" >Curriculum Vitae</p>
                        <p class="mt-2 mb-1" >{{$ae->cv_resume}}</p>
                        <p class="mt-1 mb-1" >Acta de Nacimiento</p>
                        <p class="mt-2 mb-1" >{{$ae->birth_certificate}}</p>
                        <p class="mt-1 mb-1" >INE</p>
                        <p class="mt-2 mb-1" >{{$ae->ine}}</p>
                        <p class="mt-1 mb-1" >RFC</p>
                        <p class="mt-2 mb-1" >{{$ae->rfc}}</p>
                        <p class="mt-1 mb-1">Cartilla Militar</p>
                        <p class="mt-2 mb-1">{{$ae->military_card}}</p>
                        <p class="mt-1 mb-1" >Comprobante de Domicilio</p>
                        <p class="mt-2 mb-1" >{{$ae->proof_residency}}</p>
                        <p class="mt-1 mb-1" >Croquis de Domicilio</p>
                        <p class="mt-2 mb-1" >{{$ae->sketch_home}}</p>
                        <p class="mt-1 mb-1" >Carta No Inhabilitacion</p>
                        <p class="mt-2 mb-1" >{{$ae->no_disqualification}}</p>
                        <p class="mt-1 mb-1" >Antecedentes Penales</p>
                        <p class="mt-2 mb-1" >{{$ae->criminal_record}}</p>
                        <p class="mt-1 mb-1">Nivel de Estudioos</p>
                        <p class="mt-2 mb-1">{{$ae->educational_level}}</p>
                        <p class="mt-1 mb-1" >Cédula Profesional</p>
                        <p class="mt-2 mb-1" >{{$ae->profesional_ID}}</p>
                        <p class="mt-1 mb-1" >Carta de Recomendación 1</p>
                        <p class="mt-2 mb-1" >{{$ae->recommendation_letter_1}}</p>
                        <p class="mt-1 mb-1" >Carta de Recomendación 2</p>
                        <p class="mt-2 mb-1" >{{$ae->recommendation_letter_2}}</p>
                        <p class="mt-1 mb-1" >Examen Médico</p>
                        <p class="mt-2 mb-1" >{{$ae->checkup_medical}}</p>
                        @endif --}}
                      </div>
                    </div>
                  </div>
                @if($fam !==0)
                    @foreach($fam as $f)
                    <div class="col-md-6 mt-2">
                        <div class="card mb-4 mb-md-0">
                          <div class="card-body">
                            <p class="mb-4"><span class="text-primary font-italic me-1"><strong>Familiares</strong></span> {{$f->parentesco}}
                            </p>
                            <p class="mt-1 mb-1"><strong>Nombre</strong></p>
                            <p class="mt-2 mb-1">{{$f->name.' '.$f->last_name_1.' '.$f->last_name_2}}</p>
                             <p class="mt-1 mb-1"><strong>Fecha de Ingreso</strong></p>
                            <p class="mt-2 mb-1">{{$f->start_date}}</p>
                          <p class="mt-1 mb-1" ><strong>CURP</strong></p>
                            <p class="mt-2 mb-1" >{{$f->curp}}</p>
                            <p class="mt-1 mb-1" ><strong>Parentesco</strong></p>
                            <p class="mt-2 mb-1" >{{$f->relationship}}</p>
                            <p class="mt-1 mb-1" ><strong>Estatus</strong></p>
                            <p class="mt-2 mb-1" >{{$f->status}}</p>
                          </div>
                        </div>
                      </div>
                       @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection