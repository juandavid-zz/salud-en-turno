<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle del Paciente</h1>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr><th>Tipo Documento</th><td>{{ $paciente->tipo_documento }}</td></tr>
        <tr><th>Número Documento</th><td>{{ $paciente->numero_documento }}</td></tr>
        <tr><th>Nombres</th><td>{{ $paciente->nombres }}</td></tr>
        <tr><th>Apellidos</th><td>{{ $paciente->apellidos }}</td></tr>
        <tr><th>Fecha Nacimiento</th><td>{{ $paciente->fecha_nacimiento }}</td></tr>
        <tr><th>Dirección</th><td>{{ $paciente->direccion }}</td></tr>
        <tr><th>Ciudad</th><td>{{ $paciente->ciudad->nombre }}</td></tr>
        <tr><th>Email</th><td>{{ $paciente->email }}</td></tr>
        <tr><th>Teléfono Móvil</th><td>{{ $paciente->telefono_movil }}</td></tr>
    </table>
</body>
</html>
