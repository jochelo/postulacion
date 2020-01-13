@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        [INICIAR SESION] SISTEMA DE POSTULACIONES <strong>EMPADRONAMIENTO ELECCIONES GENERALES 2020 </strong>
                        <!--INICIO <strong>EVALUACIÓN ONLINE</strong>-->
                    </div>
                    <div class="card-body">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ingrese su correo electronico">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingrese su número de carnet">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
{{ __('Acceder') }}
                            </button>

{{--                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif--}}
                            </div>
                        </div>
                    </form>

                        <!--<hr>
                        <p class="text-danger text-justify">Para acceder al sistema de evaluación Online haga click en
                            el boton.</p>
                        <hr>
                        <div class="text-center">
                            <a href="http://34.233.102.234/login" class="btn btn-primary">
                                <i class="fa fa-sign-in-alt"></i>
                                Acceder
                            </a>
                        </div>-->
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        COMUNICADO N. 3
                    </div>
                    <div class="card-body text-center">
                        <img src="noticias/noticia3.jpeg" class="img-fluid">
                        <br>
                        <a href="tdrs/postulantes-habilitados.pdf" target="_blank"> <i class="fa fa-download"></i>
                            POSTULANTES HABILITADOS PARA CONTRATACIÓN</a>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        COMUNICADO N. 2
                    </div>
                    <div class="card-body">
                        <img src="noticias/noticia2.jpeg" class="img-fluid">
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        COMUNICADO N. 1
                    </div>
                    <div class="card-body">
                        <img src="noticias/noticia1.jpeg" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h6><strong>POSTULANTES HABILITADOS PARA CONTRATACIÓN EMPADRONAMIENTO BIOMETRICO ELECCIONES GENERALES 2020</strong>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th><i class="fa fa-download"></i> DESCARGAR ARCHIVO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="tdrs/postulantes-habilitados.pdf" target="_blank">POSTULANTES HABILITADOS PARA CONTRATACIÓN</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header text-center">
                                <h6><strong>CONVOCATORIA EMPADRONAMIENTO BIOMETRICO ELECCIONES GENERALES 2020</strong>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th><i class="fa fa-download"></i> DESCARGAR ARCHIVO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="tdrs/CONVOCATORIA SERECI 2020.docx" target="_blank">CONVOCATORIA
                                                    SERECI 2020.docx</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header text-center">
                                <h6><strong>REGLAMENTO PARA LA ACTUALIZACION DEL PADRON ELECTORAL BIOMETRICOS</strong>
                                </h6>
                                <h6 class="text-danger">
                                    DOCUMENTO BASE PARA LA EVALUACION EN LINEA
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th><i class="fa fa-download"></i> DESCARGAR ARCHIVO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="tdrs/Reglamento_Actualizacion_PEB_EG_2019.pdf" target="_blank">Reglamento_Actualizacion_PEB_EG_2019.pdf</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header text-center">
                                <h6><strong>FORMULARIO UNICO DE POSTULACION</strong></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th><i class="fa fa-download"></i> DESCARGAR ARCHIVO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="tdrs/F6 ACTUALIZADO 2017_2018 (1).xls" target="_blank">F6
                                                    ACTUALIZADO 2017_2018.xls</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header text-center">
                                <h6><strong>CONVOCATORIA EMPADRONAMIENTO ELECCIONES GENERALES 2020</strong></h6>
                                <h3 class="text-danger">TERMINOS DE REFERENCIA</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th><i class="fa fa-download"></i> DESCARGAR ARCHIVO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="tdrs/1 TDR Coordinador General.docx" target="_blank">1 TDR
                                                    Coordinador General.docx</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="tdrs/2TDR Coordinador Electoral.docx" target="_blank">2TDR
                                                    Coordinador Electoral.docx</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="tdrs/3 TDR NOTARIO OPERADOR.docx" target="_blank">3 TDR Notario
                                                    Operador.docx</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="tdrs/4 TDR AUXILIAR ADMINISTRATIVO FINANCIERO.docx"
                                                   target="_blank">4 TDR Auxiliar Administrativo Financiero.docx</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="tdrs/5 TDR Capacitador y Control de Calidad.docx"
                                                   target="_blank">5 TDR Capacitador y Control de Calidad.docx</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="tdrs/6 TDR Tecnico de Logistica.docx" target="_blank">6 TDR
                                                    Tecnico de Logistica.docx</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="tdrs/7 TDR Tecnico de Soporte.docx" target="_blank">7 TDR
                                                    Tecnico de Soporte.docx</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="tdrs/8 TDR Auxiliar Tecnico.docx" target="_blank">8 TDR
                                                    Auxiliar Tecnico.docx</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="tdrs/9 TDR Tecnico en Comunicacion e Informacion.docx"
                                                   target="_blank">9 TDR Tecnico en Comunicacion e Informacion.docx</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="tdrs/10 TDR Comunicador.docx" target="_blank">10 TDR
                                                    Comunicador.docx</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
