@extends('layouts.app')
@section('content')
<p class="text-end"><a href="{{ route('prestaciones.familiares.index') }}" class="btn btn-primary" role="button">Lista de  Familiares</a></p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Humanos/Crear Familiar
        </div>
        <livewire:prestaciones.familiares.create-family />
    </div>
@endsection