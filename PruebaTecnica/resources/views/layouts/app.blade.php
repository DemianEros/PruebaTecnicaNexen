<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu Aplicación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #3498db;
            text-align: center;
            padding: 10px 0;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropbtn {
            font-size: 18px;
            border: none;
            outline: none;
            color: white;
            background-color: inherit;
            margin: 0;
            padding: 10px 15px;
            cursor: pointer;
        }
        .dropbtn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn">Categorías</button>
            <div class="dropdown-content">
                @foreach($categorias as $categoria)
                    <a href="{{ route('categorias.show', $categoria->id) }}">{{ $categoria->nombre }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>