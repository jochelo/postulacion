<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\TestUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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

    public function resultados() {
        $request = request()->all();
        $cargo_id = 0;
        $test_users = null;
        if (isset($request['cargo_id'])) {
            $cargo_id = $request['cargo_id'];
        }

        if ($cargo_id === 0) {
            $test_users = TestUser::orderBy('nota', 'desc')->get();
        } else {
            $user_ids = User::where('cargo_id', $cargo_id)->pluck('user_id');
            $test_users = TestUser::whereIn('user_id', $user_ids)
                                    ->orderBy('nota', 'desc')->get();
        }
        $cargos = Cargo::get();
        return view('resultados.resultados', [
            'cargos' => $cargos,
            'cargo_id' => 2,
            'test_users' => $test_users
        ]);
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
}
