<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Config;

use App\Patient;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
	
	public $menu_bar;
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
		$this->menu_bar = Config::get('constantes.sidebar_medico');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile',compact('user',$user));
    }
	
	// change password (showChangePasswordForm)
	public function showChangePasswordForm(){
        $id_paciente = self::idPaciente();
        return view('auth.changepassword')->with('menu_bar', $this->menu_bar)->with('id_paciente', $id_paciente);
    }	
	
	// change password (changePassword)
    public function changePassword(Request $request){
		$changePasswd = false;
        if (!(\Hash::check($request->get('current-password'), Auth::user()->password))) {
            $changePasswd = false;			
            return redirect()->back()->with("flash_message","Su contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.");
        } else {
			$changePasswd = true;
		}
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) { 
            $changePasswd = false;		
            return redirect()->back()->with("flash_message","La nueva contraseña no puede ser la misma que su contraseña actual. Por favor, elija una contraseña diferente.");
        } 
		if(strcmp($request->get('new-password'), $request->get('new-password-confirm')) == -1) {
			$changePasswd = false;
            return redirect()->back()->with("flash_message","Por favor su contraseña debe coincidir."); 
		}			
		if ($changePasswd) {
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
		$user->setRememberToken(Str::random(60));
        $user->save();
        return redirect()->back()->with("success","La contraseña ha sido actualizada.");
		}		
    }

    public function idPaciente()
    {
        $this->id_user = Auth::user()->id;
        $data = Patient::select('id')
            ->where('id_user', '=', $this->id_user)->get();

        if($data->count()==0){
            return 0;
        }else{
            return $data[0]->id;
        }
    }
	
}
