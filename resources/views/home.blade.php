@extends('layouts.front')

@section('content')
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
        	<div class="offset-3 col-lg-6">
        		<div class="card">
        			<div class="card-header text-center">
	            		<h3>Imprima este reporte, firme y entregue en oficinas de SERECI ORURO</h3>
        			</div>
        			<div class="card-body text-center">
            			<a href="{{ url('reporte/solicitud') }}" target="_blank" class="btn btn-primary"><i class="	fas fa-download fa-sm text-white-50"></i> Generar Reporte de Postulación</a>
		        	</div>
        		</div>
    		</div>
        </div>
    </div>
@endsection
