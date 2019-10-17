<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Products;
use App\Patient;
use App\User;

use Cart;

use Illuminate\Support\Facades\Input;

class ProductsController  extends Controller
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
        $products = Products::all();
        return view('shopping.products', compact('products'))->with('menu_bar', $this->menu_bar)->with('id_paciente', $id_paciente)->with('cartCount', Cart::count());
    }
 	
	public function addToCart($id) {		
		$product = Products::find($id);
        Cart::add($product->id, $product->name, 1, $product->price, ['sesiones' => $product->sesiones]);
		$items = Cart::content();
		$tax_rate = 0.0;
		foreach ($items as $item){
		$item->setTaxRate($tax_rate);
		Cart::update($item->rowId, $item->qty);
		}
		return redirect()->back()->with('success', 'El '.$product->name.' Ha Sido Agregado Al Carrito.');
    }
	
	public function removeToCart($id) {
		$items = Cart::content();
		foreach ($items as $item){
		if ($item->id == $id) {
			Cart::remove($item->rowId);
		}
		}
		return redirect()->back()->with('error', 'El Producto Ha Sido Eliminado Del Carrito.');
	}
	
	
	public function updateToCart($id, $qty) {
        $items = Cart::content();
		foreach ($items as $item){
		if ($item->id == $id) {
			Cart::update($item->rowId, $qty);
		}
		}				
		return redirect()->back()->with('success', 'El Producto Ha Sido Actualizado Del Carrito.');
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
