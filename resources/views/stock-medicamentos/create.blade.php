<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Nuevo Stock</h1>
    <a href="{{ route('stock-medicamentos.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('stock-medicamentos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Sede</label>
            <select name="sede_id" class="form-control">
                @foreach($sedes as $sede)
                    <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Medicamento</label>
            <select name="medicamento_id" class="form-control">
                @foreach($medicamentos as $medicamento)
                    <option value="{{ $medicamento->id }}">{{ $medicamento->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" min="0">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</body>
</html>