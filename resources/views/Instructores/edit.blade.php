<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Actualizar Instructor</title>
</head>
<body class="container mt-4">

<h1 class="text-center mb-4">Actualizar Instructor</h1>

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

<form action="{{ route('instructores.update', $instructor->NIS) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-md-6 mb-3">
            <label>Tipo de documento</label>

            <select name="TipoDoc" class="form-select @error('TipoDoc') is-invalid @enderror">
                <option value="">Seleccione</option>
                <option value="1" {{ old('TipoDoc', $instructor->TipoDoc) == 1 ? 'selected' : '' }}>Cédula de ciudadanía</option>
                <option value="2" {{ old('TipoDoc', $instructor->TipoDoc) == 2 ? 'selected' : '' }}>Documento de identidad</option>
            </select>

            @error('TipoDoc')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>Número de documento</label>
            <input type="number" name="NumDoc"
                   value="{{ old('NumDoc', $instructor->NumDoc) }}"
                   class="form-control @error('NumDoc') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Nombres</label>
            <input type="text" name="Nombres"
                   value="{{ old('Nombres', $instructor->Nombres) }}"
                   class="form-control @error('Nombres') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Apellidos</label>
            <input type="text" name="Apellidos"
                   value="{{ old('Apellidos', $instructor->Apellidos) }}"
                   class="form-control @error('Apellidos') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Dirección</label>
            <input type="text" name="Direccion"
                   value="{{ old('Direccion', $instructor->Direccion) }}"
                   class="form-control @error('Direccion') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Teléfono</label>
            <input type="text" name="Telefono"
                   value="{{ old('Telefono', $instructor->Telefono) }}"
                   class="form-control @error('Telefono') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Correo institucional</label>
            <input type="email" name="CorreoInstitucional"
                   value="{{ old('CorreoInstitucional', $instructor->CorreoInstitucional) }}"
                   class="form-control @error('CorreoInstitucional') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Correo personal</label>
            <input type="email" name="CorreoPersonal"
                   value="{{ old('CorreoPersonal', $instructor->CorreoPersonal) }}"
                   class="form-control @error('CorreoPersonal') is-invalid @enderror">
        </div>

        <div class="col-md-6 mb-3">
            <label>Sexo</label>
            <select name="Sexo" class="form-control @error('Sexo') is-invalid @enderror">
                <option value="">Seleccione</option>
                <option value="1" {{ old('Sexo', $instructor->Sexo) == 1 ? 'selected' : '' }}>Masculino</option>
                <option value="2" {{ old('Sexo', $instructor->Sexo) == 2 ? 'selected' : '' }}>Femenino</option>
            </select>

            @error('Sexo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>Fecha de nacimiento</label>
            <input type="date" name="FechaNac"
                   value="{{ old('FechaNac', $instructor->FechaNac) }}"
                   class="form-control @error('FechaNac') is-invalid @enderror">
        </div>

        <select name="tbleps_NIS" class="form-control">
            @foreach($eps as $e)
                <option value="{{ $e->NIS }}">
                    {{ $e->Denominacion }}
                </option>
            @endforeach
        </select>

        <select name="tblrolesadministrativos_NIS" class="form-control">
            @foreach($rolesAdministrativos as $rol)
                <option value="{{ $rol->NIS }}">
                    {{ $rol->Descripcion }}
                </option>
            @endforeach
        </select>

        <select name="tbltiposdocumentos_NIS" class="form-control">
            @foreach($tiposDocumentos as $tipo)
                <option value="{{ $tipo->NIS }}">
                    {{ $tipo->Denominacion }}
                </option>
            @endforeach
        </select>

    </div>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('instructores.index') }}" class="btn btn-secondary">Volver</a>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
