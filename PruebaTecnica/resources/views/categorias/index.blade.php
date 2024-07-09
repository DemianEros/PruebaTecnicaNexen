<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Categorías</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Lista de Categorías</h2>
    <a href="{{ route('categorias.create') }}">Crear Nueva Categoría</a>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <table>
        <tr>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->categoria }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
