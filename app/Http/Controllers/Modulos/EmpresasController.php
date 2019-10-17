<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use App\Empresa;

use Illuminate\Http\Request;
use Session;

class EmpresasController extends Controller
{

    public $menu_bar;
    public $areas_munic;
    public $areas_dpto;
    public $estados;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->estados = Config::get('constantes.estado');
        $this->menu_bar = Config::get('constantes.sidebar_admon');
        $this->menu_bar[1] = 'active';
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
            $empresas = Empresa::where('id', 'LIKE', "%$keyword%")
                ->orWhere('nit', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $empresas = Empresa::paginate($perPage);
        }

        return view('modulos.empresas.index', compact('empresas'))
            ->with('menu_bar',$this->menu_bar);

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
        return view('modulos.empresas.create')
            ->with('areas_munic', $areas_munic)
            ->with('menu_bar',$this->menu_bar)
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
            'nombre' => 'required|max:100'
        ]);
        $requestData = $request->all();

        Empresa::create($requestData);

        Session::flash('flash_message', 'Empresa added!');

        return redirect('modulos/empresas');
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
        $empresa = Empresa::findOrFail($id);

        $areas = DB::select('select a.codarea codmun,a.nomarea municipio,s.nomarea dpto from empresas e'.
            ' left join areas a on e.id_area=a.id left join areas s on a.padre=s.id where e.id=?', [$id]);

        self::queryAreas($id);
        return view('modulos.empresas.show', compact('empresa'))
            ->with('menu_bar',$this->menu_bar)
            ->with('areas', $areas);
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
        global $areas_munic, $areas_dpto;
        $empresa = Empresa::findOrFail($id);
        self::queryAreas($id);

        return view('modulos.empresas.edit', compact('empresa'))
            ->with('menu_bar',$this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_dpto', $areas_dpto)
            ->with('estados', $this->estados);
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
            'nombre' => 'required|max:100'
        ]);
        $requestData = $request->all();

        $empresa = Empresa::findOrFail($id);
        $empresa->update($requestData);

        Session::flash('flash_message', 'Empresa updated!');

        return redirect('modulos/empresas');
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
        Empresa::destroy($id);
        Session::flash('flash_message', 'Empresa deleted!');
        return redirect('modulos/empresas');
    }

    public function queryAreas($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select padre from empresas e left join areas a on e.id_area=a.id where e.id = ? ', [$id]);
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
            'left join (select padre id_dpto from empresas e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }

    public function queryArea($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select a.codarea codmun,a.nomarea municipio,s.nomarea dpto from empresas e'.
            ' left join areas a on e.id_area=a.id left join areas s on a.padre=s.id where e.id=?', [$id]);

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
            'left join (select padre id_dpto from empresas e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }
}
