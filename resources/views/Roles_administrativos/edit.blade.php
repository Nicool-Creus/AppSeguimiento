<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Actualizar rol administrativo</title>
</head>
<body class="container mt-4">

<h1 class="text-center mb-4">Actualizar rol administrativo</h1>

{{-- MENSAJE ERROR GENERAL --}}
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

{{-- ERRORES DE VALIDACIÓN --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('rolesAdministrativos.update', $rolesAdministrativos->NIS) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-md-6 mb-3">
            <label>Descripcion</label>
            <input type="text" name="Descripcion"
                   value="{{ old('Descripcion', $rolesAdministrativos->Descripcion) }}"
                   class="form-control @error('Descripcion') is-invalid @enderror">
        </div>

    </div>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('rolesAdministrativos.index') }}" class="btn btn-secondary">Volver</a>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
