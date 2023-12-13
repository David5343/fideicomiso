<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Activo</title>
    <link rel="stylesheet" href="{{public_path('css/pdf.css')}}">
</head>
<body>
    <div>
    <div id="header">
        <img class="imgHeaderleft" src="{{public_path('img/logochiapas.jpg')}}">
        <img class="imgHeaderright" src="{{public_path('img/LogoFide.png')}}">
        <div class="infoHeader">
            <h3>Fideicomiso de Prestaciones de Seguridad Social</h3>
            <h3>Para los Trabajadores del Sector Policial Operativo</h3>
            <h3>Al Servicio del Poder Ejecutivo del Estados de Chiapas</h3>   
        </div>    
    </div>
    <div class="tituloTabla">
    <h3>PLANTILLA DEL PERSONAL ADSCRITO AL FIDEICOMISO DEL SECTOR POLICIAL</h3>
    </div>
    <table class="tablaPersonal">
        @if(!empty($personal))
        <caption>  ({{ $personal->count() }}) Registros</caption>
        @endif
        <thead>
            <tr>
                <th >NOMBRE</th>
                <th >AREA</th>
                <th >PLAZA</th>
                <th >RFC</th>
                <th >CATEGORIA</th>
                <th >PUESTO</th>
                <th >SUELDO</th>
                <th >COMPENSACION</th>
                <th >COMPLEMENTARIA</th>
                <th >MENSUAL</th>
                <th >ISR</th>
                <th >NETO</th>
                <th >FECHA DE INGRESO</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($personal))
                @foreach($personal AS $item)
                <tr>
                <td>{{$item->name.' '.$item->last_name_1.' '.$item->last_name_2}}</td>
                <td>{{$item->area->name}}</td>
                <td>{{$item->place->place_number}}</td>
                <td>{{$item->rfc}}</td>
                <td>{{$item->place->category->name}}</td>
                <td>{{$item->place->job_position}}</td>
                <td>{{'$ '.number_format($item->place->category->salary,2)}}</td>
                <td>{{'$ '.number_format($item->place->category->compensation,2)}}</td>
                <td>{{'$ '.number_format($item->place->category->complementary,2)}}</td>
                <td>{{'$ '.number_format($item->place->category->gross_salary,2)}}</td>
                <td>{{'$ '.number_format($item->place->category->isr,2)}}</td>
                <td>{{'$ '.number_format($item->place->category->net_salary,2)}}</td>
                <td>{{$item->start_date}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div>
        {{-- <p>Plazas Autorizadas:{{$pa}}</p>
        <p>Plazas Ocupadas:{{$po}}</p> --}}
    </div>
    <table class="tablaFirmas">
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Elaboro</td>
                <td>Vo. Bo.</td>
                <td>Autorizó</td>
            </tr>
            <tr>
                <td>@if($jefe)
                    {{$jefe}}
                @endif</td>
                <td>@if($admin)
                    {{$admin}}
                    @endif</td>
                <td>@if($cordi)
                    {{$cordi}}
                    @endif</td>
            </tr>
            <tr>
                <td>Jefe de Recursos Humanos</td>
                <td>Administrador General</td>
                <td>Coordinador General</td>
            </tr>
        </tbody>
    </table>
    </div>
</body>
</html>