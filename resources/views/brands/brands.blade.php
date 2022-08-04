@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>MARCAS</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-outline-success" style="width:100%;" href="{{route('brands.create')}}" role="button">Nueva Marca</a>
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
                            <th>Proveedor</th>
                            <th>Marca</th>
                            <th class="text-center">Estado</th>
                            @if (auth()->user()->type_user == 0)
                            <th colspan="2" class="text-center">Acción</th>
                            @endif
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{$brand->id_brand}}</td>
                            <td>{{$brand->name_supplier}}</td>
                            <td>{{$brand->name_brand}}</td>
                            @if ($brand->status_brand == 0)
                                <td class="text-center"> <a href="" class="disabled btn btn-success">Activado</a> </td>
                            @else
                                <td class="text-center"> <a href="" class="btn disabled btn-warning">Desactivado</a> </td>
                            @endif
                            @if (auth()->user()->type_user == 0)
                            <td class="text-center col-1"><a class="btn btn-primary" href="{{route('brands.edit', ['id'=>$brand->id_brand])}}" role="button">Editar</a></td>
                            <td class="text-center col-1"><a class="btn btn-danger" href="{{route('brands.destroy', ['id'=>$brand->id_brand])}}" role="button">Eliminar</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
