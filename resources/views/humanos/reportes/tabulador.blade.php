<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabulador Salarial del Fideicomiso</title>
    <link rel="stylesheet" href="{{public_path('css/pdf.css')}}">
</head>
<body>
    <div>
    <div id="header">
        <img class="imgHeaderleft" src="{{public_path('img/logochiapas.jpg')}}">
        <img class="imgHeaderright" src="{{public_path('img/LogoFide.png')}}">
        <div class="infoHeader">
            <h3>Fideicomiso de Prestaciones de Seguridad Social</h3>
            <h3>Para los Trabajadores del Sector Policial Operativo al</h3>
            <h3>Servicio del Poder Ejecutivo del Estados de Chiapas</h3>   
        </div>    
    </div>
    <div class="tituloTabla">
    <h2>Tabulador Salarial del Fideicomiso</h2>
    </div>
    <table class="tablaTabulador">
        @if(!empty($tabulador))
        <caption>  ({{ $tabulador->count() }}) Registros</caption>
        @endif
        <thead>
            <tr>
                <th >Plazas Autorizadas</th>
                <th >Plazas Ocupadas</th>
                <th >Categoria</th>
                <th >Sueldo</th>
                <th >Compensacion</th>
                <th >Complementaria</th>
                <th >Mensual</th>
                <th >ISR</th>
                <th >Sueldo Neto</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($tabulador))
                @foreach($tabulador AS $item)
                <tr>
                <td>{{$item->authorized_places}}</td>
                <td>{{$item->covered_places}}</td>
                <td>{{$item->name}}</td>
                <td>{{'$ '.number_format($item->salary,2)}}</td>
                <td>{{'$ '.number_format($item->compensation,2)}}</td>
                <td>{{'$ '.number_format($item->complementary,2)}}</td>
                <td>{{'$ '.number_format($item->gross_salary,2)}}</td>
                <td>{{'$ '.number_format($item->isr,2)}}</td>
                <td>{{'$ '.number_format($item->net_salary,2)}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div>
        <p>Plazas Autorizadas:{{$pa}}</p>
        <p>Plazas Ocupadas:{{$po}}</p>
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