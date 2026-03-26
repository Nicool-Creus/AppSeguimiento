@extends('layouts.diseñoVistas')

@section('title','Instructores')

@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Instructores</h3>

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
                        <th class="text-center">Rol adminstrativo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse($instructores as $instructor)

                        <tr>

                            <td>{{$instructor->tiposdocumentos->Denominacion ?? 'No tiene'}}</td>

                            <td>{{$instructor->NumDoc}}</td>

                            <td>{{$instructor->Nombres}}</td>

                            <td>{{$instructor->Apellidos}}</td>

                            <td>{{$instructor->Direccion}}</td>

                            <td>{{$instructor->Telefono}}</td>

                            <td>{{$instructor->CorreoInstitucional}}</td>

                            <td>{{$instructor->CorreoPersonal}}</td>

                            <td>{{$instructor->sexo_texto}}</td>

                            <td>{{$instructor->FechaNac}}</td>

                            <td>{{$instructor->eps->Denominacion ?? 'Sin EPS'}}</td>

                            <td>{{$instructor->rolesadministrativos->Descripcion ?? 'Sin rol'}}</td>

                            <td class="text-center">

                                <a href="{{ route('instructores.show', $instructor->NIS) }}"
                                   class="btn btn-primary btn-sm">
                                    Ver
                                </a>

                                <a href="{{ route('instructores.edit', $instructor->NIS) }}"
                                   class="btn btn-warning btn-sm">
                                    Actualizar
                                </a>

                                <form action="{{ route('instructores.destroy', $instructor->NIS) }}"
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
                                No hay instructores registrados
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                <a href="{{ route('instructores.create') }}"
                   class="btn btn-success">
                    Registrar instructor
                </a>

                <a href="{{ route('home') }}"
                   class="btn btn-secondary">
                    Volver al inicio
                </a>

            </div>

        </div>
    </div>

@endsection
