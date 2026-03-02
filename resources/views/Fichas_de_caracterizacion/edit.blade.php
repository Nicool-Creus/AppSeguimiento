<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Actualizar ficha</title>
</head>
<body class="container mt-4">

<h1 class="text-center mb-4">Actualizar ficha</h1>

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

<form action="{{ route('fichasCaracterizacion.update', $fichasDeCaracterizacion->NIS) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-md-6 mb-3">
            <label>Código</label>
            <input type="number" name="Codigo"
                   value="{{ old('Codigo', $fichasDeCaracterizacion->Codigo) }}"
                   class="form-control @error('Codigo') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Denominación</label>
            <input type="text" name="Denominacion"
                   value="{{ old('Denominacion', $fichasDeCaracterizacion->Denominacion) }}"
                   class="form-control @error('Denominacion') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Cupo</label>
            <input type="number" name="Cupo"
                   value="{{ old('Cupo', $fichasDeCaracterizacion->Cupo) }}"
                   class="form-control @error('Cupo') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Fecha de inicio</label>
            <input type="date" name="FechaInicio"
                   value="{{ old('FechaInicio', $fichasDeCaracterizacion->FechaInicio) }}"
                   class="form-control @error('FechaInicio') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Fecha de finalización</label>
            <input type="date" name="FechaFin"
                   value="{{ old('FechaFin', $fichasDeCaracterizacion->FechaFin) }}"
                   class="form-control @error('FechaFin') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Observaciones</label>
            <input type="text" name="Observaciones"
                   value="{{ old('Observaciones', $fichasDeCaracterizacion->Observaciones) }}">
        </div>

        <label>Aprendiz</label>
        <select name="tblaprendices_NIS" class="form-control">
            @foreach($aprendices as $aprendiz)
                <option value="{{ $aprendiz->NIS }}">
                    {{ $aprendiz->Nombres }}
                </option>
            @endforeach
        </select>

        <label>Centro de formación</label>
        <select name="tblcentrosdeformacion_NIS" class="form-control">
            @foreach($centrosDeFormacion as $centro)
                <option value="{{ $centro->NIS }}">
                    {{ $centro->Denominacion }}
                </option>
            @endforeach
        </select>

        <label>Programa de formación</label>
        <select name="tblprogramasdeformacion_NIS" class="form-control">
            @foreach($programas as $programa)
                <option value="{{ $programa->NIS }}">
                    {{ $programa->Denominacion }}
                </option>
            @endforeach
        </select>

    </div>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('fichasCaracterizacion.index') }}" class="btn btn-secondary">Volver</a>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
