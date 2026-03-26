@extends('layouts.diseñoVistas')

@section('title','Registrar regionales')

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

            <h3 class="mb-4">Registrar regional</h3>

            <form method="POST" action="{{route('regionales.store')}}" id="frmRegRegional">

                @csrf

                <div class="row">

                    <!-- Código -->
                    <div class="col-md-4 mb-3">

                        <label>Código de la regional</label>

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
                        Registrar regional
                    </button>

                    <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
                        Volver
                    </a>

                </div>


            </form>

        </div>

    </div>

@endsection
