<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-4 offset-md-4">

        <div class="card shadow">
            <div class="card-header text-center bg-primary text-white">
                Registrar Usuario
            </div>

            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('usuarios.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="number" name="NIS"
                               class="form-control"
                               value="{{ old('NIS') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo Institucional</label>
                        <input type="email" name="CorreoInstitucional"
                               class="form-control"
                               value="{{ old('CorreoInstitucional') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation"
                               class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        Registrar
                    </button>

                </form>

            </div>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
        </div>

    </div>
</div>

</body>
</html>
