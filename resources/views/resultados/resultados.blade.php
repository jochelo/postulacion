@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                RESULTADOS EVALUACION ONLINE POR CARGO
            </div>
            <div class="card-body">
                <form action="{{ url('/resultados') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <select class="form-control" name="cargo_id" id="cargo_id">
                                    <option @if ($cargo_id == 0)
                                            selected="selected"
                                            @endif
                                            value="0">Todos</option>
                                    @foreach($cargos as $cargo)
                                        <option @if ($cargo_id == $cargo['cargo_id'])
                                                selected="selected"
                                                @endif
                                                value="{{ $cargo['cargo_id'] }}">{{ $cargo['cargo_descripcion'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary btn-block">GENERAR</button>
                        </div>
                    </div>
                </form>
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>N.</th>
                            <th>Postulante</th>
                            <th>Cedula de Identidad</th>
                            <th>Cargo</th>
                            <th>Nota</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($test_users as $test_user)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $test_user['user']['apellido_paterno'] }} {{ $test_user['user']['apellido_materno'] }} {{ $test_user['user']['nombres'] }}</td>
                            <td>{{ $test_user['user']['numero_carnet'] }}</td>
                            <td>{{ $test_user['user']['cargo_descripcion'] }}</td>
                            <td>{{ $test_user['nota'] }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
