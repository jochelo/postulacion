@extends('layouts.front')
@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">
                    Evaluación Online Empadronamiento Biometrico {{date('Y')}}
                </h3>
                <br>
                <p>
                    Se recuerda que la <strong>Evaluación Online </strong> se realizará en fecha 12/01/{{date('Y')}}
                    desde las 09:30 hasta las 19:30 horas.
                </p>
                <p>
                    La duración de la <strong>Evaluación </strong>por cada postulante sera de <strong>15 minutos</strong> y se podra
                    responder solamente una vez por cada una de las preguntas.
                </p>
                <div class="alert alert-danger">
                    <strong>Por ningun motivo actualizar la página del navegador después de oprimir el boton "Dar Evaluación Online" </strong>, caso contrario se perderán todas sus respuestas y no podrá dar nuevamente la evaluación.
                    <br>
                    <strong>En caso de darse esta acción, será bajo su consentimiento y no podrá emitir reclamo alguno.</strong>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('show-test') }}" method="POST">
                    @csrf
                    <input type="hidden" name="state" value="listInit">
                    <div class="text-center">
                        <button class="btn btn-primary">
                            <li class="fa fa-pen"></li>
                            {{ __('Dar Evaluación Online') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
