<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Nivel;
use App\Pregunta;
use App\Respuesta;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
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
        $tests = Test::get();
        return view('test.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $niveles = Nivel::get();
        $cargos = Cargo::get();
        return view('test.create', compact('niveles', 'cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $test = $request->all();
        if (isset($test['activo'])) {
            $test['activo'] = true;
        } else {
            $test['activo'] = false;
        }
        return redirect('tests/');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $test = Test::find($id);
        return view('test.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $test = Test::find($id);
        return view('test.edit', compact('test'));
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
        $test = Test::find($id);
        $datos = $request->all();
        if (isset($test['activo']))
            $datos['activo'] = true;
        else
            $datos['activo'] = false;
        $test->update($datos);
        return redirect('tests/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $test = Test::find($id);
        $test->delete();
        return redirect('tests/');
    }

    public function preguntasTestGet() {
        $testCount = Test::count();
        if ($testCount > 0) {
            $test_id = Test::first()->test_id;
            $test = Test::find($test_id);
            $tests = Test::get();
            $preguntas = Pregunta::where('test_id', $test['test_id'])->get();
            return view('pregunta.index', [
                'tests' => $tests,
                'test_id' => $test['test_id'],
                'preguntas' => $preguntas,
                'state' => 'list',
                'pregunta' => null
            ]);
        } else {
            return view('pregunta.index', [
                'tests' => null,
                'test_id' => null,
                'preguntas' => null,
                'state' => 'list',
                'pregunta' => null
            ]);
        }
    }
    public function preguntasTest(Request $request)
    {
        $pregunta = null;
        $state = $request->input('state');
        if($state === null){
            $state = 'list';
        }
        $testCount = Test::count();
        if ($testCount > 0) {
            $test_id = (int)$request->input('test_id');
            if ($test_id === 0) {
                $test_id = Test::first()->test_id;
            }
            $test = Test::find($test_id);
            $tests = Test::get();
            if ($state === 'create-respuesta') {
                $data = [
                    'respuesta_descripcion' => $request->input('respuesta_descripcion'),
                    'pregunta_id' => $request->input('pregunta_id'),
                    'correcto' => Respuesta::where('pregunta_id', $request->input('pregunta_id'))->count() === 0 ? true: false
                ];
                Respuesta::create($data);
                $state = 'list-respuestas';
            }
            $pregunta = Pregunta::find(json_decode($request->input('pregunta'), true)['pregunta_id']);
            $preguntas = Pregunta::where('test_id', $test['test_id'])->get();

            return view('pregunta.index', [
                'tests' => $tests,
                'test_id' => $test['test_id'],
                'preguntas' => $preguntas,
                'state' => $state,
                'pregunta' => $pregunta
            ]);
        } else {
            return view('pregunta.index', [
                'tests' => null,
                'test_id' => null,
                'preguntas' => null,
                'state' => $state,
                'pregunta' => $pregunta
            ]);
        }
    }
}
