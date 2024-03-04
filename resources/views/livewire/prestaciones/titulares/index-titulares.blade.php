<div class="card-body p-3">
    <div class="row mb-2">
    <div class="col-12">
        <h4>Busqueda de Titulares.</h4>
    </div>
        <p class="text-end">
            <i class="bi bi-stoplights-fill btn btn-warning btn-sm m-1"></i>Preafiliado
            <i class="bi bi-stoplights-fill btn btn-success btn-sm m-1"></i>Activo
            <i class="bi bi-stoplights-fill btn btn-danger btn-sm m-1"></i>Baja
        </p>
        <div class="col-sm-4">
            <input wire:model.live='search' type="text" class="form-control"
                placeholder="Selecciona El Parámetro de Busqueda...">
        </div>
        <div class="col-md-2">
            <select  wire:model.live="busqueda_por" class="form-select">
                <option value="">Busqueda por</option>
                <option value="rfc">RFC</option>
                <option value="file_number">No. de Expediente</option>
                <option value="curp">CURP</option>
            </select>
        </div>
        <div class="col-sm-4">
            <button wire:click="buscar" class="btn btn-outline-primary" type="button" id="btn_buscar">Buscar</button>
            <button wire:click="limpiar" class="btn btn-outline-secondary" type="button" id="btn_limpiar">Limpiar</button>
        </div>
        @if($dato)
        <div class="col-12">
        <table class="table" id="tb_busqueda">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No de Expediente</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Ficha Técnica</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Baja</th>
                </tr>
            </thead>
            <tbody>
                        <tr>
                            <th scope="row">{{ $dato->id }}</th>
                            <td>{{ $dato->file_number }}</td>
                            <td>{{ $dato->rfc }}</td>
                            <td>{{ $dato->last_name_1.' '.$dato->last_name_2.' '.$dato->name }}</td>
                            <td>
                                {{-- <button @click ="$dispatch('enviar-id',{id:{{$item->id}}}" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#editarArea">
                                    <i class="bi bi-pencil-square"></i></button> --}}
                                <a href="{{ url('prestaciones/titulares/'.$dato->id .'/edit')}}" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('prestaciones/titulares/' . $dato->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-file-person"></i>
                                </a>
                            </td>
                            <td>
                                @switch($dato->affiliate_status)
                                @case("Preafiliado")
                                <i class="bi bi-stoplights-fill btn btn-warning btn-sm"></i>
                                    @break                     
                                @case("Activo")
                                <i class="bi bi-stoplights-fill btn btn-success btn-sm"></i>
                                    @break               
                                @default
                                <i class="bi bi-stoplights-fill btn btn-danger btn-sm"></i>
                            @endswitch
                            </td>
                            <td>
                                {{-- <form action="{{ url('prestaciones/titulares/'.$item->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-lg">
                                        <i class="bi bi-person-down"></i></button>
                                </form> --}}
                                
                                <a href="{{ url('prestaciones/titulares/'.$dato->id .'/disabled')}}" class="btn btn-danger btn-sm">
                                    <i class="bi bi-person-down"></i>
                                </a>
                            </td>
                        </tr>
            </tbody>
        </table>
        </div>
        @else
        <div class="col-12">
            @if (session('msg_tipo_busqueda'))
            <div class="alert alert-{{session('msg_tipo_busqueda')}} alert-dismissible fade show m-4 p-4" role="alert">
              <h4 class="alert-heading">Pigd <i class="bi bi-check-circle"></i></h4>
              <p><strong>{{ session('msg_busqueda')}}</strong></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            </div> 
        @endif
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10">
                <hr>
            </div>
            <div class="col-1">
            </div>
        </div>
    <div class="col-12">
            <h4 class="text-center">Lista de Titulares.</h4>
    </div>          
    <div class="row m-2">
        <div class="col">        
            <p class="text-start">
                <caption><i class="bi bi-database"></i> {{$count}} Registros de Titulares.</caption>
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
        <div class="col">        
            <p class="text-start">
                <caption> {{$indefinidos}} Indefinidos.</caption>
            </p>
        </div>
    </div>   
    </div>
    <table class="table" id="lista">
    @if ($lista->count())
        <caption> ({{ $lista->count() }}) Registros mas recientes.</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">No de Expediente</th>
            <th scope="col">RFC</th>
            <th scope="col">Nombre</th>
            <th scope="col">Editar</th>
            <th scope="col">Ficha Técnica</th>
            <th scope="col">Estatus</th>
            <th scope="col">Baja</th>
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
                    <td>
                        {{-- <button @click ="$dispatch('enviar-id',{id:{{$item->id}}}" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#editarArea">
                            <i class="bi bi-pencil-square"></i></button> --}}
                        <a href="{{ url('prestaciones/titulares/'.$item->id .'/edit')}}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ url('prestaciones/titulares/' . $item->id) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-file-person"></i>
                        </a>
                    </td>
                    <td>
                        @switch($item->affiliate_status)
                        @case("Preafiliado")
                        <i class="bi bi-stoplights-fill btn btn-warning btn-sm"></i>
                            @break                     
                        @case("Activo")
                        <i class="bi bi-stoplights-fill btn btn-success btn-sm"></i>
                            @break               
                        @default
                        <i class="bi bi-stoplights-fill btn btn-danger btn-sm"></i>
                    @endswitch
                    </td>
                    <td>
                        {{-- <form action="{{ url('prestaciones/titulares/'.$item->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="bi bi-person-down"></i></button>
                        </form> --}}
                        
                        <a href="{{ url('prestaciones/titulares/'.$item->id .'/disabled')}}" class="btn btn-danger btn-sm">
                            <i class="bi bi-person-down"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{-- {{ $lista->links() }} --}}
@else
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Ups!</strong> No se encontro ningun registro.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
</div>

