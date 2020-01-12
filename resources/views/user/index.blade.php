@extends('layouts.front')
@section('content')
    <div class="container">
        <!--<a class="btn-plus btn btn-primary " href="{{ route("users.create") }}"><i class="fa fa-plus"></i></a>-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <h3 class="col-md-6">Lista de <strong>Postulantes</strong></h3>
                        {{-- <input class="form-control col-md-6" id="s-postulantes" type="text" placeholder="Buscar.."> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Postulante</th>
                                    <th scope="col">Correo Electrónico</th>
                                    <th scope="col">Carnet</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Grado Academico</th>
                                    <th scope="col">Titulo Academico</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody id="t-body">
                                @foreach($users as $user)
                                    <tr class="r-body">
                                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->index + 1 }}</td>
                                        <td>
                                            <img src="{{$user->credencializacion_fotografia}}" height="125">
                                        </td>
                                        <td>{{$user->cargo_descripcion}}</td>
                                        <td>{{$user->nombres.' '.$user->apellido_paterno.' '.$user->apellido_materno}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->numero_carnet}}</td>
                                        <td>{{$user->telefono_celular}}</td>
                                        <td>{{$user->academico_grado}}</td>
                                        <td>{{$user->academico_titulo}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <!--<a class="btn btn-border-none btn-sm btn-outline-success "
                                               href="{{ url('users/'.$user->user_id.'/edit') }}"
                                               data-toggle="tooltip"
                                               data-placement="top" title="Editar">
                                                <span class="fa fa-pencil-alt"></span>
                                            </a>-->
                                            <form class="float-right"
                                                  action="{{ route('users.destroy',$user->user_id)}}" method="POST"
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
                        <br>
                        <div class="row">
                            <div class="offset-md-3 col-lg-6 text-center">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#s-postulantes").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".card-body .r-body").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection