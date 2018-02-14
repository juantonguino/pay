@extends('pay.template')
@section('title_section','Editar Cliente')
@section('content')
{!! Form::open(['route'=>['cliente.update', $cliente->id], 'method'=>'PUT']) !!}
<div class="row">
    <div class="form-group col-lg-12">
        {!!Form::label('nombre', 'Nombre:')!!}
		{!!Form::text('nombre', $cliente->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre del cliente', 'required'])!!}
	</div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!!Form::label('tipo_identificacion', 'Tipo de Identificación:')!!}
        {!!Form::select('tipo_identificacion', ["Tarjeta de Identidad"=>"Tarjeta de Identidad", "Cedula de Ciudadania"=>"Cedula de Ciudadania", "Cedula de Extrangería"=>"Cedula de Extrangería", "Pasaporte"=>"Pasaporte"], $cliente->tipo_identificacion, ['class'=>'form-control', 'placeholder'=>'Tipo de identificacion del cliente', 'required'])!!}
    </div>
    <div class="form-group col-lg-6">
        {!!Form::label('identificacion', 'Identificación') !!}
        {!!Form::text('identificacion', $cliente->identificacion, ['class'=>'form-control', 'placeholder'=>'Idenridicacion del cliente', 'required'])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::submit('Editar', ['class'=>'btn btn-outline-warning my-2 my-sm-0']) !!}
    </div>
    <div class="form-group col-lg-3">
        <a href="{{route('cliente.index')}}" class="btn btn-outline-primary my-2 my-sm-0">Regresar</a>
    </div>
</div>
{!! Form::close()!!}
@endsection