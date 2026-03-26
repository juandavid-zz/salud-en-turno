<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Nuevo Empleado</h1>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Legajo</label>
            <input type="text" name="legajo" class="form-control" value="{{ old('legajo') }}">
        </div>
        <div class="mb-3">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ old('nombres') }}">
        </div>
        <div class="mb-3">
            <label>Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label>Teléfono Móvil</label>
            <input type="text" name="telefono_movil" class="form-control" value="{{ old('telefono_movil') }}">
        </div>
        <div class="mb-3">
            <label>Fecha Alta</label>
            <input type="date" name="fecha_alta" class="form-control" value="{{ old('fecha_alta') }}">
        </div>
        <div class="mb-3">
            <label>Sede</label>
            <select name="sede_id" class="form-control">
                @foreach($sedes as $sede)
                    <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Rol</label>
            <select name="rol_id" class="form-control">
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</body>
</html>