<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Rol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle del Rol</h1>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr><th>Nombre</th><td>{{ $rol->nombre }}</td></tr>
    </table>
</body>
</html>