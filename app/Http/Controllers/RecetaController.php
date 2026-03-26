<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Turno;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function index()
    {
        $recetas = Receta::with('turno', 'medicamentos')->get();
        return view('recetas.index', compact('recetas'));
    }

    public function create()
    {
        $turnos = Turno::all();
        $medicamentos = Medicamento::all();
        return view('recetas.create', compact('turnos', 'medicamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'turno_id'               => 'required|exists:turnos,id',
            'medicamentos'           => 'required|array|min:1',
            'medicamentos.*'         => 'exists:medicamentos,id',
            'cantidad.*'             => 'required|integer|min:1',
            'indicaciones.*'         => 'required|string',
        ]);

        $receta = Receta::create(['turno_id' => $request->turno_id]);

        foreach ($request->medicamentos as $i => $medicamento_id) {
            $receta->medicamentos()->attach($medicamento_id, [
                'cantidad'     => $request->cantidad[$i],
                'indicaciones' => $request->indicaciones[$i],
            ]);
        }

        return redirect()->route('recetas.index')->with('success', 'Receta creada correctamente');
    }

    public function show(Receta $receta)
    {
        $receta->load('turno', 'medicamentos');
        return view('recetas.show', compact('receta'));
    }

    public function edit(Receta $receta)
    {
        $turnos = Turno::all();
        $medicamentos = Medicamento::all();
        $receta->load('medicamentos');
        return view('recetas.edit', compact('receta', 'turnos', 'medicamentos'));
    }

    public function update(Request $request, Receta $receta)
    {
        $request->validate([
            'turno_id'       => 'required|exists:turnos,id',
            'medicamentos'   => 'required|array|min:1',
            'medicamentos.*' => 'exists:medicamentos,id',
            'cantidad.*'     => 'required|integer|min:1',
            'indicaciones.*' => 'required|string',
        ]);

        $receta->update(['turno_id' => $request->turno_id]);
        $receta->medicamentos()->detach();

        foreach ($request->medicamentos as $i => $medicamento_id) {
            $receta->medicamentos()->attach($medicamento_id, [
                'cantidad'     => $request->cantidad[$i],
                'indicaciones' => $request->indicaciones[$i],
            ]);
        }

        return redirect()->route('recetas.index')->with('success', 'Receta actualizada correctamente');
    }

    public function destroy(Receta $receta)
    {
        $receta->delete();
        return redirect()->route('recetas.index')->with('success', 'Receta eliminada correctamente');
    }
}