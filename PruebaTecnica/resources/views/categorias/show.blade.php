@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Detalle de Categoría</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Detalle de Categoría</h2>
    <div>
        <p><strong>Categoría:</strong> {{ $categoria->nombre }}</p>
        <p><strong>Nombre:</strong> {{ $categoria->categoria }}</p>
        <p><strong>Descripción:</strong> {{ $categoria->descripcion }}</p>
    </div>
    <a href="{{ route('categorias.index') }}">Volver a la lista</a>
</body>
</html>
@endsection