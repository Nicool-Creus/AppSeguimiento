<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Actualizar centro de formación</title>
</head>
<body class="container mt-4">

<h1 class="text-center mb-4">Actualizar centro de formación</h1>

<!--MENSAJE ERROR GENERAL-->
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!--ERRORES DE VALIDACIÓN-->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('centrosFormacion.update', $centrosDeFormacion->NIS) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-md-6 mb-3">
            <label>Código</label>
            <input type="number" name="Codigo"
                   value="{{ old('Codigo', $centrosDeFormacion->Codigo) }}"
                   class="form-control @error('Codigo') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Denominación</label>
            <input type="text" name="Denominacion"
                   value="{{ old('Denominacion', $centrosDeFormacion->Denominacion) }}"
                   class="form-control @error('Denominacion') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Dirección</label>
            <input type="text" name="Direccion"
                   value="{{ old('Direccion', $centrosDeFormacion->Direccion) }}"
                   class="form-control @error('Direccion') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Observaciones</label>
            <input type="text" name="Observaciones"
                   value="{{ old('Observaciones', $programas->Observaciones) }}">
        </div>

        <select name="tblregionales_NIS" class="form-control">
            @foreach($regionales as $regional)
                <option value="{{ $regional->NIS }}">
                    {{ $regional->Denominación }}
                </option>
            @endforeach
        </select>

    </div>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('centrosFormacion.index') }}" class="btn btn-secondary">Volver</a>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
