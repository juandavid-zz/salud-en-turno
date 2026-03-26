<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Medicamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Nuevo Medicamento</h1>
    <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('medicamentos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Código</label>
            <input type="text" name="codigo" class="form-control" value="{{ old('codigo') }}">
        </div>
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
        </div>
        <div class="mb-3">
            <label>Presentación</label>
            <input type="text" name="presentacion" class="form-control" value="{{ old('presentacion') }}">
        </div>
        <div class="mb-3">
            <label>Concentración</label>
            <input type="text" name="concentracion" class="form-control" value="{{ old('concentracion') }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</body>
</html>