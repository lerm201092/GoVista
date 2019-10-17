<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Appointment;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Medico;
use Illuminate\Support\Facades\Session;

class AppointmentsController extends Controller
{

    public $menu_bar;
    public $calendarJs;
    public $estado_cita;
    public $rol_user;
    public $id_user;
    public $id_empresa;

    public function __construct()
    {
        $this->menu_bar = Config::get('constantes.sidebar_medico');
        $this->estado_cita = Config::get('constantes.estado_cita');
        $this->menu_bar[2] = 'active';
        $this->calendarJs = true;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // reset - tabs 'createfromappointment'
        $request->session()->put('IDHistory', -1);    
        $request->session()->put('tabIDHistory', 0);
     
        $this->id_empresa = Session::get('id_empresa');

        $this->id_user = Auth::user()->id;
        $this->rol_user = Auth::user()->roluser;

        $id_medico = self::idMedico();
        $id_paciente = self::idPaciente();
		
        $keyword = $request->get('search');
        $perPage = 10;
        $event = [];
        /*
        $event[] = \Calendar::event(
            "Evento One",
            true,
            '2017-08-29 0900',
            '2017-08-31 0900',
            122,
            [
                'url' => url('/modulos/appointments/'.'1'),
                'color' => '#257e4a'
            ]
        );
        $event[] = \Calendar::event(
            "Evento Two",
            false,
            '2017-09-11 1415',
            '2017-09-11 1430',
            12,
            [
                'url' => url('/modulos/appointments/'.'2'),
                'color' => '#257e4a'
            ]
        );

        $event[] = \Calendar::event(
            '',
            true,
            '2017-09-24',
            '2017-09-28',
            0,
            [
                'overlap' => false,
                'rendering' => 'background',
                'color' => '#ff9f89'
            ]
        );
        */

        if (!empty($keyword)) {
            if ($this->rol_user == 3) {
                $appointments = Appointment::from('appointments as a')
                    ->select('a.id', 'a.id_patient', 'a.title', 'a.body', 'a.id_medico', 'a.state', 'a.start', 'a.end', 'm.name', 'p.name1', 'p.surname1')
                    ->leftJoin('patients as p', 'a.id_patient', '=', 'p.id')
                    ->leftJoin('medicos as m', 'a.id_medico', '=', 'm.id')
                    ->where('a.id_empresa', '=', "$this->id_empresa")
                    ->where('a.id_medico', '=', $id_medico)
                    ->whereIn('a.state',['AC','IC'])
                    ->where(function ($query) use($keyword) {
                        $query->orWhere('title', 'LIKE', "%$keyword%")
                            ->orWhere('m.name', 'LIKE', "%$keyword%")
                            ->orWhere('p.name1', 'LIKE', "%$keyword%")
                            ->orWhere('p.surname1', 'LIKE', "%$keyword%")
                            ->orWhere('start', 'LIKE', "%$keyword%");
                    })
                    ->paginate($perPage);
            } elseif ($this->rol_user == 4){
                $appointments = Appointment::from('appointments as a')
                    ->select('a.id', 'a.id_patient', 'a.title', 'a.body', 'a.id_medico', 'a.state', 'a.start', 'a.end', 'm.name', 'p.name1', 'p.surname1')
                    ->leftJoin('patients as p', 'a.id_patient', '=', 'p.id')
                    ->leftJoin('medicos as m', 'a.id_medico', '=', 'm.id')
                    ->where('a.id_empresa', '=', "$this->id_empresa")
                    ->where('a.id_patient', '=', $id_paciente)
                    ->whereIn('a.state',['AC'])
                    ->where(function ($query) use($keyword) {
                        $query->orWhere('title', 'LIKE', "%$keyword%")
                            ->orWhere('m.name', 'LIKE', "%$keyword%")
                            ->orWhere('p.name1', 'LIKE', "%$keyword%")
                            ->orWhere('p.surname1', 'LIKE', "%$keyword%")
                            ->orWhere('start', 'LIKE', "%$keyword%");
                    })
                    ->paginate($perPage);
            }else{
                $appointments = Appointment::from('appointments as a')
                    ->select('a.id', 'a.id_patient', 'a.title', 'a.body', 'a.id_medico', 'a.state', 'a.start', 'a.end', 'm.name', 'p.name1', 'p.surname1')
                    ->leftJoin('patients as p', 'a.id_patient', '=', 'p.id')
                    ->leftJoin('medicos as m', 'a.id_medico', '=', 'm.id')
                    ->where('a.id_empresa', '=', '1')
                    ->where('a.state','=', 'AC')
                    ->where(function ($query) use($keyword) {
                        $query->orWhere('title', 'LIKE', "%$keyword%")
                            ->orWhere('m.name', 'LIKE', "%$keyword%")
                            ->orWhere('p.name1', 'LIKE', "%$keyword%")
                            ->orWhere('p.surname1', 'LIKE', "%$keyword%")
                            ->orWhere('start', 'LIKE', "%$keyword%");
                    })
                    ->paginate($perPage);
            }

        } else {
            if ($this->rol_user == 3) {
                $appointments = Appointment::from('appointments as a')
                    ->select('a.id', 'a.id_patient', 'a.title', 'a.body', 'a.id_medico', 'a.state', 'a.start', 'a.end', 'm.name', 'p.name1', 'p.surname1')
                    ->leftJoin('patients as p', 'a.id_patient', '=', 'p.id')
                    ->leftJoin('medicos as m', 'a.id_medico', '=', 'm.id')
                    ->where('a.id_empresa', '=', "$this->id_empresa")
                    ->where('a.id_medico', '=', $id_medico)
                    ->whereIn('a.state',['AC','IC'])
                    ->paginate($perPage);
            } elseif($this->rol_user == 4){
                $appointments = Appointment::from('appointments as a')
                    ->select('a.id', 'a.id_patient', 'a.title', 'a.body', 'a.id_medico', 'a.state', 'a.start', 'a.end', 'm.name', 'p.name1', 'p.surname1')
                    ->leftJoin('patients as p', 'a.id_patient', '=', 'p.id')
                    ->leftJoin('medicos as m', 'a.id_medico', '=', 'm.id')
                    ->where('a.id_empresa', '=', "$this->id_empresa")
                    ->where('a.id_patient', '=', $id_paciente)
                    ->whereIn('a.state',['AC'])
                    ->paginate($perPage);

            } else {
                $appointments = Appointment::from('appointments as a')
                    ->select('a.id', 'a.id_patient', 'a.title', 'a.body', 'a.id_medico', 'a.state', 'a.start', 'a.end', 'm.name', 'p.name1', 'p.surname1')
                    ->leftJoin('patients as p', 'a.id_patient', '=', 'p.id')
                    ->leftJoin('medicos as m', 'a.id_medico', '=', 'm.id')
                    ->where('a.id_empresa', '=', '1')
                    ->where('a.state','=', 'AC')
                    ->paginate($perPage);
            }
        }

        foreach ($appointments as $item) {
            $event[] = \Calendar::event(
                ucwords(mb_strtolower($item->name1 . " " . $item->surname1)) . "\n" . $item->title . "\n" . $item->body,
                false,
                $item->start,
                $item->end,
                $item->id,				
                [
                    'url' => url('/modulos/appointments/' . $item->id),
                    'color' => '#bbdefb',
					'backgroundColor' => '#bbdefb',
					'borderColor' => '#00c853',					
					'textColor' => '#000'					
                ]
            );
        }
		
        $calendar = \Calendar::addEvents($event)
		    ->setId('Fullcalendar') // id = calendar-Fullcalendar
            ->setoptions([
			'views' => [
				'listMonth' => [ 'buttonText' => 'Lista Mensual' ],
				'listWeek' => [ 'buttonText' => 'Lista Semanal' ],
				'listDay' => [ 'buttonText' => 'Lista Diario' ],
				'listYear' => [ 'buttonText' => 'Lista Anual' ]
			],
			'header' =>
                    [
                        'left' => 'prev,next today',
                        'center' => 'title',
                        'right' => 'month,agendaWeek,agendaDay listMonth listWeek listDay listYear',
                    ],
			        'defaultView' => 'month',					
                    'firstDay' => 1,
					'navLinks' => true,	
                    'editable' => false,					
					'eventLimit' => true,										
                    'timeZone' => 'America/Bogota', 					
                    'locale' => 'es'
            ])->setCallbacks([
                'eventClick' => 'function(){}',
            ]);
			
        return view('modulos.appointments.index', compact('appointments'))
            ->with('menu_bar', $this->menu_bar)
            ->with('calendar', $calendar)
            ->with('calendarJs', $this->calendarJs)
            ->with('id_paciente',$id_paciente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
		//dd(Auth::user()->id);
		//dd(self::idMedico());
		$this->id_empresa = Session::get('id_empresa');
        $medicos = self::iniciarArrayMedico();
        return view('modulos.appointments.create')
            ->with('menu_bar', $this->menu_bar)
            ->with('calendarJs', $this->calendarJs)
            ->with('estado_cita', $this->estado_cita)
			->with('id_empresa', $this->id_empresa)
            ->with('medicos', $medicos); 
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
            'id_patient' => 'required',
            'body' => 'required|min:5',
            'title' => 'required'
        ]);

        $requestData = $request->all();

        $requestData['end'] = date("Y-m-d H:i", strtotime('+30 minute', strtotime($requestData['start'])));

        Appointment::create($requestData);

        Session::flash('flash_message', 'Appointment added!');

        return redirect('modulos/appointments');
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
		$id = \Crypt::decrypt($id); 
        $id_paciente = self::idPaciente();
        $appointment = DB::select('select a.id,tipodoc,numdoc,surname1,surname2,name1,name2,title,body, name,start,p.phone from appointments a ' .
            'left join patients p on a.id_patient=p.id ' .
            'left join medicos m on a.id_medico=m.id ' .
            'where a.id=? ', [$id]);

        return view('modulos.appointments.show', compact('appointment'))
            ->with('menu_bar', $this->menu_bar)
            ->with('id_paciente', $id_paciente);
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
        if (Auth::user()->roluser==4){
            return redirect('modulos/appointments');
        }
        $id_paciente = self::idPaciente();
        $medicos = self::iniciarArrayMedico();
        $appointment = Appointment::findOrFail($id);
        return view('modulos.appointments.edit', compact('appointment'))
            ->with('menu_bar', $this->menu_bar)
            ->with('calendarJs', $this->calendarJs)
            ->with('estado_cita', $this->estado_cita)
            ->with('medicos', $medicos)
            ->with('id_paciente', $id_paciente);
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
        $this->rol_user = Auth::user()->roluser;
        $this->validate($request, [
            'id_medico' => 'required',
            'title' => 'required'
        ]);
        $requestData = $request->all();
        $appointment = Appointment::findOrFail($id);
        $appointment->update($requestData);

        Session::flash('flash_message', 'Appointment updated!');

        // Médico //
        if($this->rol_user==3 && $requestData['state'] == 'IC' ){
           return redirect('modulos/histories/createfromappointment/'.$id);
        }else{
           return redirect('modulos/appointments');
        }
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
        Appointment::destroy($id);

        Session::flash('flash_message', 'Appointment deleted!');

        return redirect('modulos/appointments');
    }
	
	public function currentIDMedico() {
        $currentIDMedico = Medico::select('id','name')
            ->where('id_user', '=', Auth::user()->id)
            ->orderBy('name', 'asc')->get();
	}
	

    public function iniciarArrayMedico()
    {
        $this->id_empresa = Session::get('id_empresa');		
        $data = Medico::select('id', 'name')
            ->where('estado', '=', 'AC')
            ->where('id_empresa', '=', "$this->id_empresa")
			->where('id_user', '=', Auth::user()->id)
            ->orderBy('name', 'asc')
            ->pluck('name', 'id');
        return $data;
    }


    public function idMedico()
    {
        $this->id_empresa = Session::get('id_empresa');
        $data = Medico::select('id')
            ->where('id_user', '=', $this->id_user)
            ->orderBy('name', 'asc')->get();

        if($data->count()==0){
            return 0;
        }else{
            return $data[0]->id;
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
