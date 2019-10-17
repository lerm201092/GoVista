<?php

namespace App\Http\Controllers\Modulos;

use App\Centrosmedico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Auth;

class CentrosmedicosController extends Controller
{

    public $menu_bar;
    public $areas_munic;
    public $areas_dpto;
    public $empresas;
    public $estados;
    public $id_empresa;

    public function __construct()
    {
        $this->estados = Config::get('constantes.estado');
        $this->menu_bar = Config::get('constantes.sidebar_admon');
        $this->menu_bar[2] = 'active';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->id_empresa = Session::get('id_empresa');
        $keyword = $request->get('search');
        $perPage = 5;
        
        if(Auth::user()->roluser == 1) {
            if (!empty($keyword)) {
            $centrosmedicos = Centrosmedico::from('centrosmedicos as c')
                ->select('c.*', 'a.nomarea')
                ->leftJoin('areas as a', 'c.id_area', '=', 'a.id')                
                ->where('c.id', 'LIKE', "%$keyword%")               
                ->orWhere('name', 'LIKE', "%$keyword%")                
                ->orWhere('c.address', 'LIKE', "%$keyword%")
                ->orWhere('c.id_area', 'LIKE', "%$keyword%")
                ->orWhere('e.nombre', 'LIKE', "%$keyword%")
                ->orWhere('a.nomarea', 'LIKE', "%$keyword%")
                ->orWhere('contact', 'LIKE', "%$keyword%")
                ->orderBy('name', 'asc')
                ->paginate($perPage);
            } else {
            $centrosmedicos = Centrosmedico::from('centrosmedicos as c')
                ->select('c.*', 'a.nomarea')
                ->leftJoin('areas as a', 'c.id_area', '=', 'a.id') 
                ->orderBy('name', 'asc')
                ->paginate($perPage);
            } 
        } else {
            if (!empty($keyword)) {
            $centrosmedicos = Centrosmedico::from('centrosmedicos as c')
                ->select('c.*', 'a.nomarea', 'e.nombre as empresa')
                ->leftJoin('areas as a', 'c.id_area', '=', 'a.id')                
                ->leftJoin('empresas as e', 'c.id_empresa', '=', 'e.id')                 
                ->where('c.id', 'LIKE', "%$keyword%")
                ->where('c.id_empresa', '=', "$this->id_empresa")                 
                ->orWhere('name', 'LIKE', "%$keyword%")                 
                ->orWhere('id_empresa', 'LIKE', "%$keyword%")                 
                ->orWhere('c.address', 'LIKE', "%$keyword%")
                ->orWhere('c.id_area', 'LIKE', "%$keyword%")
                ->orWhere('e.nombre', 'LIKE', "%$keyword%")
                ->orWhere('a.nomarea', 'LIKE', "%$keyword%")
                ->orWhere('contact', 'LIKE', "%$keyword%")
                ->orderBy('empresa', 'asc')
                ->orderBy('name', 'asc')
                ->paginate($perPage);
            } else {
            $centrosmedicos = Centrosmedico::from('centrosmedicos as c')
                ->select('c.*', 'a.nomarea', 'e.nombre as empresa')
                ->leftJoin('areas as a', 'c.id_area', '=', 'a.id')
                ->leftJoin('empresas as e', 'c.id_empresa', '=', 'e.id')                
                ->where('c.id_empresa', '=', "$this->id_empresa")
                ->orderBy('empresa', 'asc')
                ->orderBy('name', 'asc')
                ->paginate($perPage);
            }                        
        }
        
        return view('modulos.centrosmedicos.index', compact('centrosmedicos'))
            ->with('menu_bar', $this->menu_bar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        global $areas_munic, $areas_dpto, $empresas;
        self::queryAreas(0);
        self::queryEmpresa();

        return view('modulos.centrosmedicos.create')
            ->with('menu_bar', $this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_dpto', $areas_dpto)
            ->with('empresas', $empresas)
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
            'name' => 'required|max:100',
            'description' => 'max:500',
            'id_empresa' => 'required'
        ]);
        $requestData = $request->all();

        Centrosmedico::create($requestData);
        Session::flash('flash_message', 'Centrosmedico added!');
        return redirect('modulos/centrosmedicos');
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
        $centrosmedico = DB::select('select c.*,e.nombre empresa,a.nomarea municipio,s.nomarea dpto from centrosmedicos c ' .
            'left join empresas e on c.id_empresa=e.id left join areas a on c.id_area=a.id ' .
            'left join areas s on a.padre=s.id where c.id=?', [$id]);

        return view('modulos.centrosmedicos.show', compact('centrosmedico'))
            ->with('menu_bar', $this->menu_bar);

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
        global $areas_munic, $areas_dpto, $empresas;
        $centrosmedico = Centrosmedico::findOrFail($id);

        self::queryAreas($id);
        self::queryEmpresa();

        return view('modulos.centrosmedicos.edit', compact('centrosmedico'))
            ->with('menu_bar', $this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_dpto', $areas_dpto)
            ->with('empresas', $empresas)
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
            'name' => 'required|max:100',
            'description' => 'max:500',
            'id_empresa' => 'required'
        ]);
        $requestData = $request->all();

        $centrosmedico = Centrosmedico::findOrFail($id);

        $centrosmedico->update($requestData);

        Session::flash('flash_message', 'Centros Médicos Actualizado!');

        return redirect('modulos/centrosmedicos');
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
        Centrosmedico::destroy($id);

        Session::flash('flash_message', 'Centrosmedico deleted!');

        return redirect('modulos/centrosmedicos');
    }

    public function queryAreas($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select padre from centrosmedicos e left join areas a on e.id_area=a.id where e.id = ? ', [$id]);
        $id_padre = 3;
        if (!empty($padre_dpto)) {
            $id_padre = $padre_dpto['0']->padre;
        }

        //$areas_munic = Area::pluck('nomarea','id');

        $areas_munic = DB::table('areas')
            ->select('id', 'nomarea')
            ->where('id_tipo', 3)
            ->where('padre', $id_padre)
            ->get();

        $areas_munic = $areas_munic->pluck('nomarea', 'id');

        /*
        $row = array();
        foreach ($areas_munic as $area_sel) {
            $row[$area_sel->id] = $area_sel->nomarea;
        }
        $areas_munic = $row;
        */

        $areas_dpto = DB::select('select id,nomarea,id_dpto from areas a ' .
            'left join (select padre id_dpto from centrosmedicos e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }

    public function queryArea($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select a.codarea codmun,a.nomarea municipio,s.nomarea dpto from centrosmedicos e' .
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
            'left join (select padre id_dpto from centrosmedicos e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }


    public function queryEmpresa()
    {
        global $empresas;
        $this->id_empresa = Session::get('id_empresa');
        
        if(Auth::user()->roluser == 1) {
        $empresa = DB::table('empresas')
            ->select('id', 'nombre')
            ->get();
        } else {
        $empresa = DB::table('empresas')
            ->select('id', 'nombre')
            ->where('id', '=', "$this->id_empresa")
            ->get();   
        }

        $row = array();
        foreach ($empresa as $emp_sel) {
            $row[$emp_sel->id] = $emp_sel->nombre;
        }
        $empresas = $row;
    }

}
