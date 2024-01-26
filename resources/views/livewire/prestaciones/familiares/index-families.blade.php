<div class="card-body p-3">
    <div class="row mb-2">
        <div class="col-sm-4">
            <input wire:model.live='search' type="text" class="form-control form-control-lg"
                placeholder="Escribe el rfc...">
        </div>
        <div class="col-md-2">
            <select wire:model.live='numberRows' class="form-select form-select-lg">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>
    <table class="table">
    @if ($lista->count())
        <caption> ({{ $lista->count() }}) Registros</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">No de Expediente</th>
            <th scope="col">RFC</th>
            <th scope="col">Familiar</th>
            <th scope="col">Titular</th>
            <th scope="col">Editar</th>
            <th scope="col">Ver</th>
            <th scope="col">Estatus</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @if ($lista->count())
            @foreach ($lista as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->file_number }}</td>
                    <td>{{ $item->rfc }}</td>
                    <td>{{ $item->last_name_1.' '.$item->last_name_2.' '.$item->name }}</td>
                    <td>{{ $item->serviceUser->last_name_1.' '.$item->serviceUser->last_name_2.' '.$item->serviceUser->name }}</td>
                    <td>
                        {{-- <button @click ="$dispatch('enviar-id',{id:{{$item->id}}}" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#editarArea">
                            <i class="bi bi-pencil-square"></i></button> --}}
                        <a href="{{ url('prestaciones/familiares/'.$item->id .'/edit')}}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a> 
                    </td>
                    <td>
                        <a href="{{ url('prestaciones/familiares/' . $item->id) }}" class="btn btn-warning btn-sm m-1">
                            <i class="bi bi-folder2-open"></i>
                        </a>
                    </td>
                    <td>{{ $item->family_status }}</td>
                    <td>
                        <form action="{{ url('prestaciones/familiares/'.$item->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $lista->links() }}
@else
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Ups!</strong> No se encontro ningun registro.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
</div>

