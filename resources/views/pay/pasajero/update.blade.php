@extends('pay.template')
@section('title_section','Editar el pasajero '.$pasajero->nombre)
@section('content')
{!! Form::open(['route'=>['pasajero.update', $pasajero->id], 'method'=>'PUT']) !!}
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('tipo_identificacion', 'Tipo de Identificacion:') !!}
            {!! Form::select('tipo_identificacion', ["Tarjeta de Identidad"=>"Tarjeta de Identidad", "Cedula de Ciudadania"=>"Cedula de Ciudadania", "Cedula de Extrangería"=>"Cedula de Extrangería", "Pasaporte"=>"Pasaporte"], $pasajero->tipo_identificacion, ['class'=>'form-control', 'placeholder'=>'Tipo de Identificacion', 'required']) !!}
        </div>
        <div class="form-group col-lg-6">
            {!! Form::label('identificacion', 'Identificacion:') !!}
            {!! Form::text('identificacion', $pasajero->identificacion, ['class'=>'form-control', 'placeholder'=>'Identificacion', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
            {!! Form::date('fecha_nacimiento', $pasajero->fecha_nacimiento, ['class'=>'form-control', 'placeholder'=>'Fecha de Nacimiento', 'required']) !!}
        </div>
        <div class="form-group col-lg-6">
            {!! Form::label('nombre', 'Nombre:') !!}
            {!! Form::text('nombre', $pasajero->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required']) !!}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::submit('Editar',['class'=>'btn btn-outline-warning my-2 my-sm-0'])!!}
        </div>
        <div class="form-group col-lg-6">
            <a href="{{route('pasajero.index', $pasajero->cuenta_cobro_id)}}" class="btn btn-outline-primary my-2 my-sm-0">Regresar</a>
        </div>
    </div>
{!! Form::close() !!}
@endsection