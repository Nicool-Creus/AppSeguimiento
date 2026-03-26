@extends('layouts.diseñoVistas')

@section('title','Registrar subtipos de alternativas')

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

            <h3 class="mb-4">Registrar subtipo</h3>

            <form method="POST" action="{{route('subtipoAlternativa.store')}}" id="frmRegSubtipoAlternativa">

                @csrf

                <div class="row">

                    <!-- Subtipo de alternativa -->
                    <div class="col-md-4 mb-3">

                        <label>Subtipo de alternativa</label>

                        <input type="text"
                               class="form-control"
                               name="SubtipoAlternativa"
                               value="{{old('SubtipoAlternativa')}}"
                               placeholder="SubtipoAlternativa">

                        @error('SubtipoAlternativa')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <!-- Selección de alternativa -->
                    <div class="col-md-4 mb-3">

                        <label>Alternativa</label>

                        <select name="tblalternativasep_NIS" class="form-select">
                            <option value="">Seleccione una alternativa</option>

                            @foreach($alternativas as $alternativa)
                                <option value="{{ $alternativa->NIS }}">
                                    {{ $alternativa->TipoAlternativa }}
                                </option>
                            @endforeach
                        </select>

                        @error('tblalternativasep_NIS')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>

                <!-- Botones -->

                <div class="mt-3">

                    <button type="submit" class="btn btn-success">
                        Registrar subtipo
                    </button>

                    <a href="{{ route('subtipoAlternativa.index') }}" class="btn btn-secondary">
                        Volver
                    </a>

                </div>


            </form>

        </div>

    </div>

@endsection
