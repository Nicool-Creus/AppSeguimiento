<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Actualizar aprendiz</title>
</head>
<body class="container mt-4">

<h1 class="text-center mb-4">Actualizar Aprendiz</h1>

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

<form action="{{ route('aprendices.update', $aprendices->NIS) }}" method="POST">
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

            @error('TipoDoc')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>Número de documento</label>
            <input type="number" name="NumDoc"
                   value="{{ old('NumDoc', $aprendices->NumDoc) }}"
                   class="form-control @error('NumDoc') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Nombres</label>
            <input type="text" name="Nombres"
                   value="{{ old('Nombres', $aprendices->Nombres) }}"
                   class="form-control @error('Nombres') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Apellidos</label>
            <input type="text" name="Apellidos"
                   value="{{ old('Apellidos', $aprendices->Apellidos) }}"
                   class="form-control @error('Apellidos') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Dirección</label>
            <input type="text" name="Direccion"
                   value="{{ old('Direccion', $aprendices->Direccion) }}"
                   class="form-control @error('Direccion') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Teléfono</label>
            <input type="text" name="Telefono"
                   value="{{ old('Telefono', $aprendices->Telefono) }}"
                   class="form-control @error('Telefono') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Correo institucional</label>
            <input type="email" name="CorreoInstitucional"
                   value="{{ old('CorreoInstitucional', $aprendices->CorreoInstitucional) }}"
                   class="form-control @error('CorreoInstitucional') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Correo personal</label>
            <input type="email" name="CorreoPersonal"
                   value="{{ old('CorreoPersonal', $aprendices->CorreoPersonal) }}"
                   class="form-control @error('CorreoPersonal') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Sexo</label>
            <select name="Sexo" class="form-select @error('Sexo') is-invalid @enderror">
                <option value="">Seleccione</option>
                <option value="1" {{ old('Sexo', $aprendices->Sexo) == 1 ? 'selected' : '' }}>Masculino</option>
                <option value="2" {{ old('Sexo', $aprendices->Sexo) == 2 ? 'selected' : '' }}>Femenino</option>
            </select>

            @error('Sexo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>Fecha de nacimiento</label>
            <input type="date" name="FechaNac"
                   value="{{ old('FechaNac', $aprendices->FechaNac) }}"
                   class="form-control @error('FechaNac') is-invalid @enderror">
        </div>

        <select name="tbleps_NIS" class="form-control">
            @foreach($eps as $e)
                <option value="{{ $e->NIS }}" {{ $aprendices->tbleps_NIS==$e->NIS ? 'selected' : '' }}>
                    {{ $e->Denominacion }}
                </option>
            @endforeach
        </select>

    </div>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">Volver</a>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
