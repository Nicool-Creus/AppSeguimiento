@extends('layouts.diseñoVistas')

@section('title','Detalle de la regional')

@section('content')

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Detalle de la regional</h3>

            <div class="row">

                <div class="col-md-6 mb-2">
                    <strong>Código:</strong>
                    {{ $regionales->Codigo }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Denominación:</strong>
                    {{ $regionales->Denominacion }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Observaciones:</strong>
                    {{ $regionales->Observaciones }}
                </div>

            </div>

            <div class="mt-4">

                <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
                    Volver
                </a>

                <a href="{{ route('regionales.edit',$regionales->NIS) }}" class="btn btn-warning">
                    Editar
                </a>

            </div>

        </div>
    </div>

@endsection
