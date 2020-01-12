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
    </div>
@endsection
