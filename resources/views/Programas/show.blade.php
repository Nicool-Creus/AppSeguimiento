@extends('layouts.diseñoVistas')

@section('title','Detalle del programa')

@section('content')

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Detalle del programa</h3>

            <div class="row">

                <div class="col-md-6 mb-2">
                    <strong>Código:</strong>
                    {{ $programas->Codigo }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Denominación:</strong>
                    {{ $programas->Denominacion }}
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Observaciones:</strong>
                    {{ $programas->Observaciones }}
                </div>

            </div>

            <div class="mt-4">

                <a href="{{ route('programas.index') }}" class="btn btn-secondary">
                    Volver
                </a>

                <a href="{{ route('programas.edit',$programas->NIS) }}" class="btn btn-warning">
                    Editar
                </a>

            </div>

        </div>
    </div>

@endsection
