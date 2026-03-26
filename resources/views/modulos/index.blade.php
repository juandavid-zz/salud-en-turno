<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Módulos</h1>
    <a href="{{ route('modulos.create') }}" class="btn btn-primary mb-3">Nuevo Módulo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Sede</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modulos as $modulo)
            <tr>
                <td>{{ $modulo->codigo }}</td>
                <td>{{ $modulo->nombre }}</td>
                <td>{{ $modulo->ubicacion }}</td>
                <td>
                    <span class="badge {{ $modulo->estado === 'disponible' ? 'bg-success' : 'bg-danger' }}">
                        {{ $modulo->estado }}
                    </span>
                </td>
                <td>{{ $modulo->sede->nombre }}</td>
                <td>
                    <a href="{{ route('modulos.show', $modulo) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('modulos.edit', $modulo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('modulos.toggle-estado', $modulo) }}" method="POST" style="display:inline">
                        @csrf @method('PATCH')
                        <button class="btn btn-secondary btn-sm">
                            {{ $modulo->estado === 'disponible' ? 'Deshabilitar' : 'Habilitar' }}
                        </button>
                    </form>
                    <form action="{{ route('modulos.destroy', $modulo) }}" method="POST" style="display:inline">
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