<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Empresa;
use App\User_empresa;
use App\User;

use Illuminate\Http\Request;
use Session;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	/**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function authenticated()
    {
        $role = Auth::user()->roluser;
        // Check user role
        /* switch ($role) {
            case 1:
                return redirect('/modulos/empresas');
				//return redirect('/summary');
                break;
            case 2:
                return redirect('/modulos/patients');
				//return redirect('/summary');
                break;
            case 3:
                return redirect('/modulos/patients');
				//return redirect('/summary');
                break;
            case 4:
                return redirect('/modulos/history_exercises');
				//return redirect('/summary');
                break;
            default:
                return redirect('/home');
                break;
        }
        */
        return redirect('/summary');
    }
	
	 /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
			'companies' => 'required|string',
        ]);
    }
	
	/**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
	public function credentials(Request $request)
    {
      return ['username' => $request->{$this->username()}, 'password' => $request->password, 'estado' => 'AC'];
    }
	
	/**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function sendLoginResponse(Request $request)
    {        
	
        $company = $request->get('companies');
        $request->session()->put('id_empresa', $company);
		$id_empresa_nombre = Empresa::select('nombre')->where('id', '=', Session::get('id_empresa'))->first();		
		$request->session()->put('id_empresa_nombre', $id_empresa_nombre->nombre);

        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectPath());
    }
	
	/**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
	public function username()
    {
        return 'username';
    }
	
}
