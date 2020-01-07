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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
    public function registrar(Request $request)
    {
        $usuario= $request->all();
        //dd($usuario);

        $nivel_bajo=Nivel::where('nivel_numero','=',0)->first();

        $img = $request->file('credencializacion_fotografia');

        $nomimg = time() . '_' . $img->getClientOriginalName();
        Storage::disk('s3')->put('postulacion/imgUsr/'.$nomimg, file_get_contents($img->getRealPath()),'public');

        $usuario['credencializacion_fotografia']=env('AWS_URL').'/postulacion/imgUsr/'.$nomimg;
        $usuario['nivel_id'] = $nivel_bajo['nivel_id'];
        $usuario['password'] = Hash::make($usuario['numero_carnet']);
        if(!isset($usuario['numero_libreta_militar']))
            unset($usuario['numero_libreta_militar']);
        User::create($usuario);
        return back();
    }
}
