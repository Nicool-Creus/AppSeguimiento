<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <title>@yield('title','Sistema')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        body{
            background:#f1f3f5;
        }

        /* SIDEBAR */

        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            background:#38b000;
            color:white;
        }

        .sidebar h4{
            padding:20px;
            font-weight:bold;
        }

        .sidebar a{
            display:block;
            padding:12px 20px;
            color:white;
            text-decoration:none;
        }

        .sidebar a:hover{
            background:#2d9200;
        }

        /* NAVBAR */

        .topbar{
            height:60px;
            background:#e9ecef;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 20px;
            margin-left:250px;
        }

        /* CONTENT */

        .content{
            margin-left:250px;
            padding:30px;
        }

        /* CARD */

        .card-dashboard{
            background:white;
            border:none;
            padding:30px;
            border-radius:10px;
        }

    </style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <h4>SENA</h4>

    <a href="{{ route('programas.index') }}">
        <i class="bi bi-journal"></i> Programas
    </a>

    <a href="{{ route('regionales.index') }}">
        <i class="bi bi-map"></i> Regionales
    </a>

    <a href="{{ route('tiposDocumentos.index') }}">
        <i class="bi bi-card-text"></i> Tipos Documento
    </a>

    <a href="{{ route('rolesAdministrativos.index') }}">
        <i class="bi bi-person-badge"></i> Roles
    </a>

    <a href="{{ route('eps.index') }}">
        <i class="bi bi-hospital"></i> EPS
    </a>

    <a href="{{ route('aprendices.index') }}">
        <i class="bi bi-mortarboard"></i> Aprendices
    </a>

    <a href="{{ route('instructores.index') }}">
        <i class="bi bi-person-video3"></i> Instructores
    </a>

    <a href="{{ route('enteCoformador.index') }}">
        <i class="bi bi-buildings"></i> Ente Coformador
    </a>

    <a href="{{ route('centroFormacion.index') }}">
        <i class="bi bi-house"></i> Centro Formación
    </a>

    <a href="{{ route('fichasCaracterizacion.index') }}">
        <i class="bi bi-folder"></i> Fichas
    </a>

    <a href="{{ route('bitacoras.create') }}">
        <i class="bi bi-upload"></i> Subir Bitácora
    </a>

    <a href="{{ route('bitacoras.index') }}">
        <i class="bi bi-file-earmark-text"></i> Estado Bitácoras
    </a>

    <a href="{{ route('usuarios.create') }}">
        <i class="bi bi-file-earmark-text"></i> Crear usuario
    </a>

    <a href="{{ route('usuarios.create') }}">
        <i class="bi bi-file-earmark-text"></i> Crear auxiliar
    </a>

</div>


<!-- NAVBAR -->

<div class="topbar">

    <button class="btn btn-light">
        <i class="bi bi-list"></i>
    </button>

    <div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger btn-sm">Cerrar sesión
                <i class="bi bi-box-arrow-right"></i>
            </button>
        </form>

    </div>

</div>


<!-- CONTENT -->

<div class="content">

    @yield('content')

</div>


</body>
</html>
