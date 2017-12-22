<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laracasts\Flash\Flash;

use App\TipoServicio;

class TipoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_servicios= TipoServicio::orderBy('sigla','ASC')->paginate('10');
        return view('pay.tipo_servicio.index', ['tipo_servicios'=>$tipo_servicios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pay.tipo_servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_servicio= new TipoServicio();
        $tipo_servicio->nombre=$request->nombre;
        $tipo_servicio->sigla= $request->sigla;
        //dd($tipo_servicio);
        $tipo_servicio->save();
        Flash::success('Se ha agregado el tipo de servicio <b>'.$tipo_servicio->nombre.'</b> satisfactoriamente');
        return redirect()->route('tiposervicio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_servicio= TipoServicio::find($id);
        return view('pay.tipo_servicio.view', ['tipo_servicio'=>$tipo_servicio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_servicio= TipoServicio::find($id);
        return view('pay.tipo_servicio.update', ['tipo_servicio'=>$tipo_servicio]);
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
        $tipo_servicio= TipoServicio::find($id);
        $tipo_servicio->nombre=$request->nombre;
        $tipo_servicio->sigla= $request->sigla;
        //dd($tipo_servicio);
        $tipo_servicio->save();
        Flash::warning('Se ha editado el tipo de servicio <b>'.$tipo_servicio->nombre.'</b> satisfactoriamente');
        return redirect()->route('tiposervicio.index');
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
    }
}
