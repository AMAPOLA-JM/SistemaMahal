@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>CLIENTES</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-outline-success" style="width:100%;" href="{{route('clients.create')}}" role="button">Nuevo Cliente</a>
            </div>
        </div>
    </div>
</div>

@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                    <thead class="bg-dark">
                        <tr>
                            <th>#</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>N° Celular</th>
                            <th class="text-center">N° Compras</th>
                            @if (auth()->user()->type_user == 0)
                            <th colspan="2" class="text-center">Acción</th>
                            @endif
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{$client->id_client}}</td>
                            <td>{{$client->dni_client}}</td>
                            <td>{{$client->name_client}}</td>
                            <td>{{$client->surname_client}}</td>
                            <td>{{$client->tel_client}}</td>
                            <td class="text-center">{{$client->buys_client}}</td>
                            @if (auth()->user()->type_user == 0)
                            <td class="text-center col-1"><a class="btn btn-primary" href="{{route('clients.edit', ['id'=>$client->id_client])}}" role="button">Editar</a></td>
                            <td class="text-center col-1"><a class="btn btn-danger" href="{{route('clients.destroy', ['id'=>$client->id_client])}}" role="button">Eliminar</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
