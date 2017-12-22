@extends('pay.template')
@section('title_section','Listado de Conceptos de la Cuenta de Cobro '.$cuenta->codigo)
@section('content')
<div class="row">
    <div class="form-group col-lg-6">
	    <a href="{{route('concepto.create', $cuenta->id)}}" class="btn btn-success">Registrar Nuevo Concepto</a>
	</div>
	<div class="form-group col-lg-6">
	    <a href="{{route('cuentacobro.index', $cuenta->id)}}" class="btn btn-info">Regresar a cuentas de cobro</a>
	</div>
</div>
<div class="row">
	<table class="table">
		<thead>
			<th>Valor en Números</th>
			<th>Valor en Letras</th>
			<th>Descripción</th>
			<th>Opciones</th>
		</thead>
		<tbody>
			@foreach($conceptos as $item)
				<tr>
					<td>{{$item->valor_numeros}}</td>
					<td>{{$item->valor_letras}}</td>
					<td>{{$item->descripcion}}</td>
					<td>
						<a href="{{route('concepto.show', $item->id)}}" class="btn btn-primary glyphicon glyphicon-search" role="button">Ver</a>
						<a href="{{route('concepto.edit', $item->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" role="button">Editar</a>
						<a href="#" onclick="deleteItem('Eliminar Concepto', 'Seguro desea eliminar el concepto <b>{{$item->descripcion}}</b>','{{route('concepto.destroy', $item->id)}}')" class="btn btn-danger glyphicon glyphicon-trash" role="button">Borrar</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $conceptos->render() !!}
</div>
@endsection