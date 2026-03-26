<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear contraseña</title>
</head>
<body>

<form method="POST" action="/correo_crear_contrasena_auxiliar/{{ $token }}">
    @csrf

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <label>Contraseña</label>
    <input type="password" name="Contrasena" required>

    <label>Confirmar contraseña</label>
    <input type="password" name="Contrasena_confirmation" required>

    <button type="submit">Guardar</button>
</form>

</body>
</html>
