<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Controllers\Controller;

use App\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Auth;

use Log;

class MedicosController extends Controller
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
        $this->menu_bar[3] = 'active';

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

        if (!empty($keyword)) {
            $medicos = Medico::from('medicos as c')
                ->select('c.*', 'a.nomarea', 'e.nombre as empresa')
                ->leftJoin('areas as a', 'c.id_area', '=', 'a.id')
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
            $medicos = Medico::from('medicos as c')
                ->select('c.*', 'a.nomarea', 'e.nombre as empresa')
                ->leftJoin('areas as a', 'c.id_area', '=', 'a.id')
                ->leftJoin('empresas as e', 'c.id_empresa', '=', 'e.id')
                ->where('c.id_empresa', '=', "$this->id_empresa")
                ->orderBy('empresa', 'asc')
                ->orderBy('name', 'asc')
                ->paginate($perPage);
        }

        return view('modulos.medicos.index', compact('medicos'))
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
        
        // asignar empresas a medico
      //  $medicoUserID = DB::table('medicos')->select('id_user')->where('id', '=', $id)->first();         
      //  $user_empresas = DB::table('user_empresas')->select('id_empresa')->where('id_user', '=', $medicoUserID->id_user)->pluck('id_empresa'); 
        
        return view('modulos.medicos.create')
            ->with('menu_bar', $this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_dpto', $areas_dpto)
            ->with('empresas', $empresas)
            //->with('user_empresas', $user_empresas)
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
			'name' => 'required|max:100'//,
			//'id_empresa' => 'required'
		]);
        $requestData = $request->all();
        
        unset($requestData['id_empresa']);       // *exclude*
        
        Medico::create($requestData);

        Session::flash('flash_message', 'Medico added!');

        return redirect('modulos/medicos');
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
        $medico = DB::select('select c.*,e.nombre empresa,a.nomarea municipio,s.nomarea dpto from medicos c '.
            'left join empresas e on c.id_empresa=e.id left join areas a on c.id_area=a.id ' .
            'left join areas s on a.padre=s.id where c.id=?', [$id]);

        return view('modulos.medicos.show', compact('medico'))
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
        global $areas_munic, $areas_dpto, $empresas;
        $medico = Medico::findOrFail($id);
        self::queryAreas($id);
        self::queryEmpresa();
        
        // asignar empresas a medico
        $medicoUserID = DB::table('medicos')->select('id_user')->where('id', '=', $id)->first();         
        $user_empresas = DB::table('user_empresas')->select('id_empresa')->where('id_user', '=', $medicoUserID->id_user)->pluck('id_empresa');  
            
        return view('modulos.medicos.edit', compact('medico'))
            ->with('menu_bar', $this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_dpto', $areas_dpto)
            ->with('empresas', $empresas)
            ->with('user_empresas', $user_empresas)
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
			'name' => 'required|max:100'//,
			//'id_empresa' => 'required'
		]);
        $requestData = $request->all();
        
        unset($requestData['id_empresa']); // *exclude*
        
        

        
        $id_empresaLength = ($request->has('id_empresa'))? count($request['id_empresa']) : 0; 
        
       // for (x=0; x < $id_empresaLength; x++) {
            // $id_empresaLength[x]
    //    }
        
        
       // dd($id_empresaLength);
          
        // asignar varias empresas a user        
        $medico = Medico::findOrFail($id);
        $medico->update($requestData);

        Session::flash('flash_message', 'Medico updated!');

        return redirect('modulos/medicos');
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
        Medico::destroy($id);

        Session::flash('flash_message', 'Medico deleted!');

        return redirect('modulos/medicos');
    }

    public function queryAreas($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select padre from medicos e left join areas a on e.id_area=a.id where e.id = ? ', [$id]);
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
            'left join (select padre id_dpto from medicos e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }

    public function queryArea($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select a.codarea codmun,a.nomarea municipio,s.nomarea dpto from medicos e' .
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
            'left join (select padre id_dpto from medicos e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
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
