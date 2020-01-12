@extends('layouts.front')
@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">
                    Evaluación Online Empadronamiento Biometrico {{date('Y')}}
                </h3>
                <br>
                <p class="text-primary text-justify">
                    Se recuerda que la <strong>Evaluación Online </strong> se realizará en fecha 12/01/{{date('Y')}}
                    desde las 08:30 a.m. hasta las 18:30 p.m.
                    La duración de la <strong>Evaluación </strong>por cada postulante sera de 15 minutos y se podra
                    responder solamente una vez por cada una de las preguntas.
                </p>
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
