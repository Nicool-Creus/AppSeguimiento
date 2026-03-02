<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Actualizar ente coformador</title>
</head>
<body class="container mt-4">

<h1 class="text-center mb-4">Actualizar ente coformador</h1>

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

<form action="{{ route('enteCoformador.update', $enteCoformador->NIS) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-md-6 mb-3">
            <label>Tipo de documento</label>

            <select name="tbltiposdocumentos_NIS" class="form-control">
                @foreach($tiposDocumentos as $tipo)
                    <option value="{{ $tipo->NIS }}">
                        {{ $tipo->Denominacion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Número de documento</label>
            <input type="number" name="NumDoc"
                   value="{{ old('NumDoc', $enteCoformador->NumDoc) }}"
                   class="form-control @error('NumDoc') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Razón social</label>
            <input type="text" name="RazonSocial"
                   value="{{ old('RazonSocial', $enteCoformador->RazonSocial) }}"
                   class="form-control @error('RazonSocial') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Dirección</label>
            <input type="text" name="Direccion"
                   value="{{ old('Direccion', $enteCoformador->Direccion) }}"
                   class="form-control @error('Direccion') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Teléfono</label>
            <input type="text" name="Telefono"
                   value="{{ old('Telefono', $enteCoformador->Telefono) }}"
                   class="form-control @error('Telefono') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Correo institucional</label>
            <input type="email" name="CorreoInstitucional"
                   value="{{ old('CorreoInstitucional', $enteCoformador->CorreoInstitucional) }}"
                   class="form-control @error('CorreoInstitucional') is-invalid @enderror">
        </div>

    </div>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('enteCoformador.index') }}" class="btn btn-secondary">Volver</a>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
