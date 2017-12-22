@extends('pay.template')
@section('title_section','Crear nuevo concepto para '.$cuenta->codigo)
@section('content')
{!! Form::open(['route'=>['concepto.store', $cuenta->id], 'method'=>'POST']) !!}
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('valor_numeros', 'Valor en Números:') !!}
            {!! Form::number('valor_numeros', null, ['class'=>'form-control', 'placeholder'=>'Valor en Numeros', 'required']) !!}
	    </div>
        <div class="form-group col-lg-6">
            {!! Form::label('valor_letras', 'Valor en Letras:') !!}
            {!! Form::text('valor_letras', null, ['class'=>'form-control', 'placeholder'=>'Valor en letras', 'required']) !!}
	    </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-12">
            {!! Form::label('descripcion', 'Descripción')!!}
            {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'placeholder'=>'La descripción', 'require'])!!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::submit('Continuar',['class'=>'btn btn-outline-success my-2 my-sm-0'])!!}
        </div>
        <div class="form-group col-lg-6">
            <a href="{{route('concepto.index', $cuenta->id)}}" class="btn btn-outline-primary my-2 my-sm-0">Regresar</a>
        </div>
    </div>
{!! Form::close()!!}
@endsection