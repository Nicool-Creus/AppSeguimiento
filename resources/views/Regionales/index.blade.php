@extends('layouts.diseñoVistas')

@section('title','Regionales')

@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Regionales</h3>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-light">
                    <tr>
                        <th class="text-center">Código</th>
                        <th class="text-center">Denominación</th>
                        <th class="text-center">Observaciones</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse($regionales as $regional)

                        <tr>

                            <td>{{$regional->Codigo}}</td>

                            <td>{{$regional->Denominacion}}</td>

                            <td>{{$regional->Observaciones}}</td>

                            <td class="text-center">

                                <a href="{{ route('regionales.show', $regional->NIS) }}"
                                   class="btn btn-primary btn-sm">
                                    Ver
                                </a>

                                <a href="{{ route('regionales.edit', $regional->NIS) }}"
                                   class="btn btn-warning btn-sm">
                                    Actualizar
                                </a>

                                <form action="{{ route('regionales.destroy', $regional->NIS) }}"
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Está seguro de eliminar este registro?')">

                                        Eliminar

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="12" class="text-center">
                                No hay regionales registradas
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                <a href="{{ route('regionales.create') }}"
                   class="btn btn-success">
                    Registrar regional
                </a>

                <a href="{{ route('home') }}"
                   class="btn btn-secondary">
                    Volver al inicio
                </a>

            </div>

        </div>
    </div>

@endsection
