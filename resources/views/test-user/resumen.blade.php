@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        RESUMEN DE EVALUACIONES
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Total</th>
                                    <th>Aprobados (>50%)</th>
                                    <th>Reprobados (<=50%)</th>
                                    <th>Con Nota 0</th>
                                    <th>Con fallas en sistema</th>
                                    <th>No siguieron instrucciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><strong>{{ $resumen['total'] }}</strong></td>
                                    <td>{{ $resumen['aprobados'] }}</td>
                                    <td>{{ $resumen['reprobados'] }}</td>
                                    <td>{{ $resumen['con_nota_cero'] }}</td>
                                    <td>{{ $resumen['con_problemas_sistema'] }}</td>
                                    <td>{{ $resumen['no_siguio_instrucciones'] }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        POSTULANTES QUE HICIERON MAL USO DEL SISTEMA <br>
                        <small>Actualizacion de la pagina, durante la evaluacion online</small>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>N.</th>
                                    <th>Numero de Carnet</th>
                                    <th>Postulante</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($postulantes_no_siguieron_instrucciones as $postulante)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $postulante['numero_carnet']  }}</td>
                                        <td>{{ $postulante['apellido_paterno'] }} {{ $postulante['apellido_materno'] }} {{ $postulante['nombres'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        POSTULANTES CON FALLAS EN EL SISTEMA <br>
                        <small>Error temporal de sistema por latencia en cargado de preguntas hasta antes de las 10am</small>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>N.</th>
                                    <th>Numero de Carnet</th>
                                    <th>Postulante</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($postulantes_con_problemas_sistema as $postulante)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $postulante['numero_carnet']  }}</td>
                                        <td>{{ $postulante['apellido_paterno'] }} {{ $postulante['apellido_materno'] }} {{ $postulante['nombres'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
