<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::all();
        return view('paises.index', compact('paises'));
    }

    public function create()
    {
        return view('paises.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|unique:paises']);
        Pais::create($request->all());
        return redirect()->route('paises.index')->with('success', 'País creado correctamente');
    }

    public function show(Pais $paise)
    {
        return view('paises.show', compact('paise'));
    }

    public function edit(Pais $paise)
    {
        return view('paises.edit', compact('paise'));
    }

    public function update(Request $request, Pais $paise)
    {
        $request->validate(['nombre' => 'required|unique:paises,nombre,' . $paise->id]);
        $paise->update($request->all());
        return redirect()->route('paises.index')->with('success', 'País actualizado correctamente');
    }

    public function destroy(Pais $paise)
    {
        $paise->delete();
        return redirect()->route('paises.index')->with('success', 'País eliminado correctamente');
    }
}