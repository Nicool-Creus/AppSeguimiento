<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Centros de formación</title>
</head>
<body>
<h1 style="text-align: center;">Centros de formación</h1>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style="text-align: center;" scope="col">Código</th>
        <th style="text-align: center;" scope="col">Denominación</th>
        <th style="text-align: center;" scope="col">Dirección</th>
        <th style="text-align: center;" scope="col">Observaciones</th>
        <th style="text-align: center;" scope="col">Regional</th>
    </tr>
    </thead>
    <tbody>

    @foreach($centrosDeFormacion as $centrosDeFormacion)
        <tr>
            <td>{{$centrosDeFormacion->Codigo}}</td>
            <td>{{$centrosDeFormacion->Denominacion}}</td>
            <td>{{$centrosDeFormacion->Direccion}}</td>
            <td>{{$centrosDeFormacion->Observaciones}}</td>
            <td>{{$centrosDeFormacion->Regioanles->Denominacion ?? 'Sin regional' }}</td>

            <td class="text-center">

                <a href="{{ route('centrosFormacion.show', $centrosDeFormacion->NIS) }}"
                   class="btn btn-info btn-sm">Ver</a>

                <a href="{{ route('centrosFormacion.edit', $centrosDeFormacion->NIS) }}"
                   class="btn btn-info btn-sm">Actualizar</a>

                <form action="{{ route('centrosFormacion.destroy', $centrosDeFormacions->NIS) }}"
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
    <a href="{{ route('centrosFormacion.create') }}"
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
