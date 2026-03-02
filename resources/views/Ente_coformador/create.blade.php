<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registrar Ente coformador</title>
</head>
<body>
<h1 style="color: #718096">Registrar ente coformador</h1>

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

<form method="POST" action="{{route('enteCoformador.store')}}"
      class="d-inline" id="frmRegEnteCoformador">

    @csrf

    <div class="card-body">
        <div class="form-group row">

            <div class="form-group col-md-3">
                <label for="tbltiposdocumentos_NIS">Tipo de documento</label>
                <select name="tbltiposdocumentos_NIS" class="form-control">
                    @foreach($tiposDocumentos as $tipo)
                        <option value="{{ $tipo->NIS }}">
                            {{ $tipo->Denominacion }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-md-3">
            <label for="NumDoc">Número de documento</label>
            <input type="number" class="form-control" name="NumDoc" id="NumDoc" placeholder="No. Documento" value="{{old('NumDoc')}}">

            @error('NumDoc')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="RazonSocial">Razón social</label>
            <input type="text" class="form-control" name="RazonSocial" id="RazonSocial" placeholder="RazonSocial" value="{{old('RazonSocial')}}">

            @error('RazonSocial')
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
