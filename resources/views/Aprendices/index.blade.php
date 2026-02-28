<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Aprendices</title>
</head>
<body>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<h1 style="text-align: center;">Consultar aprendices</h1>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style="text-align: center;" scope="col">Tipo de documento</th>
        <th style="text-align: center;" scope="col">Número de documento</th>
        <th style="text-align: center;" scope="col">Nombres</th>
        <th style="text-align: center;" scope="col">Apellidos</th>
        <th style="text-align: center;" scope="col">Dirección</th>
        <th style="text-align: center;" scope="col">Teléfono</th>
        <th style="text-align: center;" scope="col">Correo institucional</th>
        <th style="text-align: center;" scope="col">Correo personal</th>
        <th style="text-align: center;" scope="col">Sexo</th>
        <th style="text-align: center;" scope="col">Fecha de nacimiento</th>
        <th style="text-align: center;" scope="col">EPS</th>
    </tr>
    </thead>
    <tbody>

    @foreach($aprendices as $aprendices)
        <tr>
            <td>{{$aprendices->tiposdocumentos->Denominacion ?? 'No tiene'}}</td>
            <td>{{$aprendices->NumDoc}}</td>
            <td>{{$aprendices->Nombres}}</td>
            <td>{{$aprendices->Apellidos}}</td>
            <td>{{$aprendices->Direccion}}</td>
            <td>{{$aprendices->Telefono}}</td>
            <td>{{$aprendices->CorreoInstitucional}}</td>
            <td>{{$aprendices->CorreoPersonal}}</td>
            <td>{{$aprendices->sexo_texto}}</td>
            <td>{{$aprendices->FechaNac}}</td>
            <td>{{$aprendices->eps->Denominacion ?? 'Sin EPS'}}</td>

            <td class="text-center">

                <a href="{{ route('aprendices.show', $aprendices->NIS) }}"
                   class="btn btn-info btn-sm">Ver</a>

                <a href="{{ route('aprendices.edit', $aprendices->NIS) }}"
                   class="btn btn-info btn-sm">Actualizar</a>

                <form action="{{ route('aprendices.destroy', $aprendices->NIS) }}"
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
    <a href="{{ route('aprendices.create') }}"
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
