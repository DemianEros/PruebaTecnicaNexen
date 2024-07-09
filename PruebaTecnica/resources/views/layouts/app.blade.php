<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tu aplicación')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Agregar estilos personalizados aquí -->
    @yield('styles')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categorias.index') }}">Borrar busqueda</a>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="{{ route('categorias.index') }}" method="GET">
                                <input class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Buscar" name="buscar" value="{{ request('buscar') }}">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0 ml-3" action="{{ route('categorias.index') }}" method="GET">
                                <select class="form-control mr-sm-2" name="filtro_categoria">
                                    <option value="">Todas las categorías</option>
                                    @foreach($categorias as $cat)
                                        <option value="{{ $cat->id }}" {{ request('filtro_categoria') == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Filtrar</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Agregar scripts personalizados aquí -->
    @yield('scripts')
</body>
</html>
