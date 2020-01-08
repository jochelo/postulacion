@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn-plus btn btn-primary " href="{{ route("tests.create") }}"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Lista de <strong>Tests</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="table table-striped table-responsive-md">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Activo</th>
                                    <th scope="col">No. Preguntas</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tests as $test)
                                    <tr>
                                        <td>{{$test->titulo}}</td>
                                        <td>{{$test->descripcion}}</td>
                                        @if($test->activo)
                                            <td class="text-success">{{'Activo'}}</td>
                                        @else
                                            <td class="text-danger">{{'Inactivo'}}</td>
                                        @endif
                                        <td>{{$test->num_preguntas}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-border-none btn-sm btn-outline-success "
                                                   href="{{ url('tests/'.$test->test_id.'/edit') }}"
                                                   data-toggle="tooltip"
                                                   data-placement="top" title="Editar">
                                                    <span class="fa fa-pencil-alt"></span>
                                                </a>
                                                <form class="float-right"
                                                      action="{{ route('tests.destroy',$test->test_id)}}" method="POST"
                                                      onclick="return confirm('Estas seguro de que desea eliminar?')">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit"
                                                            class="btn btn-border-none btn-sm btn-outline-danger">
                                                        <span class="fa fa-trash"></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
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
