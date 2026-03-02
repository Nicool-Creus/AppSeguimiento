<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ver datos del aprendiz</title>
</head>
<body>

@section('content')

    <div class="container">
        <h2>Detalle del Aprendiz</h2>

        <div class="card">
            <div class="card-body">

                <p><strong>Tipo Documento:</strong>{{ $aprendiz->tiposdocumentos->Denominacion ?? 'No asignado' }}</p>
                <p><strong>Número Documento:</strong> {{ $aprendiz->NumDoc }}</p>
                <p><strong>Nombres:</strong> {{ $aprendiz->Nombres }}</p>
                <p><strong>Apellidos:</strong> {{ $aprendiz->Apellidos }}</p>
                <p><strong>Dirección:</strong> {{ $aprendiz->Direccion }}</p>
                <p><strong>Teléfono:</strong> {{ $aprendiz->Telefono }}</p>
                <p><strong>Correo Institucional:</strong> {{ $aprendiz->CorreoInstitucional }}</p>
                <p><strong>Correo Personal:</strong> {{ $aprendiz->CorreoPersonal }}</p>
                <p><strong>Sexo:</strong> {{ $aprendiz->sexo_texto }}</p>
                <p><strong>Fecha Nacimiento:</strong> {{ $aprendiz->FechaNac }}</p>
                <p><strong>EPS:</strong>{{ $aprendiz->eps->Denominacion ?? 'No asignada' }}</p>

            </div>
        </div>

        <br>

        <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
            Volver
        </a>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
