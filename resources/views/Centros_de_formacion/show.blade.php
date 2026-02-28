<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ver datos del centro de formación</title>
</head>
<body>

@section('content')

    <div class="container">
        <h2>Detalle del centro</h2>

        <div class="card">
            <div class="card-body">

                <p><strong>NIS:</strong> {{ $centrosDeFormacion->NIS }}</p>

                <p><strong>Tipo Documento:</strong>
                    {{ $aprendiz->regionales->Denominacion ?? 'No asignado' }}
                </p>

                <p><strong>Código:</strong> {{ $centrosDeFormacion->Codigo }}</p>
                <p><strong>Denominación:</strong> {{ $centrosDeFormacion->Denominacion }}</p>
                <p><strong>Dirección:</strong> {{ $centrosDeFormacion->Direccion }}</p>
                <p><strong>Observaciones:</strong> {{ $centrosDeFormacion->Observaciones }}</p>

            </div>
        </div>

        <br>

        <a href="{{ route('centrosFormacion.index') }}" class="btn btn-secondary">
            Volver
        </a>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
