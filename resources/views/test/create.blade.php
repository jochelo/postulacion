@extends('layouts.front')
@section('content')
    <div class="col-lg-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <strong>Nuevo</strong> Test
            </div>
            <form action="{{ route('tests.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                    {{--nivel_id--}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nivel_id" class=" form-control-label">Nivel</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="nivel_id" id="nivel_id"
                                    class="form-control form-control-sm @error('nivel_id') is-invalid @enderror">
                                @foreach($niveles as $nivel)
                                    <option value="{{ $nivel->nivel_id }}">{{ $nivel->nivel_descripcion }}</option>
                                @endforeach
                            </select>
                            @error('nivel_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{--cargo_id--}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="cargo_id" class=" form-control-label">Cargo</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="cargo_id" id="cargo_id"
                                    class="form-control form-control-sm @error('cargo_id') is-invalid @enderror">
                                @foreach($cargos as $cargo)
                                    <option value="{{ $cargo->cargo_id }}">{{ $cargo->cargo_descripcion }}</option>
                                @endforeach
                            </select>
                            @error('cargo_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- titulo --}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="titulo" class=" form-control-label">
                                Titulo
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="titulo" name="titulo" placeholder="Titulo"
                                   class="form-control @error('titulo') is-invalid @enderror">
                            @error('titulo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- descripcion --}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="descripcion" class=" form-control-label">
                                Descripcion
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion"
                                   class="form-control @error('descripcion') is-invalid @enderror">
                            @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--num_preguntas-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="num_preguntas" class=" form-control-label">No. Preguntas</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="num_preguntas" name="num_preguntas" placeholder="Numero de preguntas"
                                   class="form-control @error('num_preguntas') is-invalid @enderror">
                            @error('num_preguntas')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group custom-control custom-switch text-center">
                        <input type="checkbox" class="custom-control-input" id="activo" name="activo" checked>
                        <label class="custom-control-label" for="activo">Activo</label>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti-check"></i> Registrar
                            </button>
                            <a href="{{ url('/tests') }}" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
