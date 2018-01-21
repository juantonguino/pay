@extends('pay.template')
@section('title_section','Listado de Pasajeros de la Cuenta de Cobro '.$cuenta->codigo)
@section('content')
<div class="row">
    <div class="form-group col-lg-6">
	    <a href="{{route('pasajero.create', $cuenta->id)}}" class="btn btn-success">Registrar Nuevo Pasajero</a>
	</div>
	<div class="form-group col-lg-6">
	    <a href="{{route('cuentacobro.index', $cuenta->id)}}" class="btn btn-info">Regresar a cuentas de cobro</a>
	</div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <th>Tipo Identificacion</th>
            <th>Identificacion</th>
            <th>Nombre</th>
            <th>Fecha de Naciemiento</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach($pasajeros as $item)
                <tr>
                    <td>{{$item->tipo_identificacion}}</td>
                    <td>{{$item->identificacion}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->fecha_nacimiento}}</td>
                    <td>
                        <a href="{{route('pasajero.show', $item->id)}}" class="btn btn-primary glyphicon glyphicon-search" role="button">Ver</a>
					    <a href="{{route('pasajero.edit', $item->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" role="button">Editar</a>
						<a href="#" onclick="deleteItem('Eliminar Concepto', 'Seguro desea eliminar el pasajero <b>{{$item->nombre}}</b>','{{route('pasajero.destroy', $item->id)}}')" class="btn btn-danger glyphicon glyphicon-trash" role="button">Borrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $pasajeros->render() !!}
</div>
@endsection