<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Config;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use Mail;
use App\Mail\SendMailableResetPasswd;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;	
	 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
		$toEmail = "";
    }
	
	public function showLinkRequestForm() {
        return view('auth.passwords.email');
    }
	
	public function sendResetLinkEmail(Request $request) {	
		$userList = DB::table('users')->select('email')->get();	
		$emailExist = false;		
		$emailUser = ($request->exists('email'))? $request->input('email') : null;				
	    $lenArray = $userList->count();	
	    for($x=0; $x<$lenArray; $x++) {
			$_email_ = $userList[$x]->email;            			
			if (strcmp($emailUser, $_email_) == 0) {
				$toEmail = $_email_;
				$emailExist = true;				
                $tokenReset = md5(Str::random(60));	 
				DB::table('password_resets')->where('email', '=', $_email_)->delete();
				$dateTime = time();
				DB::table('password_resets')->insert([
                   'email' => $emailUser,
                   'token' => $tokenReset,
                   'created_at' => date("Y-m-d H:i:s", $dateTime)
                ]);
                Mail::to( $toEmail )->send(new SendMailableResetPasswd($tokenReset));
				break;				
			}		
        }
        if ($emailExist) { return redirect()->back()->with("status","Se envio el link para restablecer contraseña."); }
        else { return redirect()->back()->with("error","El email ingresado no existe en el sistema."); }			
    }

}
