<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>INDEX</title>
</head>
<body>
<h1 style="text-align: center;">Regionales</h1>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style="text-align: center;" scope="col">Código</th>
        <th style="text-align: center;" scope="col">Denominación</th>
        <th style="text-align: center;" scope="col">Observaciones</th>
    </tr>
    </thead>
    <tbody>

    @foreach($regionales as $regionales)
        <tr>
            <th >{{$regionales->Codigo}}</th>
            <td>{{$regionales->Denominacion}}</td>
            <td>{{$regionales->Observaciones}}</td>
        </tr>
    @endforeach

    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
