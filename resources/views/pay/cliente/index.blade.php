@extends('pay.template')
@section('title_section','Listado de Clientes')
@section('content')
<div class="row">
    <div class="form-group col-lg-3">
	    <a href="{{route('cliente.create')}}" class="btn btn-success">Registrar Nuevo Cliente</a>
	</div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <th socpe="col">Tipo de Identificación</th>
            <th socpe="col">Identificación</th>
            <th scope="col">Nombre</th>
            <th scope="col">Opciones</th>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->tipo_identificacion}}</td>
                <td>{{$cliente->identificacion}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>
                    <a href="{{route('cliente.show', $cliente->id)}}" class="btn btn-primary glyphicon glyphicon-search" role="button">Ver</a>
                    <a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" role="button">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $clientes->render() !!}
</div>
@endsection