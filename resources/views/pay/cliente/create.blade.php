@extends('pay.template')
@section('title_section','Crear nuevo Cliente')
@section('content')
{!! Form::open(['route'=>'cliente.store', 'method'=>'POST']) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!!Form::label('nombre', 'Nombre:')!!}
		{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del cliente', 'required'])!!}
	</div>
    <div class="form-group col-lg-6">
        {!!Form::label('nit', 'NIT:')!!}
		{!!Form::text('nit', null, ['class'=>'form-control', 'placeholder'=>'NIT del cliente', 'required'])!!}
	</div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::submit('Crear', ['class'=>'btn btn-outline-success my-2 my-sm-0']) !!}
    </div>
    <div class="form-group col-lg-3">
        <a href="{{route('cliente.index')}}" class="btn btn-outline-primary my-2 my-sm-0">Regresar</a>
    </div>
</div>
{!! Form::close()!!}
@endsection