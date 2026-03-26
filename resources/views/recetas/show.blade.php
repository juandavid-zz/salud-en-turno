<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Receta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Detalle de la Receta</h1>
    <a href="{{ route('recetas.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered mb-4">
        <tr><th>ID Receta</th><td>{{ $receta->id }}</td></tr>
        <tr><th>Turno</th><td>{{ $receta->turno->codigo }}</td></tr>
        <tr><th>Paciente</th><td>{{ $receta->turno->paciente->nombres }} {{ $receta->turno->paciente->apellidos }}</td></tr>
    </table>

    <h5>Medicamentos</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Medicamento</th>
                <th>Cantidad</th>
                <th>Indicaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($receta->medicamentos as $medicamento)
            <tr>
                <td>{{ $medicamento->nombre }}</td>
                <td>{{ $medicamento->pivot->cantidad }}</td>
                <td>{{ $medicamento->pivot->indicaciones }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>