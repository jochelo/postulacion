@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('INSCRIPCION') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('registrar') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <br>
                                    <h4>Datos <strong>Personales</strong></h4>
                                    <hr>
                                </div>
                                {{--cargo--}}
                                <div class="form-group col-md-4">
                                    <label for="cargo_id">{{ __('Cargo a Postular') }}</label>
                                    <select name="cargo_id" id="cargo_id" class="form-control">
                                        @foreach($cargos as $cargo)
                                            <option value="{{$cargo->cargo_id}}"> {{ $cargo->cargo_descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--nombres--}}
                                <div class="form-group col-md-4">
                                    <label for="nombres">{{ __('Nombres') }}</label>
                                    <input id="nombres" type="text"
                                           class="form-control @error('nombres') is-invalid @enderror"
                                           name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres"
                                           autofocus>

                                    @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--paterno--}}
                                <div class="form-group col-md-4">
                                    <label for="apellido_paterno">{{ __('Apellido Paterno') }}</label>
                                    <input id="apellido_paterno" type="text"
                                           class="form-control @error('apellido_paterno') is-invalid @enderror"
                                           name="apellido_paterno" value="{{ old('apellido_paterno') }}" required
                                           autocomplete="apellido_paterno">

                                    @error('apellido_paterno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--materno--}}
                                <div class="form-group col-md-4">
                                    <label for="apellido_materno">{{ __('Apellido Materno') }}</label>
                                    <input id="apellido_materno" type="text"
                                           class="form-control @error('apellido_materno') is-invalid @enderror"
                                           name="apellido_materno" value="{{ old('apellido_materno') }}" required
                                           autocomplete="apellido_materno">

                                    @error('apellido_materno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--ci--}}
                                <div class="form-group col-md-4">
                                    <label for="numero_carnet">{{ __('N. Carnet') }}</label>
                                    <input id="numero_carnet" type="text"
                                           class="form-control @error('numero_carnet') is-invalid @enderror"
                                           name="numero_carnet" value="{{ old('numero_carnet') }}" required
                                           autocomplete="numero_carnet">

                                    @error('numero_carnet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--expedicion--}}
                                <div class="form-group col-md-4">
                                    <label for="expedicion">{{ __('Expedicion') }}</label>
                                    <input id="expedicion" type="text"
                                           class="form-control @error('expedicion') is-invalid @enderror"
                                           name="expedicion" value="{{ old('expedicion') }}" required
                                           autocomplete="expedicion">

                                    @error('expedicion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--foto ci--}}
                                <div class="form-group col-md-4">
                                    <label for="foto_carnet">{{ __('Escaneado de carnet') }}</label>
                                    <div class="custom-file">
                                        <input type="file" id="foto_carnet"
                                               name="foto_carnet"
                                               class="" accept="image\" lang="es" onchange="fileci($event)">

                                    </div>
                                    @error('foto_carnet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--estado civil--}}
                                <div class="form-group col-md-4">
                                    <label for="estado_civil">{{ __('Estado Civil') }}</label>
                                    <select id="estado_civil"
                                            class="form-control @error('estado_civil') is-invalid @enderror"
                                            name="estado_civil" required>
                                        <option value="Soltero"> {{ __('Soltero') }}</option>
                                        <option value="Casado"> {{ __('Casado') }}</option>
                                        <option value="Divorciado"> {{ __('Divorciado') }}</option>
                                        <option value="Viudo"> {{ __('Viudo') }}</option>
                                    </select>
                                    @error('estado_civil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--fnacimiento--}}
                                <div class="form-group col-md-4">
                                    <label for="fecha_nacimiento">{{ __('Fecha de Nacimiento') }}</label>
                                    <input id="fecha_nacimiento" type="date"
                                           class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                           name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required
                                           autocomplete="fecha_nacimiento">

                                    @error('fecha_nacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--lugar--}}
                                <div class="form-group col-md-4">
                                    <label for="lugar">{{ __('Lugar') }}</label>
                                    <input id="lugar" type="text"
                                           class="form-control @error('lugar') is-invalid @enderror"
                                           name="lugar" value="{{ old('lugar') }}" required autocomplete="lugar">

                                    @error('lugar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--nacionalidad--}}
                                <div class="form-group col-md-4">
                                    <label for="nacionalidad">{{ __('Nacionalidad') }}</label>
                                    <select id="nacionalidad" class="form-control @error('nacionalidad') is-invalid @enderror" name="nacionalidad" required>
                                        <option value="boliviano">Boliviano</option>
                                        <option value="extranjero">Extranjero</option>
                                    </select>
                                    @error('nacionalidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--direccion--}}
                                <div class="form-group col-md-4">
                                    <label for="direccion">{{ __('Direccion') }}</label>
                                    <input id="direccion" type="text"
                                           class="form-control @error('direccion') is-invalid @enderror"
                                           name="direccion" value="{{ old('direccion') }}" required
                                           autocomplete="direccion">

                                    @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--cel--}}
                                <div class="form-group col-md-4">
                                    <label for="telefono_celular">{{ __('Celular') }}</label>
                                    <input id="telefono_celular" type="text"
                                           class="form-control @error('telefono_celular') is-invalid @enderror"
                                           name="telefono_celular" value="{{ old('telefono_celular') }}" required
                                           autocomplete="telefono_celular">

                                    @error('telefono_celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--email--}}
                                <div class="form-group col-md-4">
                                    <label for="email">{{ __('Correo Electronico') }}</label>
                                    <input id="email" type="text"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--sexo--}}
                                <div class="form-group col-md-4">
                                    <label for="sexo">{{ __('Sexo') }}</label><br>
                                    <!-- Default unchecked -->
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="varon" name="sexo"
                                               value="Varon">
                                        <label class="custom-control-label" for="varon">Varon</label>
                                    </div>

                                    <!-- Default checked -->
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="mujer" name="sexo"
                                               value="Mujer">
                                        <label class="custom-control-label" for="mujer">Mujer</label>
                                    </div>
                                    @error('sexo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--foto perfil--}}
                                <div class="form-group col-md-4">
                                    <label for="credencializacion_fotografia">{{ __('Foto de perfil') }}</label>
                                    <div class="custom-file">
                                        <input type="file" id="credencializacion_fotografia"
                                               name="credencializacion_fotografia"
                                               accept="image\">

                                    </div>
                                    @error('credencializacion_fotografia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--Libreta militar--}}
                                <div  id="lm" class="form-group col-md-4">
                                        <label for="numero_libreta_militar">{{ __('Libreta Militar') }}</label>
                                        <input id="numero_libreta_militar" type="text"
                                               class="form-control @error('numero_libreta_militar') is-invalid @enderror"
                                               name="numero_libreta_militar" value="{{ old('numero_libreta_militar') }}"
                                               autocomplete="numero_libreta_militar">
                                        @error('numero_libreta_militar')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                {{--foto militar--}}
                                <div id="fm" class="form-group col-md-4">
                                        <label for="foto_militar">{{ __('Escaneado de Libreta militar') }}</label>
                                        <div class="custom-file">
                                            <input type="file" id="foto_militar"
                                                   name="foto_militar"
                                                   accept="image\" lang="es">
                                        </div>
                                        @error('foto_militar')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <br>
                                    <h4>Formación <strong>Academica</strong></h4>
                                    <hr>
                                </div>
                                {{--grado academico--}}
                                <div class="form-group col-md-4">
                                    <label for="academico_grado">{{ __('Grado Academico') }}</label>
                                    <select id="academico_grado"
                                            class="form-control @error('academico_grado') is-invalid @enderror"
                                            name="academico_grado" required>
                                        <option value="Bachillerato"> {{ __('Bachillerato') }}</option>
                                        <option value="Tecnico Medio"> {{ __('Tecnico Medio') }}</option>
                                        <option value="Tecnico Superior"> {{ __('Tecnico Superior') }}</option>
                                        <option value="Universitaria"> {{ __('Universitaria') }}</option>
                                        <option value="Post grado"> {{ __('Post grado') }}</option>
                                        <option value="Diplotado"> {{ __('Diplotado') }}</option>
                                        <option value="Maestria"> {{ __('Maestria') }}</option>
                                        <option value="Doctorado"> {{ __('Doctorado') }}</option>
                                    </select>
                                    @error('academico_grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="academico_gestion">{{ __('Gestión Academica') }}</label>
                                    <input id="academico_gestion" type="text"
                                           class="form-control @error('academico_gestion') is-invalid @enderror"
                                           name="academico_gestion" value="{{ old('academico_gestion') }}" required
                                           autocomplete="academico_gestion">

                                    @error('academico_gestion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="academico_institucion">{{ __('Institucion Academica') }}</label>
                                    <input id="academico_institucion" type="text"
                                           class="form-control @error('academico_institucion') is-invalid @enderror"
                                           name="academico_institucion" value="{{ old('academico_institucion') }}"
                                           required autocomplete="academico_institucion">

                                    @error('academico_institucion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="academico_titulo">{{ __('Titulo Academico') }}</label>
                                    <input id="academico_titulo" type="text"
                                           class="form-control @error('academico_titulo') is-invalid @enderror"
                                           name="academico_titulo" value="{{ old('academico_titulo') }}" required
                                           autocomplete="academico_titulo">

                                    @error('academico_titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <br>
                                    <h4>Campos <strong>Opcionales</strong></h4>
                                    <hr>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="telefono">{{ __('Telefono') }}</label>
                                    <input id="telefono" type="text"
                                           class="form-control @error('telefono') is-invalid @enderror"
                                           name="telefono" value="{{ old('telefono') }}" autocomplete="telefono">
                                    @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fax">{{ __('Fax') }}</label>
                                    <input id="fax" type="text" class="form-control @error('fax') is-invalid @enderror"
                                           name="fax" value="{{ old('fax') }}" autocomplete="fax">
                                    @error('fax')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="casilla_postal">{{ __('Casilla Postal') }}</label>
                                    <input id="casilla_postal" type="text"
                                           class="form-control @error('casilla_postal') is-invalid @enderror"
                                           name="casilla_postal" value="{{ old('casilla_postal') }}"
                                           autocomplete="casilla_postal">
                                    @error('casilla_postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group custom-control custom-switch text-center col-12">
                                    <input type="checkbox" class="custom-control-input @error('disponibilidad') is-invalid @enderror" id="disponibilidad" name="disponibilidad">
                                    <label class="custom-control-label" for="disponibilidad">¿Usted cuenta con disponibilidad total de tiempo para viajes al interior del departamento?</label>
                                    @error('disponibilidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            <!--<div class="form-group col-md-4">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password-confirm">{{ __('Confirmar Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>-->
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
@section('scripts')
    <script>
        addEventListener('load', inicio, false);

        function inicio() {
            document.getElementById('mujer').addEventListener('change', cambio, false);
            document.getElementById('varon').addEventListener('change', cambioV, false);
        }

        function cambio() {
            if (document.getElementById('mujer').checked) {
                document.getElementById('lm').style.display = 'none';
                document.getElementById('fm').style.display = 'none';
                $('#numero_libreta_militar').removeAttr("required");
            }
        }

        function cambioV() {
            if (document.getElementById('varon').checked) {
                document.getElementById('lm').style.display = 'block';
                document.getElementById('fm').style.display = 'block';
                $('#numero_libreta_militar').prop("required", true);
            }
        }
    </script>
@endsection

