<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Consultar bitácoras</title>
</head>
<body>

<div class="container mt-4">

    <h3>Estado de Bitácoras</h3>

    <table class="table">
        <thead>
        <tr>
            <th>NIS</th>
            <th>Archivo</th>
            <th>Fecha subida</th>
            <th>Estado</th>
        </tr>
        </thead>

        <tbody>

        @foreach($bitacoras as $bitacora)

            <tr>
                <td>{{ $bitacora->NIS }}</td>

                <td>
                    <a href="{{ asset('uploads/aprendices/'.$bitacora->Archivo) }}" target="_blank">
                        {{ $bitacora->Archivo }}
                    </a>
                </td>
                <td>{{ $bitacora->created_at }}</td>

                <td>{{ $bitacora->Estado }}</td>
            </tr>

        @endforeach

        </tbody>
    </table>

</div>
</body>
</html>
