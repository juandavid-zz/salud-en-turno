<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Pais;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function index()
    {
        $ciudades = Ciudad::with('pais')->get();
        return view('ciudades.index', compact('ciudades'));
    }

    public function create()
    {
        $paises = Pais::all();
        return view('ciudades.create', compact('paises'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'       => 'required',
            'codigo_postal' => 'required',
            'pais_id'      => 'required|exists:paises,id',
        ]);
        Ciudad::create($request->all());
        return redirect()->route('ciudades.index')->with('success', 'Ciudad creada correctamente');
    }

    public function show(Ciudad $ciudade)
    {
        return view('ciudades.show', compact('ciudade'));
    }

    public function edit(Ciudad $ciudade)
    {
        $paises = Pais::all();
        return view('ciudades.edit', compact('ciudade', 'paises'));
    }

    public function update(Request $request, Ciudad $ciudade)
    {
        $request->validate([
            'nombre'       => 'required',
            'codigo_postal' => 'required',
            'pais_id'      => 'required|exists:paises,id',
        ]);
        $ciudade->update($request->all());
        return redirect()->route('ciudades.index')->with('success', 'Ciudad actualizada correctamente');
    }

    public function destroy(Ciudad $ciudade)
    {
        $ciudade->delete();
        return redirect()->route('ciudades.index')->with('success', 'Ciudad eliminada correctamente');
    }
}