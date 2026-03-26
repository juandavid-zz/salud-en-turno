<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sedes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Sedes</h1>
    <a href="{{ route('sedes.create') }}" class="btn btn-primary mb-3">Nueva Sede</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sedes as $sede)
            <tr>
                <td>{{ $sede->codigo }}</td>
                <td>{{ $sede->nombre }}</td>
                <td>{{ $sede->ciudad->nombre }}</td>
                <td>
                    <a href="{{ route('sedes.show', $sede) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('sedes.edit', $sede) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('sedes.destroy', $sede) }}" method="POST" style="display:inline">
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