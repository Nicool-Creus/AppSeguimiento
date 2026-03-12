@extends('layouts.diseñoVistas')

@section('title','Registrar aprendices')

@section('content')

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Alerta de registro exitoso -->
    @if(session('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "{{session('success')}}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif


    <div class="card">

        <div class="card-body">

            <h3 class="mb-4">Registrar aprendiz</h3>

            <form method="POST" action="{{route('aprendices.store')}}" id="frmRegAprendiz">

                @csrf

                <div class="row">

                    <!-- Tipo documento -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label">Tipo de documento</label>

                        <select name="tbltiposdocumentos_NIS" class="form-select">

                            @foreach($tiposDocumentos as $tipo)

                                <option value="{{ $tipo->NIS }}">
                                    {{ $tipo->Denominacion }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- Número documento -->
                    <div class="col-md-4 mb-3">

                        <label>Número de documento</label>

                        <input type="number"
                               class="form-control"
                               name="NumDoc"
                               value="{{old('NumDoc')}}"
                               placeholder="Número documento">

                        @error('NumDoc')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Nombres -->
                    <div class="col-md-4 mb-3">

                        <label>Nombres</label>

                        <input type="text"
                               class="form-control"
                               name="Nombres"
                               value="{{old('Nombres')}}"
                               placeholder="Nombres">

                        @error('Nombres')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Apellidos -->
                    <div class="col-md-4 mb-3">

                        <label>Apellidos</label>

                        <input type="text"
                               class="form-control"
                               name="Apellidos"
                               value="{{old('Apellidos')}}"
                               placeholder="Apellidos">

                        @error('Apellidos')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Dirección -->
                    <div class="col-md-4 mb-3">

                        <label>Dirección</label>

                        <input type="text"
                               class="form-control"
                               name="Direccion"
                               value="{{old('Direccion')}}"
                               placeholder="Dirección">

                        @error('Direccion')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Teléfono -->
                    <div class="col-md-4 mb-3">

                        <label>Teléfono</label>

                        <input type="text"
                               class="form-control"
                               name="Telefono"
                               value="{{old('Telefono')}}"
                               placeholder="Teléfono">

                        @error('Telefono')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Correo institucional -->
                    <div class="col-md-6 mb-3">

                        <label>Correo institucional</label>

                        <input type="email"
                               class="form-control"
                               name="CorreoInstitucional"
                               value="{{old('CorreoInstitucional')}}"
                               placeholder="Correo institucional">

                        @error('CorreoInstitucional')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Correo personal -->
                    <div class="col-md-6 mb-3">

                        <label>Correo personal</label>

                        <input type="email"
                               class="form-control"
                               name="CorreoPersonal"
                               value="{{old('CorreoPersonal')}}"
                               placeholder="Correo personal">

                        @error('CorreoPersonal')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Sexo -->
                    <div class="col-md-4 mb-3">

                        <label>Sexo</label>

                        <select name="Sexo" class="form-select">

                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>

                        </select>

                    </div>


                    <!-- Fecha nacimiento -->
                    <div class="col-md-4 mb-3">

                        <label>Fecha de nacimiento</label>

                        <input type="date"
                               class="form-control"
                               name="FechaNac"
                               value="{{old('FechaNac')}}">

                    </div>


                    <!-- EPS -->
                    <div class="col-md-4 mb-3">

                        <label>EPS</label>

                        <select name="tbleps_NIS" class="form-select">

                            @foreach($eps as $e)

                                <option value="{{ $e->NIS }}">
                                    {{ $e->Denominacion }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <!-- Botones -->

                <div class="mt-3">

                    <button type="submit" class="btn btn-success">
                        Registrar aprendiz
                    </button>

                    <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                        Volver
                    </a>

                </div>


            </form>

        </div>

    </div>

@endsection
