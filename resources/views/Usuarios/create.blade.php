<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Auxiliar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Registrar Auxiliar</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Correo institucional</label>
            <input type="email"
                   name="CorreoInstitucional"
                   class="form-control"
                   placeholder="auxiliar@institucion.edu"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">
            Crear auxiliar
        </button>

    </form>

</div>

</body>
</html>
