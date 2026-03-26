@extends('layouts.diseñoVistas')

@section('title','Alternativas de etapa productiva')

@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Alternativas</h3>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-light">
                    <tr>
                        <th class="text-center">Tipo de alternativa</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse($alternativas as $alternativa)

                        <tr>

                            <td>{{$alternativa->TipoAlternativa}}</td>

                            <td class="text-center">

                                <form action="{{ route('alternativasEp.destroy', $alternativa->NIS) }}"
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
                                No hay alternativas registradas
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                <a href="{{ route('alternativasEp.create') }}"
                   class="btn btn-success">
                    Registrar alternativa
                </a>

                <a href="{{ route('home') }}"
                   class="btn btn-secondary">
                    Volver al inicio
                </a>

            </div>

        </div>
    </div>

@endsection
