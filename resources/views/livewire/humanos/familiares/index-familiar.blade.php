<div class="card-body p-3">
    <div class="row mb-2">
        <div class="col-sm-4">
            <input wire:model.live='search' type="text" class="form-control form-control-lg"
                placeholder="Escribe el nombre...">
        </div>
        <div class="col-sm-2">
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
            <th scope="col">Familiar</th>
            <th scope="col">Fecha de Ingreso</th>
            <th scope="col">CURP</th>
            <th scope="col">Empleado</th>
            {{-- <th scope="col">Ver</th> --}}
            <th scope="col">Editar</th>
            {{-- <th scope="col">Baja</th> --}}
        </tr>
    </thead>
    <tbody>
        @if ($lista->count())
            @foreach ($lista as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->last_name_1 . ' ' . $item->last_name_2 . ' ' . $item->name }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->curp }}</td>
                    <td>{{ $item->employee->last_name_1 . ' ' . $item->employee->last_name_2 . ' ' . $item->employee->name }}</td>
                    {{-- <td>
                        <a href="{{ url('humanos/familiares/' . $item->id) }}" class="btn btn-warning btn-sm m-1">
                            <i class="bi bi-folder2-open"></i>
                        </a>
                    </td> --}}
                    <td>
                        {{-- <button @click ="$dispatch('enviar-id',{id:{{$item->id}}}" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#editarArea">
                            <i class="bi bi-pencil-square"></i></button> --}}
                        <a href="{{ url('humanos/familiares/'.$item->id .'/edit')}}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    {{-- <td>
                        <form action="{{ url('humanos/familiares/'.$item->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td> --}}
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

