<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use DateTime;

use Illuminate\Support\Facades\Auth;

use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
	
	public function showResetForm($token) {
		$existToken = false;
		$query = DB::table('password_resets')->where('token','LIKE',"%$token%")->get();		
		if ($query->count() > 0) { $existToken = true; } 
        else { $existToken = false; }
		if ($existToken == true) {
			return view('auth.passwords.reset');
		} else {
			dd("Error: TokenID ha caducado.");
		}
    }	
	
	public function reset(Request $request) {
        $this->validate($request, [
        'password' => 'required|confirmed'
        ]);
		$email = null;
        $created_at = null;	
		$existEmail = false;
		$emailUser = ($request->exists('email'))? $request->input('email') : null;	
		$password = ($request->exists('password'))? $request->input('password') : null;
		$password_confirmation = ($request->exists('password_confirmation'))? $request->input('password_confirmation') : null;		
		$query = DB::table('password_resets')->select('email','token','created_at')->where('email','LIKE',"%$emailUser%")->get();		
		foreach($query as $q) {
		 $email = $q->email;
         $created_at = $q->created_at;
        }		
		$date_created_at = new DateTime($created_at);
		$epoch_created_at = $date_created_at->format('U');
		$epoch_current = time(); 		
		$min = 60; //60 seconds
		$hour = 60*$min;
		$day = 24*$hour;
		$month = date('t')*$day;	
		$isExpire = false;
		//$diff = floor($epoch_current) - floor($epoch_created_at); // Calcule seconds
		//$diff = floor($epoch_current/$min) - floor($epoch_created_at/$min); // Calcule minutes
		//$diff = floor($epoch_current/$hour) - floor($epoch_created_at/$hour); // Calcule hours
		$diff = floor($epoch_current/$day) - floor($epoch_created_at/$day); // Calcule days
		//$diff = floor($epoch_current/$month) - floor($epoch_created_at/$month); // Calcule months
		if ($created_at != null && $diff > 0.0) { $isExpire = true; }		
		if ($query->count() > 0) { $existEmail = true; } 
		if ($existEmail == true && $isExpire == false) {
		 $id = null;
		 $queryUser = DB::table('users')->select('id','email')->where('email','LIKE',"%$emailUser%")->get();
		 foreach($queryUser as $q) {
		   $id = $q->id;	
         }		
		 $queryUpdate = DB::table('users')
            ->where('id', '=', $id)
            ->update( ['password' => bcrypt($password)] );
	     DB::table('password_resets')->where('email', '=', $emailUser)->delete();
		 if ($queryUpdate) {
			 return view('auth.passwords.successpassword')->with("status","La contraseña ha sido cambiada.");	     
		 }     		 
		 } else if ($isExpire) {
			dd("Error: TokenID ha caducado.");
		 } else {
			dd("Error: Email no encontrado.");
		 }				
	}
	
}
