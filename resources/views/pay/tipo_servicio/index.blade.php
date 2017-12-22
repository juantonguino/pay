@extends('pay.template')
@section('title_section','Listado de Tipos de Servicio')
@section('content')
<div class="row">
    <div class="form-group col-lg-3">
	    <a href="{{route('tiposervicio.create')}}" class="btn btn-success">Registrar Nuevo Tipo de Servicio</a>
	</div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <th scope="col">Sigla</th>
            <th scope="col">Nombre</th>
            <th scope="col">Opciones</th>
        </thead>
        <tbody>
            @foreach($tipo_servicios as $tipo_servicio)
            <tr>
                <td>{{$tipo_servicio->sigla}}</td>
                <td>{{$tipo_servicio->nombre}}</td>
                <td>
                    <a href="{{route('tiposervicio.show', $tipo_servicio->id)}}" class="btn btn-primary glyphicon glyphicon-search" role="button">Ver</a>
                    <a href="{{route('tiposervicio.edit', $tipo_servicio->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" role="button">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection