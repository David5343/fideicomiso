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
    <div class="col-12">
        <h4 class="text-center">Lista de Empleados.</h4>
</div>          
<div class="row m-2">
    <div class="col">        
        <p class="text-start">
            <caption><i class="bi bi-database"></i> {{$count}} Registros de Empleados.</caption>
        </p>
    </div>
    <div class="col">
        <p class="text-start">
                <caption><i class="bi bi-person-standing"></i> {{$masculinos}} Masculinos</caption>
        </p>
    </div>
    <div class="col">        
        <p class="text-start">
            <caption><i class="bi bi-person-standing-dress"></i> {{$femeninos}} Femeninos</caption>
        </p>
    </div>
</div> 
    <table class="table">
    @if ($lista->count())
        <caption> ({{ $lista->count() }}) Registros</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Area</th>
            <th scope="col">Plaza</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @if ($lista->count())
            @foreach ($lista as $key => $item)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $item->last_name_1 . ' ' . $item->last_name_2 . ' ' . $item->name }}</td>
                    <td>{{ $item->area->name }}</td>
                    <td>{{ $item->place->place_number }}</td>
                    <td>
                        <a href="{{ url('humanos/empleados/' . $item->id) }}" class="btn btn-info btn-sm m-1">
                            <i class="bi bi-person-lines-fill"></i>
                        </a>
                    </td>
                    <td>
                        {{-- <button @click ="$dispatch('enviar-id',{id:{{$item->id}}}" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#editarArea">
                            <i class="bi bi-pencil-square"></i></button> --}}
                        <a href="{{ url('humanos/empleados/'.$item->id .'/edit')}}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
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

