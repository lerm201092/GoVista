<?php

namespace App\Http\Controllers\Modulos;

use App\Appointment;
use App\Centrosmedico;
use App\Exercise;
use App\History_exercise;
use App\Http\Controllers\Controller;

use App\History;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Input;

use DateTime;

class HistoriesController extends Controller
{

    public $amb_organic;
    public $amb_functional;
    public $fixation;
    public $treatment;
    public $affected_eye;
    public $pupils;
    public $respond_to;
    public $pupil_exam;
    public $visual_acuity;
    public $calendarJs;
    public $state;
    public $id_cita;
    public $frequency;
    public $screen;
    public $screen_eye;
    public $id_user;
    public $rol_user;
    public $id_empresa;
    public $esfera_cilindro;
	public $eje;
	public $rips;
	public $cc;
	public $sc;
	public $ojoDominante;
	public $manoDominante;
	public $ho;
	public $ve;
	public $anguloKappa;
	public $LucesWorth;
    public $distanciaCM;
    public $OjoSuprime;
    public $Bagolini;
    public $PostImagenes;
    public $CorrespondenciaSensorial;
    public $TestUsado;
    public $angulo;

    public function __construct()
    {
        $this->menu_bar = Config::get('constantes.sidebar_medico');
        $this->amb_organic = Config::get('constantes.amb_organic');
        $this->amb_functional = Config::get('constantes.amb_functional');
        $this->fixation = Config::get('constantes.fixation');
        $this->treatment = Config::get('constantes.treatment');
        $this->affected_eye = Config::get('constantes.affected_eye');
        $this->pupils = Config::get('constantes.pupils');
        $this->respond_to = Config::get('constantes.respond_to');
        $this->pupil_exam = Config::get('constantes.pupil_exam');
        $this->visual_acuity = Config::get('constantes.visual_acuity');
        $this->state = Config::get('constantes.estado');
        $this->frequency = Config::get('constantes.frequency');
        $this->screen = Config::get('constantes.screen');
        $this->screen_eye = Config::get('constantes.screen_eye');
        $this->esfera_cilindro = Config::get('constantes.esfera_cilindro');
		$this->eje = Config::get('constantes.eje');
		$this->rips = Config::get('constantes.rips');
		$this->cc = Config::get('constantes.cc');
		$this->sc = Config::get('constantes.sc');
		$this->ojoDominante = Config::get('constantes.ojoDominante');
		$this->manoDominante = Config::get('constantes.manoDominante');
		$this->ho = Config::get('constantes.ho');
		$this->ve = Config::get('constantes.ve');
		$this->anguloKappa = Config::get('constantes.anguloKappa');
		$this->LucesWorth = Config::get('constantes.LucesWorth');
		$this->distanciaCM = Config::get('constantes.distanciaCM');
		$this->OjoSuprime = Config::get('constantes.OjoSuprime');
        $this->Bagolini = Config::get('constantes.Bagolini');
	    $this->PostImagenes = Config::get('constantes.PostImagenes');
	    $this->CorrespondenciaSensorial = Config::get('constantes.CorrespondenciaSensorial');
	    $this->TestUsado = Config::get('constantes.TestUsado');
	    $this->angulo = Config::get('constantes.angulo');
        $this->menu_bar[3] = 'active';
        $this->calendarJs = false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {		
        $this->id_empresa = Session::get('id_empresa');
        $this->id_user = Auth::user()->id;
        $this->rol_user = Auth::user()->roluser;
        $id_paciente = self::idPaciente();

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $histories = History::from('histories as h')
                ->select('h.id', 'h.historydate', 'p.surname1', 'p.surname2', 'p.name1', 'p.name2', 'm.name', 'h.state', 'p.tipodoc', 'p.numdoc', 'h.id_patient')
                ->leftJoin('patients as p', 'h.id_patient', '=', 'p.id')
                ->leftJoin('medicos as m', 'h.id_medico', '=', 'm.id')
                ->where('h.id_empresa', '=', "$this->id_empresa")
                ->where(function ($query) use ($keyword) {
                    $query->orWhere('p.numdoc', 'LIKE', "%$keyword%")
                        ->orWhere('m.name', 'LIKE', "%$keyword%")
                        ->orWhere('p.name1', 'LIKE', "%$keyword%")
                        ->orWhere('p.surname1', 'LIKE', "%$keyword%")
                        ->orWhere('h.historydate', 'LIKE', "%$keyword%");
                })
                ->paginate($perPage);

        } else {
            $histories = History::from('histories as h')
                ->select('h.id', 'h.historydate', 'p.surname1', 'p.surname2', 'p.name1', 'p.name2', 'm.name', 'h.state', 'p.tipodoc', 'p.numdoc', 'h.id_patient')
                ->leftJoin('patients as p', 'h.id_patient', '=', 'p.id')
                ->leftJoin('medicos as m', 'h.id_medico', '=', 'm.id')
                ->where('h.id_empresa', '=', "$this->id_empresa")
                ->paginate($perPage);
        }

        return view('modulos.histories.index', compact('histories'))
            ->with('menu_bar', $this->menu_bar)
            ->with('id_paciente',$id_paciente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->id_empresa = Session::get('id_empresa');
        $centroMedicos = self::centroMedico();
        return view('modulos.histories.create')
            ->with('calendarJs', $this->calendarJs)
            ->with('amb_organic', $this->amb_organic)
            ->with('amb_functional', $this->amb_functional)
            ->with('fixation', $this->fixation)
            ->with('treatment', $this->treatment)
            ->with('affected_eye', $this->affected_eye)
            ->with('pupils', $this->pupils)
            ->with('respond_to', $this->respond_to)
            ->with('pupil_exam', $this->pupil_exam)
            ->with('visual_acuity', $this->visual_acuity)
            ->with('esfera_cilindro', $this->esfera_cilindro)
			->with('eje', $this->eje)
			->with('rips', $this->rips)
			->with('cc', $this->cc)
			->with('sc', $this->sc)			
			->with('ojoDominante', $this->ojoDominante)
			->with('manoDominante', $this->manoDominante)
			->with('ho', $this->ho)
			->with('ve', $this->ve)	
            ->with('anguloKappa', $this->anguloKappa)
			->with('LucesWorth', $this->LucesWorth)	
			->with('distanciaCM', $this->distanciaCM)	
			->with('OjoSuprime', $this->OjoSuprime)	
			->with('Bagolini', $this->Bagolini)	
			->with('PostImagenes', $this->PostImagenes)	
			->with('CorrespondenciaSensorial', $this->CorrespondenciaSensorial)	
			->with('TestUsado', $this->TestUsado)	
			->with('angulo', $this->angulo)			
            ->with('state', $this->state)
            ->with('menu_bar', $this->menu_bar)
            ->with('centromedicos', $centroMedicos)
            ->with('id_empresa', $this->id_empresa)
            ->with('frequency', $this->frequency);
    }

    public function createfromappointment($id)
    {		
                
        $this->id_empresa = Session::get('id_empresa');
        $this->id_cita = $id;
        $appointments = Appointment::from('appointments as a')
            ->select('a.id', 'a.id_patient', 'a.title', 'a.body', 'a.id_medico', 'a.state', 'a.start as historydate', 'a.end', 'm.name as nom_medico', 'p.tipodoc', 'p.numdoc', 'p.name1', 'p.name2', 'p.surname1', 'p.surname2', 'p.birthdate')
            ->leftJoin('patients as p', 'a.id_patient', '=', 'p.id')
            ->leftJoin('medicos as m', 'a.id_medico', '=', 'm.id')
            ->where('a.id_empresa', '=', "$this->id_empresa")
            ->where('a.state', '=', 'IC')
            ->where('a.id', '=', $id)->get();

        $id_paciente = $appointments[0]->id_patient;
        
        if ($appointments->isEmpty()) {
            return redirect('modulos/histories');
        }
		
        $centroMedicos = self::centroMedico();
        $exercises = Exercise::select('id', 'useExercise', 'description', 'observation', 'state')
            ->where('state', '=', 'AC')
            ->get();
         
        // Calcular edad del paciente (Historias Clinicas)
	    $_Appointment_ = Appointment::select('id_patient')->findOrFail($id);
        $Appointment_id_patient = $_Appointment_->id_patient;
        $patient = Patient::select('tipodoc', 'numdoc', 'name1', 'name2', 'surname1', 'surname2', 'birthdate',
               DB::raw('fn_subtract_date(curdate(),birthdate) as edad'))->findOrFail($Appointment_id_patient);
		$happybirthdate = new DateTime( $patient->birthdate );
        $today = new DateTime();
        $year = $today->diff($happybirthdate);
        $edadPaciente = $year->y;
        
        $qty_exe = History::from('histories as h')
         ->select('e.status', DB::raw('count(e.id_exercise) as cant'))
         ->leftJoin('history_exercises as e', 'h.id', '=', 'e.id_history')
         ->where('h.id_patient', '=', $id_paciente)
         ->where('h.id_empresa', '=', "$this->id_empresa")
		 ->where('h.state', '=', 'AC')
         ->groupBy('e.status')
         ->pluck('cant', 'status');	
         
        if(Session::has('IDHistory')) {
            $historyFill = History::select('*')->where('id', '=', Session::get('IDHistory'))->first();  
        }
        
        if(Session::has('IDHistory')) {
            $historyExerciseFill = History_exercise::select('*')->where('id_history', '=', Session::get('IDHistory'))->get();  
        }
		
        //dd($historyExerciseFill);
        
        return view('modulos.histories.createfromappointment')
            ->with('calendarJs', $this->calendarJs)
            ->with('historyFill', $historyFill)
            ->with('historyExerciseFill', $historyExerciseFill)
            ->with('qty_exe', $qty_exe)
            ->with('amb_organic', $this->amb_organic)
            ->with('amb_functional', $this->amb_functional)
            ->with('fixation', $this->fixation)
            ->with('treatment', $this->treatment)
            ->with('affected_eye', $this->affected_eye)
            ->with('pupils', $this->pupils)
            ->with('respond_to', $this->respond_to)
            ->with('pupil_exam', $this->pupil_exam)
            ->with('visual_acuity', $this->visual_acuity)
            ->with('esfera_cilindro', $this->esfera_cilindro)
			->with('eje', $this->eje)
			->with('rips', $this->rips)
			->with('cc', $this->cc)
			->with('sc', $this->sc)
			->with('ojoDominante', $this->ojoDominante)
			->with('manoDominante', $this->manoDominante)
			->with('ho', $this->ho)
			->with('ve', $this->ve)		
            ->with('anguloKappa', $this->anguloKappa)
            ->with('LucesWorth', $this->LucesWorth)	
			->with('distanciaCM', $this->distanciaCM)	
			->with('OjoSuprime', $this->OjoSuprime)	
			->with('Bagolini', $this->Bagolini)	
			->with('PostImagenes', $this->PostImagenes)	
			->with('CorrespondenciaSensorial', $this->CorrespondenciaSensorial)	
			->with('TestUsado', $this->TestUsado)	
			->with('angulo', $this->angulo)					
            ->with('state', $this->state)
            ->with('menu_bar', $this->menu_bar)
            ->with('centromedicos', $centroMedicos)
            ->with('appointments', $appointments)
            ->with('frequency', $this->frequency)
            ->with('screen', $this->screen)
            ->with('screen_eye', $this->screen_eye)
			->with('edadPaciente',$edadPaciente)
			->with('id_empresa', $this->id_empresa)
            ->with('exercises', $exercises);			
    }

    public function dashboard($id)
    {
        $this->menu_bar[5] = 'active';
        $this->id_empresa = Session::get('id_empresa');
        $id_paciente = $id;
        $patient = Patient::select('tipodoc', 'numdoc', 'name1', 'name2', 'surname1', 'surname2', 'birthdate',
            DB::raw('fn_subtract_date(curdate(),birthdate) as edad'))->findOrFail($id);

        $edad = intval($patient->edad / 10000).'A '
            . intval($patient->edad / 100 - intval($patient->edad / 10000) * 100).'M '
            . ($patient->edad - intval($patient->edad / 100) * 100).'D ';

        $qty_exe = History::from('histories as h')
            ->select('e.status', DB::raw('count(e.id_exercise) as cant'))
            ->leftJoin('history_exercises as e', 'h.id', '=', 'e.id_history')
            ->where('h.id_patient', '=', $id)
            ->where('h.id_empresa', '=', "$this->id_empresa")
            ->where('h.state', '=', 'AC')
            ->groupBy('e.status')
            ->pluck('cant', 'status');

		//        echo $qty_exe['AC'].' '.$qty_exe['IN']."\n";

        $qty_citas = History::select('id_patient', DB::raw('min(historydate) as primera'), DB::raw('max(historydate) as ultima'), DB::raw('count(id) as qty'))
            ->where('state', '=', 'AC')
            ->where('id_patient', '=', $id)
            ->where('id_empresa', '=', "$this->id_empresa")
            ->groupBy('id_patient')
            ->get();

        $visual_acuity = History::from('histories as h')
            ->select('h.id', 'h.historydate', 'h.visual_acuity', 'value', 'intpup_dist')
            ->leftJoin('reference_lists as r', function ($join) {
                $join->on('h.visual_acuity', '=', 'r.description');
                $join->on('r.codelist', '=', DB::raw("'visual_acuity'"));
            })
            ->where('h.id_empresa', '=', "$this->id_empresa")
            ->where('h.id_patient', '=', $id)
            ->where('h.state', '=', 'AC')
            ->orderBy('h.historydate', 'desc')
            ->limit(10)
            ->get();

        if(count($qty_exe)==0 || count($visual_acuity)==0){
            redirect('modulos/appointments');
        }

        $longitud = count($visual_acuity);

        $serie1 = '';
        $serie2 = '';
        $serie3 = '';
        $serie4 = '';
        $serie5 = '';

        for ($i = $longitud - 1; $i > -1; $i--) {
            $serie1 .= "'HC# " . $visual_acuity[$i]->id . "',";
            $serie2 .= $visual_acuity[$i]->value . ',';
            $serie3 .= '8,';
            $serie4 .= $visual_acuity[$i]->intpup_dist . ',';
            $serie5 .= '40,';
            //echo $visual_acuity[$i]->id.' '.$visual_acuity[$i]->historydate."\n";
        }

        $serie1 = substr($serie1, 0, -1);
        $serie2 = substr($serie2, 0, -1);
        $serie3 = substr($serie3, 0, -1);


        return view('modulos.histories.dashboard')
            ->with('calendarJs', $this->calendarJs)
            ->with('menu_bar', $this->menu_bar)
            ->with('serie1', $serie1)
            ->with('serie2', $serie2)
            ->with('serie3', $serie3)
            ->with('serie4', $serie4)
            ->with('serie5', $serie5)
            ->with('qty_exe',$qty_exe)
            ->with('qty_citas',$qty_citas)
            ->with('patient',$patient)
            ->with('edad',$edad)
            ->with('visual_acuity',$visual_acuity)
            ->with('id_paciente',$id_paciente);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_medico' => 'required',
            'id_patient' => 'required'
        ]);
        $requestData = $request->all();
        $id_appointment = $requestData['id_appointment'];       
		
       // dd($requestData);
		// get list exercise 
		$exerciseList = Exercise::select('id','description','state')->get();	
		$exerciseLength = ($request->has('id_exercise'))? count($requestData['id_exercise']) : 0; 
 
// manager (save tabs)
$url_current = 'modulos/histories/createfromappointment/' . $id_appointment; 
$btn_saveContinue = ($request->has('saveContinue'))? $requestData['saveContinue'] : null; 
$btn_saveExercise = ($request->has('saveExercise'))? $requestData['saveExercise'] : null; 
$btn_saveAllExit = ($request->has('saveAllExit'))? $requestData['saveAllExit'] : null; 
if (isset($btn_saveContinue) && $btn_saveContinue != null) {
     $IDHistoryExist = History::where('id', '=', $request->session()->get('IDHistory'))->first();    
     if ($IDHistoryExist === null) {  
     $history = History::create($requestData);  
     $request->session()->put('IDHistory', $history->id);    
     $request->session()->put('tabIDHistory', $request['tabIDHistory']); 
        for ($i = 0; $i < $exerciseLength; $i++) {  
            $aDataHistory_Exercises = array();
            $aDataHistory_Exercises['_token'] = $request['_token'];
            $aDataHistory_Exercises['id_history'] = $history->id;		
		    $index = $request['id_exercise'][$i];
            $aDataHistory_Exercises['id_exercise'] = ($index);
            $aDataHistory_Exercises['observation'] = $request['observation'][$index-1];            
            $aDataHistory_Exercises['session'] = $request['session'][$index-1];
			$aDataHistory_Exercises['size'] = $request['size'][$index-1];
			$aDataHistory_Exercises['duration'] = $request['duration'][$index-1];
            $aDataHistory_Exercises['frequency'] = '';
            $aDataHistory_Exercises['screen'] = '';
            $aDataHistory_Exercises['screen_left'] = '';
            $aDataHistory_Exercises['screen_right'] = '';            
            $aDataHistory_Exercises['status'] = "AC";
            History_exercise::create($aDataHistory_Exercises);
        }     
     } else {
     unset($requestData['_token']);       // *exclude*
     unset($requestData['title']);        // *exclude*
     unset($requestData['body']);         // *exclude*
     unset($requestData['saveContinue']); // *exclude*
     unset($requestData['saveExercise']); // *exclude*
     unset($requestData['saveAllExit']);  // *exclude*
     unset($requestData['tabIDHistory']); // *exclude*    
     unset($requestData['useExercise']);  // *exclude*
     unset($requestData['observation']);  // *exclude*
     unset($requestData['session']);      // *exclude*
     unset($requestData['size']);         // *exclude*
     unset($requestData['duration']);     // *exclude*
     unset($requestData['id_exercise']);  // *exclude*
     $historyUpdate = History::where('id','=',$request->session()->get('IDHistory'))->update( $requestData );
     $request->session()->put('tabIDHistory', $request['tabIDHistory']);          
        for ($i = 0; $i < $exerciseLength; $i++) {  
            $aDataHistory_Exercises = array();
            $aDataHistory_Exercises['_token'] = $request['_token'];
            $aDataHistory_Exercises['id_history'] = $request->session()->get('IDHistory');		
		    $index = $request['id_exercise'][$i];
            $aDataHistory_Exercises['id_exercise'] = ($index);
            $aDataHistory_Exercises['observation'] = $request['observation'][$index-1];            
            $aDataHistory_Exercises['session'] = $request['session'][$index-1];
			$aDataHistory_Exercises['size'] = $request['size'][$index-1];
			$aDataHistory_Exercises['duration'] = $request['duration'][$index-1];
            $aDataHistory_Exercises['frequency'] = '';
            $aDataHistory_Exercises['screen'] = '';
            $aDataHistory_Exercises['screen_left'] = '';
            $aDataHistory_Exercises['screen_right'] = '';            
            $aDataHistory_Exercises['status'] = "AC";
            History_exercise::create($aDataHistory_Exercises);
        } 
     }
     return redirect($url_current);     
}
if (isset($btn_saveExercise) && $btn_saveExercise != null) {   
     $IDHistoryExist = History::where('id', '=', $request->session()->get('IDHistory'))->first();    
     if ($IDHistoryExist === null) {  
     $history = History::create($requestData);  
     $request->session()->put('IDHistory', $history->id);    
     $request->session()->put('tabIDHistory', $request['tabIDHistory']);         
        for ($i = 0; $i < $exerciseLength; $i++) {  
            $aDataHistory_Exercises = array();
            $aDataHistory_Exercises['_token'] = $request['_token'];
            $aDataHistory_Exercises['id_history'] = $history->id;		
		    $index = $request['id_exercise'][$i];
            $aDataHistory_Exercises['id_exercise'] = ($index);
            $aDataHistory_Exercises['observation'] = $request['observation'][$index-1];            
            $aDataHistory_Exercises['session'] = $request['session'][$index-1];
			$aDataHistory_Exercises['size'] = $request['size'][$index-1];
			$aDataHistory_Exercises['duration'] = $request['duration'][$index-1];
            $aDataHistory_Exercises['frequency'] = '';
            $aDataHistory_Exercises['screen'] = '';
            $aDataHistory_Exercises['screen_left'] = '';
            $aDataHistory_Exercises['screen_right'] = '';            
            $aDataHistory_Exercises['status'] = "AC";
            History_exercise::create($aDataHistory_Exercises);
        }      
     } else {
     unset($requestData['_token']);       // *exclude*
     unset($requestData['title']);        // *exclude*
     unset($requestData['body']);         // *exclude*
     unset($requestData['saveContinue']); // *exclude*
     unset($requestData['saveExercise']); // *exclude*
     unset($requestData['saveAllExit']);  // *exclude*
     unset($requestData['tabIDHistory']); // *exclude*    
     unset($requestData['useExercise']);  // *exclude*
     unset($requestData['observation']);  // *exclude*
     unset($requestData['session']);      // *exclude*
     unset($requestData['size']);         // *exclude*
     unset($requestData['duration']);     // *exclude*
     unset($requestData['id_exercise']);  // *exclude*
     $historyUpdate = History::where('id','=',$request->session()->get('IDHistory'))->update( $requestData );
     $request->session()->put('tabIDHistory', 7);
        for ($i = 0; $i < $exerciseLength; $i++) {  
            $aDataHistory_Exercises = array();
            $aDataHistory_Exercises['_token'] = $request['_token'];
            $aDataHistory_Exercises['id_history'] = $request->session()->get('IDHistory');		
		    $index = $request['id_exercise'][$i];
            $aDataHistory_Exercises['id_exercise'] = ($index);
            $aDataHistory_Exercises['observation'] = $request['observation'][$index-1];            
            $aDataHistory_Exercises['session'] = $request['session'][$index-1];
			$aDataHistory_Exercises['size'] = $request['size'][$index-1];
			$aDataHistory_Exercises['duration'] = $request['duration'][$index-1];
            $aDataHistory_Exercises['frequency'] = '';
            $aDataHistory_Exercises['screen'] = '';
            $aDataHistory_Exercises['screen_left'] = '';
            $aDataHistory_Exercises['screen_right'] = '';            
            $aDataHistory_Exercises['status'] = "AC";
            History_exercise::create($aDataHistory_Exercises);
        }
     }
     return redirect($url_current);
}

if (isset($btn_saveAllExit) && $btn_saveAllExit != null) {
     $IDHistoryExist = History::where('id', '=', $request->session()->get('IDHistory'))->first();    
     if ($IDHistoryExist === null) {  
     $history = History::create($requestData);  
     $request->session()->put('IDHistory', $history->id);    
     $request->session()->put('tabIDHistory', $request['tabIDHistory']);        
        for ($i = 0; $i < $exerciseLength; $i++) {  
            $aDataHistory_Exercises = array();
            $aDataHistory_Exercises['_token'] = $request['_token'];
            $aDataHistory_Exercises['id_history'] = $history->id;		
		    $index = $request['id_exercise'][$i];
            $aDataHistory_Exercises['id_exercise'] = ($index);
            $aDataHistory_Exercises['observation'] = $request['observation'][$index-1];            
            $aDataHistory_Exercises['session'] = $request['session'][$index-1];
			$aDataHistory_Exercises['size'] = $request['size'][$index-1];
			$aDataHistory_Exercises['duration'] = $request['duration'][$index-1];
            $aDataHistory_Exercises['frequency'] = '';
            $aDataHistory_Exercises['screen'] = '';
            $aDataHistory_Exercises['screen_left'] = '';
            $aDataHistory_Exercises['screen_right'] = '';            
            $aDataHistory_Exercises['status'] = "AC";
            History_exercise::create($aDataHistory_Exercises);
        }  
        // Actualización de Citas en Appointment 
        $requestData = array();
        $requestData['state'] = 'RE';
        $requestData['updated_user'] = Auth::user()->username;
        $appointment = Appointment::findOrFail($id_appointment);
        $appointment->update($requestData);
        Session::flash('flash_message', 'History added!');
        return redirect('modulos/appointments');        
     } else {
     unset($requestData['_token']);       // *exclude*
     unset($requestData['title']);        // *exclude*
     unset($requestData['body']);         // *exclude*
     unset($requestData['saveContinue']); // *exclude*
     unset($requestData['saveExercise']); // *exclude*
     unset($requestData['saveAllExit']);  // *exclude*
     unset($requestData['tabIDHistory']); // *exclude*    
     unset($requestData['useExercise']);  // *exclude*
     unset($requestData['observation']);  // *exclude*
     unset($requestData['session']);      // *exclude*
     unset($requestData['size']);         // *exclude*
     unset($requestData['duration']);     // *exclude*
     unset($requestData['id_exercise']);  // *exclude*
     $historyUpdate = History::where('id','=',$request->session()->get('IDHistory'))->update( $requestData );
     $request->session()->put('tabIDHistory', $request['tabIDHistory']);         
        for ($i = 0; $i < $exerciseLength; $i++) {  
            $aDataHistory_Exercises = array();
            $aDataHistory_Exercises['_token'] = $request['_token'];
            $aDataHistory_Exercises['id_history'] = $request->session()->get('IDHistory');		
		    $index = $request['id_exercise'][$i];
            $aDataHistory_Exercises['id_exercise'] = ($index);
            $aDataHistory_Exercises['observation'] = $request['observation'][$index-1];            
            $aDataHistory_Exercises['session'] = $request['session'][$index-1];
			$aDataHistory_Exercises['size'] = $request['size'][$index-1];
			$aDataHistory_Exercises['duration'] = $request['duration'][$index-1];
            $aDataHistory_Exercises['frequency'] = '';
            $aDataHistory_Exercises['screen'] = '';
            $aDataHistory_Exercises['screen_left'] = '';
            $aDataHistory_Exercises['screen_right'] = '';            
            $aDataHistory_Exercises['status'] = "AC";
            History_exercise::create($aDataHistory_Exercises);
        }  
        // Actualización de Citas en Appointment 
        $requestData = array();
        $requestData['state'] = 'RE';
        $requestData['updated_user'] = Auth::user()->username;
        $appointment = Appointment::findOrFail($id_appointment);
        $appointment->update($requestData);
        Session::flash('flash_message', 'History added!');
        return redirect('modulos/appointments');        
    }
        
}       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {		
         
        $history = History::select('histories.*', 'm.name as nom_medico', 'p.tipodoc', 'p.numdoc', 'p.name1', 'p.name2', 'p.surname1', 'p.surname2', 'p.birthdate', 'c.name as centromedico')
            ->leftJoin('patients as p', 'histories.id_patient', '=', 'p.id')
            ->leftJoin('medicos as m', 'histories.id_medico', '=', 'm.id')
            ->leftJoin('centrosmedicos as c', 'histories.id_centromedico', '=', 'c.id')
            ->findOrFail($id);
            
        $exercises = Exercise::select('id', 'useExercise', 'description', 'observation', 'state')
            ->where('state', '=', 'AC')
            ->get();

        $exercice = History_exercise::from('history_exercises as h')
            ->select('h.id_history', 'h.id_exercise', 'h.observation', 'h.duration', 'h.session', 'h.frequency', 'h.screen', 'h.screen_left', 'h.screen_right', 'h.status', 'e.description', 'e.observation as observ_exe')
            ->leftJoin('exercises as e', 'h.id_exercise', '=', 'e.id')
            ->where('h.id_history', '=', $history->id)->get();

        $historyFill = History::select('*')->where('id', '=', $id)->first();     


//dd($historyFill->antecedente);        
        $historyExerciseFill = History_exercise::select('*')->where('id_history', '=', $id)->get();  

        $appointment = Appointment::select("title", "body")->findOrFail($history->id_appointment);

        return view('modulos.histories.show', compact('history'))
            ->with('calendarJs', $this->calendarJs)
            ->with('amb_organic', $this->amb_organic)
            ->with('amb_functional', $this->amb_functional)
            ->with('fixation', $this->fixation)
            ->with('treatment', $this->treatment)
            ->with('affected_eye', $this->affected_eye)
            ->with('pupils', $this->pupils)
            ->with('respond_to', $this->respond_to)
            ->with('pupil_exam', $this->pupil_exam)
            ->with('visual_acuity', $this->visual_acuity)
            ->with('esfera_cilindro', $this->esfera_cilindro)
			->with('eje', $this->eje)
			->with('rips', $this->rips)
			->with('cc', $this->cc)
			->with('sc', $this->sc)
			->with('ojoDominante', $this->ojoDominante)
			->with('manoDominante', $this->manoDominante)
			->with('ho', $this->ho)
			->with('ve', $this->ve)	
			->with('anguloKappa', $this->anguloKappa)	
			->with('LucesWorth', $this->LucesWorth)	
			->with('distanciaCM', $this->distanciaCM)	
			->with('OjoSuprime', $this->OjoSuprime)	
			->with('Bagolini', $this->Bagolini)	
			->with('PostImagenes', $this->PostImagenes)	
			->with('CorrespondenciaSensorial', $this->CorrespondenciaSensorial)	
			->with('TestUsado', $this->TestUsado)	
			->with('angulo', $this->angulo)		
            ->with('state', $this->state)
            ->with('menu_bar', $this->menu_bar)
            ->with('frequency', $this->frequency)
            ->with('screen', $this->screen)
            ->with('screen_eye', $this->screen_eye)
            ->with('appointment', $appointment)
            ->with('exercises', $exercises)
            ->with('historyFill', $historyFill)  
            ->with('historyExerciseFill', $historyExerciseFill)
            ->with('exercise', $exercice);             
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $history = History::findOrFail($id);

        return view('modulos.histories.edit', compact('history'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'id_medico' => 'required',
            'id_patient' => 'required'
        ]);
        $requestData = $request->all();

        $history = History::findOrFail($id);
        $history->update($requestData);

        Session::flash('flash_message', 'History updated!');

        return redirect('modulos/histories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        History::destroy($id);

        Session::flash('flash_message', 'History deleted!');

        return redirect('modulos/histories');
    }

    public function centroMedico()
    {
        $this->id_empresa = Session::get('id_empresa');
        $centroMedico = Centrosmedico::select('name', 'id')
            ->where('estado', '=', 'AC')
            ->where('id_empresa', '=', "$this->id_empresa")
            ->pluck('name', 'id');
        return $centroMedico;
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
