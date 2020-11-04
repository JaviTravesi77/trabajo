<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cycles;

class CyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Cycles=Cycles::orderBy('id','DESC')->paginate(3);  // por id no es, es por año
        return view('Cycles.index',compact('Cycles')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('Cycles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $ciclo = new Cycles();
        $data = $this->validate($request, [
            'id'=>'required',
            'name'=>'required',
            'grade'=>'required',
            'year'=>'required',
        ])
        // tipo de validacion para el deleted
        $this->validate($request,['id'=>'required', 'name'=>'required', 'grade'=>'required', 'year'=>'required']);
        Cycles::create($request->all());
        return redirect()->route('Cycles.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Cycles=Cycles::find($id);
        return  view('Cycles.show',compact('Cycles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Cycles=Cycles::find($id);
        return view('Cycles.edit',compact('Cycles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['id'=>'required', 'name'=>'required', 'grade'=>'required', 'year'=>'required']);
        Cycles::update($request->all());
        return redirect()->route('Cycles.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ciclo = Cycles::find($id); //primero hago variable ese ciclo que busco que es el que voy a eliminar
        // luego de ese ciclo establezco el valor nuevo
        $ciclo->deleted = 1;
        //luego actualiazo el registro
        $ciclo->update();

        return redirect()->route('Cycles.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
