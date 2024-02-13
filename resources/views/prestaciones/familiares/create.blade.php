@extends('layouts.app')
@section('content')
<p class="text-end"><a href="{{ route('prestaciones.familiares.index') }}" class="btn btn-secondary" role="button">Lista de  Familiares</a></p>
<div class="card mt-1" style="border-color:#333333">
    <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
            Prestaciones/Crear Familiar
        </div>
        <livewire:prestaciones.familiares.create-family />
    </div>
@endsection