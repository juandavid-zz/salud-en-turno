<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Medicamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Medicamentos</h1>
    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary mb-3">Nuevo Medicamento</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Presentación</th>
                <th>Concentración</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicamentos as $medicamento)
            <tr>
                <td>{{ $medicamento->codigo }}</td>
                <td>{{ $medicamento->nombre }}</td>
                <td>{{ $medicamento->presentacion }}</td>
                <td>{{ $medicamento->concentracion }}</td>
                <td>
                    <a href="{{ route('medicamentos.show', $medicamento) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('medicamentos.edit', $medicamento) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('medicamentos.destroy', $medicamento) }}" method="POST" style="display:inline">
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