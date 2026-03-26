<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver País</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle del País</h1>
    <a href="{{ route('paises.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr><th>Nombre</th><td>{{ $paise->nombre }}</td></tr>
    </table>
</body>
</html>