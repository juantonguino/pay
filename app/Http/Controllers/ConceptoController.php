<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Concepto;

use App\CuentaCobro;

use Laracasts\Flash\Flash;

class ConceptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cuenta= CuentaCobro::find($id);
        $conceptos=Concepto::where('cuenta_cobro_id', $id)->orderBy('id', 'ASC')->paginate(10);
        return view('pay.concepto.index',['cuenta'=>$cuenta, 'conceptos'=>$conceptos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cuenta=CuentaCobro::find($id);
        return view('pay.concepto.create', ['cuenta'=>$cuenta]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $concepto= new Concepto();
        $concepto->valor_numeros=$request->valor_numeros;
        $concepto->valor_letras=$request->valor_letras;
        $concepto->descripcion=$request->descripcion;
        $concepto->cuenta_cobro_id=$id;
        //dd($concepto, $request->all());
        $concepto->save();
        Flash::success('Se ha creado el concepto <b>'.$concepto->descripcion.'</b> satisfactoriamente');
        return redirect()->route('concepto.index', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $concepto=Concepto::find($id);
        $cuenta=CuentaCobro::find($concepto->cuenta_cobro_id);
        return view('pay.concepto.view', ['concepto'=>$concepto, 'cuenta'=>$cuenta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concepto=Concepto::find($id);
        $cuenta=CuentaCobro::find($concepto->cuenta_cobro_id);
        return view('pay.concepto.update', ['concepto'=>$concepto, 'cuenta'=>$cuenta]);
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
        $concepto=Concepto::find($id);
        $concepto->valor_numeros=$request->valor_numeros;
        $concepto->valor_letras=$request->valor_letras;
        $concepto->descripcion=$request->descripcion;
        $concepto->save();
        Flash::warning('Se ha editado el concepto <b>'.$concepto->descripcion.'</b> satisfactoriamente');
        return redirect()->route('concepto.index', $concepto->cuenta_cobro_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $concepto=Concepto::find($id);
        $descripcion=$concepto->descripcion;
        $id_cuenta=$concepto->cuenta_cobro_id;
        $concepto->delete();
        Flash::error('Se ha eliminato el concepto de descripción <b>'.$descripcion.'</b> satisfactoriamente');
        return redirect()->route('concepto.index', $id_cuenta);
    }
}
