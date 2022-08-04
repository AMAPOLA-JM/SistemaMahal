@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>CONFIGURACIÓN</h2>
    </div>
    <div class="col-sm-2">

        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;" href="{{route('home')}}" role="button">Menú Principal</a>
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
                <i class="fa fa-border-all"> Configuracion de Cuenta</i>
            </div>
        </div>
    </div>
</div>
@endsection
