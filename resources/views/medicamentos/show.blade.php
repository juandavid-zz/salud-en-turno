<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Medicamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle del Medicamento</h1>
    <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr><th>Código</th><td>{{ $medicamento->codigo }}</td></tr>
        <tr><th>Nombre</th><td>{{ $medicamento->nombre }}</td></tr>
        <tr><th>Presentación</th><td>{{ $medicamento->presentacion }}</td></tr>
        <tr><th>Concentración</th><td>{{ $medicamento->concentracion }}</td></tr>
    </table>
</body>
</html>