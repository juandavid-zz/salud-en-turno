<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Receta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Nueva Receta</h1>
    <a href="{{ route('recetas.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('recetas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Turno</label>
            <select name="turno_id" class="form-control">
                @foreach($turnos as $turno)
                    <option value="{{ $turno->id }}">{{ $turno->codigo }} - {{ $turno->paciente->nombres }} {{ $turno->paciente->apellidos }}</option>
                @endforeach
            </select>
        </div>

        <h5>Medicamentos</h5>
        <div id="medicamentos-container">
            <div class="row mb-2 medicamento-row">
                <div class="col-md-4">
                    <select name="medicamentos[]" class="form-control">
                        @foreach($medicamentos as $medicamento)
                            <option value="{{ $medicamento->id }}">{{ $medicamento->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="number" name="cantidad[]" class="form-control" placeholder="Cantidad" min="1">
                </div>
                <div class="col-md-4">
                    <input type="text" name="indicaciones[]" class="form-control" placeholder="Indicaciones">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm remove-row">Quitar</button>
                </div>
            </div>
        </div>

        <button type="button" id="add-medicamento" class="btn btn-secondary mb-3">+ Agregar Medicamento</button>
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <script>
        const container = document.getElementById('medicamentos-container');
        const template = container.querySelector('.medicamento-row').cloneNode(true);

        document.getElementById('add-medicamento').addEventListener('click', () => {
            const newRow = template.cloneNode(true);
            newRow.querySelectorAll('input').forEach(i => i.value = '');
            container.appendChild(newRow);
        });

        container.addEventListener('click', e => {
            if (e.target.classList.contains('remove-row')) {
                if (container.querySelectorAll('.medicamento-row').length > 1) {
                    e.target.closest('.medicamento-row').remove();
                }
            }
        });
    </script>
</body>
</html>