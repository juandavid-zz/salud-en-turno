<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Sede;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function index()
    {
        $modulos = Modulo::with('sede')->get();
        return view('modulos.index', compact('modulos'));
    }

    public function create()
    {
        $sedes = Sede::all();
        return view('modulos.create', compact('sedes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo'    => 'required|unique:modulos',
            'nombre'    => 'required',
            'ubicacion' => 'required',
            'estado'    => 'required|in:disponible,no disponible',
            'sede_id'   => 'required|exists:sedes,id',
        ]);
        Modulo::create($request->all());
        return redirect()->route('modulos.index')->with('success', 'Módulo creado correctamente');
    }

    public function show(Modulo $modulo)
    {
        return view('modulos.show', compact('modulo'));
    }

    public function edit(Modulo $modulo)
    {
        $sedes = Sede::all();
        return view('modulos.edit', compact('modulo', 'sedes'));
    }

    public function update(Request $request, Modulo $modulo)
    {
        $request->validate([
            'codigo'    => 'required|unique:modulos,codigo,' . $modulo->id,
            'nombre'    => 'required',
            'ubicacion' => 'required',
            'estado'    => 'required|in:disponible,no disponible',
            'sede_id'   => 'required|exists:sedes,id',
        ]);
        $modulo->update($request->all());
        return redirect()->route('modulos.index')->with('success', 'Módulo actualizado correctamente');
    }

    public function destroy(Modulo $modulo)
    {
        $modulo->delete();
        return redirect()->route('modulos.index')->with('success', 'Módulo eliminado correctamente');
    }

    public function toggleEstado(Modulo $modulo)
    {
        $modulo->estado = $modulo->estado === 'disponible' ? 'no disponible' : 'disponible';
        $modulo->save();
        return redirect()->route('modulos.index')->with('success', 'Estado actualizado correctamente');
    }
}