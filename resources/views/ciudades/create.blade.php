<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Ciudad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Nueva Ciudad</h1>
    <a href="{{ route('ciudades.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('ciudades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
        </div>
        <div class="mb-3">
            <label>Código Postal</label>
            <input type="text" name="codigo_postal" class="form-control" value="{{ old('codigo_postal') }}">
        </div>
        <div class="mb-3">
            <label>País</label>
            <select name="pais_id" class="form-control">
                @foreach($paises as $pais)
                    <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</body>
</html>