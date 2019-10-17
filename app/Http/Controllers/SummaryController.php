<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Patient;
use App\Medico;
use App\Appointment;
use App\History;
use App\History_exercise;
use App\Exercise;
use App\User;

use Session;
use Log;

class SummaryController extends Controller
{
	
	public $menu_bar;
	public $id_user;
    public $rol_user;
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
		$this->menu_bar = Config::get('constantes.sidebar_medico');
		$this->menu_bar[0] = 'active';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {				 
		$this->id_user = Auth::user()->id;
        $this->rol_user = Auth::user()->roluser;
		$id_medico = Medico::select('id')->where('id_user', '=', $this->id_user)->first();		
		$id_empresa = Session::get('id_empresa');
		$id_paciente = self::idPaciente();
			
	if($this->rol_user == 3) { // rol = Medico
			
		$totalCitasActivas = Appointment::select('id')
        ->where('id_medico', '=', $id_medico->id)
		->where('id_empresa', '=', $id_empresa)
		->where('state', '=', 'AC')->get();	
	
		$totalPacientes = Patient::select('id')
        ->where('id_empresa', '=', $id_empresa)->get();			
		
		$pacientesActivos = Patient::select('id')
        ->where('id_empresa', '=', $id_empresa)
		->where('state', '=', 'AC')->get();	
		
		$pacientesInactivos = Patient::select('id')
        ->where('id_empresa', '=', $id_empresa)
		->where('state', '=', 'IN')->get();	    
		
		 $qty_exe = History::from('histories as h')
         ->select('e.status', DB::raw('count(e.id_exercise) as cant'))
         ->leftJoin('history_exercises as e', 'h.id', '=', 'e.id_history')
         // ->where('h.id_patient', '=', $id)		
         ->where('h.id_medico', '=', "$id_medico->id")			 
         ->where('h.id_empresa', '=', "$id_empresa")
         ->where('h.state', '=', 'AC')
         ->groupBy('e.status')
         ->pluck('cant', 'status');
	
		$totalEjerciciosAsignados = 0;
		foreach ($qty_exe as $qty_exeValue) {	
		$totalEjerciciosAsignados = ($totalEjerciciosAsignados + $qty_exeValue);
		}	
	    $totalEjerciciosActivos     = isset($qty_exe['AC'])? $qty_exe['AC'] : 0;
	    $totalEjerciciosIncumplidos = isset($qty_exe['IN'])? $qty_exe['IN']: 0;
	    $totalEjerciciosRealizados  = isset($qty_exe['OK'])? $qty_exe['OK']: 0;
		
        $history_exercises = History_exercise::from('history_exercises as h1')
                    ->select('h1.*','p.name1','p.name2','p.surname1','p.surname2')
                    ->leftJoin('histories as h2', 'h1.id_history', '=', 'h2.id')
                    ->leftJoin('medicos as m', 'h2.id_medico', '=', 'm.id')
                    ->leftJoin('patients as p', 'h2.id_patient', '=', 'p.id')
                    ->whereIn('status', ['AC','OK'])
                    ->where('m.id_user', '=', $this->id_user)
                    ->get();
					
		$exerciseList = Exercise::select('id','description','state')->get();	
        $exerciseCount = $exerciseList->count();
       
        return view('summary')
            ->with('menu_bar', $this->menu_bar)
			->with('id_paciente', $id_paciente)
			->with('totalCitasActivas', $totalCitasActivas->count())
			->with('totalPacientes', $totalPacientes->count())
			->with('pacientesActivos', $pacientesActivos->count())
			->with('pacientesInactivos', $pacientesInactivos->count())
			->with('totalEjerciciosAsignados', $totalEjerciciosAsignados)			 
			->with('totalEjerciciosActivos', $totalEjerciciosActivos)
			->with('totalEjerciciosIncumplidos', $totalEjerciciosIncumplidos)
			->with('totalEjerciciosRealizados', $totalEjerciciosRealizados);
	}
	
	if($this->rol_user == 4) { // rol = Paciente

    $totalCitasActivas = Appointment::select('id')
        ->where('id_patient', '=', $id_paciente)
		->where('id_empresa', '=', $id_empresa)
		->where('state', '=', 'AC')->get();
		
    $totalCitasInactivas = Appointment::select('id')
        ->where('id_patient', '=', $id_paciente)
		->where('id_empresa', '=', $id_empresa)
		->where('state', '=', 'IN')->get();
		
    $totalCitasRealizadas = Appointment::select('id')
        ->where('id_patient', '=', $id_paciente)
		->where('id_empresa', '=', $id_empresa)
		->where('state', '=', 'RE')->get();
	
    $history_exercises = History_exercise::from('history_exercises as h1')
        ->select('h1.*','p.name1','p.name2','p.surname1','p.surname2')
        ->leftJoin('histories as h2', 'h1.id_history', '=', 'h2.id')
        ->leftJoin('patients as p', 'h2.id_patient', '=', 'p.id')
        ->whereIn('status', ['AC','OK'])
        ->where('p.id_user', '=',$this->id_user)
        ->get();
					
	$qty_citas = History::select('id_patient', DB::raw('min(historydate) as primera'), DB::raw('max(historydate) as ultima'), DB::raw('count(id) as qty'))
        ->where('state', '=', 'AC')
        ->where('id_patient', '=', $id_paciente)
        ->where('id_empresa', '=', $id_empresa)
        ->groupBy('id_patient')
        ->get();
		
	$qty_exe = History::from('histories as h')
         ->select('e.status', DB::raw('count(e.id_exercise) as cant'))
         ->leftJoin('history_exercises as e', 'h.id', '=', 'e.id_history')
         ->where('h.id_patient', '=', $id_paciente)
         ->where('h.id_empresa', '=', "$id_empresa")
		 ->where('h.state', '=', 'AC')
         ->groupBy('e.status')
         ->pluck('cant', 'status');		 
		 
	$totalEjerciciosAsignados = 0;
	foreach ($qty_exe as $qty_exeValue) {	
		$totalEjerciciosAsignados = ($totalEjerciciosAsignados + $qty_exeValue);
	}
		
	return view('summary')
        ->with('menu_bar', $this->menu_bar)
		->with('id_paciente', $id_paciente)
		->with('totalCitasActivas', $totalCitasActivas->count())
		->with('totalCitasInactivas', $totalCitasInactivas->count())
		->with('totalCitasRealizadas', $totalCitasRealizadas->count())
		->with('totalEjerciciosAsignados', $totalEjerciciosAsignados)
		->with('qty_exe', $qty_exe)
		->with('qty_citas', $qty_citas);
			
	}
			 
    }

    public function idPaciente()
    {
        $data = Patient::select('id')
            ->where('id_user', '=', $this->id_user)->get();

        if($data->count()==0){
            return 0;
        }else{
            return $data[0]->id;
        }
    }

}