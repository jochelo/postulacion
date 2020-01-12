<?php

namespace App\Http\Controllers;

use App\TestUser;
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
        $data = [
            'total' => TestUser::count(),
            'aprobados' => TestUser::where('nota', '>', 50)->count(),
            'reprobados' => TestUser::where('nota', '<=', 50)->count(),
            'con_nota_cero' => TestUser::where('nota', '=', 0)->count(),
            'con_problemas_sistema' => TestUser::where('nota', '=', 0)->where('created_at', '<=', '2020-01-12 10:00:00')->count(),
            'no_siguio_instrucciones' => TestUser::where('nota', '=', 0)->where('created_at', '>', '2020-01-12 10:00:00')->count()
        ];
        return view('test-user/resumen', [
            'resumen' => $data
        ]);
    }

}
