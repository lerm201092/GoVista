<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Shop_order;
use App\Patient;
use App\User;

use Cart;

class ViewCartController extends Controller
{
	
	public $menu_bar;
		
    public function __construct()
    {
        $this->middleware('auth');
		$this->menu_bar = Config::get('constantes.sidebar_medico');
    }
    
    public function index(Request $request)
    {		
	    $id_paciente = self::idPaciente();
        return view('shopping.viewcart')->with('menu_bar', $this->menu_bar)->with('id_paciente', $id_paciente);
    }
	
	public function saveProduct(Request $request)
    {		
		$transaction_date = $request->get('id_user');		
		$TotalSesiones = $request->get('Tsesiones');		
		$ShopOrder = new Shop_order(); 
        $ShopOrder->id_user = request('id_user');
        $ShopOrder->description = request('description');
		$ShopOrder->total_sessiones = $TotalSesiones;
		$ShopOrder->state_pol = request('state_pol');
		$ShopOrder->reference_code = request('ref_code');
		$ShopOrder->signature = request('signature');
		$ShopOrder->value = request('value'); 
        $ShopOrder->save();
        Cart::destroy();
		return response()->json('insert_ok');
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
