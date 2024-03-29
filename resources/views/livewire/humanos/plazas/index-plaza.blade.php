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
        <h4 class="text-center">Lista de Plazas.</h4>
</div>          
<div class="row m-2">
    <div class="col">        
        <p class="text-start">
            <caption><i class="bi bi-database"></i> {{$count}} Registros de Plazas.</caption>
        </p>
    </div>
    <div class="col">
        <p class="text-start">
                <caption>{{$pa}}  Plazas Autorizadas</caption>
        </p>
    </div>
    <div class="col">        
        <p class="text-start">
            <caption>{{$po}}  Plazas Ocupadas</caption>
        </p>
    </div>
    <div class="col">        
        <p class="text-start">
            <caption>{{$pd}}  Plazas Disponibles.</caption>
        </p>
    </div>
</div> 
    <table class="table">
    @if ($lista->count())
        <caption> ({{ $lista->count() }}) Registros encontrados</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Plaza</th>
            <th scope="col">Puesto</th>
            <th scope="col">Categoria</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @if ($lista->count())
            @foreach ($lista as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->place_number }}</td>
                    <td>{{ $item->job_position }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        {{-- <button @click ="$dispatch('enviar-id',{id:{{$item->id}}}" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#editarArea">
                            <i class="bi bi-pencil-square"></i></button> --}}
                        <a href="{{ url('humanos/plazas/'.$item->id .'/edit')}}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ url('humanos/plazas/'.$item->id)}}" method="post">
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

