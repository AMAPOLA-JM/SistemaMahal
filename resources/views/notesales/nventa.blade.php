@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>NUEVA VENTA</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;" href="{{route('notesales.index')}}" role="button">Retroceder</a>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-light">
                <i class="fa fa-user"> Seleccionar Cliente</i>
            </div>
            <div class="card-body">
                <div class="form">
                    <form class="form" action="{{route('notesales.new')}}" method="post">
                        <div class="form-group">
                            <label for="id_client">Cliente</label>
                            <div class="row">
                                <div class="col-sm-9 mb-1">
                                    <div class="form-control">
                                        <x-adminlte-select2 class="" name="id_client" id="id_client" required>
                                            @foreach ($clients as $client)
                                            <option value="{{$client->id_client}}">{{$client->dni_client}} {{$client->name_client}} {{$client->surname_client}}</option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <a class="btn btn-outline-success" style="width:100%;" href="{{route('clients.create')}}" role="button">Nuevo Cliente</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type_note_sale">Tipo de Venta</label>
                            <select class="form-control" name="type_note_sale" id="type_note_sale" required>
                                <option value="0">Venta por Menor</option>
                                <option value="1" selected>Venta por Mayor</option>
                            </select>
                        </div>
                        @csrf
                        <div>
                            <button type="submit" style="width:100%;" class="btn btn-info">Nueva Venta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
