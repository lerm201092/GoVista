<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Http\Request;
use Session;

class UsersController extends Controller
{

    public $menu_bar;
    public $areas_munic;
    public $areas_dpto;
    public $empresas;
    public $estados;
    public $roles_users;	

    public function __construct()
    {
        $this->estados = Config::get('constantes.estado');
        $this->menu_bar = Config::get('constantes.sidebar_admon');
        $this->roles_users = Config::get('constantes.roles_users');
        $this->menu_bar[6] = 'active';
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
            $users = User::where('id', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('username', 'LIKE', "%$keyword%")
				->orWhere('nombres', 'LIKE', "%$keyword%")
				->orWhere('apellidos', 'LIKE', "%$keyword%")
				->orWhere('numdoc', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $users = User::paginate($perPage);
        }

        return view('modulos.users.index', compact('users'))
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
        return view('modulos.users.create')
            ->with('menu_bar', $this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_dpto', $areas_dpto)
            ->with('estados', $this->estados)
            ->with('roles_users', $this->roles_users);
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
			'username' => 'required|max:50',
			'email' => 'required|max:254',
			'nombres' => 'required|max:100',
			'apellidos' => 'required|max:100'
		]);
        $requestData = $request->all();
        $requestData['password']=bcrypt($requestData['password']);
        $requestData['token']= uniqid(rand(), TRUE);

        User::create($requestData);

        Session::flash('flash_message', 'User added!');

        return redirect('modulos/users');
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
        $user = DB::select('select c.*,a.nomarea municipio,s.nomarea dpto from users c '.
            'left join areas a on c.id_area=a.id ' .
            'left join areas s on a.padre=s.id where c.id=?', [$id]);

        return view('modulos.users.show', compact('user'))
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
        $user = User::findOrFail($id);
        self::queryAreas($id);

        return view('modulos.users.edit', compact('user'))
            ->with('menu_bar', $this->menu_bar)
            ->with('areas_munic', $areas_munic)
            ->with('areas_dpto', $areas_dpto)
            ->with('estados', $this->estados)
            ->with('roles_users', $this->roles_users);
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
			'username' => 'required|max:50',
			'email' => 'required|max:254',
			'nombres' => 'required|max:100',
			'apellidos' => 'required|max:100'
		]);

        $requestData = $request->all();

        $user = User::findOrFail($id);
        $user->update($requestData);

        Session::flash('flash_message', 'User updated!');

        return redirect('modulos/users/');
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
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('modulos/users');
    }
    public function queryAreas($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select padre from users e left join areas a on e.id_area=a.id where e.id = ? ', [$id]);
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
            'left join (select padre id_dpto from users e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }

    public function queryArea($id)
    {
        global $areas_munic, $areas_dpto;

        $padre_dpto = DB::select('select a.codarea codmun,a.nomarea municipio,s.nomarea dpto from users e' .
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
            'left join (select padre id_dpto from users e left join areas a on e.id_area=a.id where e.id = ?) o on a.id=o.id_dpto' .
            ' where id_tipo=2', [$id]);
    }
}
