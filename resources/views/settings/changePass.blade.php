@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>CAMBIAR CONTRASEÑA</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;" href="{{route('settings.index')}}" role="button"><i class="fa fa-ban"></i> Cancelar</a>
            </div>
        </div>
    </div>
</div>

@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-light">
            <div class="card-header">
                <i class="fa fa-check"> Rellenar Datos</i>
            </div>
            <form class="" action="{{route('settings.updatep')}}" method="post">
                <div class="card-body">
                    @if (isset($error) == true)
                        @if ($error == "Contraseña Cambiada Satisfactoriamente")
                            <div class="alert alert-success" role="alert">
                                <b>{{$error}}</b>
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <b>Por Favor Solucionar el siguiente error:</b>
                                <b>{{$error}}</b>
                            </div>
                        @endif
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="password">Nueva Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="reppassword">Repetir Contraseña</label>
                                <input type="password" class="form-control" name="reppassword" id="reppassword" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="actpassword">Contraseña Actual</label>
                                <input type="password" class="form-control" name="actpassword" id="actpassword" value="" required>
                            </div>
                        </div>
                        @csrf
                        <div class="col-sm-12">
                            <button type="submit" style="width:100%;" class="btn btn-info">Enviar</button>
                        </div>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
