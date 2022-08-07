@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>NUEVO VENDEDOR</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;"  href="{{route('settings.index')}}" role="button"><i class="fa fa-ban"></i> Cancelar</a>
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
                <i class="fa fa-check"> Detalles de la Prenda</i>
            </div>
            <form class="" action="{{route('settings.store')}}" method="post">

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="surname_user">Apellidos</label>
                                <input type="text" class="form-control" name="surname_user" id="surname_user" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="dni_user">DNI</label>
                                <input type="number" class="form-control" name="dni_user" id="dni_user" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="type_user">Tipo</label>
                                <select class="form-control select2" name="type_user" id="type_user" required>
                                    <option value="0">Administrador</option>
                                    <option value="1" selected>Vendedor</option>
                                </select>
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
