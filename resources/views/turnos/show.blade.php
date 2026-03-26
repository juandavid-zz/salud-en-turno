<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Turno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle del Turno</h1>
    <a href="{{ route('turnos.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr><th>Código</th><td>{{ $turno->codigo }}</td></tr>
        <tr><th>Fecha Programada</th><td>{{ $turno->fecha_hora_programada }}</td></tr>
        <tr><th>Fecha Llegada</th><td>{{ $turno->fecha_hora_llegada ?? 'Sin registrar' }}</td></tr>
        <tr><th>Motivo</th><td>{{ $turno->motivo }}</td></tr>
        <tr><th>Estado</th><td>{{ $turno->estado }}</td></tr>
        <tr><th>Paciente</th><td>{{ $turno->paciente->nombres }} {{ $turno->paciente->apellidos }}</td></tr>
        <tr><th>Sede</th><td>{{ $turno->sede->nombre }}</td></tr>
        <tr><th>Módulo</th><td>{{ $turno->modulo->nombre }}</td></tr>
        <tr><th>Profesional</th><td>{{ $turno->profesional->nombres }} {{ $turno->profesional->apellidos }}</td></tr>
        <tr><th>Registrado por</th><td>{{ $turno->empleadoRegistro->nombres }} {{ $turno->empleadoRegistro->apellidos }}</td></tr>
    </table>
</body>
</html>