@extends('layouts.front')

@section('content')
    @if($tests !== null)
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
                                                        selected="selected"
                                                        @endif
                                                        value="{{ $test['test_id'] }}">{{ $test['titulo'] }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('preguntas-test') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="create-pregunta">
                                    <input type="hidden" name="test_id" value="{{ $test_id }}">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Escriba su pregunta" name="pregunta_titulo" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <i class="fa fa-question"></i> <strong>Registrar Pregunta</strong>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>N.</th>
                                            <th>Pregunta</th>
                                            <th>Test</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($preguntas as $pregunta)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $pregunta['pregunta_titulo'] }}</td>
                                                <td>{{ $pregunta['test_titulo'] }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <form action="{{ url('preguntas-test') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="state" value="list-respuestas">
                                                                <input type="hidden" name="test_id" value="{{ $test_id }}">
                                                                <input type="hidden" name="pregunta"
                                                                       value="{{ (string) $pregunta }}">
                                                                <button type="submit"
                                                                        title="Agregar Respuestas"
                                                                        class="btn btn-primary btn-sm btn-block">
                                                                    <strong>R </strong> <i class="fa fa-plus"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-6">
                                                            <form action="{{ url('preguntas-test') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="state" value="destroy-pregunta">
                                                                <input type="hidden" name="test_id" value="{{ $test_id }}">
                                                                <input type="hidden" name="pregunta"
                                                                       value="{{ (string) $pregunta }}">
                                                                <input type="hidden" name="pregunta_id"
                                                                       value="{{ (int)$pregunta['pregunta_id'] }}">
                                                                <button type="submit"
                                                                        title="Eliminar Pregunta"
                                                                        class="btn btn-danger btn-sm btn-block">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
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
                                <h3>{{ $pregunta['test_titulo'] }}</h3>
                                <h4><strong>{{ $pregunta['pregunta_titulo'] }}</strong></h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('preguntas-test') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8 form-group">
                                            <input type="hidden" name="pregunta_id"
                                                   value="{{ (int)$pregunta['pregunta_id'] }}">
                                            <input type="hidden" name="pregunta" value="{{ (string) $pregunta }}">
                                            <input type="hidden" name="state" value="create-respuesta">
                                            <input type="hidden" name="test_id" value="{{ $test_id }}">
                                            <input type="text" placeholder="Escribir respuesta" name="respuesta_descripcion" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary btn-block">
                                                <i class="fa fa-plus"></i> Agregar Respuesta
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
                                                <td>
                                                    @if($respuesta['correcto'])
                                                        <span class="text-primary">
                                                            <i class="fa fa-check"></i>
                                                        </span>
                                                    @else
                                                        <span class="text-danger">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-6 text-center">
                                                            @if(!$respuesta['correcto'])
                                                                <form action="{{ url('preguntas-test') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="test_id" value="{{ $test_id }}">
                                                                    <input type="hidden" name="pregunta" value="{{ (string) $pregunta }}">
                                                                    <input type="hidden" name="pregunta_id" value="{{ $pregunta['pregunta_id'] }}">
                                                                    <input type="hidden" name="respuesta_id" value="{{ $respuesta['respuesta_id'] }}">
                                                                    <input type="hidden" name="state" value="set-respuesta-correcta">
                                                                    <button
                                                                        title="Cambiar Respuesta Correcta"
                                                                        type="submit"
                                                                        class="btn btn-primary btn-sm btn-block">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                        <div class="col-6 text-center">
                                                            @if(!$respuesta['correcto'])
                                                            <form action="{{ url('preguntas-test') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="test_id" value="{{ $test_id }}">
                                                                <input type="hidden" name="pregunta" value="{{ (string) $pregunta }}">
                                                                <input type="hidden" name="pregunta_id" value="{{ $pregunta['pregunta_id'] }}">
                                                                <input type="hidden" name="respuesta_id" value="{{ $respuesta['respuesta_id'] }}">
                                                                <input type="hidden" name="state" value="destroy-respuesta">
                                                                <button
                                                                    title="Eliminar Respuesta"
                                                                    type="submit"
                                                                    class="btn btn-danger btn-sm btn-block">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="{{ url('preguntas-test') }}" class="btn btn-primary">
                                            <i class="fa fa-home"></i> Volver a listado de preguntas
                                        </a>
                                    </div>
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
    @endif
    @if($tests === null)
        <div class="container">
            <div class="alert alert-primary text-center">
                <h3>No existen tests registrados</h3>
            </div>
        </div>
    @endif
@endsection
