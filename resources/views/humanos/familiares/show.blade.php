@extends('layouts.app')
@section('content')
<p class="text-end">
    <a href="{{ route('prestaciones.familiares.create') }}" class="btn btn-secondary" role="button">Crear Familiar</a>
    <a href="{{ route('prestaciones.familiares.index') }}" class="btn btn-secondary" role="button">Lista de Familiar</a>
</p>
<div class="card mt-1" style="border-color:#333333">
  <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
          {{ __('Prestaciones/Ficha Técnica del Familiar') }} </div> 
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
                    <a href="{{ url('humanos/familiares/'.$fam->id .'/edit')}}" class="btn btn-secondary btn-sm" title="Editar registro">
                      <i class="bi bi-pencil-square"></i>
                  </a> 
                </p>
                  @if(($fam->photo))
                  <img src="{{Storage::url($fam->photo)}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                  @else
                  <img src="{{asset('img/avatar.png')}}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                  @endif
                  <h5 class="my-3"></h5>
                  <p class="text-muted mb-1"><strong>ESTATUS</strong></p>
                  <p class="text-muted mb-4"><strong>@if($fam->status){{$fam->status}}@endif</strong></p>
                  <div class="d-flex justify-content-center mb-2">
                    {{-- <button type="button" class="btn btn-primary">Follow</button>
                    <button type="button" class="btn btn-outline-primary ms-1">Message</button> --}}
                  </div>
                </div>
              </div>
              @if($fam->employee)
              <div class="card mb-4 mb-lg-0 mt-2">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0 text-primary font-italic me-1">Familiar de:</p>
                    </li>   
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Nombre</strong></p>
                      <p class="mb-0">@if($fam->employee->last_name_1){{$fam->employee->last_name_1.' '.$fam->employee->last_name_2.' '.$fam->employee->name}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>Fecha de Nacimiento</strong></p>
                      <p class="mb-0">@if($fam->employee->birthday){{$fam->employee->birthday}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>RFC</strong></p>
                      <p class="mb-0">@if($fam->employee->rfc){{$fam->employee->rfc}}@endif</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                      <p class="mb-0">@if($fam->employee->curp){{$fam->employee->curp}}@endif</p>
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
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>Fecha de Ingreso</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($fam->start_date){{$fam->start_date}}@endif</p>
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
                      <p class="text-muted mb-0">@if($fam->last_name_1){{$fam->last_name_1.' '.$fam->last_name_2.' '.$fam->name}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>CURP</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($fam->curp){{$fam->curp}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>PARENTESCO</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($fam->relationship){{$fam->relationship}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>FECHA DE REGISTRO</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($fam->created_at){{$fam->created_at}}@endif</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0"><strong>ULTIMA ACTUALIZACION</strong></p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@if($fam->updated_at){{$fam->updated_at}}@endif</p>
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