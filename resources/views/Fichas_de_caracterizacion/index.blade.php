<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Fichas de caracterización</title>
</head>
<body>
<h1 style="text-align: center;">Fichas de caracterización</h1>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style="text-align: center;" scope="col">Código</th>
        <th style="text-align: center;" scope="col">Denominación</th>
        <th style="text-align: center;" scope="col">Cupo</th>
        <th style="text-align: center;" scope="col">Fecha de inicio</th>
        <th style="text-align: center;" scope="col">Fecha de finalización</th>
        <th style="text-align: center;" scope="col">Observaciones</th>
    </tr>
    </thead>
    <tbody>

    @foreach($fichasDeCaracterizacion as $fichasDeCaracterizacion)
        <tr>
            <td>{{$fichasDeCaracterizacion->Codigo}}</td>
            <td>{{$fichasDeCaracterizacion->Denominacion}}</td>
            <td>{{$fichasDeCaracterizacion->Cupo}}</td>
            <td>{{$fichasDeCaracterizacion->FechaInicio}}</td>
            <td>{{$fichasDeCaracterizacion->FechaFin}}</td>
            <td>{{$fichasDeCaracterizacion->Observaciones}}</td>
        </tr>
    @endforeach

    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
