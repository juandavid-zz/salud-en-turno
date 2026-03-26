<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Editar Paciente</h1>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Tipo Documento</label>
            <select name="tipo_documento" class="form-control">
                <option value="CC" {{ $paciente->tipo_documento == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                <option value="TI" {{ $paciente->tipo_documento == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                <option value="PA" {{ $paciente->tipo_documento == 'PA' ? 'selected' : '' }}>Pasaporte</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Número Documento</label>
            <input type="text" name="numero_documento" class="form-control" value="{{ $paciente->numero_documento }}">
        </div>
        <div class="mb-3">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ $paciente->nombres }}">
        </div>
        <div class="mb-3">
            <label>Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ $paciente->apellidos }}">
        </div>
        <div class="mb-3">
            <label>Fecha Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $paciente->fecha_nacimiento }}">
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $paciente->direccion }}">
        </div>
        <div class="mb-3">
            <label>Ciudad</label>
            <select name="ciudad_id" class="form-control">
                @foreach($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}" {{ $paciente->ciudad_id == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $paciente->email }}">
        </div>
        <div class="mb-3">
            <label>Teléfono Móvil</label>
            <input type="text" name="telefono_movil" class="form-control" value="{{ $paciente->telefono_movil }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>
</html>