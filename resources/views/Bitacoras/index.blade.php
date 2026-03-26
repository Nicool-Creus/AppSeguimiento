@extends('layouts.diseñoVistas')

@section('title','Bitácoras')

@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Bitácoras</h3>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-light">
                    <tr>
                        <th class="text-center">Archivo</th>
                        <th class="text-center">Fecha de creación</th>
                        <th class="text-center">Estado</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse($bitacoras as $bitacora)

                        <tr>

                            <td>
                                <a href="{{ asset('uploads/aprendices/'.$bitacora->Archivo) }}" target="_blank">
                                    {{ $bitacora->Archivo }}
                                </a>
                            </td>

                            <td class="text-center">{{$bitacora->created_at }}</td>

                            <td class="text-center">{{$bitacora->Estado}}</td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="12" class="text-center">
                                No hay bitácoras registradas
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                <a href="{{ route('home') }}"
                   class="btn btn-secondary">
                    Volver al inicio
                </a>

            </div>

        </div>
    </div>

@endsection
