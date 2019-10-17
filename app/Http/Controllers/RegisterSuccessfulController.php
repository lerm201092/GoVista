<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use DateTime;

use Illuminate\Support\Facades\Auth;

use App\User;

class RegisterSuccessfulController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ready');
    }
	
	public function showActivationForm($token) {
		$existToken = false;
		$query = DB::table('activation_links')->where('token','LIKE',"%$token%")->get();	 
		if ($query->count() > 0) { $existToken = true; } 
        else { $existToken = false; }
		if ($existToken == true) {
			User::where('username', $query[0]->userid)->update(array('estado' => 'AC'));
			DB::table('activation_links')->where('token', '=', $token)->delete();
			return view('auth.activation.user')
			       ->with("userID",$query[0]->userid);
		} else {
			dd("Error: TokenID ha caducado.");
		}
    }	

}