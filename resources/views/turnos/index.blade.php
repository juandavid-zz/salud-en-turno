<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Turnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Turnos</h1>
    <a href="{{ route('turnos.create') }}" class="btn btn-primary mb-3">Nuevo Turno</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Fecha Programada</th>
                <th>Paciente</th>
                <th>Sede</th>
                <th>Módulo</th>
                <th>Profesional</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($turnos as $turno)
            <tr>
                <td>{{ $turno->codigo }}</td>
                <td>{{ $turno->fecha_hora_programada }}</td>
                <td>{{ $turno->paciente->nombres }} {{ $turno->paciente->apellidos }}</td>
                <td>{{ $turno->sede->nombre }}</td>
                <td>{{ $turno->modulo->nombre }}</td>
                <td>{{ $turno->profesional->nombres }} {{ $turno->profesional->apellidos }}</td>
                <td>
                    <span class="badge
                        @if($turno->estado == 'Reservado') bg-primary
                        @elseif($turno->estado == 'En espera') bg-warning text-dark
                        @elseif($turno->estado == 'En atención') bg-info text-dark
                        @elseif($turno->estado == 'Finalizado') bg-success
                        @else bg-danger @endif">
                        {{ $turno->estado }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('turnos.show', $turno) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('turnos.edit', $turno) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('turnos.destroy', $turno) }}" method="POST" style="display:inline">
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