@extends('layouts.front')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Imprima este reporte, firme y entregue en oficinas de SERECI ORURO</h1>
            <a href="{{ url('reporte/solicitud') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte de Postulacion</a>
        </div>
    </div>
@endsection
