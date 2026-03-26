@extends('layouts.diseñoVistas')

@section('title','Registrar programas')

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

            <h3 class="mb-4">Registrar programa</h3>

            <form method="POST" action="{{route('programas.store')}}" id="frmRegPrograma">

                @csrf

                <div class="row">

                    <!-- Código -->
                    <div class="col-md-4 mb-3">

                        <label>Código</label>

                        <input type="number"
                               class="form-control"
                               name="Codigo"
                               value="{{old('Codigo')}}"
                               placeholder="Codigo">

                        @error('Codigo')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Denominación -->
                    <div class="col-md-4 mb-3">

                        <label>Denominación</label>

                        <input type="text"
                               class="form-control"
                               name="Denominacion"
                               value="{{old('Denominacion')}}"
                               placeholder="Denominacion">

                        @error('Denominacion')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Observaciones -->
                    <div class="col-md-4 mb-3">

                        <label>Observaciones</label>

                        <input type="text"
                               class="form-control"
                               name="Observaciones"
                               value="{{old('Observaciones')}}"
                               placeholder="Observaciones">

                        @error('Observaciones')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>

                <!-- Botones -->

                <div class="mt-3">

                    <button type="submit" class="btn btn-success">
                        Registrar programa
                    </button>

                    <a href="{{ route('programas.index') }}" class="btn btn-secondary">
                        Volver
                    </a>

                </div>


            </form>

        </div>

    </div>

@endsection
