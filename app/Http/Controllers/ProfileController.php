<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Auth;

use App\Patient;
use App\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
	
	public $menu_bar;
	
    public function __construct()
    {
        $this->middleware('auth');
		$this->menu_bar = Config::get('constantes.sidebar_medico');
    }

    public function index()
    {
        $id_paciente = self::idPaciente();
        return view('profile')
		->with('menu_bar', $this->menu_bar)
        ->with('id_paciente', $id_paciente);
    }

    public function updateProfile(Request $request)
    {  
        // Get current user
        $user = User::findOrFail(auth()->user()->id);
        // Set fields     
		$user->address   = $request->input('address');
		$user->movil     = $request->input('movil');
        // Get image file
        $image = $request->file('profile_image');
		if ($image != null) {
		$ext = $image->getClientOriginalExtension();
		$MIME_types = "";	
		if (strpos($ext, 'jpeg') !== false | strpos($ext, 'jpg') !== false) { $MIME_types = "image/jpeg"; }
		if (strpos($ext, 'png') !== false) { $MIME_types = "image/png"; }
		if (strpos($ext, 'gif') !== false) { $MIME_types = "image/gif"; }
		$base64_image = "data:".$MIME_types.";base64,".base64_encode(file_get_contents($image));
        $user->profile_image = $base64_image;  
	}		
        $user->save();
        // Return user back and show a flash message
        return redirect()->back()->with(['status' => 'El perfil ha sido actualizado.'])->with('menu_bar', $this->menu_bar);
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
