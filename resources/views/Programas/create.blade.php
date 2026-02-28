<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registrar programas</title>
</head>
<body>
<h1 style="color: #718096">Registrar programas</h1>

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

<form method="POST" action="{{route('programas.store')}}"
      class="d-inline" id="frmRegProgramas">

    @csrf

    <div class="card-body">
        <div class="form-group col-md-3">
            <label for="Codigo">Código</label>
            <input type="number" class="form-control" name="Codigo" id="Codigo" placeholder="Codigo" value="{{old('Codigo')}}">

            @error('Codigo')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="Denominacion">Denominación</label>
            <input type="text" class="form-control" name="Denominacion" id="Denominacion" placeholder="Denominacion" value="{{old('Denominacion')}}">

            @error('Denominacion')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="Observaciones">Observaciones</label>
            <input type="text" class="form-control" name="Observaciones" id="Observaciones" placeholder="Observaciones" value="{{old('Observaciones')}}">
        </div>
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>

    <div class="text-right mt-3">
        <a href="{{ route('programas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
