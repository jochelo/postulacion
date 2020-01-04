@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('INSCRIPCION') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cargo_id">{{ __('Cargo a Postular') }}</label>
                                <select name="cargo_id" id="cargo_id" class="form-control">
                                    @foreach($cargos as $cargo)
                                        <option value="{{$cargo->cargo_descripcion}}" > {{ $cargo->cargo_descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombres">{{ __('Nombres') }}</label>
                                <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror"
                                       name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>

                                @error('nombres')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellido_paterno">{{ __('Apellido Paterno') }}</label>
                                <input id="apellido_paterno" type="text" class="form-control @error('apellido_paterno') is-invalid @enderror"
                                       name="apellido_paterno" value="{{ old('apellido_paterno') }}" required autocomplete="apellido_paterno">

                                @error('apellido_paterno')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellido_materno">{{ __('Apellido Materno') }}</label>
                                <input id="apellido_materno" type="text" class="form-control @error('apellido_materno') is-invalid @enderror"
                                       name="apellido_materno" value="{{ old('apellido_materno') }}" required autocomplete="apellido_materno">

                                @error('apellido_materno')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="numero_carnet">{{ __('N. Carnet') }}</label>
                                <input id="numero_carnet" type="text" class="form-control @error('numero_carnet') is-invalid @enderror"
                                       name="numero_carnet" value="{{ old('numero_carnet') }}" required autocomplete="numero_carnet">

                                @error('numero_carnet')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="expedicion">{{ __('Expedicion') }}</label>
                                <input id="expedicion" type="text" class="form-control @error('expedicion') is-invalid @enderror"
                                       name="expedicion" value="{{ old('expedicion') }}" required autocomplete="expedicion">

                                @error('expedicion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="estado_civil">{{ __('Estado Civil') }}</label>
                                <input id="estado_civil" type="text" class="form-control @error('estado_civil') is-invalid @enderror"
                                       name="estado_civil" value="{{ old('estado_civil') }}" required autocomplete="estado_civil">

                                @error('estado_civil')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fecha_nacimiento">{{ __('Fecha de Nacimiento') }}</label>
                                <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                       name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required autocomplete="fecha_nacimiento">

                                @error('fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lugar">{{ __('Lugar') }}</label>
                                <input id="lugar" type="text" class="form-control @error('lugar') is-invalid @enderror"
                                       name="lugar" value="{{ old('lugar') }}" required autocomplete="lugar">

                                @error('lugar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nacionalidad">{{ __('Nacionalidad') }}</label>
                                <input id="nacionalidad" type="text" class="form-control @error('nacionalidad') is-invalid @enderror"
                                       name="nacionalidad" value="{{ old('nacionalidad') }}" required autocomplete="nacionalidad">

                                @error('nacionalidad')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="direccion">{{ __('Direccion') }}</label>
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror"
                                       name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion">

                                @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefono_celular">{{ __('Celular') }}</label>
                                <input id="telefono_celular" type="text" class="form-control @error('telefono_celular') is-invalid @enderror"
                                       name="telefono_celular" value="{{ old('telefono_celular') }}" required autocomplete="telefono_celular">

                                @error('telefono_celular')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">{{ __('Correo Electronico') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sexo">{{ __('Sexo') }}</label><br>
                                <input id="sexo" type="checkbox" name="sexo" value="Varon"> Varon
                                <input id="sexo" type="checkbox" name="sexo" value="Mujer"> Mujer

                                @error('sexo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">{{ __('Correo Electronico') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password-confirm">{{ __('Confirmar Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group col-md-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
