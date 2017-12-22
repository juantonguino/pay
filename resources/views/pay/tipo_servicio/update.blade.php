@extends('pay.template')
@section('title_section','Editar Tipo de Servicio')
@section('content')
{!! Form::open(['route'=>['tiposervicio.update', $tipo_servicio->id], 'method'=>'PUT']) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!!Form::label('nombre', 'Nombre:')!!}
		{!!Form::text('nombre', $tipo_servicio->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre del tipo de servicio', 'required'])!!}
	</div>
    <div class="form-group col-lg-6">
        {!!Form::label('sigla', 'Sigla:')!!}
		{!!Form::text('sigla', $tipo_servicio->sigla, ['class'=>'form-control', 'placeholder'=>'Sigla del tipo de servicio', 'required'])!!}
	</div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::submit('Editar', ['class'=>'btn btn-outline-warning my-2 my-sm-0']) !!}
    </div>
    <div class="form-group col-lg-3">
        <a href="{{route('tiposervicio.index')}}" class="btn btn-outline-primary my-2 my-sm-0">Regresar</a>
    </div>
</div>
{!! Form::close()!!}
@endsection