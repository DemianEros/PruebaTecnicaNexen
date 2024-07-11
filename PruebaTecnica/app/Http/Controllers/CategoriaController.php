<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __construct()
    {
        // Share categories with all views
        $categorias = Categoria::all();
        view()->share('categorias', $categorias);
    }

    public function index(Request $request)
    {
        $query = Categoria::query();

        // Filtrar por nombre
        if ($request->has('buscar')) {
            $query->where('nombre', 'like', '%' . $request->input('buscar') . '%');
        }

        // Filtrar por categoría si se selecciona una específica
        if ($request->filled('filtro_categoria')) {
            $categoria_id = $request->input('filtro_categoria');
            if ($categoria_id !== '') {
                $query->where('id', $categoria_id);
            }
        }

        $categorias = $query->get();

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria' => 'required',
            'descripcion' => 'nullable',
        ]);

        Categoria::create([
            'nombre' => $request->input('nombre'),
            'categoria' => $request->input('categoria'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito.');
    }

    public function show($id)
    {
        $categoria = Categoria::findOrFail($id); // Obtener la categoría por su ID
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria' => 'required',
            'descripcion' => 'nullable',
        ]);

        $categoria->update([
            'nombre' => $request->input('nombre'),
            'categoria' => $request->input('categoria'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito.');
    }
}