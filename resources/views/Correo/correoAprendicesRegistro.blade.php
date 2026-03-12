<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>

<h2>Bienvenido {{ $aprendiz->Nombres }}</h2>

<p>
    Usted ha sido registrado en la plataforma de seguimiento.
</p>

<p>
    Para completar su registro debe crear su contraseña en el siguiente enlace:
</p>

<a href="{{ url('registro/'.$token) }}">
    Crear mi cuenta
</a>

<p>
    Este enlace le permitirá activar su cuenta en la plataforma.
</p>

</body>
</html>
