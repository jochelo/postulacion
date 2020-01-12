@extends('layouts.front')
@section('content')
    @if($state!=='finTest')
        <div class="col-md-10 offset-md-1">
            <div class="col-md-6 container-fluid">
                <div class="row">
                    <div class="col-md-5 text-left">Tiempo transcurrido:</div>
                    <div id="counter" class="col-5 text-primary text-right" style="font-size: 1.3em;">
                    </div>
                    <div class="col-2 text-primary">
                        <i class="fa fa-clock"></i>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">

                    <h6>{{ ($item+1).' de '.$test->num_preguntas}}</h6>
                    <h3>{{ $pregunta['pregunta_titulo'] }}</h3>
                </div>
                <div class="card-body">

                    <form action="{{ url('show-test') }}" method="POST" class="container">
                        @csrf
                        <input type="hidden" name="state" value="createRespuestaUser">
                        <input type="hidden" name="preguntas" value="{{$preguntas}}">
                        <input type="hidden" name="datenow" value="{{$datenow}}">
                        <input type="hidden" name="item" value="{{ $item }}">
                        @foreach($pregunta['respuestas'] as $respuesta)
                        <!-- Default unchecked -->
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input"
                                           id="{{ $respuesta['respuesta_id']}}"
                                           name="respuesta_id"
                                           value="{{ $respuesta['respuesta_id']}}" required>
                                    <label class="custom-control-label"
                                           for="{{ $respuesta['respuesta_id']}}">{{ $respuesta['respuesta_descripcion']}}</label>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">
                                {{__('Responder')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">FIN DE LA EVALUACIÓN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ 'Usted a dado su examen satisfactoriamente.' }}</p>
                        <p class="text-primary">{{ 'Su nota es de: ' }} <strong>{{ $test.'%' }}</strong></p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('home/') }}" class="btn btn-primary" data-dismiss="modal">Aceptar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">¡Felicidades! Usted ha concluido la Evaluación!</h4>
                <p>Por favor espere la lista de habilitados a traves de la plataforma. Despues de las 9pm del dia de hoy Domingo 12 de enero</p>
                <hr>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{{ $datenow }}").getTime() + (900000);

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("counter").innerHTML = minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("counter").innerHTML = "TIEMPO EXPIRADO";
            }
        }, 1000);
    </script>
    <script>
        $(document).ready(function () {
            $('#exampleModalCenter').modal('show')
        });
    </script>
@endsection
