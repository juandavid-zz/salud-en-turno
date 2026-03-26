<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Módulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Editar Módulo</h1>
    <a href="{{ route('modulos.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('modulos.update', $modulo) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Código</label>
            <input type="text" name="codigo" class="form-control" value="{{ $modulo->codigo }}">
        </div>
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $modulo->nombre }}">
        </div>
        <div class="mb-3">
            <label>Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" value="{{ $modulo->ubicacion }}">
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-control">
                <option value="disponible" {{ $modulo->estado === 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="no disponible" {{ $modulo->estado === 'no disponible' ? 'selected' : '' }}>No disponible</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Sede</label>
            <select name="sede_id" class="form-control">
                @foreach($sedes as $sede)
                    <option value="{{ $sede->id }}" {{ $modulo->sede_id == $sede->id ? 'selected' : '' }}>{{ $sede->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>
</html>