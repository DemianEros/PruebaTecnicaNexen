<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
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