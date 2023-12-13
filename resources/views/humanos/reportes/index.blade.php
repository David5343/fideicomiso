@extends('layouts.app')
@section('content')
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Humanos/Reportes
        </div>
        @if (session('msg_tipo'))
        <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- <livewire:humanos.reportes.index-reportes /> --}}
    <div class="row">
        <div class="col-6">
            <div class="card m-3 fs-1">
                <div class="card-header">
                 Reportes Disponibles
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <a class="icon-link link-success icon-link-hover" href="{{route('humanos.reportes.tabulador')}}" target="_blank">
                        Tabulador Salarial.
                        <i class="bi bi-file-pdf"></i>
                      </a>
                  </li>
                  <li class="list-group-item">
                    <a class="icon-link link-success icon-link-hover" href="{{route('humanos.reportes.activos')}}" target="_blank">
                        Empleados activos.
                        <i class="bi bi-file-pdf"></i>
                      </a></li>
                  <li class="list-group-item">
                    <a class="icon-link link-success icon-link-hover" href="{{route('humanos.reportes.inactivos')}}" target="_blank">
                    Empleados en estatus de baja.
                    <i class="bi bi-file-pdf"></i>
                  </a></li>
                </ul>
            </div>
        </div>
    </div>

    </div>
@endsection
