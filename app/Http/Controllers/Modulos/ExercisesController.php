<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Session;

class ExercisesController extends Controller
{

    public $menu_bar;
    public $estados;

    public function __construct()
    {
        $this->estados = Config::get('constantes.estado');
        $this->menu_bar = Config::get('constantes.sidebar_admon');
        $this->menu_bar[5] = 'active';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 6;

        if (!empty($keyword)) {
            $exercises = Exercise::where('id', 'LIKE', "%$keyword%")
				->orWhere('description', 'LIKE', "%$keyword%")
				->orWhere('observation', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $exercises = Exercise::paginate($perPage);
        }

        return view('modulos.exercises.index', compact('exercises'))
            ->with('menu_bar', $this->menu_bar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('modulos.exercises.create')
            ->with('menu_bar', $this->menu_bar)
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
			'description' => 'required|max:100',
			'observation' => 'max:500'
		]);
        $requestData = $request->all();
        
        Exercise::create($requestData);

        Session::flash('flash_message', 'Exercise added!');

        return redirect('modulos/exercises');
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
        $exercise = Exercise::findOrFail($id);
        return view('modulos.exercises.show', compact('exercise'))
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
        $exercise = Exercise::findOrFail($id);
        return view('modulos.exercises.edit', compact('exercise'))
            ->with('menu_bar', $this->menu_bar)
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
			'description' => 'required|max:100',
			'observation' => 'max:500'
		]);
        $requestData = $request->all();
        
        $exercise = Exercise::findOrFail($id);
        $exercise->update($requestData);

        Session::flash('flash_message', 'Exercise updated!');

        return redirect('modulos/exercises');
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
        Exercise::destroy($id);

        Session::flash('flash_message', 'Exercise deleted!');

        return redirect('modulos/exercises');
    }

    public function findExerciseId(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data
        //$request->id here is the id of our chosen option id
        $id = $request->get('id');
        $data = Exercise::select('id', 'description', 'observation')
            ->where('id','=', "$id")->get();
        return response()->json($data);//then sent this data to ajax success
    }
}
