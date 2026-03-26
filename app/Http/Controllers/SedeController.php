<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    public function index()
    {
        $sedes = Sede::with('ciudad')->get();
        return view('sedes.index', compact('sedes'));
    }

    public function create()
    {
        $ciudades = Ciudad::all();
        return view('sedes.create', compact('ciudades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo'     => 'required|unique:sedes',
            'nombre'     => 'required',
            'ciudad_id'  => 'required|exists:ciudades,id',
        ]);
        Sede::create($request->all());
        return redirect()->route('sedes.index')->with('success', 'Sede creada correctamente');
    }

    public function show(Sede $sede)
    {
        return view('sedes.show', compact('sede'));
    }

    public function edit(Sede $sede)
    {
        $ciudades = Ciudad::all();
        return view('sedes.edit', compact('sede', 'ciudades'));
    }

    public function update(Request $request, Sede $sede)
    {
        $request->validate([
            'codigo'    => 'required|unique:sedes,codigo,' . $sede->id,
            'nombre'    => 'required',
            'ciudad_id' => 'required|exists:ciudades,id',
        ]);
        $sede->update($request->all());
        return redirect()->route('sedes.index')->with('success', 'Sede actualizada correctamente');
    }

    public function destroy(Sede $sede)
    {
        $sede->delete();
        return redirect()->route('sedes.index')->with('success', 'Sede eliminada correctamente');
    }
}