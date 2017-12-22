@extends('pay.template')
@section('title_section','Listado de Cuentas de Cobro')
@section('content')
<div class="row">
    <div class="form-group col-lg-3">
	    <a href="{{route('cuentacobro.create')}}" class="btn btn-success">Registrar Nueva Cuenta de Cobro</a>
	</div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <th socpe="col">Codigo</th>
            <th scope="col">Tipo de Servicio</th>
            <th scope="col">Cliente</th>
            <th scope="col">Opciones</th>
        </thead>
        <tbody>
            @foreach($cuentas as $cuenta)
            <tr>
                <td>{{$cuenta->codigo}}</td>
                <td>{{$tipos[$cuenta->tipo_servicio_id]}}</td>
                <td>{{$clientes[$cuenta->cliente_id]}}</td>
                <td>
                    <a href="{{route('cuentacobro.show', $cuenta->id)}}" class="btn btn-primary glyphicon glyphicon-search" role="button">Ver</a>
                    <a href="{{route('cuentacobro.edit', $cuenta->id)}}" class="btn btn-warning glyphicon glyphicon-pencil" role="button">Editar</a>
                    <a href="{{route('concepto.index', $cuenta->id)}}" class="btn btn-primary glyphicon glyphicon-search" role="button">Conceptos</a>
                    <a href="{{route('pasajero.index', $cuenta->id)}}" class="btn btn-primary glyphicon glyphicon-search" role="button">Pasajeros</a>
                    <a href="{{route('cuentacobro.report', $cuenta->id)}}" class="btn btn-info glyphicon glyphicon-search" role="button">Docuemento</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $cuentas->render() !!}
</div>
@endsection