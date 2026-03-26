<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Stock de Medicamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Stock de Medicamentos</h1>
    <a href="{{ route('stock-medicamentos.create') }}" class="btn btn-primary mb-3">Nuevo Stock</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sede</th>
                <th>Medicamento</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
            <tr>
                <td>{{ $stock->sede->nombre }}</td>
                <td>{{ $stock->medicamento->nombre }}</td>
                <td>
                    <span class="badge {{ $stock->stock > 10 ? 'bg-success' : 'bg-danger' }}">
                        {{ $stock->stock }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('stock-medicamentos.show', $stock) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('stock-medicamentos.edit', $stock) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('stock-medicamentos.destroy', $stock) }}" method="POST" style="display:inline">
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