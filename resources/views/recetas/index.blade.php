<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recetas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Recetas</h1>
    <a href="{{ route('recetas.create') }}" class="btn btn-primary mb-3">Nueva Receta</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Turno</th>
                <th>Paciente</th>
                <th>Medicamentos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recetas as $receta)
            <tr>
                <td>{{ $receta->id }}</td>
                <td>{{ $receta->turno->codigo }}</td>
                <td>{{ $receta->turno->paciente->nombres }} {{ $receta->turno->paciente->apellidos }}</td>
                <td>{{ $receta->medicamentos->pluck('nombre')->join(', ') }}</td>
                <td>
                    <a href="{{ route('recetas.show', $receta) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('recetas.edit', $receta) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('recetas.destroy', $receta) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>