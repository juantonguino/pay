@extends('pay.template')
@section('title_section','Ver pasajero '.$pasajero->nombre)
@section('content')
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('cedula', 'Cedula:') !!}
            {!! Form::number('cedula', $pasajero->cedula, ['class'=>'form-control', 'placeholder'=>'cedula', 'required', 'disabled']) !!}
	    </div>
        <div class="form-group col-lg-6">
            {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
            {!! Form::date('fecha_nacimiento', $pasajero->fecha_nacimiento, ['class'=>'form-control', 'placeholder'=>'Fecha de Nacimiento', 'required', 'disabled']) !!}
	    </div>
    </div>
    <div class="row">
        <div class="form-grpup col-lg-12">
            {!! Form::label('nombre', 'Nombre:') !!}
            {!! Form::text('nombre', $pasajero->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required', 'disabled']) !!}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group col-lg-6">
            <a href="{{route('pasajero.index', $pasajero->cuenta_cobro_id)}}" class="btn btn-outline-primary my-2 my-sm-0">Regresar</a>
        </div>
    </div>
@endsection