@extends('layouts.diseñoVistas')

@section('title','Actualizar aprendiz')

@section('content')

    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Actualizar aprendiz</h3>

            {{-- MENSAJE ERROR GENERAL --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- ERRORES DE VALIDACIÓN --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('aprendices.update', $aprendiz->NIS) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Tipo de documento</label>

                        <select name="tbltiposdocumentos_NIS" class="form-select">

                            @foreach($tiposDocumentos as $tipo)

                                <option value="{{ $tipo->NIS }}"
                                    {{ $aprendiz->tbltiposdocumentos_NIS == $tipo->NIS ? 'selected' : '' }}>

                                    {{ $tipo->Denominacion }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>Número de documento</label>

                        <input type="number"
                               name="NumDoc"
                               value="{{ old('NumDoc', $aprendiz->NumDoc) }}"
                               class="form-control @error('NumDoc') is-invalid @enderror">

                        @error('NumDoc')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>Nombres</label>

                        <input type="text"
                               name="Nombres"
                               value="{{ old('Nombres', $aprendiz->Nombres) }}"
                               class="form-control @error('Nombres') is-invalid @enderror">

                        @error('Nombres')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>Apellidos</label>

                        <input type="text"
                               name="Apellidos"
                               value="{{ old('Apellidos', $aprendiz->Apellidos) }}"
                               class="form-control @error('Apellidos') is-invalid @enderror">

                        @error('Apellidos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>Dirección</label>

                        <input type="text"
                               name="Direccion"
                               value="{{ old('Direccion', $aprendiz->Direccion) }}"
                               class="form-control @error('Direccion') is-invalid @enderror">

                        @error('Direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>Teléfono</label>

                        <input type="text"
                               name="Telefono"
                               value="{{ old('Telefono', $aprendiz->Telefono) }}"
                               class="form-control @error('Telefono') is-invalid @enderror">

                        @error('Telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>Correo institucional</label>

                        <input type="email"
                               name="CorreoInstitucional"
                               value="{{ old('CorreoInstitucional', $aprendiz->CorreoInstitucional) }}"
                               class="form-control @error('CorreoInstitucional') is-invalid @enderror">

                        @error('CorreoInstitucional')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>Correo personal</label>

                        <input type="email"
                               name="CorreoPersonal"
                               value="{{ old('CorreoPersonal', $aprendiz->CorreoPersonal) }}"
                               class="form-control @error('CorreoPersonal') is-invalid @enderror">

                        @error('CorreoPersonal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>Sexo</label>

                        <select name="Sexo" class="form-select">

                            <option value="">Seleccione</option>

                            <option value="1"
                                {{ old('Sexo', $aprendiz->Sexo) == 1 ? 'selected' : '' }}>

                                Masculino

                            </option>

                            <option value="2"
                                {{ old('Sexo', $aprendiz->Sexo) == 2 ? 'selected' : '' }}>

                                Femenino

                            </option>

                        </select>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>Fecha de nacimiento</label>

                        <input type="date"
                               name="FechaNac"
                               value="{{ old('FechaNac', $aprendiz->FechaNac) }}"
                               class="form-control @error('FechaNac') is-invalid @enderror">

                        @error('FechaNac')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>EPS</label>

                        <select name="tbleps_NIS" class="form-select">

                            @foreach($eps as $e)

                                <option value="{{ $e->NIS }}"
                                    {{ $aprendiz->tbleps_NIS == $e->NIS ? 'selected' : '' }}>

                                    {{ $e->Denominacion }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <div class="mt-3">

                    <button type="submit" class="btn btn-warning">
                        Actualizar aprendiz
                    </button>

                    <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                        Volver
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
