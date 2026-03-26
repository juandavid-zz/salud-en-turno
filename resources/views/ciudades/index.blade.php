<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ciudades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Ciudades</h1>
    <a href="{{ route('ciudades.create') }}" class="btn btn-primary mb-3">Nueva Ciudad</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Código Postal</th>
                <th>País</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ciudades as $ciudad)
            <tr>
                <td>{{ $ciudad->nombre }}</td>
                <td>{{ $ciudad->codigo_postal }}</td>
                <td>{{ $ciudad->pais->nombre }}</td>
                <td>
                    <a href="{{ route('ciudades.show', $ciudad) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('ciudades.edit', $ciudad) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('ciudades.destroy', $ciudad) }}" method="POST" style="display:inline">
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