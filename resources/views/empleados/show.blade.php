<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle del Empleado</h1>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr><th>Legajo</th><td>{{ $empleado->legajo }}</td></tr>
        <tr><th>Nombres</th><td>{{ $empleado->nombres }}</td></tr>
        <tr><th>Apellidos</th><td>{{ $empleado->apellidos }}</td></tr>
        <tr><th>Email</th><td>{{ $empleado->email }}</td></tr>
        <tr><th>Teléfono Móvil</th><td>{{ $empleado->telefono_movil }}</td></tr>
        <tr><th>Fecha Alta</th><td>{{ $empleado->fecha_alta }}</td></tr>
        <tr><th>Sede</th><td>{{ $empleado->sede->nombre }}</td></tr>
        <tr><th>Rol</th><td>{{ $empleado->rol->nombre }}</td></tr>
    </table>
</body>
</html>
