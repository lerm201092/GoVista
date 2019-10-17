<?php

namespace App\Http\Controllers\Modulos;

use App\History;
use App\History_exercise;
use App\History_exercises_detail;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

use App\User;

class History_exercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public $id_empresa;
    public $menu_bar;
    public $id_user;
    public $rol_user;

    public function __construct()
    {
        $this->menu_bar = Config::get('constantes.sidebar_medico');
        $this->menu_bar[4] = 'active';
    }

    public function index(Request $request)
    {
        $this->id_user = Auth::user()->id;
        $this->rol_user = Auth::user()->roluser;
        $keyword = $request->get('search');
        $perPage = 25;
        $this->id_empresa = Session::get('id_empresa');

        $id_paciente = self::idPaciente();

        if (!empty($keyword)) {

            if($this->rol_user==3){
                $history_exercises = History_exercise::from('history_exercises as h1')
                    ->select('h1.*','p.name1','p.name2','p.surname1','p.surname2')
                    ->leftJoin('histories as h2', 'h1.id_history', '=', 'h2.id')
                    ->leftJoin('medicos as m', 'h2.id_medico', '=', 'm.id')
                    ->leftJoin('patients as p', 'h2.id_patient', '=', 'p.id')
                    ->whereIn('status', ['AC','OK'])
                    ->where('m.id_user', '=', $this->id_user)
                    ->where(function ($query) use ($keyword) {
                        $query->orWhere('id_exercise', 'LIKE', "%$keyword%")
                            ->orWhere('observation', 'LIKE', "%$keyword%")
                            ->orWhere('p.name1', 'LIKE', "%$keyword%")
                            ->orWhere('p.surname1', 'LIKE', "%$keyword%");
                    })
                    ->paginate($perPage);
            }
            if($this->rol_user==4){
                $history_exercises = History_exercise::from('history_exercises as h1')
                    ->select('h1.*','p.name1','p.name2','p.surname1','p.surname2')
                    ->leftJoin('histories as h2', 'h1.id_history', '=', 'h2.id')
                    ->leftJoin('patients as p', 'h2.id_patient', '=', 'p.id')
                    ->whereIn('status', ['AC','OK'])
                    ->where('p.id_user', '=', $this->id_user)
                    ->where(function ($query) use ($keyword) {
                        $query->orWhere('id_exercise', 'LIKE', "%$keyword%")
                            ->orWhere('observation', 'LIKE', "%$keyword%")
                            ->orWhere('p.name1', 'LIKE', "%$keyword%")
                            ->orWhere('p.surname1', 'LIKE', "%$keyword%");

                    })
                    ->paginate($perPage);
            }


        } else {
            if($this->rol_user==3){
                $history_exercises = History_exercise::from('history_exercises as h1')
                    ->select('h1.*','p.name1','p.name2','p.surname1','p.surname2')
                    ->leftJoin('histories as h2', 'h1.id_history', '=', 'h2.id')
                    ->leftJoin('medicos as m', 'h2.id_medico', '=', 'm.id')
                    ->leftJoin('patients as p', 'h2.id_patient', '=', 'p.id')
                    ->whereIn('status', ['AC','OK'])
                    ->where('m.id_user', '=', $this->id_user)
                    ->paginate($perPage);
            }
            if($this->rol_user==4){
                $history_exercises = History_exercise::from('history_exercises as h1')
                    ->select('h1.*','p.name1','p.name2','p.surname1','p.surname2')
                    ->leftJoin('histories as h2', 'h1.id_history', '=', 'h2.id')
                    ->leftJoin('patients as p', 'h2.id_patient', '=', 'p.id')
                    ->whereIn('status', ['AC','OK'])
                    ->where('p.id_user', '=',$this->id_user)
                    ->paginate($perPage);
            }
        }

        return view('modulos.history_exercises.index', compact('history_exercises'))
            ->with('menu_bar', $this->menu_bar)
            ->with('id_paciente',$id_paciente)
            ->with('rol_user',$this->rol_user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('modulos.history_exercises.create');
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
            'id_history' => 'required',
            'id_exercice' => 'required'
        ]);
        $requestData = $request->all();

        History_exercise::create($requestData);

        Session::flash('flash_message', 'History_exercise added!');

        return redirect('modulos/history_exercises');
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
        $history_exercise = History_exercise::findOrFail($id);
        $id_paciente = self::idPaciente();
        $id_exercice = $history_exercise->id;
        $nExercise = $history_exercise->id_exercise;
        $duracion = $history_exercise->duration;
        $id_his = $history_exercise->id_history;
        $difi = "NORMAL";
        $eyel = $history_exercise->screen_left;
        $eyer = $history_exercise->screen_right;
        $status = $history_exercise->status;

        return view('modulos.history_exercises.show', compact('history_exercise'))
            ->with('menu_bar', $this->menu_bar)
            ->with('id_exercice', $id_exercice)
            ->with('exercise', $nExercise)
            ->with('duracion', $duracion)
            ->with('id_his', $id_his)
            ->with('difi', $difi)
            ->with('eyel', $eyel)
            ->with('eyer', $eyer)
            ->with('status', $status)
            ->with('id_paciente',$id_paciente);
    }

    public function playexercise($id)
    {
		$id = \Crypt::decrypt($id);
        $history_exercise = History_exercise::findOrFail($id);
        $id_paciente = self::idPaciente();
        $paciente = Patient::findOrFail($id_paciente);
        $UserName = Auth::user()->nombres.' '.Auth::user()->apellidos;
        $id_exercice = $history_exercise->id;
        $id_his = $history_exercise->id_history;
        $nExercise = $history_exercise->id_exercise;
        $duracion = $history_exercise->duration;
        $setSize = $history_exercise->size;;
        $difi = "FACIL";
        $eyel = $history_exercise->screen_left;
        $eyer = $history_exercise->screen_right;
        $status = $history_exercise->status;
        $Edad = 0;
        $coins = $paciente->coin;
        $starts = $paciente->star;

        return view('modulos.history_exercises.playexercise', compact('history_exercise'))
            ->with('menu_bar', $this->menu_bar)
            ->with('id_exercice', $id_exercice)
            ->with('exercise', $nExercise)
            ->with('duracion', $duracion)
            ->with('id_his', $id_his)
            ->with('difi', $difi)
            ->with('eyel', $eyel)
            ->with('eyer', $eyer)
            ->with('status', $status)
            ->with('size', $setSize)
            ->with('username', $UserName)
            ->with('edad', $Edad)
            ->with('coins', $coins)
            ->with('starts', $starts)
            ->with('id_paciente',$id_paciente)
			->with('id',$id);
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
        $history_exercise = History_exercise::findOrFail($id);
        return view('modulos.history_exercises.edit', compact('history_exercise'));
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
            'id_history' => 'required',
            'id_exercice' => 'required'
        ]);
        $requestData = $request->all();
        $history_exercise = History_exercise::findOrFail($id);
        $history_exercise->update($requestData);
        Session::flash('flash_message', 'History_exercise updated!');
        return redirect('modulos/history_exercises');
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
        History_exercise::destroy($id);

        Session::flash('flash_message', 'History_exercise deleted!');

        return redirect('modulos/history_exercises');
    }

    public function idPaciente()
    {
        $data = Patient::select('id')
            ->where('id_user', '=', Auth::user()->id)->get();

        if($data->count()==0){
            return 0;
        }else{
            return $data[0]->id;
        }
    }

    public function saveExerciceId(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data
        //$request->id here is the id of our chosen option id
        $data = [];

        if($request->has('id') && $request->has('duration') && $request->has('status') ){
            $keywordId = $request->id;
            $duration = $request->duration;
            $status = $request->status;
            $coins = $request->coins;
            $stars = $request->stars;
            $progress = $request->progress;
            $failure = $request->failure;

            $aDataHistory_exercises_detail = array();
            $aDataHistory_exercises_detail['id'] = $keywordId;
            $aDataHistory_exercises_detail['duracion'] = $duration;
            $aDataHistory_exercises_detail['status'] = $status;
            $aDataHistory_exercises_detail['coin'] = $coins;
            $aDataHistory_exercises_detail['star'] = $stars;
            $aDataHistory_exercises_detail['failure'] = $failure;
            $aDataHistory_exercises_detail['progress'] = $progress;

            History_exercises_detail::create($aDataHistory_exercises_detail);

            if(strcmp($status, "OK")==0){
                $history_Exercises = History_exercise::findOrFail($keywordId);			
                $aDataHistory_Exercises = array();
                $aDataHistory_Exercises['id'] = $keywordId;
                $aDataHistory_Exercises['session_ok'] = $history_Exercises->session_ok + 1;
                $aDataHistory_Exercises['updated_user'] = Auth::user()->username;				
				User::where('id','=',Auth::user()->id)->update(array( 'total_sessiones' => (Auth::user()->total_sessiones - 1) )); // restar la sesion				
                if( $history_Exercises->session == ($history_Exercises->session_ok + 1) ){
                    $aDataHistory_Exercises['status'] = "OK";
                }
                $history_Exercises->update($aDataHistory_Exercises);				          
            }
            $data = History_exercise::select('id','id_history','id_exercise','observation')
                ->where('id', '=', "$keywordId")->get();
        }
        return response()->json($data);//then sent this data to ajax success
    }
}
