@extends('layouts.diseñoVistas')

@section('title','Registrar alternativas')

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

            <h3 class="mb-4">Registrar alternativa</h3>

            <form method="POST" action="{{route('alternativasEp.store')}}" id="frmRegAlternativa">

                @csrf

                <div class="row">

                    <!-- Tipo de alternativa -->
                    <div class="col-md-4 mb-3">

                        <label>Tipo de alternativa</label>

                        <input type="text"
                               class="form-control"
                               name="TipoAlternativa"
                               value="{{old('TipoAlternativa')}}"
                               placeholder="TipoAlternativa">

                        @error('TipoAlternativa')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>

                <!-- Botones -->

                <div class="mt-3">

                    <button type="submit" class="btn btn-success">
                        Registrar alternativa
                    </button>

                    <a href="{{ route('alternativasEp.index') }}" class="btn btn-secondary">
                        Volver
                    </a>

                </div>


            </form>

        </div>

    </div>

@endsection
