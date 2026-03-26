<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Sede</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle de la Sede</h1>
    <a href="{{ route('sedes.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr><th>Código</th><td>{{ $sede->codigo }}</td></tr>
        <tr><th>Nombre</th><td>{{ $sede->nombre }}</td></tr>
        <tr><th>Ciudad</th><td>{{ $sede->ciudad->nombre }}</td></tr>
    </table>
</body>
</html>
