<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TipoServicio;

use App\Cliente;

use App\CuentaCobro;

use Illuminate\Support\Facades\DB;

use Laracasts\Flash\Flash;

class CuentaCobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas= CuentaCobro::orderBy('codigo','DESC')->paginate(10);
        $tipo_s= TipoServicio::all()->pluck('sigla','id');
        $clientes= Cliente::all()->pluck('nombre', 'id');
        return view('pay.cuenta_cobro.index',['cuentas'=>$cuentas, 'clientes'=>$clientes, 'tipos'=>$tipo_s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos= TipoServicio::all()->pluck('sigla', 'id');
        $clientes= Cliente::all()->pluck('nombre', 'id');
        return view('pay.cuenta_cobro.create', ['tipos_servicios'=>$tipos, 'clientes'=>$clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuenta= new CuentaCobro();
        $cuenta->tipo_servicio_id=$request->tipo_servicio;
        $cuenta->cliente_id=$request->nombre_cliente;
        $parts= explode("-", $request->ano_mes);
        $cuenta->ano_ejecucuion_servicio=$parts[0];
        $cuenta->mes_ejecucuion_servicio=$parts[1];

        $max_val_num=DB::table('cuenta_cobro')->where('ano_ejecucuion_servicio', $cuenta->ano_ejecucuion_servicio)->max('numero_ejecucuion_servicio');
        if($max_val_num==null){
            $cuenta->numero_ejecucuion_servicio= 1;
        }
        else{
            $cuenta->numero_ejecucuion_servicio= $max_val_num+1;
        }
        if($cuenta->numero_ejecucuion_servicio<10){
            $cuenta->codigo=$cuenta->ano_ejecucuion_servicio.$cuenta->mes_ejecucuion_servicio."-0".$cuenta->numero_ejecucuion_servicio."";
        }
        else{
            $cuenta->codigo=$cuenta->ano_ejecucuion_servicio.$cuenta->mes_ejecucuion_servicio."-".$cuenta->numero_ejecucuion_servicio;
        }
        $cuenta->save();
        Flash::success('Se ha creado la cuenta <b>'.$cuenta->codigo.'</b> satisfactoriamente');
        return redirect()->route('cuentacobro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuenta=CuentaCobro::find($id);
        $tipos= TipoServicio::all()->pluck('sigla', 'id');
        $clientes= Cliente::all()->pluck('nombre', 'id');
        return view('pay.cuenta_cobro.view', ['cuenta'=>$cuenta,'tipos_servicios'=>$tipos,'clientes'=>$clientes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuenta=CuentaCobro::find($id);
        $tipos= TipoServicio::all()->pluck('sigla', 'id');
        $clientes= Cliente::all()->pluck('nombre', 'id');
        return view('pay.cuenta_cobro.update',['cuenta'=>$cuenta,'tipos_servicios'=>$tipos,'clientes'=>$clientes]);
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
        $cuenta= CuentaCobro::find($id);
        $cuenta->tipo_servicio_id=$request->tipo_servicio;
        $cuenta->cliente_id=$request->nombre_cliente;
        $parts= explode("-", $request->ano_mes);
        $cuenta->ano_ejecucuion_servicio=$parts[0];
        $cuenta->mes_ejecucuion_servicio=$parts[1];
        $cuenta->save();
        Flash::warning('Se ha editado la cuenta <b>'.$cuenta->codigo.'</b> satisfactoriamente');
        return redirect()->route('cuentacobro.index');
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
    function report($id){
        return "espacio para el reporte";
    }
}
