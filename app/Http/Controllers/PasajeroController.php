<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CuentaCobro;

use App\Pasajero;

use Laracasts\Flash\Flash;

class PasajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cuenta=CuentaCobro::find($id);
        $pasajeros=Pasajero::where('cuenta_cobro_id',$cuenta->id)->orderBy('id', 'ASC')->paginate(10);
        return view('pay.pasajero.index',['cuenta'=>$cuenta, 'pasajeros'=>$pasajeros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cuenta=CuentaCobro::find($id);
        return view('pay.pasajero.create',['cuenta'=>$cuenta]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $pasajero= new Pasajero();
        $pasajero->identificacion=$request->identificacion;
        $pasajero->tipo_identificacion=$request->tipo_identificacion;
        $pasajero->fecha_nacimiento= $request->fecha_nacimiento;
        $pasajero->nombre=$request->nombre;
        $pasajero->cuenta_cobro_id=$id;
        $pasajero->save();
        Flash::success('Se ha registrado en pasajero de nombre <b>'.$pasajero->nombre.'</b>');
        return redirect()->route('pasajero.index', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasajero= Pasajero::find($id);
        return view('pay.pasajero.view',['pasajero'=>$pasajero]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasajero= Pasajero::find($id);
        //dd($pasajero);
        return view('pay.pasajero.update',['pasajero'=>$pasajero]);
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
        $pasajero= Pasajero::find($id);
        $pasajero->identificacion=$request->identificacion;
        $pasajero->tipo_identificacion=$request->tipo_identificacion;
        $pasajero->fecha_nacimiento= $request->fecha_nacimiento;
        $pasajero->nombre=$request->nombre;
        $pasajero->save();
        Flash::warning('Se ha editado el pasajero de nombre <b>'.$pasajero->nombre.'</b>');
        return redirect()->route('pasajero.index', $pasajero->cuenta_cobro_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasajero=Pasajero::find($id);
        $nombre= $pasajero->nombre;
        $id_cuenta= $pasajero->cuenta_cobro_id;
        $pasajero->delete();
        Flash::error('Se ha eliminato el pasajero de nombre <b>'.$nombre.'</b> satisfactoriamente');
        return redirect()->route('pasajero.index', $id_cuenta);
    }
}
