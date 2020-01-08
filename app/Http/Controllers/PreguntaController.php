<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Respuesta;
use App\Test;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PreguntaController extends Controller
{
    protected $testController;
    public function __construct(TestController $testController)
    {
        $this->testController = $testController;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */

    public function index()
    {
/*        $request = new \Illuminate\Http\Request();
        $request->replace(['test_id', Test::first()->test_id]);
        return $this->testController->preguntasTest($request);*/
        $testCount = Test::count();
        if ($testCount > 0) {
            $tests = Test::get();
            $test = Test::first();
            $preguntas = Pregunta::where('test_id', $test['test_id'])->get();
            return view('pregunta.index', [
                'tests' => $tests, 'test_id' => $test['test_id'], 'preguntas' => $preguntas
            ]);
        } else {
            return view('pregunta.index', [
                'tests' => null, 'test_id' => null, 'preguntas' => null
            ]);
        }
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
        $pregunta = Pregunta::create($request->all());
        return response()->json($pregunta, 201);
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
        //
    }

    public function respuestasPregunta($preguntaId)
    {
        $respuestas = Respuesta::where('pregunta_id', $preguntaId)->get();
        return response()->json($respuestas, 200);
    }
}
