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

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<h1 style="text-align: center;">Programas de formación</h1>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style="text-align: center;" scope="col">Código</th>
        <th style="text-align: center;" scope="col">Denominación</th>
        <th style="text-align: center;" scope="col">Observaciones</th>
    </tr>
    </thead>
    <tbody>

    @foreach($programas as $programas)
        <tr>
            <td>{{$programas->Codigo}}</td>
            <td>{{$programas->Denominacion}}</td>
            <td>{{$programas->Observaciones}}</td>

            <td class="text-center">

                <a href="{{ route('programas.show', $programas->NIS) }}"
                   class="btn btn-info btn-sm">Ver</a>

                <a href="{{ route('programas.edit', $programas->NIS) }}"
                   class="btn btn-info btn-sm">Actualizar</a>

                <form action="{{ route('programas.destroy', $programas->NIS) }}"
                      method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de querer eliminar este registro?')">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>

<div>
    <a href="{{ route('programas.create') }}"
       class="btn btn-info btn-sm">Registrar</a>
</div>

<div class="mb-3">
    <a href="{{ route('home') }}" class="btn btn-secondary">
        ⬅ Volver al Inicio
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
