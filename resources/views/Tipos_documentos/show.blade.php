<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Consultar datos del tipo de documento</title>
</head>
<body>

@section('content')

    <div class="container">
        <h2>Detalle del tipo de documento</h2>

        <div class="card">
            <div class="card-body">

                <p><strong>NIS:</strong> {{ $tiposDocumentos->NIS }}</p>

                <p><strong>Denominación:</strong> {{ $tiposDocumentos->Denominacion }}</p>
                <p><strong>Observaciones:</strong> {{ $tiposDocumentos->Observaciones }}</p>

            </div>
        </div>

        <br>

        <a href="{{ route('tiposDocumentos.index') }}" class="btn btn-secondary">
            Volver
        </a>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
