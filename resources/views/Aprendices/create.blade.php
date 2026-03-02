<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registrar aprendices</title>
</head>
<body>
<h1 style="color: #718096">Registrar aprendices</h1>

<!--Alerta de registro exitoso-->
@if(session('success'))
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{session('success')}}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

<form method="POST" action="{{route('aprendices.store')}}"
class="d-inline" id="frmRegAprendiz">

 @csrf

    <div class="card-body">
        <div class="form-group row">

            <select name="tbltiposdocumentos_NIS" class="form-control">
                @foreach($tiposDocumentos as $tipo)
                    <option value="{{ $tipo->NIS }}">
                        {{ $tipo->Denominacion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="NumDoc">Número de documento</label>
            <input type="number" class="form-control" name="NumDoc" id="NumDoc" placeholder="No. Documento" value="{{old('NumDoc')}}">

            @error('NumDoc')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="Nombres">Nombres del aprendiz</label>
            <input type="text" class="form-control" name="Nombres" id="Nombres" placeholder="Nombres" value="{{old('Nombres')}}">

            @error('Nombres')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="Apellidos">Apellidos del aprendiz</label>
            <input type="text" class="form-control" name="Apellidos" id="Apellidos" placeholder="Apellidos" value="{{old('Apellidos')}}">

            @error('Apellidos')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="Direccion">Dirección</label>
            <input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Direccion" value="{{old('Direccion')}}">

            @error('Direccion')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="Telefono">Teléfono</label>
            <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="Telefono" value="{{old('Telefono')}}">

            @error('Telefono')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="CorreoInstitucional">Correo institucional</label>
            <input type="email" class="form-control" name="CorreoInstitucional" id="CorreoInstitucional" placeholder="Correo institucional">

            @error('CorreoInstitucional')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="CorreoPersonal">Correo personal</label>
            <input type="email" class="form-control" name="CorreoPersonal" id="CorreoPersonal" placeholder="Correo personal">

            @error('CorreoPersonal')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="Sexo">Sexo</label>
            <select name="Sexo" id="Sexo" class="form-control" style="">
                <option selected="selected" value="1">Masculino</option>
                <option value="2">Femenino</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="FechaNac">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="FechaNac" id="FechaNac" placeholder="Fecha de nacimiento">
        </div>

        <div>
            <label for="tbleps_NIS">EPS</label>
            <select name="tbleps_NIS" class="form-control">
                @foreach($eps as $e)
                    <option value="{{ $e->NIS }}">
                        {{ $e->Denominacion }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
</form>

<div class="mb-3">
    <a href="{{ route('home') }}" class="btn btn-secondary">
        ⬅ Volver al Inicio
    </a>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
