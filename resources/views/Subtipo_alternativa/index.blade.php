@extends('layouts.diseñoVistas')

@section('title','Subtipos de alternativas para la etapa productiva')

@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Subtipos de alternativas</h3>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-light">
                    <tr>
                        <th class="text-center">Subtipos de alternativas</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse($subtipoAlternativa as $subtipo)

                        <tr>

                            <td>{{$subtipo->SubtipoAlternativa}}</td>

                            <td class="text-center">

                                <form action="{{ route('subtipoAlternativa.destroy', $subtipo->NIS) }}"
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
                                No hay subtipos registrados
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                <a href="{{ route('subtipoAlternativa.create') }}"
                   class="btn btn-success">
                    Registrar subtipo
                </a>

                <a href="{{ route('home') }}"
                   class="btn btn-secondary">
                    Volver al inicio
                </a>

            </div>

        </div>
    </div>

@endsection
