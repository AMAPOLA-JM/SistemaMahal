@extends('adminlte::page')
@section('content_header')
<h1>Menú Principal</h1>
@stop
@section('content')
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                @foreach ($notesales as $notesale)
                <h4>{{$notesale->ventas}}</h4>
                @endforeach
                <p>Ventas en el mes</p>
            </div>
            <a href="{{route('notesales.index')}}" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner text">
                @foreach ($cajamonth as $caja)
                <h4>S/{{$caja->total_month}}</h4>
                @endforeach
                <p>Caja Mensual</p>
            </div>
            <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                @foreach ($notetodays as $notetoday)
                <h4>{{$notetoday->ventas}}</h4>
                @endforeach
                <p>Ventas del día</p>
            </div>
            <a href="{{route('notesales.index')}}" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                @foreach ($cajaday as $cajada)
                <h4>S/{{$cajada->total_day}}</h4>
                @endforeach
                <p>Caja Día</p>
            </div>
<<<<<<< HEAD
            <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
=======
            <a href="{{route('notesales.index')}}" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
>>>>>>> 041ee3d8d654b7953275bed293707ade07419d70
        </div>
    </div>
    <!-- ./col -->
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-list mr-1"> Productos mas Vendidos</i>
                </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="card">
                        <div class="card-body p-0 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Marca</th>
                                        <th>Prenda</th>
                                        <th>Talla</th>
                                        <th class="text-right">N° de Compras</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach ($mostselles as $mostselle)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$mostselle->name_brand}}</td>
                                        <td>{{$mostselle->name_item}}</td>
                                        <td>{{$mostselle->size_item}}</td>
                                        <td class="text-right">{{$mostselle->compras}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-bell"> Poco Stock </i>
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="btn btn-info" href="{{route('incomings.create')}}">Añadir Stock</a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="card">
                        <div class="card-body p-0 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Marca</th>
                                        <th>Prenda</th>
                                        <th>Talla</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach ($lowstock as $lowstoc)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$lowstoc->name_brand}}</td>
                                        <td>{{$lowstoc->name_item}}</td>
                                        <td>{{$lowstoc->size_item}}</td>
                                        <td class="text-right">{{$lowstoc->stock}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user mr-1"> Datos de Usuario</i>
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="btn btn-info" href="{{route('settings.index')}}">Gestionar</a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.card-header -->
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
                        <div class="card-body p-0 table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td><b>Nombre</b></td>
                                        <td class="text-left">{{auth()->user()->name}}</td>
                                        <td class="text-right"> <a class="btn btn-info badge" href="{!! route('settings.index') !!}"> Editar<i class="fa fa-pen"></i></a> </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td><b>Apellidos</b></td>
                                        <td class="text-left">{{auth()->user()->surname_user}}</td>
                                        <td class="text-right"> <a class="btn btn-info badge" href="{!! route('settings.index') !!}"> Editar<i class="fa fa-pen"></i></a> </td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td><b>DNI</b></td>
                                        <td class="text-left">{{auth()->user()->dni_user}}</td>
                                        <td class="text-right"> <a class="btn btn-info badge" href="{!! route('settings.index') !!}"> Editar<i class="fa fa-pen"></i></a> </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td><b>Correo</b></td>
                                        <td class="text-left">{{auth()->user()->email}}</td>
                                        <td class="text-right"> <a class="btn btn-info badge" href="{!! route('settings.index') !!}"> Editar<i class="fa fa-pen"></i></a> </td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td><b>Estado</b></td>
                                        <td class="text-left">
                                            @if (auth()->user()->state_user == 0)
                                            <p>Activo</p>
                                            @else
                                            <p>Inactivo</p>
                                            @endif
                                        </td>
                                        <td class="text-right"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
