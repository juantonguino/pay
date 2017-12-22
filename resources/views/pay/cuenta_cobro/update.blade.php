@extends('pay.template')
@section('title_section','Editar Cuenta de Cobro '.$cuenta->codigo)
@section('content')
{!! Form::open(['route'=>['cuentacobro.update', $cuenta->id], 'method'=>'PUT']) !!}
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('tipo_servicio', 'Tipo de servicio:') !!}
            {!! Form::select('tipo_servicio', $tipos_servicios, $cuenta->tipo_servicio_id, ['class'=>'form-control', 'placeholder'=>'Tipo de servicio', 'required']) !!}
	    </div>
        <div class="form-group col-lg-6">
            {!!Form::label('nombre_cliente', 'Cliente:')!!}
		    {!!Form::select('nombre_cliente', $clientes, $cuenta->cliente_id, ['class'=>'form-control', 'placeholder'=>'Nombre del cliente', 'required'])!!}
	    </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('ano_mes', 'Año y mes de la ejecución')!!}
            <!--{!! Form::date('ano_mes', null, ['class'=>'form-control', 'required'])!!}-->
            @if($cuenta->mes_ejecucuion_servicio<10)
                <input class="form-control" required name="ano_mes" type="month" id="ano_mes" value="{{$cuenta->ano_ejecucuion_servicio.'-0'.$cuenta->mes_ejecucuion_servicio}}">
            @else
                <input class="form-control" required name="ano_mes" type="month" id="ano_mes" value="{{$cuenta->ano_ejecucuion_servicio.'-'.$cuenta->mes_ejecucuion_servicio}}">
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::submit('Editar',['class'=>'btn btn-outline-warning my-2 my-sm-0'])!!}
        </div>
        <div class="form-group col-lg-6">
            <a href="{{route('cuentacobro.index')}}" class="btn btn-outline-primary my-2 my-sm-0">Regresar</a>
        </div>
    </div>
{!! Form::close() !!}
@endsection