<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Ciudad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle de la Ciudad</h1>
    <a href="{{ route('ciudades.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr><th>Nombre</th><td>{{ $ciudade->nombre }}</td></tr>
        <tr><th>Código Postal</th><td>{{ $ciudade->codigo_postal }}</td></tr>
        <tr><th>País</th><td>{{ $ciudade->pais->nombre }}</td></tr>
    </table>
</body>
</html>
