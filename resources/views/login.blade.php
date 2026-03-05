<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-4 offset-md-4">

        <div class="card">
            <div class="card-header text-center">Iniciar Sesión</div>

            <div class="card-body">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Correo Institucional</label>
                        <input type="email" name="CorreoInstitucional" class="form-control" value="{{ old('CorreoInstitucional') }}" required>
                    </div>
                    @error('CorreoInstitucional')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror

                    <div>
                        <a href="{{route('usuarios.create')}}" style="display: block; text-align: center;">Registrar usuario</a>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

</body>
</html>
