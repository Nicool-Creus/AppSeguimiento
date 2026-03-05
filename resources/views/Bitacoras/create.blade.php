<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir bitácora</title>
</head>
<body>

<form method="POST" action="{{ route('bitacoras.store') }}" enctype="multipart/form-data">
    @csrf
    <td>
        <div class="form-group">
            <label for="Archivo">Bitácora</label>
            <div class="input-group">
                <input type="file" name="Archivo" id="Archivo">
            </div>
        </div>
    </td>



    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

</body>
</html>
