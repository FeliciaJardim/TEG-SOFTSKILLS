<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Solicitud;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    public function redirectTo(){
        //esta función toma el tipo de usuario y redirecciona a la ruta adecuada
        //luego de iniciar sesión
        $tipoUser = Auth::user()->tipo_usu;

        //consigo las solicitudes
        $solicitudes = Solicitud::all();

        switch($tipoUser){
            case 'investigador':            
                return '/investigacion';
            break;
            case 'asesor':
                return '/asesorias';
            break;
            case 'cliente':
                return '/escritoriocliente';
                //return view('asesoria.escritoriocliente')->with('solicitudes',$solicitudes);
            break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
