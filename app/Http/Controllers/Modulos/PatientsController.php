<?php
namespace App\Http\Controllers\Modulos;

use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PatientsController extends Controller
{

    public $menu_bar;
    public $areas_munic;
    public $areas_dpto;
    public $areas_munic_contact;
    public $areas_dpto_contact;
    public $empresas;
    public $entidades_eps;
    public $estados, $tipo_documento, $sexo, $zona;
    public $id_empresa;

    public function __construct()
    {
        $this->estados = Config::get('constantes.estado');
        $this->menu_bar = Config::get('constantes.sidebar_medico');
        $this->tipo_documento = Config::get('constantes.tipo_documento');
        $this->sexo = Config::get('constantes.sexo');
        $this->zona = Config::get('constantes.zona');
        $this->menu_bar[1] = 'active';
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
        $perPage = 15;
        if (!empty($keyword)) {
            $patients = Patient::from('patients as p')
                ->select('p.id','p.tipodoc','p.numdoc','p.name1','p.name2','p.surname1','p.surname2','p.state','a.nomarea as munic','d.nomarea as dpto')
                ->leftJoin('areas as a', 'p.id_Area', '=', 'a.id')
                ->leftJoin('areas as d', 'a.padre', '=', 'd.id')
                ->where('p.id', 'LIKE', "%$keyword%")
                ->where('p.id_empresa', '=', "$this->id_empresa")
                ->orWhere('tipodoc', 'LIKE', "%$keyword%")
                ->orWhere('numdoc', 'LIKE', "%$keyword%")
                ->orWhere('name1', 'LIKE', "%$keyword%")
                ->orWhere('name2', 'LIKE', "%$keyword%")
                ->orWhere('surname1', 'LIKE', "%$keyword%")
                ->orWhere('surname2', 'LIKE', "%$keyword%")
                ->orderBy('surname1', 'asc')
                ->orderBy('surname2', 'asc')
                ->orderBy('name1', 'asc')
                ->orderBy('name2', 'asc')
                ->paginate($perPage);
        } else {
            $patients = Patient::from('patients as p')
                ->select('p.id','p.tipodoc','p.numdoc','p.name1','p.name2','p.surname1','p.surname2','p.state','a.nomarea as munic','d.nomarea as dpto')
                ->leftJoin('areas as a', 'p.id_Area', '=', 'a.id')
                ->leftJoin('areas as d', 'a.padre', '=', 'd.id')
                ->where('p.id_empresa', '=', "$this->id_empresa")
                ->orderBy('surname1', 'asc')
                ->orderBy('surname2', 'asc')
                ->orderBy('name1', 'asc')
                ->orderBy('name2', 'asc')
                ->paginate($perPage);
        }

        //      print_r($patients);

        return view('modulos.patients.index', compact('patients'))
            ->with('menu_bar', $this->menu_bar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
		$this->id_empresa = Session::get('id_empresa');
        global $areas_munic, $areas_dpto, $empresas,$areas_munic_contact, $areas_dpto_contact;
        self::queryAreas(0);
        self::queryEmpresa();
        self::queryEntidades();

        return view('modulos.patients.create')
            ->with('menu_bar', $this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_munic_contact', $areas_munic_contact)
            ->with('areas_dpto', $areas_dpto)
            ->with('areas_dpto_contact', $areas_dpto_contact)
            ->with('empresas', $empresas)
            ->with('estados', $this->estados)
            ->with('sexo', $this->sexo)
            ->with('zona', $this->zona)
            ->with('tipo_documento', $this->tipo_documento)
			->with('id_empresa', $this->id_empresa)
            ->with('entidades_eps', $this->entidades_eps);
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
            'name1' => 'required|max:50',
            'surname1' => 'required|max:50',
            'birthdate' => 'required|date|date_format:Y-m-d'
        ]);
        $requestData = $request->all();

        Patient::create($requestData);

        Session::flash('flash_message', 'Patient added!');

        return redirect('modulos/patients');
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
        $patient = DB::select('select c.*,a.nomarea municipio,s.nomarea dpto,a2.nomarea municipio_contact,s2.nomarea dpto_contact,e.name eps from patients c '.
            'left join areas a on c.id_area=a.id ' .
            'left join areas s on a.padre=s.id '.
            'left join areas a2 on c.contact_city=a2.id ' .
            'left join areas s2 on a2.padre=s2.id '.
            'left join entidades e on c.id_eps = e.id '.
            'where c.id=?', [$id]);

        return view('modulos.patients.show', compact('patient'))
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
        global $areas_munic, $areas_dpto, $empresas,$areas_munic_contact, $areas_dpto_contact;
        self::queryAreas($id);
        self::queryEmpresa();
        self::queryEntidades();

        $patient = Patient::findOrFail($id);

        return view('modulos.patients.edit', compact('patient'))
            ->with('menu_bar', $this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_munic_contact', $areas_munic_contact)
            ->with('areas_dpto', $areas_dpto)
            ->with('areas_dpto_contact', $areas_dpto_contact)
            ->with('empresas', $empresas)
            ->with('estados', $this->estados)
            ->with('sexo', $this->sexo)
            ->with('zona', $this->zona)
            ->with('tipo_documento', $this->tipo_documento)			
            ->with('entidades_eps', $this->entidades_eps);			
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
            'name1' => 'required|max:50',
            'surname1' => 'required|max:50'
        ]);
        $requestData = $request->all();

        $patient = Patient::findOrFail($id);
        $patient->update($requestData);

        Session::flash('flash_message', 'Patient updated!');

        return redirect('modulos/patients');
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
        Patient::destroy($id);

        Session::flash('flash_message', 'Patient deleted!');

        return redirect('modulos/patients');
    }

    public function queryAreas($id)
    {
        global $areas_munic, $areas_dpto, $areas_munic_contact, $areas_dpto_contact;

        $padre_dpto = DB::select('select padre from patients e left join areas a on e.id_area=a.id where e.id = ? ', [$id]);
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
            'left join (select padre id_dpto from patients e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);

        /// Para los ComboBox del contacto de emergencia //
        $padre_dpto_contact = DB::select('select padre from patients e left join areas a on e.contact_city=a.id where e.id = ? ', [$id]);
        $id_padre = 3;
        if (!empty($padre_dpto_contact)) {
            $id_padre = $padre_dpto_contact['0']->padre;
        }

        $areas_munic_contact = DB::table('areas')
            ->select('id', 'nomarea')
            ->where('id_tipo', 3)
            ->where('padre', $id_padre)
            ->get();

        $row = array();
        foreach ($areas_munic_contact as $area_sel) {
            $row[$area_sel->id] = $area_sel->nomarea;
        }
        $areas_munic_contact = $row;

        $areas_dpto_contact = DB::select('select id,nomarea,id_dpto from areas a ' .
            'left join (select padre id_dpto from patients e left join areas a on e.contact_city=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }


    public function queryArea($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select a.codarea codmun,a.nomarea municipio,s.nomarea dpto from patients e' .
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
            'left join (select padre id_dpto from patients e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }


    public function queryEmpresa()
    {
        global $empresas;
        $this->id_empresa = Session::get('id_empresa');

        $empresa = DB::table('empresas')
            ->select('id', 'nombre')
            ->where('id', '=', "$this->id_empresa")
            ->get();

        $row = array();
        foreach ($empresa as $emp_sel) {
            $row[$emp_sel->id] = $emp_sel->nombre;
        }
        $empresas = $row;
    }

    public function queryEntidades()
    {
        $this->entidades_eps = DB::select('select c.id, c.code, c.name from entidades c where c.estado = ? order by c.regimen,c.name ', ['AC']);

        $row = array();
        foreach ($this->entidades_eps as $ent_sel) {
            $row[$ent_sel->id] = ucwords(mb_strtolower($ent_sel->name)) . ' (' . $ent_sel->code . ')';
        }
        $this->entidades_eps = $row;
    }

    public function findPatientsLike(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data
        //$request->id here is the id of our chosen option id
        $this->id_empresa = Session::get('id_empresa');
        $data = [];
        if(($request->has('searchdoc') && strlen($request->searchdoc)>3) || ($request->has('searchname') && strlen($request->searchname)>3)){
            $keywordDoc = $request->searchdoc;
            $keywordName = $request->searchname;
            $data = Patient::select('id','name1','name2','surname1','surname2','tipodoc','numdoc')
                ->orderBy('name1','asc')
                ->where('numdoc', 'LIKE', "%$keywordDoc%")
                ->where('state', '=', "AC")
                ->where('id_empresa', '=', "$this->id_empresa")
                ->where(function ($query) use ($keywordName) {
                    $query->orwhere('name1', 'LIKE', "%$keywordName%")
                        ->orWhere('name2', 'LIKE', "%$keywordName%")
                        ->orWhere('surname1', 'LIKE', "%$keywordName%")
                        ->orWhere('surname2', 'LIKE', "%$keywordName%");
                })
                ->orderBy('surname1','asc')->get();
        }
        return response()->json($data);//then sent this data to ajax success
    }

    public function findPatientsId(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data
        //$request->id here is the id of our chosen option id
        $data = [];
        if($request->has('searchId')){
            $keywordId = $request->searchId;
            $data = Patient::select('id','name1','name2','surname1','surname2','tipodoc','numdoc')
                ->where('id', '=', "$keywordId")->get();
        }
        return response()->json($data);//then sent this data to ajax success
    }
}
