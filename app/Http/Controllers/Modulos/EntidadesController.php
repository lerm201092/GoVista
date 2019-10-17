<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Session;
use Illuminate\Support\Facades\DB;

class EntidadesController extends Controller
{

    public $menu_bar;
    public $areas_munic;
    public $areas_dpto;
    public $estados;

    public function __construct()
    {
        $this->estados = Config::get('constantes.estado');
        $this->menu_bar = Config::get('constantes.sidebar_admon');
        $this->menu_bar[4] = 'active';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $entidades = Entidade::where('id', 'LIKE', "%$keyword%")
				->orWhere('code', 'LIKE', "%$keyword%")
				->orWhere('name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $entidades = Entidade::paginate($perPage);
        }
        return view('modulos.entidades.index', compact('entidades'))
            ->with('menu_bar', $this->menu_bar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        global $areas_munic, $areas_dpto;
        self::queryAreas(0);
        return view('modulos.entidades.create')
            ->with('menu_bar', $this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_dpto', $areas_dpto)
            ->with('estados', $this->estados);
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
			'code' => 'required|max:10',
			'name' => 'required|max:100'
		]);
        $requestData = $request->all();
        
        Entidade::create($requestData);

        Session::flash('flash_message', 'Entidade added!');

        return redirect('modulos/entidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $entidade = DB::select('select c.*,a.nomarea municipio,s.nomarea dpto,CASE c.regimen
				  WHEN 1 THEN \'Caja de Compensación\'
				  WHEN 2 THEN \'EPS Contributivo\'
				  WHEN 3 THEN \'EPS Subsidiado\'
				  ELSE \'\' END as tipo_regimen  from entidades c '.
            'left join areas a on c.id_area=a.id ' .
            'left join areas s on a.padre=s.id where c.id=?', [$id]);

        return view('modulos.entidades.show', compact('entidade'))
            ->with('menu_bar', $this->menu_bar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        global $areas_munic, $areas_dpto;
        $entidade = Entidade::findOrFail($id);
        self::queryAreas($id);

        return view('modulos.entidades.edit', compact('entidade'))
            ->with('menu_bar', $this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_dpto', $areas_dpto)
            ->with('estados', $this->estados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'code' => 'required|max:10',
			'name' => 'required|max:100'
		]);
        $requestData = $request->all();
        
        $entidade = Entidade::findOrFail($id);
        $entidade->update($requestData);

        Session::flash('flash_message', 'Entidad Actualizada!');

        return redirect('modulos/entidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Entidade::destroy($id);

        Session::flash('flash_message', 'Entidade deleted!');

        return redirect('modulos/entidades');
    }
    public function queryAreas($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select padre from entidades e left join areas a on e.id_area=a.id where e.id = ? ', [$id]);
        $id_padre = 3;
        if (!empty($padre_dpto)) {
            $id_padre = $padre_dpto['0']->padre;
        }

        $areas_munic = DB::table('areas')
            ->select('id', 'nomarea')
            ->where('id_tipo', 3)
            ->where('padre', $id_padre)
            ->get();

        $row = array();
        foreach ($areas_munic as $area_sel) {
            $row[$area_sel->id] = $area_sel->nomarea;
        }
        $areas_munic = $row;

        $areas_dpto = DB::select('select id,nomarea,id_dpto from areas a ' .
            'left join (select padre id_dpto from entidades e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }

    public function queryArea($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select a.codarea codmun,a.nomarea municipio,s.nomarea dpto from entidades e' .
            ' left join areas a on e.id_area=a.id left join areas s on a.padre=s.id where e.id=?', [$id]);

        if (!empty($padre_dpto)) {
            $id_padre = $padre_dpto['0']->padre;
        }

        $areas_munic = DB::table('areas')
            ->select('id', 'nomarea')
            ->where('id_tipo', 3)
            ->where('padre', $id_padre)
            ->get();

        $row = array();
        foreach ($areas_munic as $area_sel) {
            $row[$area_sel->id] = $area_sel->nomarea;
        }
        $areas_munic = $row;

        $areas_dpto = DB::select('select id,nomarea,id_dpto from areas a ' .
            'left join (select padre id_dpto from entidades e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }
}
