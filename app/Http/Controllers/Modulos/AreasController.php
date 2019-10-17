<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Area;
use Illuminate\Http\Request;
use Session;

class AreasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
            $areas = Area::where('id', 'LIKE', "$keyword%")
                ->orWhere('padre', 'LIKE', "$keyword%")
                ->orWhere('codarea', 'LIKE', "$keyword%")
                ->orWhere('nomarea', 'LIKE', "%$keyword%")
                ->orWhere('id_tipo', 'LIKE', "$keyword%")
                ->paginate($perPage);
        } else {
            $areas = Area::paginate($perPage);
        }

        return view('modulos.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $areas = Area::all();
        return view('modulos.areas.create')->with('areas', $areas);;
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
            'nomarea' => 'required|max:100',
            'codarea' => 'required|max:20',
            'id_tipo' => 'required'
        ]);
        $requestData = $request->all();
        Area::create($requestData);
        Session::flash('flash_message', 'Area added!');
        return redirect('modulos/areas');
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
        $area = Area::findOrFail($id);
        return view('modulos.areas.show', compact('area'));
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
        $area = Area::findOrFail($id);
        $areas = Area::all();
        return view('modulos.areas.edit', compact('area'))->with('areas', $areas);
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
            'nomarea' => 'required|max:100',
            'codarea' => 'required|max:20',
            'id_tipo' => 'required'
        ]);
        $requestData = $request->all();

        $area = Area::findOrFail($id);
        $area->update($requestData);
        Session::flash('flash_message', 'Area updated!');
        return redirect('modulos/areas');
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
        Area::destroy($id);
        Session::flash('flash_message', 'Area deleted!');
        return redirect('modulos/areas');
    }

    public function findAreaTipo(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data
        //$request->id here is the id of our chosen option id
        $id = $request->get('id');
        $data = Area::select('nomarea', 'id')
            ->where('id_tipo', $id)
            ->orderBy('nomarea')->get();
        return response()->json($data);//then sent this data to ajax success
    }

    public function findAreaPadre(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data
        //$request->id here is the id of our chosen option id
        $id = $request->get('id');
        $data = Area::select('nomarea', 'id')
            ->where('padre', $id)
            ->orderBy('nomarea')->get();
        return response()->json($data);//then sent this data to ajax success
    }

    public function findAreaLike(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data
        //$request->id here is the id of our chosen option id
        $data = [];
        if($request->has('q') && strlen($request->q)>3){
            $keyword = $request->q;
            $data = Area::select('nomarea', 'id')
                ->where('nomarea', 'LIKE', "%$keyword%")
                ->orderBy('nomarea')->get();
        }
        return response()->json($data);//then sent this data to ajax success
    }
}
