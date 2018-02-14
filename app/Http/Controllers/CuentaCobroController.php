<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TipoServicio;

use App\Cliente;

use App\CuentaCobro;

use App\Concepto;

use App\Pasajero;

use Illuminate\Support\Facades\DB;

use Laracasts\Flash\Flash;

use \PhpOffice\PhpWord\TemplateProcessor;

use \PhpOffice\PhpWord\PhpWord;

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
        $cuenta->valor_total_letras=$request->valor_total_letras;
        $cuenta->valor_total_numeros=$request->valor_total_numeros;
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
        $cuenta->valor_total_letras=$request->valor_total_letras;
        $cuenta->valor_total_numeros=$request->valor_total_numeros;
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

    public function report($id){
        $templateProcessor= new TemplateProcessor('../resources/docs/cuenta_cobro.docx');

        //modelos
        $cuenta_cobro= CuentaCobro::find($id);
        $tipo_servicio= TipoServicio::find($cuenta_cobro->tipo_servicio_id);
        $cliente=Cliente::find($cuenta_cobro->cliente_id);
        $conceptos=Concepto::where('cuenta_cobro_id',$cuenta_cobro->id)->get();
        $pasajeros= Pasajero::where('cuenta_cobro_id',$cuenta_cobro->id)->get();
        $codigo=$cuenta_cobro->codigo;

        //llenado de plantilla
        $templateProcessor->setValue('tipo', $tipo_servicio->sigla);
        $templateProcessor->setValue('codigo', $cuenta_cobro->codigo);
        $templateProcessor->setValue('total_numero', $cuenta_cobro->valor_total_numeros);
        $templateProcessor->setValue('total_letras', $cuenta_cobro->valor_total_letras);
        $templateProcessor->setValue('nombre_cliente', $cliente->nombre);
        $templateProcessor->setValue('type_cliente', $cliente->tipo_identificacion);
        $templateProcessor->setValue('id_cliente', $cliente->identificacion);

        $date= date('y-m-d');
        $fecha= explode("-", $date);
        $dia=$fecha[2];
        $mes=$fecha[1];
        $anio=$fecha[0];

        $meses= ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre", "noviembre", "diciembre"];
        $mes_letra= $meses[((int)$mes)-1];

        $templateProcessor->setValue('day',$dia);
        $templateProcessor->setValue('month',$mes_letra);
        $templateProcessor->setValue('year',"20".$anio);

        $templateProcessor->cloneRow('id',sizeof($conceptos));
        for ($i=0; $i < sizeof($conceptos); $i++) { 
            $concepto= $conceptos[$i];
            $id=$i+1;
            $templateProcessor->setValue(array('valor_letras#'.$id, 'valor_numeros#'.$id, 'concepto#'.$id), array($concepto->valor_letras, $concepto->valor_numeros, $concepto->descripcion));
        }
        $templateProcessor->cloneRow('nombre_pasajero', sizeof($pasajeros));
        for ($i=0; $i < sizeof($pasajeros); $i++) { 
            $pasajero= $pasajeros[$i];
            $id=$i+1;
            $templateProcessor->setValue(array('nombre_pasajero#'.$id, 'documento#'.$id, 'identificacion#'.$id),array($pasajero->nombre, $pasajero->tipo_identificacion, $pasajero->identificacion));
        }

        //especificaciones tecnicas de la plantilla
        $templateProcessor->saveAs('$codigo.docx');
        header("Content-Disposition: attachment; filename=".$codigo.".docx; charset=iso-8859-1");
        echo file_get_contents('$codigo.docx');
    }
}