<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Pacientes</h1>
    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Nuevo Paciente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->tipo_documento }} - {{ $paciente->numero_documento }}</td>
                <td>{{ $paciente->nombres }}</td>
                <td>{{ $paciente->apellidos }}</td>
                <td>{{ $paciente->email }}</td>
                <td>{{ $paciente->telefono_movil }}</td>
                <td>{{ $paciente->ciudad->nombre }}</td>
                <td>
                    <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline">
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