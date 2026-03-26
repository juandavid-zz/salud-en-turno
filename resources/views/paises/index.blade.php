<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Países</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Países</h1>
    <a href="{{ route('paises.create') }}" class="btn btn-primary mb-3">Nuevo País</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $pais)
            <tr>
                <td>{{ $pais->nombre }}</td>
                <td>
                    <a href="{{ route('paises.show', $pais) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('paises.edit', $pais) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('paises.destroy', $pais) }}" method="POST" style="display:inline">
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