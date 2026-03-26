<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Sede</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Editar Sede</h1>
    <a href="{{ route('sedes.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('sedes.update', $sede) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Código</label>
            <input type="text" name="codigo" class="form-control" value="{{ $sede->codigo }}">
        </div>
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $sede->nombre }}">
        </div>
        <div class="mb-3">
            <label>Ciudad</label>
            <select name="ciudad_id" class="form-control">
                @foreach($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}" {{ $sede->ciudad_id == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>
</html>