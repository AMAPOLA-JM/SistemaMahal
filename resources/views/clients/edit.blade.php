@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>Editar Cliente</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;" href="{{route('clients.index')}}" role="button">Retroceder</a>
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
                <i class="fa fa-check"> Detalles del Cliente: {{$client->id_client}}</i>
            </div>
            <form class="" action="{{route('clients.update')}}" method="POST">
                <div class="card-body">
                    <input type="hidden" name="id_client" value="{{$client->id_client}}">
                    <div class="form-group">
                        <label for="dni_client">DNI:</label>
                        <input class="form-control" type="text" id="dni_client" name="dni_client" value="{{$client->dni_client}}" required>
                    </div>
                    <div class="form-group">
                        <label for="name_client">Nombre:</label>
                        <input class="form-control" type="text" id="name_client" name="name_client" value="{{$client->name_client}}" required>
                    </div>
                    <div class="form-group">
                        <label for="surname_client">Apellido:</label>
                        <input class="form-control" type="text" id="surname_client" name="surname_client" value="{{$client->surname_client}}" required>
                    </div>
                    <div class="form-group">
                            <label for="tel_client">N° Celular:</label>
                        <input class="form-control" type="number" id="tel_client" name="tel_client" value="{{$client->tel_client}}" required>
                    </div>
                    @csrf
                    <div class="col-sm-12">
                        <button type="submit" style="width:100%;" class="btn btn-info">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
