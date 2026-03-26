<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Sede;
use App\Models\Rol;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with('sede', 'rol')->get();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $sedes = Sede::all();
        $roles = Rol::all();
        return view('empleados.create', compact('sedes', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'legajo'         => 'required|unique:empleados',
            'nombres'        => 'required',
            'apellidos'      => 'required',
            'email'          => 'required|email|unique:empleados',
            'telefono_movil' => 'required',
            'fecha_alta'     => 'required|date',
            'sede_id'        => 'required|exists:sedes,id',
            'rol_id'         => 'required|exists:roles,id',
        ]);

        Empleado::create($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        $sedes = Sede::all();
        $roles = Rol::all();
        return view('empleados.edit', compact('empleado', 'sedes', 'roles'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'legajo'         => 'required|unique:empleados,legajo,' . $empleado->id,
            'nombres'        => 'required',
            'apellidos'      => 'required',
            'email'          => 'required|email|unique:empleados,email,' . $empleado->id,
            'telefono_movil' => 'required',
            'fecha_alta'     => 'required|date',
            'sede_id'        => 'required|exists:sedes,id',
            'rol_id'         => 'required|exists:roles,id',
        ]);

        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente');
    }
}
