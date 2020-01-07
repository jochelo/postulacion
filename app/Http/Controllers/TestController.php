<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Nivel;
use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
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
        $tests=Test::get();
        return view('test.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles=Nivel::get();
        $cargos=Cargo::get();
        return view('test.create',compact('niveles','cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test=$request->all();
        if(isset($test['activo']))
            $test['activo']=true;
        else
            $test['activo']=false;
        Test::create($test);
        return redirect('tests/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test=Test::find($id);
        return view('test.show',compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test=Test::find($id);
        return view('test.edit',compact('test'));
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
        $test=Test::find($id);
        $datos=$request->all();
        if(isset($test['activo']))
            $datos['activo']=true;
        else
            $datos['activo']=false;
        $test->update($datos);
        return redirect('tests/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test=Test::find($id);
        $test->delete();
        return redirect('tests/');
    }
}
