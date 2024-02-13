<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    {{-- <link href="{{asset('css/fonts.css')}}" rel="stylesheet"> --}}
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="container">
      <img src="{{asset('img/Banner-2.jpg')}}" class="rounded img-fluid" width="1296px">
          <nav class="navbar sticky-top rounded" style="background-color:#b09a5b; border-color:#333333">
            <div class="container">        
              <a class="navbar-brand" href="#"></a>
              <span class="navbar-text fs-3 fst-italic">
                "Año de Felipe Carrillo Puerto, Benemérito del Proletariado, Revolucionario y Defensor del Mayab".
              </span>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel" style="background-color:#b09a5b; border-color:#333333">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                    <div class="dropdown">
                      
                      <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">                       
                        @auth
                        {{-- @livewire('app-layout') --}}
                        <i class="bi bi-person"></i>{{ ' '.Auth::user()->name }}                     
                      </button>
                      <ul class="dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           {{ __('Salir') }}
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>
                      </li>
                      </ul>
                    </div>
                    @endauth
                  </h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                      {{-- <a class="nav-link" href="#">Link</a> --}}
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-people"></i> Recursos Humanos
                      </a>
                      <ul class="dropdown-menu dropdown-menu-primary">
                        <li><h6 class="dropdown-header">Catalogos</h6></li>
                        <li><a class="dropdown-item" href="{{route('humanos.areas.index')}}">Áreas de Adscripción</a></li>
                        <li><a class="dropdown-item" href="{{route('humanos.bancos.index')}}">Bancos</a></li>
                        <li><a class="dropdown-item" href="{{route('humanos.estados.index')}}">Estados</a></li>
                        <li><a class="dropdown-item" href="{{route('humanos.municipios.index')}}">Municipios</a></li>
                        <li><a class="dropdown-item" href="{{route('humanos.categorias.index')}}">Categorias</a></li>
                        <li><a class="dropdown-item" href="{{route('humanos.plazas.index')}}">Plazas</a></li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><h6 class="dropdown-header">Empleados</h6></li>
                        <li><a class="dropdown-item" href="{{route('humanos.empleados.index')}}">Empleados</a></li>
                        <li><a class="dropdown-item" href="{{route('humanos.familiares.index')}}">Familiares</a></li>
                         {{-- <li><a class="dropdown-item" href="{{route('humanos.archivos.index')}}">Docs Escaneados Empleados</a></li>
                        <li><a class="dropdown-item" href="{{route('humanos.archivos_familia.index')}}">Docs Escaneados Familiares</a></li> --}}
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header">Reportes</h6></li>
                        <li><a class="dropdown-item" href="{{route('humanos.reportes.index')}}">Generador de Reportes</a></li>
                        <hr class="dropdown-divider"></li>
                      {{--<li><h6 class="dropdown-header">Solicitudes</h6></li>
                      <li><a class="dropdown-item" href="{{route('humanos.permisos.index')}}">Permiso por hora</a></li>
                      <li><a class="dropdown-item" href="{{route('humanos.vacaciones.index')}}">Vacaciones</a></li>--}}
                      <hr class="dropdown-divider"></li>
                      <li><h6 class="dropdown-header">Ajustes</h6></li>
                      <li><a class="dropdown-item" href="{{route('humanos.slider.create')}}">Slider</a></li> 
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-people"></i> Prestaciones
                      </a>
                      <ul class="dropdown-menu dropdown-menu-primary">
                        <li><h6 class="dropdown-header">Catalogos</h6></li>
                        <li><a class="dropdown-item" href="{{route('prestaciones.dependencias.index')}}">Dependencias</a></li>
                        <li><a class="dropdown-item" href="{{route('prestaciones.subdependencias.index')}}">Subdependencias</a></li>
                        <li>
                          <hr class="dropdown-divider">
                          <li><h6 class="dropdown-header">Afiliados</h6></li>
                        </li>
                        <li><a class="dropdown-item" href="{{route('prestaciones.titulares.index')}}">Titulares</a></li>
                      </li>
                      <li><a class="dropdown-item" href="{{route('prestaciones.familiares.index')}}">Familiares</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear"></i> Tecnologías
                      </a>
                      <ul class="dropdown-menu dropdown-menu-primary">
                        <li><h6 class="dropdown-header">Configuracion</h6></li>
                        <li><a class="dropdown-item" href="{{route('tecnologias.usuarios.index')}}"><i class="bi bi-person-gear"></i> Usuarios</a></li>
                        <li><a class="dropdown-item" href="{{route('tecnologias.roles.index')}}"><i class="bi bi-ui-checks"></i> Roles</a></li>
                        <li><a class="dropdown-item" href="{{route('tecnologias.permisos.index')}}"><i class="bi bi-key"></i> Permisos</a></li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{route('humanos.empleados.index')}}">Ejemplo</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        <main class="py-1">
            @yield('content')
            <footer class="container py-3 my-4 p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
              {{-- <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
              </ul> --}}
              {{-- <p class="text-center text-body-secondary">© 2023 Company, Inc</p> --}}
              <p class="text-center">Tecnologías de la Información</p>
            </footer>
        </main>
    </div>
</body>
</html>
