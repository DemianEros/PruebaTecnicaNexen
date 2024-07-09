<!DOCTYPE html>
<html>
<head>
    <title>Editar Categoría</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Editar Categoría</h2>
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $categoria->nombre }}" required>
        
        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" value="{{ $categoria->categoria }}" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion">{{ $categoria->descripcion }}</textarea>
        
        <button type="submit">Confirmar</button>
        <a href="{{ route('categorias.index') }}">Cancelar</a>
    </form>
</body>
</html>
