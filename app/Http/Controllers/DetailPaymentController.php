<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Auth;

use App\Patient;
use App\User;
use App\Shop_order;

use Illuminate\Http\Request;

class DetailPaymentController extends Controller
{
	
	public $menu_bar;
	
    public function __construct()
    {
        $this->middleware('auth');
		$this->menu_bar = Config::get('constantes.sidebar_medico');
    }

    public function index()
    {
		$ListPayments = Shop_order::select('*')->where('id_user', '=', Auth::user()->id)->orderBy('created_at')->get();		
        $id_paciente = self::idPaciente();
        return view('shopping.detailspayments')
		->with('menu_bar', $this->menu_bar)
        ->with('id_paciente', $id_paciente)
		->with('ListPayments', $ListPayments);
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
