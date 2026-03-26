<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Módulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle del Módulo</h1>
    <a href="{{ route('modulos.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr><th>Código</th><td>{{ $modulo->codigo }}</td></tr>
        <tr><th>Nombre</th><td>{{ $modulo->nombre }}</td></tr>
        <tr><th>Ubicación</th><td>{{ $modulo->ubicacion }}</td></tr>
        <tr><th>Estado</th><td>
            <span class="badge {{ $modulo->estado === 'disponible' ? 'bg-success' : 'bg-danger' }}">
                {{ $modulo->estado }}
            </span>
        </td></tr>
        <tr><th>Sede</th><td>{{ $modulo->sede->nombre }}</td></tr>
    </table>
</body>
</html>
