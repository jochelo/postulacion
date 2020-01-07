@extends('layouts.front')
@section('content')
    <div class="col-lg-6 offset-md-2">
        <div class="card">
            <div class="card-header">
                <strong>Datos</strong> Test
            </div>
            {!! Form::model($test,['url' => ['/tests',$test->test_id], 'method' => 'PATCH','encrypt'=>'multipart/form-data','class' => 'form-horizontal','files' => true]) !!}
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::hidden('nivel_id',null, ['id'=>'nivel_id','class'=>'form-control','disabled' ]) !!}
                        </div>
                    </div>
                    {{--cargo_id--}}
                    <div class="row form-group">
                        <div class="col col-md-3">

                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::hidden('cargo_id',null, ['id'=>'cargo_id','class'=>'form-control','disabled' ]) !!}
                        </div>
                    </div>
                    {{--titulo--}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="titulo" class=" form-control-label">Titulo</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('titulo',null, ['id'=>'titulo','class'=>'form-control'] ) !!}

                            @error('titulo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{--descripcion--}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="descripcion" class=" form-control-label">Descripcion</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('descripcion',null, ['id'=>'descripcion','class'=>'form-control'] ) !!}

                            @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{--num_preguntas--}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="num_preguntas" class=" form-control-label">No. Preguntas</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('num_preguntas',null, ['id'=>'num_preguntas','class'=>'form-control'] ) !!}

                            @error('num_preguntas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group custom-control custom-switch text-center">
                        @if($test->activo)
                            <input type="checkbox" class="custom-control-input" id="activo" name="activo" checked>
                        @else
                            <input type="checkbox" class="custom-control-input" id="activo" name="activo">
                        @endif


                            <label class="custom-control-label" for="activo">Activo</label>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-upload"></i> Actualizar
                            </button>
                            <a href="{{ url('/tests') }}" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection