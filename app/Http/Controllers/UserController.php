<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\TestUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {

        $users = User::where('es_admin', '=', false)->orderBy('user_id', 'asc')->paginate(100);
        // dd($users);
        return view('user.index', compact('users'));
    }

    public function resultados()
    {
        $request = request()->all();
        $cargo_id = 0;
        $test_users = null;
        if (isset($request['cargo_id'])) {
            $cargo_id = $request['cargo_id'];
        }

        if ($cargo_id == '0' || $cargo_id == 0) {
            $test_users = TestUser::orderBy('nota', 'desc')->get();
        } else {
            $user_ids = User::where('cargo_id', $cargo_id)->pluck('user_id');
            $test_users = TestUser::whereIn('user_id', $user_ids)
                ->orderBy('nota', 'desc')->get();
        }
        $cargos = Cargo::where('cargo_id', '<>', 1)->get();

        return view('resultados.resultados', [
            'cargos' => $cargos,
            'cargo_id' => $cargo_id,
            'test_users' => $test_users
        ]);
    }

    public function resultadosCSV()
    {
        $request = request()->all();
        $cargo_id = 0;
        $test_users = null;
        if (isset($request['cargo_id'])) {
            $cargo_id = $request['cargo_id'];
        }

        if ($cargo_id == '0' || $cargo_id == 0) {
            $test_users = TestUser::orderBy('nota', 'desc')->get();
        } else {
            $user_ids = User::where('cargo_id', $cargo_id)->pluck('user_id');
            $test_users = TestUser::whereIn('user_id', $user_ids)
                ->orderBy('nota', 'desc')->get();
        }
        $contenido = "N., Inicio de Evaluacion, Fin de Evaluacion, Postulante, Sexo, Cedula de Identidad, Fecha Nacimiento, Lugar, Celular, Correo Electronico, Numero Libreta Militar, Grado Academico, Gestion Academica, Institucion Academica, Titulo Academico, Cargo, Nota\n";
        $count = 0;
        foreach ($test_users as $test_user) {
            $count++;
            $contenido .= "{$count}, {$test_user['created_at']}, {$test_user['updated_at']}, {$test_user['user']['apellido_paterno']} {$test_user['user']['apellido_materno']} {$test_user['user']['nombres']}, {$test_user['user']['sexo']}, {$test_user['user']['numero_carnet']}, {$test_user['user']['fecha_nacimiento']}, {$test_user['user']['lugar']}, {$test_user['user']['telefono_celular']}, {$test_user['user']['email']}, {$test_user['user']['numero_libreta_militar']}, {$test_user['user']['academico_grado']}, {$test_user['user']['academico_gestion']}, {$test_user['user']['academico_institucion']}, {$test_user['user']['academico_titulo']}, {$test_user['user']['cargo_descripcion']}, {$test_user['nota']}\n";
        }
        $cargo = null;
        if ($cargo_id == 0) {
            $cargo = 'Todos';
        } else {
            $cargo = Cargo::find($cargo_id)->cargo_descripcion;
        }
        Storage::put("{$cargo}.csv", $contenido);
        return \response()->download(storage_path("app/{$cargo}.csv"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('users/');

    }

    public function listaPostulantes()
    {
        $usersRep = User::select('numero_carnet', DB::raw('count(numero_carnet) as total'))
            ->where('es_admin', '=', false)
            ->groupBy('numero_carnet')
            ->having('total', '=', 1)
            ->get();
        $users = User::get();
        $sw = 0;
        foreach ($usersRep as $userR) {
            foreach ($users as $key => $user) {
                if ($user->numero_carnet == $userR->numero_carnet && $sw > 0) {
                    //
                } else {
                    $sw = 0;
                }

            }
        }
        return response()->json($users, 200);
    }

    public function resumenCargo()
    {

        $resumenes = [];
        $cargos = Cargo::where('cargo_id', '<>', 1)->get();
        $total = [
            'descripcion' => 'Total',
            'postulantes' => 0,
            'evaluados' => 0,
            'ausentes' => 0,
            'total' => 0,
        ];
        foreach ($cargos as $cargo) {
            $cantidad_postulantes = User::where('cargo_id', $cargo['cargo_id'])->count();
            $users_ids = User::where('cargo_id', $cargo['cargo_id'])->pluck('user_id');
            $evaluados = TestUser::whereIn('user_id', $users_ids)->count();
            $total['postulantes'] += $cantidad_postulantes;
            $total['evaluados'] += $evaluados;
            $total['ausentes'] += $cantidad_postulantes - $evaluados;
            $total['total'] += $evaluados + ($cantidad_postulantes - $evaluados);
            array_push($resumenes, [
                'cargo' => $cargo['cargo_descripcion'],
                'cantidad_postulantes' => $cantidad_postulantes,
                'evaluados' => $evaluados,
                'ausentes' => $cantidad_postulantes - $evaluados,
                'total' => $evaluados + ($cantidad_postulantes - $evaluados),
            ]);
        }

        return view('resultados.resumen', [
            'resumenes' => $resumenes,
            'total' => $total,
        ]);
    }


}
