@extends('layouts.diseñoVistas')

@section('title','Detalle del aprendiz')

@section('content')

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Detalle del aprendiz</h3>

            <div class="row">

                <div class="col-md-6 mb-2">
                    <strong>Tipo Documento:</strong>
                    {{ $aprendiz->tiposdocumentos->Denominacion ?? 'No asignado' }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Número Documento:</strong>
                    {{ $aprendiz->NumDoc }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Nombres:</strong>
                    {{ $aprendiz->Nombres }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Apellidos:</strong>
                    {{ $aprendiz->Apellidos }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Dirección:</strong>
                    {{ $aprendiz->Direccion }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Teléfono:</strong>
                    {{ $aprendiz->Telefono }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Correo Institucional:</strong>
                    {{ $aprendiz->CorreoInstitucional }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Correo Personal:</strong>
                    {{ $aprendiz->CorreoPersonal }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Sexo:</strong>
                    {{ $aprendiz->sexo_texto }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Fecha Nacimiento:</strong>
                    {{ $aprendiz->FechaNac }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>EPS:</strong>
                    {{ $aprendiz->eps->Denominacion ?? 'No asignada' }}
                </div>

            </div>

            <div class="mt-4">

                <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                    Volver
                </a>

                <a href="{{ route('aprendices.edit',$aprendiz->NIS) }}" class="btn btn-warning">
                    Editar
                </a>

            </div>

        </div>
    </div>

@endsection
