<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Consultar datos del instructor</title>
</head>
<body>

@section('content')

    <div class="container">
        <h2>Detalle del instructor</h2>

        <div class="card">
            <div class="card-body">

                <p><strong>NIS:</strong> {{ $insructores->NIS }}</p>

                <p><strong>Tipo Documento:</strong>
                    {{ $insructores->tipoDocumento->Denominacion ?? 'No asignado' }}
                </p>

                <p><strong>Rol administrativo:</strong>
                    {{ $insructores->rolAdministrativo->Descripcion ?? 'No asignada' }}
                </p>

                <p><strong>Tipo Doc:</strong> {{ $insructores->TipoDoc }}</p>
                <p><strong>Número Documento:</strong> {{ $insructores->NumDoc }}</p>
                <p><strong>Nombres:</strong> {{ $insructores->Nombres }}</p>
                <p><strong>Apellidos:</strong> {{ $insructores->Apellidos }}</p>
                <p><strong>Dirección:</strong> {{ $insructores->Direccion }}</p>
                <p><strong>Teléfono:</strong> {{ $insructores->Telefono }}</p>
                <p><strong>Correo Institucional:</strong> {{ $insructores->CorreoInstitucional }}</p>
                <p><strong>Correo Personal:</strong> {{ $insructores->CorreoPersonal }}</p>
                <p><strong>Sexo:</strong> {{ $insructores->Sexo }}</p>
                <p><strong>Fecha Nacimiento:</strong> {{ $insructores->FechaNac }}</p>

            </div>
        </div>

        <br>

        <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
            Volver
        </a>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
