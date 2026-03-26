@extends('layouts.diseñoVistas')

@section('title','Actualizar regional')

@section('content')

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Actualizar regional</h3>

            <!-- MENSAJE ERROR GENERAL -->
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- ERRORES DE VALIDACIÓN -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('regionales.update', $regionales->NIS) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Código</label>
                        <input type="number" name="Codigo"
                               value="{{ old('Codigo', $regionales->Codigo) }}"
                               class="form-control @error('Codigo') is-invalid @enderror">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Denominación</label>
                        <input type="text" name="Denominacion"
                               value="{{ old('Denominacion', $regionales->Denominacion) }}"
                               class="form-control @error('Denominacion') is-invalid @enderror">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Observaciones</label>
                        <input type="text" name="Observaciones"
                               value="{{ old('Observaciones', $regionales->Observaciones) }}"
                               class="form-control">
                    </div>

                </div>

                <div class="mt-3">

                    <button type="submit" class="btn btn-warning">
                        Actualizar regional
                    </button>

                    <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
                        Volver
                    </a>

                </div>
            </form>

        </div>

    </div>

@endsection
