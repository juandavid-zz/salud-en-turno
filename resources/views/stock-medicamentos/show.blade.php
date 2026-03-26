<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle del Stock</h1>
    <a href="{{ route('stock-medicamentos.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr><th>Sede</th><td>{{ $stockMedicamento->sede->nombre }}</td></tr>
        <tr><th>Medicamento</th><td>{{ $stockMedicamento->medicamento->nombre }}</td></tr>
        <tr><th>Stock</th><td>{{ $stockMedicamento->stock }}</td></tr>
    </table>
</body>
</html>