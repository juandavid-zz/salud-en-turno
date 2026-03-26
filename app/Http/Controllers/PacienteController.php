<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::with('ciudad')->get();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        $ciudades = Ciudad::all();
        return view('pacientes.create', compact('ciudades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento'   => 'required',
            'numero_documento' => 'required|unique:pacientes',
            'nombres'          => 'required',
            'apellidos'        => 'required',
            'fecha_nacimiento' => 'required|date',
            'direccion'        => 'required',
            'ciudad_id'        => 'required|exists:ciudades,id',
            'email'            => 'required|email|unique:pacientes',
            'telefono_movil'   => 'required',
        ]);

        Paciente::create($request->all());
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado correctamente');
    }

    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        $ciudades = Ciudad::all();
        return view('pacientes.edit', compact('paciente', 'ciudades'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'tipo_documento'   => 'required',
            'numero_documento' => 'required|unique:pacientes,numero_documento,' . $paciente->id,
            'nombres'          => 'required',
            'apellidos'        => 'required',
            'fecha_nacimiento' => 'required|date',
            'direccion'        => 'required',
            'ciudad_id'        => 'required|exists:ciudades,id',
            'email'            => 'required|email|unique:pacientes,email,' . $paciente->id,
            'telefono_movil'   => 'required',
        ]);

        $paciente->update($request->all());
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado correctamente');
    }
}
