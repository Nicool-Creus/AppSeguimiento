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

<form method="POST" action="/crear_contrasena_auxiliar">
    @csrf

    <input type="hidden" name="TokenContrasena" value="{{ $token }}">

    <label>Contraseña</label>
    <input type="password" name="Contrasena" required>

    <label>Confirmar contraseña</label>
    <input type="password" name="Contrasena_confirmation" required>

    <button type="submit">Guardar</button>
</form>

</body>
</html>
