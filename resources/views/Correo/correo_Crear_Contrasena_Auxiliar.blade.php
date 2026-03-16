<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h2>Bienvenido</h2>

<p>Tu cuenta ha sido creada como auxiliar.</p>

<p>Haz clic en el siguiente enlace para crear tu contraseña:</p>

<a href="{{ url('/crear_contrasena_auxiliar/'.$token) }}">
    Crear contraseña
</a>

</body>
</html>
