<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User_empresa;
use Illuminate\Http\Request;
use Session;

class User_empresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $user_empresas = User_empresa::where('id_user', 'LIKE', "%$keyword%")
				->orWhere('id_empresa', 'LIKE', "%$keyword%")
				->orWhere('state', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $user_empresas = User_empresa::paginate($perPage);
        }

        return view('modulos.user_empresas.index', compact('user_empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('modulos.user_empresas.create');
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
			'id_user' => 'required',
			'id_empresa' => 'required'
		]);
        $requestData = $request->all();
        
        User_empresa::create($requestData);

        Session::flash('flash_message', 'User_empresa added!');

        return redirect('modulos/user_empresas');
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
        $user_empresa = User_empresa::findOrFail($id);

        return view('modulos.user_empresas.show', compact('user_empresa'));
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
        $user_empresa = User_empresa::findOrFail($id);

        return view('modulos.user_empresas.edit', compact('user_empresa'));
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
			'id_user' => 'required',
			'id_empresa' => 'required'
		]);
        $requestData = $request->all();
        
        $user_empresa = User_empresa::findOrFail($id);
        $user_empresa->update($requestData);

        Session::flash('flash_message', 'User_empresa updated!');

        return redirect('modulos/user_empresas');
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
        User_empresa::destroy($id);

        Session::flash('flash_message', 'User_empresa deleted!');

        return redirect('modulos/user_empresas');
    }

    public function findUserEmpresa(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data
        //$request->id here is the id of our chosen option id
        $username = $request->get('id');
        $data = User_empresa::from('user_empresas as uc')
            ->select('uc.id_empresa','c.nombre')
            ->leftJoin('users as u', 'uc.id_user', '=', 'u.id')
            ->leftJoin('empresas as c', 'uc.id_empresa', '=', 'c.id')
            ->where('u.username', '=', "$username")
            ->where('uc.state','=','AC')
            ->get();

        return response()->json($data);//then sent this data to ajax success
    }
}
