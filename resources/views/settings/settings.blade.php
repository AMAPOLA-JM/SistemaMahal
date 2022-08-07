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
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header bg-light">
                <i class="fa fa-user"> Usuario</i>
            </div>
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="card">
                        <div class="bg-secondary text-center py-3">
                            <h3>{{auth()->user()->name}} {{auth()->user()->surname_user}}</h3>
                            @if (auth()->user()->type_user == 0)
                            <h6>ADMINISTRADOR</h6>
                            @else
                            <h6>VENDEDOR</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header bg-light">
                <i class="fa fa-border-all"> Datos de Cuenta</i>
                <div class="card-tools">
                    <a class="btn btn-info" href="{{route('settings.edit', ['id' => auth()->user()->id])}}" role="button">Editar</a>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="card">
                        <div class="card-body p-0 table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td><b>Nombre</b></td>
                                        <td class="text-left">{{auth()->user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td><b>Apellidos</b></td>
                                        <td class="text-left">{{auth()->user()->surname_user}}</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td><b>DNI</b></td>
                                        <td class="text-left">{{auth()->user()->dni_user}}</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td><b>Correo</b></td>
                                        <td class="text-left">{{auth()->user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td><b>Contraseña</b></td>
                                        <td class="text-left"><a class="btn btn-info" href="{{route('settings.change.pass')}}" role="button">Cambiar Contraseña</a></td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td><b>Estado</b></td>
                                        <td class="text-left">
                                            @if (auth()->user()->state_user == 0)
                                            <p>Activo</p>
                                            @else
                                            <p>Inactivo</p>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (auth()->user()->type_user == 0)
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-light">
                <i class="fa fa-users"> Lista de Vendedores</i>
                <div class="card-tools">
                    <a href="{{route('settings.create')}}" class="btn btn-outline-success ">Nuevo Vendedor</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-dark">
                            <tr>
                                <th>#</th>
                                <th>Vendedor</th>
                                <th>DNI</th>
                                <th>Correo</th>
                                <th>Tipo</th>
                                <th colspan="2" class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}} {{$user->surname_user}}</td>
                                <td>{{$user->dni_user}}</td>
                                <td>{{$user->email}}</td>
                                @if ($user->type_user == 0)
                                    <td class="text-center"> <a href="" class="disabled btn btn-success">ADMINISTRADOR</a> </td>
                                @else
                                    <td class="text-center"> <a href="" class="btn disabled btn-warning">VENDEDOR</a> </td>
                                @endif
                                @if ($user->id == auth()->user()->id)
                                    <td class="text-center col-2" colspan="2"><a class="btn btn-primary" href="{{route('settings.edit', ['id' => $user->id])}}" role="button">Editar</a></td>
                                @else
                                    <td class="text-right col-1"><a class="btn btn-primary" href="{{route('settings.edit', ['id' => $user->id])}}" role="button">Editar</a></td>
                                    <td class="text-right col-1"><a class="btn btn-danger" href="{{route('settings.destroy', ['id' => $user->id])}}" role="button">Eliminar</a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
