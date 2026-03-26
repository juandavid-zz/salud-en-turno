<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Paciente;
use App\Models\Sede;
use App\Models\Modulo;
use App\Models\Empleado;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::with('paciente', 'sede', 'modulo', 'profesional')->get();
        return view('turnos.index', compact('turnos'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $sedes = Sede::all();
        $modulos = Modulo::where('estado', 'disponible')->get();
        $empleados = Empleado::all();
        return view('turnos.create', compact('pacientes', 'sedes', 'modulos', 'empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo'               => 'required|unique:turnos',
            'fecha_hora_programada'=> 'required|date',
            'motivo'               => 'required',
            'estado'               => 'required',
            'paciente_id'          => 'required|exists:pacientes,id',
            'sede_id'              => 'required|exists:sedes,id',
            'modulo_id'            => 'required|exists:modulos,id',
            'profesional_id'       => 'required|exists:empleados,id',
            'empleado_registro_id' => 'required|exists:empleados,id',
        ]);
        Turno::create($request->all());
        return redirect()->route('turnos.index')->with('success', 'Turno creado correctamente');
    }

    public function show(Turno $turno)
    {
        return view('turnos.show', compact('turno'));
    }

    public function edit(Turno $turno)
    {
        $pacientes = Paciente::all();
        $sedes = Sede::all();
        $modulos = Modulo::all();
        $empleados = Empleado::all();
        return view('turnos.edit', compact('turno', 'pacientes', 'sedes', 'modulos', 'empleados'));
    }

    public function update(Request $request, Turno $turno)
    {
        $request->validate([
            'codigo'               => 'required|unique:turnos,codigo,' . $turno->id,
            'fecha_hora_programada'=> 'required|date',
            'motivo'               => 'required',
            'estado'               => 'required',
            'paciente_id'          => 'required|exists:pacientes,id',
            'sede_id'              => 'required|exists:sedes,id',
            'modulo_id'            => 'required|exists:modulos,id',
            'profesional_id'       => 'required|exists:empleados,id',
            'empleado_registro_id' => 'required|exists:empleados,id',
        ]);
        $turno->update($request->all());
        return redirect()->route('turnos.index')->with('success', 'Turno actualizado correctamente');
    }

    public function destroy(Turno $turno)
    {
        $turno->delete();
        return redirect()->route('turnos.index')->with('success', 'Turno eliminado correctamente');
    }
}