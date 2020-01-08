<?php

namespace App\Http\Controllers\Auth;

use App\Cargo;
use App\Http\Controllers\Controller;
use App\Nivel;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $cargos = Cargo::where('cargo_descripcion', '<>', 'Administrador')
            ->orderBy('cargo_descripcion')
            ->get();
        return view('auth.register', ['cargos' => $cargos]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'disponibilidad'=>['required'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {

    }
    protected function validar(Request $request){
        $this->validate($request,[
            'nombres' => ['required', 'string', 'max:191'],
            'apellido_paterno' => ['required', 'string', 'max:191'],
            'apellido_materno' => ['required', 'string', 'max:191'],
            'numero_carnet' => ['required', 'numeric', 'max:10000000000'],
            'expedicion' => ['required', 'string', 'max:25'],
            'foto_carnet' => ['required', 'image'],
            'lugar' => ['required', 'string', 'max:191'],
            'direccion' => ['required', 'string', 'max:191'],
            'telefono_celular' => ['required', 'numeric', 'max:1000000000000'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'academico_gestion' => ['required', 'numeric', 'max:10000'],
            'academico_institucion' => ['required', 'string', 'max:191'],
            'academico_titulo' => ['required', 'string', 'max:191'],
            'disponibilidad'=>['required'],
            'credencializacion_fotografia' => ['required', 'image'],
        ]);
    }
    public function registrar(Request $request)
    {
        $this->validar($request);
        $usuario= $request->all();
        //dd($usuario);

        $nivel_bajo=Nivel::where('nivel_numero','=',0)->first();

        $img = $request->file('credencializacion_fotografia');
        $nomimg = time() . '_' . $img->getClientOriginalName();
        Storage::disk('s3')->put('postulacion/imgUsr/'.$nomimg, file_get_contents($img->getRealPath()));

        $imgC = $request->file('foto_carnet');
        $nomcar = time() . '_' . $imgC->getClientOriginalName();
        Storage::disk('s3')->put('postulacion/carnetUsr/'.$nomcar, file_get_contents($imgC->getRealPath()));

        if(isset($request->foto_militar)) {
            $imgM = $request->file('foto_militar');
            $nomMil = time() . '_' . $imgM->getClientOriginalName();
            Storage::disk('s3')->put('postulacion/libretaMilUsr/' . $nomMil, file_get_contents($imgM->getRealPath()),);
            $usuario['foto_militar']=env('AWS_URL').'postulacion/libretaMilUsr/'.$nomimg;
        }
        $usuario['foto_carnet']=env('AWS_URL').'postulacion/carnetUsr/'.$nomimg;
        $usuario['credencializacion_fotografia']=env('AWS_URL').'postulacion/imgUsr/'.$nomimg;
        $usuario['nivel_id'] = $nivel_bajo['nivel_id'];
        $usuario['password'] = Hash::make($usuario['numero_carnet']);
        if(!isset($usuario['numero_libreta_militar']))
            unset($usuario['numero_libreta_militar']);
        if(isset($usuario['disponibilidad']))
            $usuario['disponibilidad']=true;
        User::create($usuario);
        return redirect('login/');
    }
}
