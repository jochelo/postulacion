@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-2 col-md-8">
                @if($state === 'list')
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h3>Preguntas</h3>
                                </div>
                                <div class="col-lg-8">
                                    <form action="{{ url('preguntas-test') }}" method="post">
                                        @csrf
                                        <select name="test_id"
                                                class="form-control"
                                                id="test_id">
                                            @foreach($tests as $test)
                                                <option
                                                    @if ($test['test_id'] == $test_id)
                                                    selected = "selected"
                                                    @endif
                                                    value="{{ $test['test_id'] }}">{{ $test['titulo'] }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>N.</th>
                                        <th>Test</th>
                                        <th>Pregunta</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($preguntas as $pregunta)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $pregunta['test_titulo'] }}</td>
                                            <td>{{ $pregunta['pregunta_titulo'] }}</td>
                                            <td>
                                                <form action="{{ url('preguntas-test') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="state" value="list-respuestas">
                                                    <input type="hidden" name="test_id" value="{{ $test_id }}">
                                                    <input type="hidden" name="pregunta" value="{{ (string) $pregunta }}">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <strong>R</strong> <i class="fa fa-plus"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                @if($state === 'list-respuestas')
                    <div class="card">
                        <div class="card-header">
                            <h3><strong>{{ $pregunta['test_titulo'] }}</strong></h3>
                            <h4><strong>{{ $pregunta['pregunta_titulo'] }}</strong></h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('preguntas-test') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <input type="hidden" name="pregunta_id" value="{{ (int)$pregunta['pregunta_id'] }}">
                                        <input type="hidden" name="pregunta" value="{{ (string) $pregunta }}">
                                        <input type="hidden" name="state" value="create-respuesta">
                                        <input type="hidden" name="test_id" value="{{ $test_id }}">
                                        <input type="text" name="respuesta_descripcion" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary btn-block">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>N.</th>
                                        <th>Respuesta</th>
                                        <th>Correcto</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pregunta['respuestas'] as $respuesta)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $respuesta['respuesta_descripcion'] }}</td>
                                            <td>{{ $respuesta['correcto'] }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                <script>
                    var select = document.getElementById('test_id');
                    select.addEventListener('change', function () {
                        this.form.submit();
                    }, false);
                </script>
            </div>
        </div>
    </div>
@endsection
{{--@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-md-8 offset-md-2">
        <h2 class="text">Preguntas</h2>
        <div class="form-group">
            <input class="form-control" id="s-preguntas" type="text" placeholder="Buscar Test..">
            <div class="list-group" id="c-preguntas">
                @foreach($tests as $test)
                    <button type="button" class="l-m list-group-item list-group-item-action" value="{{ $test}}"
                            onclick="cambioM('{{$test->test_id}}', '{{$test->titulo}}','{{$test}}')">
                        {{ $test->titulo }}
                        <strong>{{'; Descripción: '.$test->descripcion}}</strong>
                    </button>
                @endforeach
            </div>
        </div>
        <div class="card datTest">
            <div class="card-header">
                <div class="row">
                    <h2 id="nameTest"></h2>
                    <div class="col-8"><strong>Agregar</strong> Pregunta</div>
                </div>
            </div>
            <form id="preguntaForm"
                  name="preguntaForm"
                  class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                    <!--alto-->
                    <div id="tituloP_id">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="pregunta_titulo" class=" form-control-label">Titulo Pregunta</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="pregunta_titulo" name="pregunta_titulo"
                                       placeholder="Titulo de la Pregunta"
                                       class="form-control @error('pregunta_titulo') is-invalid @enderror">
                                @error('pregunta_titulo')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!--test_id-->
                    <input type="hidden" name="test_id" id="test_id" value="">

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button
                                id="agregar_pregunta"
                                class="btn btn-primary btn-border-none btn-block">
                                <i class="fa fa-folder-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            --}}{{--TABLA DE preguntas--}}{{--
            <div class="col-12">
                <br>
                <h4>Pregunas del <strong>Test</strong></h4>
            </div>
            <div class="table table-striped table-responsive-md">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Pregunta</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($t))
                        @foreach($t->$preguntas as $pregunta)
                            <tr>
                                <td class="preguntad">{{$pregunta->pregunta_titulo}}</td>
                                {!!Form::open(['route'=>['preguntas.updateP',$pregunta->pregunta_id],'method'=>'POST','class' => 'form-horizontal preguntaf'])!!}
                                <div class="col-12 col-md-10">
                                    <input type="text" id="pregunta_titulo" name="pregunta_titulo"
                                           class="form-control @error('total') is-invalid @enderror"
                                           value="{{ $pregunta->pregunta_titulo }}">
                                    @error('pregunta_titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <a href="" class="btn-border-none btn-sm btn-outline-primary btn-update">
                                        <span class="fa fa-truck-loading"></span>
                                    </a>
                                </div>
                                {!! Form::close() !!}
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-border-none btn-sm btn-outline-primary "
                                           href="{{ route("respuesta.create") }}" data-toggle="tooltip"
                                           data-placement="top" title="Añadir">
                                            <span class="fa fa-plus"></span>
                                        </a>
                                        <a class="btn btn-border-none btn-sm btn-outline-success "
                                           onclick="editar()"
                                           --}}{{--href="{{ url('preguntas/'.$pregunta->pregunta_id.'/edit') }}"--}}{{--
                                           data-toggle="tooltip"
                                           data-placement="top" title="Editar">
                                            <span class="fa fa-pencil-alt"></span>
                                        </a>
                                        <form class="float-right"
                                              action="{{ route('preguntas.destroy',$pregunta->test_id)}}" method="POST"
                                              onclick="return confirm('Estas seguro de que desea eliminar?')">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-border-none btn-sm btn-outline-danger">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>-->
    <script>
        //preguntas
        $(document).ready(function () {
            $("#s-preguntas").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#c-preguntas .l-m").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                $("#c-preguntas").show();
            });
        });
        $("#c-preguntas").hide();
        $(".datTest").hide();

        $(document).ready(function () {
            $("body").on("click", function () {
                $("#c-preguntas").hide();
            });
        });
        function cambioM(id, name, test) {
            document.getElementById('test_id').value = id;
            document.getElementById('nameTest').innerHTML = name.charAt(0).toUpperCase() + name.slice(1);
            $(".datTest").show();
            @php(
            $t="<script>document.writeln(test);</script>"
            )
            document.console.log(test);
        }

    </script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#agregar_pregunta").click(function (e) {
                e.preventDefault();
                $.ajax({
                    data: $("#preguntaForm").serialize(),
                    url: 'http://localhost:8000/api/preguntas',
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            })
        });
    </script>
@endsection--}}
