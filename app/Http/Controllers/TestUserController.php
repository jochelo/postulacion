<?php

namespace App\Http\Controllers;

use App\RespuestaUser;
use App\TestUser;
use App\User;
use Illuminate\Http\Request;

class TestUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function resumen() {
        $test_users_ids = TestUser::where('nota', '=', 0)->where('created_at', '>', '2020-01-12 10:00:00')->pluck('user_id');

        /*
         * postulantes con error antes de las 10am
         * */
        $postulantes_con_error = [];
        $postulantes_con_error_count = 0;
        $test_users_ids_lt10 = TestUser::where('created_at', '<=', '2020-01-12 10:00:00')->pluck('test_user_id');
        foreach ($test_users_ids_lt10 as $test_user_id) {
            $cantidad = RespuestaUser::where('test_user_id', $test_user_id)->count();
            if ($cantidad < 10) {
                $postulantes_con_error_count++;
                $user_id = TestUser::find($test_user_id)->user_id;
                $user_data = User::find($user_id);
                array_push($postulantes_con_error, $user_data);
            }
        }
        /*
         * postulantes que no siguieron las instrucciones despues de las 10am
         * */
        $postulantes_no_siguieron = [];
        $postulantes_no_siguieron_count = 0;
        $test_users_ids_gt10 = TestUser::where('created_at', '>', '2020-01-12 10:00:00')->pluck('test_user_id');
        foreach ($test_users_ids_gt10 as $test_user_id) {
            $cantidad = RespuestaUser::where('test_user_id', $test_user_id)->count();
            if ($cantidad < 10) {
                $postulantes_no_siguieron_count++;
                $user_id = TestUser::find($test_user_id)->user_id;
                array_push($postulantes_no_siguieron, User::find($user_id));
            }
        }



        $data = [
            'total' => TestUser::count(),
            'aprobados' => TestUser::where('nota', '>', 50)->count(),
            'reprobados' => TestUser::where('nota', '<=', 50)->count(),
            'con_nota_cero' => TestUser::where('nota', '=', 0)->count(),
            'con_problemas_sistema' => $postulantes_con_error_count,
            'no_siguio_instrucciones' => $postulantes_no_siguieron_count,
        ];
        return view('test-user/resumen', [
            'resumen' => $data,
            'postulantes_no_siguieron_instrucciones' => $postulantes_no_siguieron,
            'postulantes_con_problemas_sistema' => $postulantes_con_error
        ]);
    }


    public function limpiarErrores() {
        /*
         * postulantes con error antes de las 10am
         * */
        $test_users_error = [];
        $test_users_ids_lt10 = TestUser::where('created_at', '<=', '2020-01-12 10:00:00')->pluck('test_user_id');
        foreach ($test_users_ids_lt10 as $test_user_id) {
            $cantidad = RespuestaUser::where('test_user_id', $test_user_id)->count();
            if ($cantidad < 10) {
                array_push($test_users_error, $test_user_id);
            }
        }

        foreach ($test_users_error as $error_id) {
            TestUser::destroy($error_id);
            RespuestaUser::where('test_user_id', $error_id)->delete();
        }

        return response()->json('Limpieza de errores en tests', 200);

    }

}
