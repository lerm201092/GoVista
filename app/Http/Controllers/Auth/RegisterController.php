<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Str;

use Mail;
use App\Mail\SendMailableVerifyUser;

use App\Area;
use App\User;
use App\User_empresa;

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
	
	// Constantes
	public $rolUser;
	public $perfil;
	public $tipo_documento;
	public $areas_munic;
    public $areas_dpto;
	public $entidades_eps;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
		$this->perfil = Config::get('constantes.perfil');
		$this->tipo_documento = Config::get('constantes.tipo_documento');		
    }
	
	/**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
		$listaEmpresas = self::getListaEmpresas();
		global $areas_munic, $areas_dpto;
        self::queryAreas(0);
		$entidades_eps = self::queryEntidades();
        return view('auth.register')
			   ->with('perfil', $this->perfil)
			   ->with('tipo_documento', $this->tipo_documento)
			   ->with('areas_munic', $areas_munic)
               ->with('areas_dpto', $areas_dpto)
			   ->with('listaEmpresas', $listaEmpresas)
			   ->with('entidades_eps', $entidades_eps);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:50|unique:users',
			'numdoc' => 'required|numeric',
			'nombre1' => 'required|string|max:100',
			'apellido1' => 'required|string|max:100',
			'birthdate' => 'required|date|date_format:Y-m-d',
            'email' => 'required|string|email|max:254',
			'movil' => 'required|numeric',
			'password' => 'required|min:3|max:20'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {		
	
		$perfil = $data['perfil'];
		$TermsPrivacy = $data['TermsPrivacy'];
		$TipoPerfil = "";
		
        // Check user role
        switch ($perfil) {
            case 1: // Oftalmólogo
                $rolUser = 3; // Medico
				$TipoPerfil = "Oftalmólogo";
                break;
            case 2: // Optómetra
                $rolUser = 3; // Medico
				$TipoPerfil = "Optómetra";
                break;
            case 3: // Psicoterapeuta
                $rolUser = 3; // Medico
				$TipoPerfil = "Psicoterapeuta";
                break;
            case 4: // Centro Medico
                $rolUser = 2; // Admon. Medico
				$TipoPerfil = "Centro Medico";
                break;
			case 5: // Paciente
                $rolUser = 4; // Paciente
				$TipoPerfil = "Paciente";
                break;
			case 6: // Adulto Responsable
                $rolUser = 4; // Paciente
				$TipoPerfil = "Adulto Responsable";
                break;
            default:
                $rolUser = 0;
				$TipoPerfil = "Ninguno";
                break;
        }
	  	
        $userRegister = User::create([
	        'email' => $data['email'],
            'username' => $data['username'],            
            'password' => bcrypt($data['password']),
			'nombres' => $data['nombre1']." ".$data['nombre2'],
			'apellidos' => $data['apellido1']." ".$data['apellido2'],
			'tipodoc' => $data['tipodoc'],			
			'numdoc' => $data['numdoc'],			
			'address' => $data['address'],
			'roluser' => $rolUser,
			'movil' => $data['movil'],
			'token' => bcrypt(md5(uniqid(rand(), true))),
			'id_area' => $data['id_area'],			
			'estado' => 'IN'
        ]);	
		
		$idCurrent = $userRegister->id; // Get current user id (the users and empresas relationship is established)	
		DB::insert('insert into user_empresas (id_user, id_empresa, state) values (?, ?, ?)', [$idCurrent, $data['empresa'], 'AC']);
		
		if ($rolUser == 4) { // Paciente
			DB::insert('insert into patients (name1,name2,surname1,surname2,tipodoc,numdoc,carnet,email,birthdate,sex,id_eps,address,id_area,id_empresa,id_user,state) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
			[$data['nombre1'],
			($data['nombre2']!=null)?$data['nombre2']:'',  
			$data['apellido1'],
			($data['apellido2']!=null)?$data['apellido2']:'',
			$data['tipodoc'],
			$data['numdoc'],
			$data['carnet'],
			$data['email'],
			$data['birthdate'],
			$data['sexo'],
			$data['eps'],
			$data['address'],
			$data['id_area'],
			$data['empresa'],
			$idCurrent,
			'AC'
			]);
		}
		
		if ($rolUser == 3) { // Medico		
		    DB::insert('insert into medicos (name,address,specialty,phone,email,id_empresa,id_area,id_user,estado) values (?,?,?,?,?,?,?,?,?)', 
			[$data['nombre1']." ".$data['apellido1'],    
			$data['address'],
			$TipoPerfil, 
			$data['movil'],
			$data['email'],
			$data['empresa'],
			$data['id_area'],
			$idCurrent,
			'AC'
			]);
		}
													
        $tokenReset = md5(Str::random(60));	 
		DB::table('activation_links')->where('userid', '=', $data['username'])->delete();
		$dateTime = time();
		DB::table('activation_links')->insert([
                   'userid' => $data['username'],
                   'token' => $tokenReset
                ]);
        Mail::to( $data['email'] )->send(new SendMailableVerifyUser($tokenReset));		
		
		return $userRegister;
		
    }
	
	public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));        
        // $this->guard()->login($user); // Despues de registrarse hace un autologin (No permitido, ya que se envia link de activacion a email)
        //return $this->registered($request, $user)
                        //?: redirect($this->redirectPath());
		 return view('ready')->with('email', $request['email']);
    }
	
	/**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
	
	public function queryAreas($id)
    {
        global $areas_munic, $areas_dpto;
        $padre_dpto = DB::select('select padre from centrosmedicos e left join areas a on e.id_area=a.id where e.id = ? ', [$id]);
        $id_padre = 3;
        if (!empty($padre_dpto)) {
            $id_padre = $padre_dpto['0']->padre;
        }
        $areas_munic = DB::table('areas')
            ->select('id', 'nomarea')
            ->where('id_tipo', 3)
            ->where('padre', $id_padre)
            ->get();
        $areas_munic = $areas_munic->pluck('nomarea', 'id');
        $areas_dpto = DB::select('select id,nomarea,id_dpto from areas a ' .
            'left join (select padre id_dpto from centrosmedicos e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }
	
	public function findAreas(Request $request)
    {
        $id = $request->get('id');
        $data = Area::select('nomarea', 'id')
            ->where('padre', $id)
            ->orderBy('nomarea')->get();
        return response()->json($data);//then sent this data to ajax success
    }
	
	public function getListaEmpresas()
    {     
        $listaEmpresas = DB::table('empresas')
            ->select('id', 'nombre')
            ->where('estado', '=', "AC")
            ->get();
		$listaEmpresas = $listaEmpresas->pluck('nombre', 'id');
        return $listaEmpresas;
    }
	
	public function queryEntidades()
    {
        $listaEPS = DB::select('select c.id, c.code, c.name from entidades c where c.estado = ? order by c.regimen,c.name ', ['AC']);
        $row = array();
        foreach ($listaEPS as $ent_sel) {
            $row[$ent_sel->id] = ucwords(mb_strtolower($ent_sel->name)) . ' (' . $ent_sel->code . ')';
        }
        return $row;
    }
	
}
