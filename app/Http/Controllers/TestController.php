<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Nivel;
use App\Pregunta;
use App\Respuesta;
use App\RespuestaUser;
use App\Test;
use App\TestUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        Test::create($test);
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

    public function preguntasTestGet()
    {
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
        if ($state === null) {
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
                    'correcto' => Respuesta::where('pregunta_id', $request->input('pregunta_id'))->count() === 0 ? true : false
                ];
                Respuesta::create($data);
                $state = 'list-respuestas';
            }
            if ($state === 'create-pregunta') {
                $data = [
                    'pregunta_titulo' => $request->input('pregunta_titulo'),
                    'test_id' => $test_id,
                ];
                Pregunta::create($data);
                $state = 'list';
                $preguntas = Pregunta::where('test_id', $test['test_id'])->get();
                return view('pregunta.index', [
                    'tests' => $tests,
                    'test_id' => $test['test_id'],
                    'preguntas' => $preguntas,
                    'state' => $state,
                    'pregunta' => null
                ]);
            }
            if ($state === 'destroy-pregunta') {
                Pregunta::destroy($request->input('pregunta_id'));
                $state = 'list';
                $preguntas = Pregunta::where('test_id', $test['test_id'])->get();
                return view('pregunta.index', [
                    'tests' => $tests,
                    'test_id' => $test['test_id'],
                    'preguntas' => $preguntas,
                    'state' => $state,
                    'pregunta' => null
                ]);
            }

            if ($state === 'destroy-respuesta') {
                Respuesta::destroy($request->input('respuesta_id'));
                $state = 'list-respuestas';
                $preguntas = Pregunta::where('test_id', $test['test_id'])->get();
            }

            if ($state === 'set-respuesta-correcta') {
                Respuesta::where('pregunta_id', $request->input('pregunta_id'))->update([
                    'correcto' => false
                ]);
                Respuesta::find($request->input('respuesta_id'))->update([
                    'correcto' => true
                ]);
                $state = 'list-respuestas';
                $preguntas = Pregunta::where('test_id', $test['test_id'])->get();
            }
            $preguntas = Pregunta::where('test_id', $test['test_id'])->get();
            $pregunta = Pregunta::find(json_decode($request->input('pregunta'), true)['pregunta_id']);

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

    public function evaluacionOnline()
    {
        return view('test.evaluacion-online');
    }

    public function getTestInit() {
        return back();
    }

    public function testInit()
    {
        $state = 'listInit';
        $request = request()->all();
        if (isset($request['state'])) {
            $state = $request['state'];
        }

        if ($state === 'listInit') {
            $user = Auth::user();
            $test = Test::where('nivel_id', $user['nivel_id'])->first();
            $testUser = TestUser::where('user_id', $user->user_id)->where('test_id', $test->test_id)->first();
            if (!isset($testUser)) {
                $preguntas = Pregunta::where('test_id', $test['test_id'])->orderByRaw('rand()')->take($test->num_preguntas)->get();
                $item = 0;
                $pregunta = $preguntas[$item];
                //dd($preguntas);
                $state = 'testInit';
                $date=Carbon::now();
                //$date=Carbon::parse($date);
                //dd($date);
            }
            else{
                $state = 'finTest';
                $item=$test->num_preguntas+2;
                $test=$testUser->nota;
                $pregunta=null;
                $preguntas=null;
                $date=null;
            }
        }

        if ($state == 'createRespuestaUser') {
            $date=Carbon::parse($request['datenow']);
            //dd($date);
            $tiempoTope=Carbon::now()->subMinutes(15);

            $preguntas = json_decode($request['preguntas'], true);
            $item = $request['item'] + 1;
            $test = Test::find($preguntas[0]['test_id']);
            //dd($request->input('datenow'));
            if($date>=$tiempoTope) {
                //siguiente pregunta
                if ($item < $test->num_preguntas)
                    $pregunta = $preguntas[$item];

                //si estamos en la ultima pregunta
                if ($item <= $test->num_preguntas) {
                    //dd($preguntas);
                    $state = 'testInit';

                    //crear nuevo testUser(una sola vez)---user_id,test_id unicos
                    $testUser = TestUser::where('user_id', Auth::user()['user_id'])
                        ->where('test_id', $test->test_id)
                        ->first();
                    if (!isset($testUser)) {
                        $nivel = Nivel::find($test->nivel_id);
                        TestUser::create([
                            'nota' => 0,
                            'user_id' => Auth::user()['user_id'],
                            'test_id' => $test->test_id,
                            'nivel_id' => $nivel->nivel_id,
                        ]);
                    }
                    $testUser = TestUser::where('user_id', Auth::user()['user_id'])
                        ->where('test_id', $test->test_id)
                        ->first();
                    $respuesta = Respuesta::find($request['respuesta_id']);

                    ///Crea respuesta una sola vez,(respuesta_id,test_user_id) unicas
                    $respuestaUser = RespuestaUser::where('respuesta_id', $respuesta->respuesta_id)
                        ->where('test_user_id', $testUser->test_user_id)
                        ->first();
                    if (!isset($respuestaUser)) {
                        RespuestaUser::create([
                            'test_user_id' => $testUser->test_user_id,
                            'respuesta_id' => $respuesta->respuesta_id,
                            'correcto' => $respuesta->correcto ? 1 : 0
                        ]);
                    }
                }
                if ($item >= $test->num_preguntas) {
                    $state = 'finTest';
                    $testUser = TestUser::where('user_id', Auth::user()['user_id'])
                        ->where('test_id', $preguntas[0]['test_id'])
                        ->first();
                    //dd($testUser);
                    $respuestasUser = RespuestaUser::where('test_user_id', $testUser->test_user_id)->get();

                    //calcular nota final
                    $ponderacion = 100 / $test->num_preguntas;
                    $notaf = 0;
                    foreach ($respuestasUser as $respuestaUser) {
                        if ($respuestaUser->correcto)
                            $notaf += $ponderacion;
                    }
                    $testUser->nota = $notaf;
                    $testUser->save();
                    $pregunta = null;
                    $test = $notaf;
                }
            }else{
                //tiempo agotado
                $state = 'finTest';
                $testUser = TestUser::where('user_id', Auth::user()['user_id'])
                    ->where('test_id', $test->test_id)
                    ->first();
                while(isset($preguntas[$item-1])){
                    $respuestaErr=Respuesta::where('pregunta_id',$preguntas[$item-1]['pregunta_id'])
                        ->where('correcto',false)->first();
                    RespuestaUser::create([
                        'test_user_id' => $testUser->test_user_id,
                        'respuesta_id' => $respuestaErr->respuesta_id,
                        'correcto' => $respuestaErr->correcto ? 1 : 0
                    ]);
                    $item++;
                }
                //calcular nota final
                $respuestasUser = RespuestaUser::where('test_user_id', $testUser->test_user_id)->get();
                $ponderacion = 100 / $test->num_preguntas;
                $notaf = 0;
                foreach ($respuestasUser as $respuestaUser) {
                    if ($respuestaUser->correcto)
                        $notaf += $ponderacion;
                }
                $testUser->nota = $notaf;
                $testUser->save();
                $pregunta = null;
                $test = $notaf;
            }
            $preguntas = (object)$preguntas;
        }
        return view('test.show-test-init', [
            'preguntas' => json_encode($preguntas),
            'pregunta' => $pregunta,
            'test' => $test,
            'item' => $item,
            'state' => $state,
            'preguntasRandom' => $preguntas,
            'datenow' =>$date!=null?$date->toDateTimeString():null
        ]);
    }
}
