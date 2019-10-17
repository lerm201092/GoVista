<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Shop_order;
use App\User;

class PayUController extends Controller
{    

    public $menu_bar;
	// fields of the method get (response)
	public $transactionState;
	public $reference_pol;
	public $referenceCode;
	public $transactionId;
	public $description;
	public $txValue;
	public $currency;
	public $lapPaymentMethod;
	public $pseBank;
	public $cus;
	public $processingDate;
	public $transactionStateText;
	public $transactionStateColor;
	// fields of the method post (confirmation)

    public function __construct()
    {
        $this->middleware('auth');
		$this->menu_bar = Config::get('constantes.sidebar_medico');		
    }
    
	// method=get
	public function payuResponse(Request $request)
    {	
		$sign = $request->get('signature');		
		$signValidate		= false;
		$query = DB::table('shop_orders')->where('signature','=',"$sign")->get();
		if (!is_null($query)) {
		if($request->isMethod('get')){
		$transactionState = $request->get('transactionState');
		$message = $request->get('message');
		$reference_pol = $request->get('reference_pol');
		$referenceCode = $request->get('referenceCode');
		$transactionId = $request->get('transactionId');
		$description = $request->get('description');
		$txValue = $request->get('TX_VALUE');
		$currency = $request->get('currency');
		$lapPaymentMethod = $request->get('lapPaymentMethod');
		$lapPaymentMethodType = $request->get('lapPaymentMethodType');		
		$pseBank = $request->get('pseBank');	
		$processingDate = $request->get('processingDate');
        $isPSEBank = false;		
		if ($pseBank != null) {		
		    $isPSEBank = true;	
			$cus = ($request->has('cus'))? $request->get('cus') : '';			
		}
		switch ($transactionState) {
			case 4:
				$transactionStateText  = "Tu transacción ha sido aprobada.";
				$transactionStateColor = "#4caf50";
				break;
			case 5:
				$transactionStateText  = "Transacción Expirada.";
				$transactionStateColor = "#f9a825";
				break;
			case 6:
				$transactionStateText  = "Tu transacción ha sido rechazada.";
				$transactionStateColor = "#f44336";
				break;
			case 7:
				$transactionStateText  = "Tu transacción esta pendiente.";
				$transactionStateColor = "#f9a825";
				break;
			case 104:
				$transactionStateText  = "Tu transacción tuvo un error.";
				$transactionStateColor = "#f44336";
				break;
			default:
				$transactionStateText  = "Estado de la transacción: ".$message;
				$transactionStateColor = "#f9a825";
		}		
        return view('shopping.payuresponse')
		       ->with('menu_bar', $this->menu_bar)
			   ->with('message', $message)
			   ->with('transactionStateText', $transactionStateText)
			   ->with('transactionStateColor', $transactionStateColor)
			   ->with('transactionState', $transactionState)
			   ->with('reference_pol', $reference_pol)
			   ->with('referenceCode', $referenceCode)
			   ->with('transactionId', $transactionId)
			   ->with('description', $description)
			   ->with('txValue', $txValue)
			   ->with('currency', $currency)
			   ->with('lapPaymentMethod', $lapPaymentMethod)
			   ->with('lapPaymentMethodType', $lapPaymentMethodType)
			   ->with('isPSEBank', $isPSEBank)
			   ->with('pseBank', $pseBank)			   
			   ->with('cus', isset($cus)? $cus : '')
			   ->with('processingDate', $processingDate);
		}
	}
    }
	
	// method=post
    public function payuConfirmation(Request $request)
    {			    
		$sign = $request->get('sign');	
		$query = DB::table('shop_orders')->where('signature','=',"$sign")->get();	
		
		if (!is_null($query)) {
	    if($request->isMethod('post')){				
			$state_pol = $request->get('state_pol');	
			$transaction_date = $request->get('transaction_date');				
			$reference_pol = $request->get('reference_pol');	
			$cus = $request->get('cus');	
			$pse_bank = $request->get('pse_bank');	
			$transaction_id = $request->get('transaction_id');	
			switch ($state_pol) {
			case 4:
				$state_polText  = "Aprobada";
				break;
			case 5:
				$state_polText  = "Expiro";
				break;
			case 6:
				$state_polText  = "Rechazada";
				break;
			case 7:
				$state_polText  = "Pendiente";
				break;
			case 104:
				$state_polText  = "Error";
				break;
			default:
				$state_polText  = $message;
		    }
			if (strpos($query[0]->state_pol, 'En Espera') !== false) {
			Shop_order::where('id_user','=',auth()->user()->id)->where('signature','=',$sign)->update(
			array(
			'state_pol' => $state_polText,
			'reference_pol' => $reference_pol,
			'cus' => $cus,
			'pse_bank' => $pse_bank, 
			'transaction_id' => $transaction_id
			)			
			);			 
			// Asignar numero de sesiones a la cuenta actual	
            User::where('id','=',auth()->user()->id)->update(array( 'total_sessiones' => (auth()->user()->total_sessiones + $query[0]->total_sessiones) ));
			}
        return view('shopping.payuconfirmation');
		}
		}
    }

}