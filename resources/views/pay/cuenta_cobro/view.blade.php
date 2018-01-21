@extends('pay.template')
@section('title_section','Ver Cuenta de Cobro')
@section('content')
{!! Form::open(['route'=>['cuentacobro.update', $cuenta->id], 'method'=>'PUT']) !!}
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('tipo_servicio', 'Tipo de servicio:') !!}
            {!! Form::select('tipo_servicio', $tipos_servicios, $cuenta->tipo_servicio_id, ['class'=>'form-control', 'placeholder'=>'Tipo de servicio', 'required', 'disabled']) !!}
	    </div>
        <div class="form-group col-lg-6">
            {!!Form::label('nombre_cliente', 'Cliente:')!!}
		    {!!Form::select('nombre_cliente', $clientes, $cuenta->cliente_id, ['class'=>'form-control', 'placeholder'=>'Nombre del cliente', 'required', 'disabled'])!!}
	    </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('valor_total_letras','Valor Total en Letras:')!!}
            {!! Form::text('valor_total_letras',$cuenta->valor_total_letras,['class'=>'form-control', 'placeholder'=>'Valor total en letras','required', 'disabled'])!!}
        </div>
        <div class="form-group col-lg-6">
            {!! Form::label('valor_total_numeros','Valor Total en Numeros:') !!}
            {!! Form::number('valor_total_numeros',$cuenta->valor_total_numeros,['class'=>'form-control', 'placeholder'=>'Valor total en numeros','required', 'disabled'])!!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('ano_mes', 'Año y mes de la ejecución')!!}
            <!--{!! Form::date('ano_mes', null, ['class'=>'form-control', 'required'])!!}-->
            @if($cuenta->mes_ejecucuion_servicio<10)
                <input class="form-control" required name="ano_mes" type="month" id="ano_mes" value="{{$cuenta->ano_ejecucuion_servicio.'-0'.$cuenta->mes_ejecucuion_servicio}}" disabled>
            @else
                <input class="form-control" required name="ano_mes" type="month" id="ano_mes" value="{{$cuenta->ano_ejecucuion_servicio.'-'.$cuenta->mes_ejecucuion_servicio}}" disabled>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            <a href="{{route('cuentacobro.index')}}" class="btn btn-outline-primary my-2 my-sm-0">Regresar</a>
        </div>
    </div>
{!! Form::close() !!}
@endsection