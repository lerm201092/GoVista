<?php

namespace App\Http\Controllers\Modulos;

use App\History_exercises_detail;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Session;

class History_exercises_detailController extends Controller
{

    public $menu_bar;
    public $id_user;
    public $rol_user;

    public function __construct()
    {
        $this->menu_bar = Config::get('constantes.sidebar_medico');
        $this->menu_bar[5] = 'active';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        return redirect('modulos/history_exercises');

        $this->id_user = Auth::user()->id;
        $this->rol_user = Auth::user()->roluser;
        $id_paciente = self::idPaciente();

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $history_exercises_detail = History_exercises_detail::where('id', 'LIKE', "%$keyword%")
                ->orWhere('created_at', 'LIKE', "%$keyword%")
                ->orWhere('duracion', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $history_exercises_detail = History_exercises_detail::paginate($perPage);
        }

        return view('modulos.history_exercises_detail.index',
            compact('history_exercises_detail'))
            ->with('menu_bar', $this->menu_bar)
            ->with('id_paciente', $id_paciente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return redirect('modulos/history_exercises');
        return view('modulos.history_exercises_detail.create');
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

        return redirect('modulos/history_exercises');
        $this->validate($request, [
            'id' => 'required'
        ]);
        $requestData = $request->all();

        History_exercises_detail::create($requestData);

        Session::flash('flash_message', 'History_exercises_detail added!');

        return redirect('modulos/history_exercises_detail');
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
        $this->id_user = Auth::user()->id;
        $this->rol_user = Auth::user()->roluser;

        $id_paciente = self::idPaciente();
        $perPage = 25;

        $history_exercises_detail = History_exercises_detail::from('history_exercises_details as hd')
            ->select('hi.id_patient','p.name1','p.surname1', 'hd.*')
            ->leftJoin('histories as hi','hd.id','=','hi.id')
            ->leftJoin('patients as p','hi.id_patient','=','p.id')
            ->where('hd.id', '=', "$id")
            ->paginate($perPage);

        return view('modulos.history_exercises_detail.index',
            compact('history_exercises_detail'))
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
        return redirect('modulos/history_exercises');

        $history_exercises_detail = History_exercises_detail::findOrFail($id);

        return view('modulos.history_exercises_detail.edit', compact('history_exercises_detail'));
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
        return redirect('modulos/history_exercises');
        $this->validate($request, [
            'id' => 'required'
        ]);
        $requestData = $request->all();

        $history_exercises_detail = History_exercises_detail::findOrFail($id);
        $history_exercises_detail->update($requestData);

        Session::flash('flash_message', 'History_exercises_detail updated!');

        return redirect('modulos/history_exercises_detail');
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
        return redirect('modulos/history_exercises');
        History_exercises_detail::destroy($id);

        Session::flash('flash_message', 'History_exercises_detail deleted!');

        return redirect('modulos/history_exercises_detail');
    }

    public function idPaciente()
    {
        $data = Patient::select('id')
            ->where('id_user', '=', $this->id_user)->get();

        if ($data->count() == 0) {
            return 0;
        } else {
            return $data[0]->id;
        }
    }

}
