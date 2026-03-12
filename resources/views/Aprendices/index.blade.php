@extends('layouts.diseñoVistas')

@section('title','Aprendices')

@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Aprendices</h3>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-light">
                    <tr>
                        <th class="text-center">Tipo de documento</th>
                        <th class="text-center">Número de documento</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Dirección</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Correo institucional</th>
                        <th class="text-center">Correo personal</th>
                        <th class="text-center">Sexo</th>
                        <th class="text-center">Fecha de nacimiento</th>
                        <th class="text-center">EPS</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse($aprendices as $aprendiz)

                        <tr>

                            <td>{{$aprendiz->tiposdocumentos->Denominacion ?? 'No tiene'}}</td>

                            <td>{{$aprendiz->NumDoc}}</td>

                            <td>{{$aprendiz->Nombres}}</td>

                            <td>{{$aprendiz->Apellidos}}</td>

                            <td>{{$aprendiz->Direccion}}</td>

                            <td>{{$aprendiz->Telefono}}</td>

                            <td>{{$aprendiz->CorreoInstitucional}}</td>

                            <td>{{$aprendiz->CorreoPersonal}}</td>

                            <td>{{$aprendiz->sexo_texto}}</td>

                            <td>{{$aprendiz->FechaNac}}</td>

                            <td>{{$aprendiz->eps->Denominacion ?? 'Sin EPS'}}</td>

                            <td class="text-center">

                                <a href="{{ route('aprendices.show', $aprendiz->NIS) }}"
                                   class="btn btn-primary btn-sm">
                                    Ver
                                </a>

                                <a href="{{ route('aprendices.edit', $aprendiz->NIS) }}"
                                   class="btn btn-warning btn-sm">
                                    Actualizar
                                </a>

                                <form action="{{ route('aprendices.destroy', $aprendiz->NIS) }}"
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
                                No hay aprendices registrados
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                <a href="{{ route('aprendices.create') }}"
                   class="btn btn-success">
                    Registrar aprendiz
                </a>

                <a href="{{ route('home') }}"
                   class="btn btn-secondary">
                    Volver al inicio
                </a>

            </div>

        </div>
    </div>

@endsection
