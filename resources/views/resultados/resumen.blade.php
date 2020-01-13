@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                RESUMEN DE RESULTADOS POR CARGO
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>N.</th>
                            <th>Cargo</th>
                            <th>Postulantes</th>
                            <th>Evaluados</th>
                            <th>Ausentes</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resumenes as $resumen)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $resumen['cargo'] }}</td>
                                <td>{{ $resumen['cantidad_postulantes'] }}</td>
                                <td>{{ $resumen['evaluados'] }}</td>
                                <td>{{ $resumen['ausentes'] }}</td>
                                <td>{{ $resumen['total'] }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td><strong>{{ $total['descripcion'] }}</strong></td>
                            <td><strong>{{ $total['postulantes'] }}</strong></td>
                            <td><strong>{{ $total['evaluados'] }}</strong></td>
                            <td><strong>{{ $total['ausentes'] }}</strong></td>
                            <td><strong>{{ $total['total'] }}</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
