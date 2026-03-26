<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Turno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Nuevo Turno</h1>
    <a href="{{ route('turnos.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('turnos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Código</label>
            <input type="text" name="codigo" class="form-control" value="{{ old('codigo') }}">
        </div>
        <div class="mb-3">
            <label>Fecha y Hora Programada</label>
            <input type="datetime-local" name="fecha_hora_programada" class="form-control" value="{{ old('fecha_hora_programada') }}">
        </div>
        <div class="mb-3">
            <label>Fecha y Hora de Llegada</label>
            <input type="datetime-local" name="fecha_hora_llegada" class="form-control" value="{{ old('fecha_hora_llegada') }}">
        </div>
        <div class="mb-3">
            <label>Motivo</label>
            <input type="text" name="motivo" class="form-control" value="{{ old('motivo') }}">
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-control">
                <option value="Reservado">Reservado</option>
                <option value="En espera">En espera</option>
                <option value="En atención">En atención</option>
                <option value="Finalizado">Finalizado</option>
                <option value="Cancelado">Cancelado</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Paciente</label>
            <select name="paciente_id" class="form-control">
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombres }} {{ $paciente->apellidos }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Sede</label>
            <select name="sede_id" class="form-control">
                @foreach($sedes as $sede)
                    <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Módulo</label>
            <select name="modulo_id" class="form-control">
                @foreach($modulos as $modulo)
                    <option value="{{ $modulo->id }}">{{ $modulo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Profesional</label>
            <select name="profesional_id" class="form-control">
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->nombres }} {{ $empleado->apellidos }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Empleado que Registra</label>
            <select name="empleado_registro_id" class="form-control">
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->nombres }} {{ $empleado->apellidos }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</body>
</html>