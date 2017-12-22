@extends('pay.template')
@section('title_section','Crear nueva Cuenta de Cobro')
@section('content')
{!! Form::open(['route'=>'cuentacobro.store', 'method'=>'POST']) !!}
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('tipo_servicio', 'Tipo de servicio:') !!}
            {!! Form::select('tipo_servicio', $tipos_servicios, null, ['class'=>'form-control', 'placeholder'=>'Tipo de servicio', 'required']) !!}
	    </div>
        <div class="form-group col-lg-6">
            {!!Form::label('nombre_cliente', 'Cliente:')!!}
		    {!!Form::select('nombre_cliente', $clientes, null, ['class'=>'form-control', 'placeholder'=>'Nombre del cliente', 'required'])!!}
	    </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('ano_mes', 'Año y mes de la ejecución')!!}
            <!--{!! Form::date('ano_mes', null, ['class'=>'form-control', 'required'])!!}-->
            <input class="form-control" required name="ano_mes" type="month" id="ano_mes">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::submit('Continuar',['class'=>'btn btn-outline-success my-2 my-sm-0'])!!}
        </div>
        <div class="form-group col-lg-6">
            <a href="{{route('cuentacobro.index')}}" class="btn btn-outline-primary my-2 my-sm-0">Regresar</a>
        </div>
    </div>
{!! Form::close() !!}
@endsection