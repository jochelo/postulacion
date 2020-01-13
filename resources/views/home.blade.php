@extends('layouts.front')

@section('content')
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="offset-3 col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>DOCUMENTO DE CONSTANCIA DE REGISTRO DE POSTULACION</h4>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{ url('reporte/solicitud') }}" target="_blank" class="btn btn-primary"><i
                                    class="	fas fa-download fa-sm text-white-50"></i> DESCARGAR REGISTRO DE POSTULACION</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        @if(isset($testUser))
            <div class="row">
                <div class="offset-3 col-lg-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>DOCUMENTO DE CONSTANCIA DE EVALUACION</h4>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{ url('reporte/test-aprobado') }}" target="_blank" class="btn btn-primary"><i
                                        class="	fas fa-download fa-sm text-white-50"></i> DESCARGAR EVALUACION</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
